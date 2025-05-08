<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Convoncu;
use Illuminate\Http\Request;

class FicheController extends Controller
{
    /**
     * Display the specified student's file.
     */
    public function show($matricule)
    {
        $eleve = Eleve::where('matricule', $matricule)->firstOrFail();
        $convoncu = Convoncu::where('matricule', $matricule)->first();

        return view('infermerie.fiche', compact('eleve', 'convoncu'));
    }

    /**
     * Update the specified student's file.
     */
    public function update(Request $request, $matricule)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            // Add other fields as needed
        ]);

        $eleve = Eleve::where('matricule', $matricule)
            ->firstOrFail();

        $eleve->update($validated);

        return redirect()->back()->with('success', 'Fiche mise à jour avec succès');
    }
}
