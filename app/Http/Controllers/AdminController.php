<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Affiche les rendez-vous du jour par défaut, ou ceux d'une date précise
    public function index(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect('/')->with('error', 'Accès non autorisé');
        }

        $date = $request->input('date', date('Y-m-d')); // par défaut aujourd'hui

        $appointments = Appointment::where('date', $date)
                                   ->orderBy('time', 'asc')
                                   ->get();

        return view('admin.appointments', compact('appointments', 'date'));
    }

    // Mettre à jour le statut (honoré / annulé)
    public function updateStatus(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = $request->status;
        $appointment->save();

        return redirect()->back()->with('success', 'Statut mis à jour');
    }
}