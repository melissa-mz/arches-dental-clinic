<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; // Ajout pour la requête groupée

class CalendarController extends Controller
{
    // Afficher le calendrier (page séparée – plus utilisée si vous avez tout dans welcome)
    public function index()
    {
        return view('rdv');
    }

    // Récupérer les disponibilités pour une plage de dates (optimisée)
    public function availability(Request $request)
    {
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);
        $totalSlotsPerDay = 16;

        // Une seule requête pour compter les RDV par date
        $bookedCounts = Appointment::whereBetween('date', [$start, $end])
            ->select('date', DB::raw('count(*) as total'))
            ->groupBy('date')
            ->pluck('total', 'date')
            ->toArray();

        $availability = [];
        for ($date = $start->copy(); $date <= $end; $date->addDay()) {
            $booked = $bookedCounts[$date->toDateString()] ?? 0;
            $remaining = max(0, $totalSlotsPerDay - $booked);
            $availability[$date->toDateString()] = $remaining;
        }

        return response()->json($availability);
    }

    // Récupérer les créneaux horaires libres pour une date donnée
    public function slots(Request $request)
    {
        $date = Carbon::parse($request->date);
        $slots = [];
        $start = Carbon::create($date->year, $date->month, $date->day, 8, 30, 0);
        $end = Carbon::create($date->year, $date->month, $date->day, 16, 30, 0);

        while ($start <= $end) {
            $formatted = $start->format('H:i');
            $exists = Appointment::whereDate('date', $date)
                                ->where('time', $formatted)
                                ->exists();
            if (!$exists) {
                $slots[] = $formatted;
            }
            $start->addMinutes(30);
        }

        return response()->json($slots);
    }

    // Enregistrer le rendez‑vous et retourner JSON (pour l’appel AJAX de la modale)
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'patient_name' => 'required|string|max:100',
            'patient_firstname' => 'required|string|max:100',
            'patient_phone' => 'required|string|max:20',
            'service' => 'required|string',
            'age' => 'nullable|integer|min:0|max:120',
        ]);

        // Vérifier que le créneau n’est pas déjà pris (double réservation)
        $exists = Appointment::where('date', $request->date)
                            ->where('time', $request->time)
                            ->exists();
        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'Désolé, ce créneau vient d’être pris. Veuillez en choisir un autre.'
            ], 409);
        }

        Appointment::create([
            'patient_name' => $request->patient_name,
            'patient_firstname' => $request->patient_firstname,
            'patient_phone' => $request->patient_phone,
            'service' => $request->service,
            'date' => $request->date,
            'time' => $request->time,
            'age' => $request->age,
        ]);

        return response()->json(['success' => true]);
    }
}