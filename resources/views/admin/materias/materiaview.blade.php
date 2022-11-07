@extends('layouts.master-dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Materias</h6>
            </div>
            
            <div class="card-body">
                <materias-component
                    :materias="{{ json_encode($materias)}}"
                > 
                </materias-component>
            </div>
        </div>
    </div>    
@endsection