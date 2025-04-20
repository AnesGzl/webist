<?php

namespace App\Http\Controllers;

use App\Models\listeRdv;
use Illuminate\Http\Request;

class ListeRdvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("/infermerie/liste_rendezvous");

    }


    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'matricule' => ['required', 'digits:5'],
            'motif' => ['required', 'in:consultation,urgences'],
            'service' => ['required', 'string'],
            'date' => ['required', 'date'],
        ]);

        // Création du rendez-vous
        ListeRdv::create([
            'matricule' => $validated['matricule'],
            'motif' => $validated['motif'],
            'service' => $validated['service'],
            'date' => $validated['date'],
        ]);

        return redirect()->back()->with('success', 'Rendez-vous ajouté avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(listeRdv $listeRdv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(listeRdv $listeRdv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, listeRdv $listeRdv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(listeRdv $listeRdv)
    {
        //
    }
}
