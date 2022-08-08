<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOutfitRequest;
use App\Models\Category;
use App\Models\Season;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClothingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $clothes = auth()->user()
            ->outfits()
            ->with(['seasons', 'tags', 'category'])
            ->get()
            ->sortBy('category_id')
            ->groupBy('category.name');

        return view('dashboard', compact('clothes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $seasons = Season::all();
        $categories = Category::all();

        return view('upload', compact('seasons', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOutfitRequest $request
     * @return RedirectResponse
     */
    public function store(StoreOutfitRequest $request): RedirectResponse
    {
        $outfit = auth()->user()->outfits()->create([
            'category_id' => $request->get('category'),
            'tags' => explode(',', $request->get('tags'))
        ]);

        $outfit->seasons()->attach($request->get('season'));
        $outfit->addMediaFromRequest('image')->toMediaCollection('outfits');

        return back()->with('success', 'Item was added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id)
    {
        //
    }
}
