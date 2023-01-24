@extends('layouts.app')

    @section('content')
    <div class="login-container left-container">
            <div class="susisiekite">
            <form method="post" action="{{route('roles.update', $role->id)}}">
                @csrf 
            <div class="form-group">

                <div class="form-group">

                <input type="text" name="name" class="form-control" value ='{{$role->name}}' placeholder="Roles vardas">
                </div>
                <div class="form-group">
                    <label>Permission</label><br>
                    @foreach ($permissions as $permission)
                        <label >
                        @if ($permission->roles->contains($role->id))
                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}" checked>
                        @else
                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                       @endif
                        {{$permission->name}}    
                    </label><br>
                        @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Sukurti!</button>
            </div>
            </form>
            </div>
</div>

@endsection