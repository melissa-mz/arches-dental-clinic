<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // ===== UN SEUL COMPTE =====
        $adminEmail = 'admin@lebdiri.dz';
$adminPassword = 'lebdiri2026';

        if ($email === $adminEmail && $password === $adminPassword) {
            Session::put('admin_logged_in', true);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Email ou mot de passe incorrect'], 401);
    }

    public function logout()
    {
        Session::forget('admin_logged_in');
        return redirect('/');
    }
}