@extends('layouts.app')

    @section('content')
    <div class="login-container left-container">
            <div class="susisiekite">
            <form method="post" action="{{route('permissions.store')}}">
                @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="permission vardas">
                <button type="submit" class="btn btn-primary">Sukurti!</button>
            </div>




            </form>




            </div>
</div>

@endsection