<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Supplement;
use Illuminate\Http\Request;

class SupplementController extends Controller
{
    //
    public function store(Request  $request)
    {
        $file_name = time() . '_' . $request->photo->getClientOriginalName();
        $image = $request->file('photo')->storeAs('images', $file_name, 'public');
        
        $supplement =  new Supplement(); 
        $supplement->photo =$image;
        $supplement->name=$request->name; 
        $supplement->prix=$request->prix;
        $supplement->save();
        return  response()->json($supplement,200);

    }
    public function getSupplements()
    {
         $supplements =  Supplement::all();
         return  response()->json(["data"=>$supplements],200);
    }
}
