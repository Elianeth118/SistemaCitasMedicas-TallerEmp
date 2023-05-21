@extends('layouts.panel')

@section('content')


<div class="row">
<div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Información') }}
                </div>
            </div>
        </div>
     
      

        <div class="col-xl-12">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">IMSS "Santa maria Sola de Vega Oaxaca"</h3>
                </div>
                <div class="col text-right">
                  <a href="https://hospitalesmexico.com/santa-maria-sola-12811" class="btn btn-sm btn-primary">Visitanos</a>
                </div>
              </div>
            </div>
         <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Informacion del establecimiento</th>
                    <th scope="col"></th>
               
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                    Establecimiento:
                    </th>
                    <td>
                    Unidad De Consulta Externa
                    </td>
                    
                  </tr>
                  <tr>
                    <th scope="row">
                    Tipo:
                    </th>
                    <td>
                    Unidad Médica Rural 
                    </td>
                  
                  </tr>
                  <tr>
                    <th scope="row">
                    Clave institución:
                    </th>
                    <td>
                    IMSS-PROSPERA 
                    </td>
                    
                  </tr>
                  <tr>
                    <th scope="row">
                    Institución:
                    </th>
                    <td>
                    INSTITUTO MEXICANO DEL SEGURO SOCIAL. PROSPERA 
                    </td>
                   
                  </tr>
                  <tr>
                    <th scope="row">
                    Municipio:
                    </th>
                    <td>
                    SANTA MARÍA SOLA
                    </td>
                   
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection
