<?php

namespace App\Http\Controllers;

use App\Models\Convoncu;
use App\Models\Eleve;
use Illuminate\Http\Request;

class ConvoncuController extends Controller
{
    public function show(Request $request)
    {
        $query = Convoncu::query();

        // Join with eleves table to get student information
        $convoncus = $query->join('eleves', 'convoncus.matricule', '=', 'eleves.matricule')
            ->select('convoncus.*', 'eleves.nom', 'eleves.prenom', 'eleves.section')
            ->orderBy('convoncus.created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('infermerie.liste_convoncu', compact('convoncus'));
    }

    public function update(Request $request, $matricule)
    {
        $validated = $request->validate([
            'psy' => 'nullable|string',
            'medGen' => 'nullable|string',
            'chirDent' => 'nullable|string',
            'avisSpe' => 'nullable|string',
        ]);

        $convoncu = Convoncu::where('matricule', $matricule)->firstOrFail();
            $convoncu->update($validated);

        return redirect()->back()->with('success', 'Fiche médicale mise à jour avec succès');
    }
}

