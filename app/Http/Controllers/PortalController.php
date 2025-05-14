<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class PortalController extends Controller{

    public function index(){
            $trabajador = Auth::user()->trabajador;

    return view('portal', compact('trabajador'));
    }



 


}