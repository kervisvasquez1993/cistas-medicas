<?php

namespace App\Http\Controllers;

use App\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } // agregar middleware para que cuando acceda estelogeado

    public function index()
   {
        $specialties = Specialty::all();
       return view('specialty.index', compact('specialties')); // imprimir datos en pantalla
   }
    public function create()
    {
        return view('specialty.create');
    }
    public function store(Request $request)
    {
        // validar del lado del servidor
        $rules = [
            'name' => 'required | min:3'
        ];
        $messeges = [
            'name.required' => 'Es Necesario ingresar un nombre',
            'name.min' => 'Como minimo debe tener tres caracteres',

        ];
        $this->validate($request, $rules, $messeges);

        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save(); // insert
        return redirect('/specialties');

    }

    public function edit(Specialty $specialty)
    {

        return view('specialty.edit', compact('specialty'));
    }
    public function update(Request $request, Specialty $specialty)
    {
        // validar del lado del servidor
        $rules = [
            'name' => 'required | min:3'
        ];
        $messeges = [
            'name.required' => 'Es Necesario ingresar un nombre',
            'name.min' => 'Como minimo debe tener tres caracteres',

        ];
        $this->validate($request, $rules, $messeges);


        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save(); // update
        return redirect('/specialties');

    }
    public function destroy(Specialty $specialty)
    {
        $specialty->delete();
        return redirect('/specialties');

    }


}
