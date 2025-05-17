<?php

namespace App\Http\Controllers;

use App\Models\Convoncu;
use App\Models\Eleve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConvoncuController extends Controller
{
    public function show(Request $request)
    {
        // Si c'est une requête AJAX pour la recherche instantanée
        if ($request->ajax() && $request->has('search')) {
            try {
                $search = $request->input('search');
                Log::info('Recherche AJAX pour: ' . $search);

                $etudiants = Eleve::where('matricule', 'like', "%{$search}%")
                    ->orWhere('nom', 'like', "%{$search}%")
                    ->orWhere('prenom', 'like', "%{$search}%")
                    ->select('id', 'matricule', 'nom', 'prenom', 'section')
                    ->limit(20)
                    ->get();

                return response()->json($etudiants);
            } catch (\Exception $e) {
                Log::error('Erreur lors de la recherche d\'étudiants: ' . $e->getMessage());
                return response()->json(['error' => 'Erreur lors de la recherche: ' . $e->getMessage()], 500);
            }
        }

        // Sinon, afficher la liste normale
        try {
            $convoncus = Convoncu::whereNull('psy')
                ->join('eleves', 'convoncus.matricule', '=', 'eleves.matricule')
                ->select('convoncus.*', 'eleves.nom', 'eleves.prenom', 'eleves.section', 'eleves.id')
                ->orderBy('convoncus.created_at', 'desc')
                ->paginate(10)
                ->withQueryString();

            return view('infermerie.liste_convoncu', compact('convoncus'));
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'affichage de la liste des convoqués: ' . $e->getMessage());
            return view('infermerie.liste_convoncu')->withErrors(['error' => 'Une erreur est survenue lors du chargement des données.']);
        }
    }

    public function recherche(Request $request)
    {
        try {
            $search = $request->input('search');
            Log::info('Recherche pour: ' . $search);

            $query = Eleve::query();

            if ($search) {
                $query->where('matricule', 'like', "%{$search}%")
                      ->orWhere('nom', 'like', "%{$search}%")
                      ->orWhere('prenom', 'like', "%{$search}%");
            }

            $etudiants = $query->select('id', 'matricule', 'nom', 'prenom', 'section')
                               ->limit(20)
                               ->get();

            // Si c'est une requête AJAX, retourner les données en JSON
            if ($request->ajax()) {
                return response()->json($etudiants);
            }

            // Sinon, retourner la vue complète
            return view('infermerie.liste_convoncu', compact('etudiants'));
        } catch (\Exception $e) {
            Log::error('Erreur lors de la recherche: ' . $e->getMessage());

            if ($request->ajax()) {
                return response()->json(['error' => 'Erreur lors de la recherche: ' . $e->getMessage()], 500);
            }

            return back()->withErrors(['error' => 'Une erreur est survenue lors de la recherche.']);
        }
    }
}
