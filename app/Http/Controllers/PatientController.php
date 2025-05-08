<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Eleve;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $query = Patient::query();

        // Filter by validation status if specified
        if ($request->filled('validation')) {
            switch($request->validation) {
                case '1': // Validé
                    $query->where('valider', true);
                    break;
                case '0': // Non validé
                    $query->where('valider', false)
                          ->orWhereNull('valider');
                    break;
                default: // Tout
                    break;
            }
        }

        // Join with eleves table to get student information
        $patients = $query->join('eleves', 'patients.matricule', '=', 'eleves.matricule')
            ->select('patients.*', 'eleves.nom', 'eleves.prenom', 'eleves.section')
            ->orderBy('patients.created_at', 'desc')
            ->get();

        return view('infermerie.liste_patient', compact('patients'));
    }

    public function valider($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->valider = true;
        $patient->validated_at = Carbon::now();
        $patient->save();

        return redirect()->back()->with('success', 'Patient validé avec succès.');
    }
}
