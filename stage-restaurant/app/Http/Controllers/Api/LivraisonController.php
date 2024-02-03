<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\LignePlat;
use App\Models\LigneSupp;
use App\Models\Livraison;
use App\Models\Plat;
use App\Models\Supplement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  Livraison::class;
    }


    public function GetLivraionByUser( $id)
    {

        
        $Livraison = Livraison::with([
            'LignePlats' => function ($query) {
                $query->with('Plat');
            }
        ])->where('id_user', $id)->get();
    
        return  response()->json(["data" => $Livraison],200);

    }
    public function   update_status ($id)
    {

        $livraison  =  Livraison::find($id) ; 

        if ($livraison) {
            // Update the status or perform any other necessary logic here
            $livraison->update(['status' => 1]);
            
            return response()->json(['message' => 'Commande updated successfully'], 200);
        }

        return response()->json(['message' => 'Commande not found'], 404);
    }
    public function  GetAll()
    {
        $Livraison = Livraison::with([
            'LignePlats' => function ($query) {
                $query->with('Plat');
            }
        ])->get();
    
        return  response()->json(["data" => $Livraison],200);
    
    }

    public function create(Request $request)
    {

            $new_Livraison =new Livraison();
            $new_Livraison->date=now();
            $new_Livraison->Lieu =  $request->Lieu;
            $new_Livraison->id_user= $request->id_user;
            $new_Livraison->id_product = 1 ;
            $new_Livraison->status = false;
            $new_Livraison->prix=0;
            $new_Livraison->save();
            $id_liv =  $new_Livraison->id;   
            $total_commande  =0 ;  
            $plats = json_decode($request->plats,true); 
            if (isset($plats) && is_array($plats) && count($plats) > 0) {

            for($i = 0 ; $i <count($plats) ;$i++)
            {
                


                $ligne_plat  =  new LignePlat();

                $ligne_plat->quantity =  $plats[$i]['quantite'] ;  
                $ligne_plat->livraison_id = $new_Livraison->id;
                $somme = 0 ;   
                for($j  = 0 ;   $j < count($plats[$i]['supplements']) ;$j++)
                {
                    if ( isset($plats[$i]['supplements'][$j])) 
                        {

                            $supp = Supplement::find($plats[$i]['supplements'][$j]);
                            $somme += $supp->prix; 
                        }
                }
                
                $plat_specifique = Plat::find($plats[$i]['id']);
                if(isset($plat_specifique) && $plat_specifique != null)
                {

                    $somme += $plat_specifique->prix;
                    $somme *= $plats[$i]['quantite'];
    
                    $ligne_plat->plat_id=$plats[$i]['id'];
                    $ligne_plat->prix_total=$somme;
                    $total_commande+=$somme;
                    $ligne_plat->save();
                }
                 $supplements =(($plats[$i]['supplements']));
                
                for($j  = 0 ;   $j < count($supplements) ;$j++)
                {
                    $ligne_supplement =  new LigneSupp();
                    if(isset($supplements[$j]))
                    {
                        $ligne_supplement->supplement_id =  $supplements[$j];
                        $ligne_supplement->ligneplat_id =   $ligne_plat->id; 
                        $ligne_supplement->save();
                    }
                  
                }

            }
            $new_Livraison->update(["prix"=>$total_commande]);
        }
            return  response()->json(["data" => "response successfully resolved"],200);

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
