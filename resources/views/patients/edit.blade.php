<?php
use Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('content')



          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Editar Paciente</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('/pacientes')}}" class="btn btn-sm btn-success">Regresar</a>
                  <i class="fas fa-chevron-left"></i>
                </div>
              </div>
            </div>
         <div class="card-body"> 
            @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>
                <strong>Por Favor!</strong> {{$error}}
                </div>
                @endforeach

            @endif
                <form action="{{url('/pacientes/'.$patient->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                            <label for="name">Nombre del paciente</label>
                            <input type="text" name="name" class="form-control" value="{{old('name', $patient->name)}}" >
                    </div>
                    <div class="form-group">
                            <label for="email">Correo Electronico</label>
                            <input type="text" name="email" class="form-control"  value="{{old('email', $patient->email)}}" ></input>
                    </div>
                    <div class="form-group">
                            <label for="cedula">Cédula</label>
                            <input type="text" name="cedula" class="form-control"  value="{{old('cedula', $patient->cedula)}}" ></input>
                    </div>
                    <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" name="address" class="form-control"  value="{{old('address', $patient->address)}}" ></input>
                    </div>
                    <div class="form-group">
                            <label for="phone">Telefono</label>
                            <input type="text" name="phone" class="form-control"  value="{{old('phone', $patient->phone)}}" ></input>
                    </div>
                    <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="text" name="password" class="form-control">
                            <small class="text-warning">Solo llena el campo si desea cambiar la contraseña</small>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Guardar Cambios </button>

                </form>


            <div>
          </div>
  
@endsection