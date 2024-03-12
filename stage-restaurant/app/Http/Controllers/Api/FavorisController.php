<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favoris;
use App\Models\Plat;
use Illuminate\Http\Request;

class FavorisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Get_favoris($id)
    {
        //
        $plats = Plat::with('Favoris')->wherehas('Favoris', function($query) use ($id){
            $query->where('user_id',$id);
        })->get();
        return response()->json(['data'=>$plats],200); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user_id =  $request->user_id ;  
        $plat_id = $request->plat_id ; 
        $find = Favoris::where('user_id', $user_id)
        ->where('plat_id', $plat_id)
        ->exists();

if ($find) {
return response()->json(['message' => 'Record already exists'], 200);
}
        $favoris = new Favoris();
        $favoris->create([
            'user_id'=>$user_id,
            'plat_id'=>$plat_id
        ]);

        return  response()->json(['data successfully added'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
