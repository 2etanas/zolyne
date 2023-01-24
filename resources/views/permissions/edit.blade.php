@extends('layouts.app')

    @section('content')
    <div class="login-container left-container">
            <div class="susisiekite">
            <form method="post" action="{{route('permissions.update', $permission->id)}}">
                @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="permission vardas" value="{{$permission->name}}">
                <button type="submit" class="btn btn-primary">Pakeisti!</button>
            </div>




            </form>




            </div>
</div>

@endsection