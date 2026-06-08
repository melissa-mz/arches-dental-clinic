<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarController extends Controller
{
    // Afficher le calendrier
    public function index()
    {
        return view('rdv');
    }

    // Récupérer les disponibilités pour une plage de dates
    public function availability(Request $request)
    {
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);
        $availability = [];

        // Paramètres : heures d'ouverture (8:30 à 16:30) avec créneaux de 30 min → 16 créneaux par jour
        $totalSlotsPerDay = 16; // de 8:30 à 16:30 = 8h → 16 créneaux de 30 min

        for ($date = $start->copy(); $date <= $end; $date->addDay()) {
            // Compter les rendez-vous déjà pris pour cette date
            $booked = Appointment::whereDate('date', $date)->count();
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
            // Vérifier si ce créneau est déjà réservé
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

    // Enregistrer le rendez-vous (avec redirection et message flash)
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

        // Vérifier à nouveau que le créneau n'est pas pris (entre temps)
        $exists = Appointment::where('date', $request->date)
                            ->where('time', $request->time)
                            ->exists();
        if ($exists) {
            return redirect()->back()->with('error', 'Désolé, ce créneau vient d’être pris. Veuillez en choisir un autre.');
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

return redirect('/rdv?success=1');
    }
}