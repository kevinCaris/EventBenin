<?php

namespace App\Http\Controllers;

use App\Models\HallPictures;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHallPicturesRequest;
use App\Http\Requests\UpdateHallPicturesRequest;

class HallPicturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreHallPicturesRequest $request)
    {
          // Vérifier si le champ 'images' existe dans la requête
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            // Sauvegarder l'image
            $path = $image->store('public/hall_pictures');

            // Créer un nouvel enregistrement pour chaque image
            HallPictures::create([
                'hall_id' => $request->hall_id,
                'path' => str_replace('public/', 'storage/', $path), // Assurez-vous d'inclure le champ 'path'
            ]);
        }
    }

    return redirect()->back()->with('success', 'Les images ont été enregistrées avec succès !');
    }


    /**
     * Display the specified resource.
     */
    public function show(HallPictures $hallPictures)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HallPictures $hallPictures)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHallPicturesRequest $request, HallPictures $hallPictures)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HallPictures $hallPictures)
    {
        //
    }
}
