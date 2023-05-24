<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function homepage(){
        return view('home');
    } 
}
