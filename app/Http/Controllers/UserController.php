<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DateTime;

class UserController extends Controller
{
    public function getAllUsers(){

        $users = User::with(['userDomicilio' => function ($query) {
            $query->select('user_id','domicilio','numero_exterior','colonia','cp','ciudad');
        }])->selectRaw("*, TIMESTAMPDIFF(YEAR, DATE(fecha_nacimiento), current_date) AS edad")->get();
    
        return response()->json($users->toArray());
    }
}
