<template>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{title}}</h6>
        </div>
        <div class="card-body">
            <!-- <table class="table table-striped text-center table-bordered">
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
            </table>-->
            <p>
                {{body}}
            </p>
        </div> 
    </div>
</template>

<script>
    export default {
        props: {
            title: {
                type: String,
                required: true
            },
            body: {
                type: String,
                required: true
            },
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>