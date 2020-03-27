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
    public function performValidate(Request $request)
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
    }
    public function store(Request $request)
    {

        $this->performValidate($request);
        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save(); // insert
        $notification = 'la especialidad se a registrado correctamente';
        return redirect('/specialties')->with(compact('notification'));

    }

    public function edit(Specialty $specialty)
    {

        return view('specialty.edit', compact('specialty'));
    }
    public function update(Request $request, Specialty $specialty)
    {
        // validar del lado del servidor
        $this->performValidate($request);


        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save(); // update
        $notification = 'La actualización se realizo correctamente';
        return redirect('/specialties')->with(compact('notification'));

    }
    public function destroy(Specialty $specialty)
    {
        $nombreName = $specialty->name;
            $specialty->delete();
        $notification = 'Se elimino la especialidad '. $nombreName.' correctamente';
        return redirect('/specialties')->with(compact('notification'));

    }


}
