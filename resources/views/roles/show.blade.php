@extends('layouts.app')

    @section('content')
    <div class="login-container left-container">
            <div class="susisiekite">
           <h1> Role info</h1>
           <h2>Name : {{$role->name}}</h2>

           <h2> Permissions:</h2>
           <ul>
           @foreach ($permissions as $permission)
           <li style="color:white">Name : {{$permission->name}}</li>
            @endforeach
           </ul>
            




            </div>
</div>

@endsection