<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getusers()
    {
        $users = User::with('Role')->whereHas('Role', function ($query) {
            $query->where('role_number', '=', 1);
        })->get();
        return  response()->json(["data"=>$users],200);
    }
    public function getresponsables()
    {
        $admins = User::with('Role')->whereHas('Role', function ($query) {
            $query->where('role_number', '=', 2);
        })->get();
        return  response()->json(["data"=>$admins],200);
    }
    public function index()
    {
        //
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($id)
    {
        //
        $user = User::find($id);
       /* $file_name = time() . '_' . $request->photo->getClientOriginalName();
        $image = $request->file('photo')->storeAs('images', $file_name, 'public');*/

        $user->delete();
        return  response()->json(["data"=>"user deleted successfully"],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $user=User::find($request->id);
        if($request->hasFile('photo'))
        {
            $file_name = time() . '_' . $request->photo->getClientOriginalName();
            $image = $request->file('photo')->storeAs('images', $file_name, 'public');    
            $user->update([
                "name" =>$request->name,
                "lastName" =>$request->lastName,
                "addresse" =>$request->addresse,
                "tel"=>$request->tel,
                "email"=>$request->email,
                "password"=>bcrypt($request->password),
                "photo"=>'/storage/'.$image,
            ]);
        }

        else{

            $user->update([
                "name" =>$request->name,
                "lastName" =>$request->lastName,
                "addresse" =>$request->addresse,
                "tel"=>$request->tel,
                "email"=>$request->email,
                "password"=>bcrypt($request->password),
                
            ]);
        }
        return  response()->json(["data"=>$user],200);
        



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

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
