<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } // agregar middleware para que cuando acceda estelogeado

    public function index()
   {
       return view('specialty.index');
   }
    public function create()
    {
        return view('specialty.create');
    }
    public function store(Request $request)
    {
        dd($request->all());
    }


}
