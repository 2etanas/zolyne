@extends('layouts.app')

    @section('content')
    <div class="login-container left-container">
            <div class="susisiekite">
            @can ('role-edit')
            <form method="post" action="{{route('roles.store')}}">
                @csrf 
            <div class="form-group">
                <div  class="form-group">

                <input type="text" name="name" class="form-control" class="@error('name') is-invalid @enderror" placeholder="Roles vardas">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror     
            </div>
                <div class="form-group">
                    <label>Permission</label><br>
                    @foreach ($permissions as $permission)
                        <label >
                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                        {{$permission->name}}    
                    </label><br>
                        @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Sukurti!</button>
            </div>
            </form>
            @endcan
            </div>
</div>

@endsection