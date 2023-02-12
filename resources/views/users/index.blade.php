@extends('layouts.app')

    @section('content')
    <div class="login-container left-container">
            <div class="susisiekite">
<h1>Registruoti vartotojai</h1>
    @can('permission-create')
    <a href="{{route('users.create')}}" class="btn btn-primary">Sukurti vartotoją</a>
    @endcan
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
       <th>Role</th>
        <th>Veiksmai</th>
    </tr>
    @foreach($users as $user) 
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{ (($user->roles->pluck('name')) !== null) ? $user->roles->pluck('name')[0] : ' '; }}</td> <!-- atranda roles varda -->

        <td>
            @can('user-delete')
            <form  method="POST" action="{{route('users.destroy', $user->id)}}">
                @csrf 
                <button type="submit" class="btn btn-danger" >Ištrinti</button>
            </form>
            @endcan
            @can('user-edit')
            <a href="{{route('users.edit', $user->id)}}" class ="btn btn-secondary">Keisti</a>
            @endcan
            <a href="{{route('users.show', $user->id)}}" class ="btn btn-success">Rodyti</a>


        </td>
    </tr>

    @endforeach
</table>
</div>
</div>
    @endsection