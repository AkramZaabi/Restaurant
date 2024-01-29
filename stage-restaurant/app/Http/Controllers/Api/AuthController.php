<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function LoginUser(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
        
            $token = $user->createToken('api_token')->plainTextToken;

            $data=User::where('id',$user->id)->with('role')->first();

            $respnose = [
                'token' => $token,
                'user' => $data,
            ];

            return response()->json(['data' => $respnose], 200);
        } else {
            return response()->json(['data' => "Utilisateur non trouvé", 'status' => "user"], 401);
        }
    }

    public function SignUp(Request $request){
        $file_name = time() . '_' . $request->photo->getClientOriginalName();
        $image = $request->file('photo')->storeAs('images', $file_name, 'public');

        $testRole=Role::where("role_number",1)->first();

        if(!$testRole){
            $role=new Role();
            $role->role_number=1;
            $role->save();
            $testRole=$role;
        }

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'lastName'=>$request->lastname,
            'Date'=>$request->date,
            'photo'=>'/storage/' . $image,
            'addresse'=>$request->adresse,
            'role_id'=> $testRole->id,
            'tel'=>$request->tel,
        ]);

        return response()->json(['data'=>$user], 200);
    }

}
