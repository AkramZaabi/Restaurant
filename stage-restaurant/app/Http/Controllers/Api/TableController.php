<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetSpecifiques(Request  $request)
    {
        $id= $request->id;
        $tables = Table::with('roles')->whereHas('roles', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();
        $date = $request->Date;
        $reservation = Reservation::with('Table')->wherehas('Table',function($query) use ($date){
            $query->where('Date',$date) ; 
        })->get();

        for($i = 0 ;  $i<count($reservation); $i++)
        {
            for($j = 0 ;$j<count($tables) ;$j++)
            {
                if($tables[$j]->id == $reservation[$i]->table_id)
                {
                    $tables->splice($j,1);
                }
            }
        }
        
    if(isset($tables))
    {

        return response()->json(["data" => $tables], 200);
    }
    else{
        return response()->json(["data" => "no tables available for this date "], 200); 
    }
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
