@extends('layouts.app')

    @section('content')
    <div class="login-container left-container">
            <div class="susisiekite">
<h1>Permissions vaizdas gal</h1>
    @can('permission-create')
    <a href="{{route('roles.create')}}" class="btn btn-primary">Sukurti permiss</a>
    @endcan
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
       
        <th>Veiksmai</th>
    </tr>
    @foreach($roles as $role) 
    <tr>
        <td>{{$role->id}}</td>
        <td>{{$role->name}}</td>
        <td>
            @can('role-delete')
            <form  method="POST" action="{{route('roles.destroy', $role->id)}}">
                @csrf 
                <button type="submit" class="btn btn-danger" >Ištrinti</button>
            </form>
            @endcan
            @can('role-edit')
            <a href="{{route('roles.edit', $role->id)}}" class ="btn btn-secondary">Keisti</a>
            @endcan
            <a href="{{route('roles.show', $role->id)}}" class ="btn btn-success">Rodyti</a>


        </td>
    </tr>

    @endforeach
</table>
</div>
</div>
    @endsection