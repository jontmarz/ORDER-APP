<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PruebasController extends Controller
{
    public function testOrm()
    {
        $user = User::all();
        var_dump($user); die();
    }
}
