@extends('layouts.app')

    @section('content')
    <div class="login-container left-container">
            <div class="susisiekite">
<h1>Permissions vaizdas gal</h1>
    @can('permission-create')
    <a href="{{route('permissions.create')}}" class="btn btn-primary">Sukurti permiss</a>
    @endcan
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Guard Name</th>
        <th>Veiksmai</th>
    </tr>
    @foreach($permissions as $permission) 
    <tr>
        <td>{{$permission->id}}</td>
        <td>{{$permission->name}}</td>
        <td>{{$permission->guard_name}}</td>
        <td>
            @can('permission-delete')
            <form  method="POST" action="{{route('permissions.destroy', $permission->id)}}">
                @csrf 
                <button type="submit" class="btn btn-danger" >Ištrinti</button>
            </form>
            @endcan
            @can('permission-edit')
            <a href="{{route('permissions.edit', $permission->id)}}" class ="btn btn-secondary">Keisti</a>
            @endcan
            <a href="{{route('permissions.show', $permission->id)}}" class ="btn btn-success">Rodyti</a>


        </td>
    </tr>

    @endforeach
</table>
</div>
</div>
    @endsection