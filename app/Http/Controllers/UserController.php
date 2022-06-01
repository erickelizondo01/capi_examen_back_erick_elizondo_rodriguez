<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DateTime;

class UserController extends Controller
{
    public function getAllUsers(){

        $users = User::with(['userDomicilios' => function ($query) {
            $query->select('user_id','domicilio','numero_exterior','colonia','cp','ciudad');
        }])->get();
        
        foreach($users as $user){

            $birthday = new DateTime($user->fecha_nacimiento);
            $today = new DateTime();
            $edad = $today->diff($birthday);

            $user->edad = $edad->y;
        }

        return response()->json($users->toArray());
    }
}
