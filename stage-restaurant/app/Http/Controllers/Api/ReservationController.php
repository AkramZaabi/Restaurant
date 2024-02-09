<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create_reservation (Request $request)
    {
        //

            $new_Rerservation =  New Reservation(); 

            $new_Rerservation->nbPersonne = $request->nbPersonne ;  
            $new_Rerservation->Date= $request->Date ; 
            $new_Rerservation->table_id = $request->table_id ; 
            $new_Rerservation->id_user= $request->id_user;
            $new_Rerservation->prix  = 50 ; 

            $new_Rerservation->save();
            return  response()->json(['data'=>"booked successfully"],200);

    }
    public  function all_reservation()
    {
        $reservations=Reservation::with('Table')->get();

        for($i = 0 ;  $i<count($reservations) ; $i++)
        {
            $nom_resto =  Role::find($reservations[$i]['table']['id_res'])->nom_restaurant;
            $reservations[$i]['nom_restaurant'] = $nom_resto;
        }
        return  response()->json(['data'=>$reservations],200);

    }
    public  function Get_per_responsable($id)
    {
        $user  =  User::find($id);
        $id_restaurant =  $user->role_id;
       // $reservations = Reservation::with('Table')->get();
       $reservations =  Reservation::with('Table')->wherehas('Table',function($query) use ($id_restaurant){
                $query->where('id_res',$id_restaurant);
        })->get();
        
        $nom_resto = Role::find($id_restaurant)->nom_restaurant; 
        $reservations['nom_restaurant'] =  $nom_resto;


        return  response()->json(['data'=>$reservations],200);
        
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
