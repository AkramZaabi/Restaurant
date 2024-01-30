<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plat;
use App\Models\PlatSupp;
use Illuminate\Http\Request;

class PLatController extends Controller
{
    //

    public  function add(Request  $request )
    {

        $file_name = time() . '_' . $request->photo->getClientOriginalName();
        $image = $request->file('photo')->storeAs('images', $file_name, 'public');
        
        $plat =  new Plat(); 
        $plat->photo =$image;
        $plat->name=$request->name; 
        $plat->prix=$request->prix;
        $plat->save();

        for($i = 0 ;  $i < count($request->selected_supplements); $i++)
        {
            $supplement = $request->selected_supplements[$i]->id ; 
            $plat_supp = new PlatSupp();
            $plat_supp->Supplement_id=$supplement;
            $plat_supp->plat_id=$plat->id ;   
            $plat_supp->save();    
        }

    }
}
