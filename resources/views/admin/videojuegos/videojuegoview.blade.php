@extends('layouts.master-dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Videojuegos</h6>
            </div>
            
            <div class="card-body">
                <videojuegos-component
                    :videojuegos="{{ json_encode($videojuegos)}}"
                    :materias="{{ json_encode($materias) }}"
                    :categorias="{{ json_encode($categorias) }}"
                > 
                </videojuegos-component>
            </div>
        </div>
    </div>    
@endsection