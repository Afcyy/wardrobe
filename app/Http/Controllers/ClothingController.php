<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClothingRequest;
use App\Models\Category;
use App\Models\Clothing;
use App\Models\Season;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

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
            ->clothings()
            ->with(['seasons', 'tags', 'category', 'media'])
            ->get()
            ->sortBy('category_id')
            ->groupBy('category.name');

        $outfits = auth()->user()->outfits()->with('clothing')->get()->groupBy('group_id');

        return view('clothes.index', compact('clothes', 'outfits'));
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

        return view('clothes.upload', compact('seasons', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClothingRequest $request
     * @return RedirectResponse
     */
    public function store(StoreClothingRequest $request): RedirectResponse
    {
        $clothing = auth()->user()->clothings()->create([
            'category_id' => $request->get('category'),
            'image_url' => $request->get('image_url')
        ]);

        if ($request->get('tags')) {
            $clothing->syncTags(array_map('trim', explode(',', $request->get('tags'))));
        }

        if (!$request->get('image_url')) {
            $clothing->addMediaFromRequest('image')->toMediaCollection('outfits');
        }

        $clothing->seasons()->attach($request->get('season'));

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
     * @return View
     */
    public function edit(int $id): View
    {
        $clothing = auth()->user()
            ->clothings()
            ->whereId($id)
            ->with(['seasons', 'tags', 'category'])
            ->first();
        $seasons = Season::all();
        $categories = Category::all();

        return view('clothes.edit', compact('seasons', 'categories', 'clothing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $clothing = auth()->user()->clothings()->find($id);

        $clothing->category_id = $request->get('category');
        $clothing->seasons()->sync($request->get('season'));

        $clothing->syncTags(
            $request->get('tags')
                ? array_map('trim', explode(',', $request->get('tags')))
                : []
        );


        if ($request->hasFile('image') || $request->get('image_url')) {
            $clothing->clearMediaCollection('outfits');

            if ($request->hasFile('image')) {
                $clothing->addMediaFromRequest('image')->toMediaCollection('outfits');
                $clothing->image_url = null;
            } else {
                $clothing->image_url = $request->get('image_url');
            }
        }

        $clothing->save();

        return redirect(RouteServiceProvider::HOME)->with('success', 'Item was edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(int $id)
    {
        auth()->user()->clothings()->find($id)->delete();

        return redirect(RouteServiceProvider::HOME)->with('success', 'Item deleted successfully');
    }
}
