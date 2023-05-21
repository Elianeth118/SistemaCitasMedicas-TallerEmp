<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
class PatientController extends Controller
{
    
    public function index()
    {
        $patients=User::patients()->paginate(10);

        return view('patients.index', compact('patients'));
    }

  
    public function create()
    {
       return  view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules =[
            'name'=>'required|min:3',
            'email'=>'required|email',
            'cedula'=>'required|digits:10',
            'address'=>'nullable|min:6',
            'phone'=>'required',

        ];
        $messages=[
            'name.required'=>'El nombre del paciente es obliatorio',
            'name.min'=>'El nombre del paciente debe tener mas de 3 letras',
            'email.required'=>'El correo electronico es obligatorio',
            'email.min'=>'El correo debe ser valido',
            'cedula.required'=>'La cedula es obligatoria',
            'cedula.min'=>'La cedula debe tener minimo 10 caracteres',
            'address.min'=>'La direccion debe tener 3 caracteres como minimo ',
            'phone.required'=>'El numero telefonico es obligatorio',



        ];
        $this->validate($request,$rules,$messages);
        User::create(
            $request->only('name','email','cedula','address','phone')
            + [
                'role'=>'paciente',
                'password'=>bcrypt($request->input('password'))
            ]
        );
        $notification='El paciente se ha registrado correctamente';
        return redirect('/pacientes')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient=User::patients()->findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules =[
            'name'=>'required|min:3',
            'email'=>'required|email',
            'cedula'=>'required|digits:10',
            'address'=>'nullable|min:6',
            'phone'=>'required',

        ];
        $messages=[
            'name.required'=>'El nombre del paciente es obliatorio',
            'name.min'=>'El nombre del paciente debe tener mas de 3 letras',
            'email.required'=>'El correo electronico es obligatorio',
            'email.min'=>'El correo debe ser valido',
            'cedula.required'=>'La cedula es obligatoria',
            'cedula.min'=>'La cedula debe tener minimo 10 caracteres',
            'address.min'=>'La direccion debe tener 3 caracteres como minimo ',
            'phone.required'=>'El numero telefonico es obligatorio',



        ];
        $this->validate($request,$rules,$messages);
        $User= User::patients()->findOrFail($id);
        $data=  $request->only('name','email','cedula','address','phone');
        $password=$request->input('password');
        if($password)
        $data['password']=bcrypt($password);

        $User->fill($data);
        $User->save();
     
        $notification='La informacion del paciente se ha actualizado correctamente';
        return redirect('/pacientes')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $User=User::patients()->findOrFail($id);
        $User->delete();
        $pacienteName=$User->name;
        $notification="El paciente  $pacienteName se eliminó correctamente";
        return redirect('/pacientes')->with(compact('notification'));
    }
    }
