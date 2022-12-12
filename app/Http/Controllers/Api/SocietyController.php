<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SocietyResource;
use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : AnonymousResourceCollection
    {
        return SocietyResource::collection(Society::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:societies,name'],
            'address' => 'required'
        ]);
        Society::create([
            'name' => $request->name,
            'address' => $request->address
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function show(Society $society)
    {
        return SocietyResource::make($society);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Society $society)
    {
        $request->validate([
            'name' => ['required', 'unique:societies,name,' . $society->id],
            'address' => 'required'
        ]);
        $society->update($request->only(['name', 'address']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function destroy(Society $society)
    {
        $society->delete();

        return response()->noContent();
    }

    /**
     * Search  a society
     * 
     * @param String $toSearch
     */
    public function search ($toSearch) 
    {   
        $society = Society::where(function ($query) use ($toSearch) {
                        $query->where('id', 'like', '%'. $toSearch .'%')
                        ->orWhere('name', 'like', '%'. $toSearch .'%');
                })->get();
        
        return SocietyResource::collection($society);

    }
}
