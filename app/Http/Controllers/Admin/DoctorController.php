<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Specialty;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors=User::doctors()->paginate(10);

        return view('doctors.index', compact('doctors'));
    }

  
    public function create()
    {
        $specialties=Specialty::all();
       return  view('doctors.create', compact('specialties'));
    
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
            'name.required'=>'El nombre del médico es obliatorio',
            'name.min'=>'El nombre del médico debe tener mas de 3 letras',
            'email.required'=>'El correo electronico es obligatorio',
            'email.min'=>'El correo debe ser valido',
            'cedula.required'=>'La cedula es obligatoria',
            'cedula.min'=>'La cedula debe tener minimo 10 caracteres',
            'address.min'=>'La direccion debe tener 3 caracteres como minimo ',
            'phone.required'=>'El numero telefonico es obligatorio',



        ];
        $this->validate($request,$rules,$messages);
       $User =User::create(
            $request->only('name','email','cedula','address','phone')
            + [
                'role'=>'doctor',
                'password'=>bcrypt($request->input('password'))
            ]
        );
        $User->specialties()->attach($request->input('specialties'));
        
        $notification='El medico se ha registrado correctamente';
        return redirect('/medicos')->with(compact('notification'));
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
    public function edit($id)
    {

        $doctor=User::doctors()->findOrFail($id);

        $specialties = Specialty::all();
        $specialty_ids = $doctor->specialties()->pluck('specialties.id');

        return view('doctors.edit', compact('doctor', 'specialties', 'specialty_ids'));
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
            'name.required'=>'El nombre del médico es obliatorio',
            'name.min'=>'El nombre del médico debe tener mas de 3 letras',
            'email.required'=>'El correo electronico es obligatorio',
            'email.min'=>'El correo debe ser valido',
            'cedula.required'=>'La cedula es obligatoria',
            'cedula.min'=>'La cedula debe tener minimo 10 caracteres',
            'address.min'=>'La direccion debe tener 3 caracteres como minimo ',
            'phone.required'=>'El numero telefonico es obligatorio',



        ];
        $this->validate($request,$rules,$messages);
        $User= User::doctors()->findOrFail($id);
        $data=  $request->only('name','email','cedula','address','phone');
        $password=$request->input('password');
        if($password)
        $data['password']=bcrypt($password);

        $User->fill($data);
        $User->save();
        $User->specialties()->sync($request->input('specialties'));
     
        $notification='La informacion del medico se ha actualizado correctamente';
        return redirect('/medicos')->with(compact('notification'));
    }

    public function destroy(string $id)
    {
        $User=User::doctors()->findOrFail($id);
        $User->delete();
        $doctorName=$User->name;
        $notification="El medico  $doctorName se eliminó correctamente";
        return redirect('/medicos')->with(compact('notification'));
    }
}
