@extends('layouts.master-dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ejemplo</h6>
            </div>
            <div class="card-body">
                {{-- <table class="table table-striped text-center table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>key_name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->key_name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
            </div>
        </div>

        <ejemplo-component 
            title="Ejemplo en vue"
            body="Cuerpo de la card en vue"
        >

        </ejemplo-component>

        <ejemplo-component 
        title="Ejemplo en vue"
        body="Cuerpo de la card en vue - ejemplo 52"
    >

</ejemplo-component>
    <roles-component
    :roles="{{ json_encode($roles)}}"
    > 
    </roles-component>
    </div>    
@endsection