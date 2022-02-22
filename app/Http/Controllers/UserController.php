<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return json_encode($users);

    }

    public function update(Request $request)
    {
        User::updateOrCreate( ['id'=>$request->id], ['name' =>$request->name,
        'email' =>$request->email,
        ]);
      
        return response()->json(['message' => 'success'], 200);
    }

    public function destroy($id)
    {
        User:: where('id',$id)->delete();
        return response()->json(['message' => 'success'], 200);
    }
}
