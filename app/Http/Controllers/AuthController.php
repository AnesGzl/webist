<?php
// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('infermerie.login');
    }

    public function login(Request $request)
    {
        // Valide les champs
        $credentials = $request->validate([
            'username' => ['required', 'string', 'exists:users,username'],
            'password' => ['required'],
        ]);

        // Utilise le guard par défaut (web)
        if (Auth::attempt($credentials)) {  // Utilisation de Auth::attempt sans spécifier de guard
            $request->session()->regenerate();

            // Redirection vers la route nommée "compt"
            return redirect()->route('liste_convoncu');
        }

        return back()
            ->withErrors(['username' => 'Identifiants incorrects.'])
            ->withInput($request->except('password'));
    }

    public function logout(Request $request)
    {
        Auth::logout();  // Utilisation de Auth::logout() sans spécifier de guard
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
