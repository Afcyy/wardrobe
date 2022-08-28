<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOutfitRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OutfitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOutfitRequest $request
     * @return void
     */
    public function store(StoreOutfitRequest $request)
    {
        try {
            $group_id = Str::uuid()->toString();

            foreach ($request->get('data') as $id){
                auth()->user()->outfits()->create([
                    'group_id' => $group_id,
                    'clothing_id' => $id
                ]);
            }

            Session::put('success', 'Outfit has been successfully saved');
        } catch (Exception $e) {
            Session::put('error', 'Unexpected Error Occurred');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
