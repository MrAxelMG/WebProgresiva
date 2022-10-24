@extends('layouts.master')
@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <p><strong>Opps Something went wrong</strong></p>
                <ul>
                    
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>                        
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="row">
            <form action="{{ url ('crear-rol') }}" method="post">
                @csrf
                <div>
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" autofocus required autocomplete="name">
                    <div>
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection