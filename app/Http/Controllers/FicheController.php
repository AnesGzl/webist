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
    public function show($id)
    {   $convoncu = Convoncu::where('id', $id)->first();

        $eleve = Eleve::where('matricule', $convoncu->matricule)->firstOrFail();

        return view('infermerie.fiche', compact('eleve', 'convoncu'));
    }

    /**
     * Update the specified student's file.
     */
          public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'psy' => 'required|string',
            'medGen' => 'required|string',
            'chirDent' => 'required|string',
            'avisSpe' => 'required|string',
        ]);

        $convoncu = Convoncu::where('id', $id)->firstOrFail();
        $convoncu->update($validated);

        return redirect()->route('liste_convoncu')->with('success', 'Fiche médicale mise à jour avec succès');
    }
}
