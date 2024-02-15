<?php

namespace App\Http\Controllers\api;

use App\Events\Notif;
use App\Http\Controllers\Controller;
use App\Models\Notifaction;
use App\Models\Reservation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;

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
            $new_Rerservation->prix  = 10* $request->nbPersonne; 
            $new_Rerservation->status= 0 ; 

            $new_Rerservation->save();
            return  response()->json(['data'=>"booked successfully"],200);

    }
    public function accepter_reservation($id)
    {


        $reservation = Reservation::find($id);
        $reservation->update(['status'=>1]);
        $notif = new Notifaction();
        $message = "Your Reservation N° " . $reservation->id . " has been accepted";
        $notif->create([
            "user_id" => $reservation->id_user,
            "message" => $message,
            "status" => 1,
        ]);
        broadcast(new Notif($notif->message));
    
        return  response()->json(['data'=>$reservation],200);

    }
    public function reject_reservation($id)
    {


        $reservation = Reservation::find($id);
        $reservation->update(['status'=>2]);
        $notif = new Notifaction();
        $message = "Your Reservation N° " . $reservation->id . " has been rejected";
        $notif->create([
            "user_id" => $reservation->id_user,
            "message" => $message,
            "status" => 0,
        ]);
        broadcast(new Notif($notif->message));
     
        return  response()->json(['data'=>$reservation],200);

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
    public function my_reservations($id)
    {
        $reservations = Reservation::with('Table')->where('id_user',$id)->get();
        for($i = 0 ;  $i<count($reservations) ; $i++)
        {
            $nom_resto =  Role::find($reservations[$i]['table']['id_res'])->nom_restaurant;
            $reservations[$i]['nom_restaurant'] = $nom_resto;
        }
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
