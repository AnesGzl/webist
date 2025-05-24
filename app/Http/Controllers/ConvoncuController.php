<?php

namespace App\Http\Controllers;

use App\Models\Convoncu;
use App\Models\Eleve;
use Illuminate\Http\Request;

class ConvoncuController extends Controller
{
    public function show(Request $request)
{
    $convoncus = Convoncu::whereNull('psy')
        ->join('eleves', 'convoncus.matricule', '=', 'eleves.matricule')
        ->select('convoncus.*', 'eleves.nom', 'eleves.prenom', 'eleves.section')
        ->orderBy('convoncus.created_at', 'desc')
        ->paginate(10)
        ->withQueryString();

    return view('infermerie.liste_convoncu', compact('convoncus'));
}


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

