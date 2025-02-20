<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Hall;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($hall)
    {


        return view('pages.details', compact('reviews', 'hall'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {
        // Validation des données
        $request->validated();

        // Vérifie si la salle existe
        $hall = Hall::find($request->hall_id);

        // Si la salle n'existe pas, on redirige avec un message d'erreur
        if (!$hall) {
            return back()->withErrors(['hall_id' => 'La salle spécifiée n\'existe pas.']);
        }

        // Si l'utilisateur est authentifié, on associe l'avis à l'utilisateur connecté
        $userId = auth()->check() ? auth()->id() : null;

        // Création de l'avis
        Review::create([
            'hall_id' => $request->hall_id,
            'nom' => $request->nom,
            'email' => $request->email,
            'user_id' => $userId,  // Si l'utilisateur est authentifié, son ID sera utilisé
            'commentaire' => $request->commentaire,
            'note' => $request->note,
        ]);

        // Redirige vers la page de la salle avec un message de succès
        return back()->with('success', 'Votre avis a été enregistré.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
