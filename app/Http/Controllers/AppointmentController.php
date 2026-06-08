<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    // Afficher le formulaire de réservation
    public function create()
    {
        // Générer les créneaux horaires (9h à 18h30 par tranche de 30 min)
        $slots = [];
        $start = 9; // 9h
        $end = 18; // 18h30
        for ($h = $start; $h <= $end; $h++) {
            for ($m = 0; $m < 60; $m += 30) {
                $hour = str_pad($h, 2, '0', STR_PAD_LEFT);
                $minute = str_pad($m, 2, '0', STR_PAD_LEFT);
                $slots[] = "$hour:$minute";
            }
        }
        // Dernier créneau 18:30
        // Si besoin, on peut supprimer certains créneaux (ex: 12h30? mais on garde tout)

        return view('rdv', compact('slots'));
    }

    // Enregistrer un rendez-vous
    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:100',
            'patient_phone' => 'required|string|max:20',
            'service' => 'required|string',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required'
        ]);

        // Vérifier si le créneau est déjà pris
        $exists = Appointment::where('date', $request->date)
                            ->where('time', $request->time)
                            ->exists();
        if ($exists) {
            return back()->withInput()->with('error', 'Désolé, ce créneau est déjà réservé. Veuillez en choisir un autre.');
        }

        Appointment::create($request->all());

        return redirect()->route('rdv.create')->with('success', '✅ Votre rendez-vous est confirmé ! Nous vous attendrons.');
    }

    // (Optionnel) Admin : liste des rendez-vous
    public function adminIndex()
    {
        $appointments = Appointment::orderBy('date', 'asc')->orderBy('time', 'asc')->get();
        return view('admin-rdv', compact('appointments'));
    }
}