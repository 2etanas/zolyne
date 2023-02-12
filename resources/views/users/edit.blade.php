@can ('user-view')
@extends('layouts.app')

    @section('content')
    <div class="login-container left-container">
            <div class="susisiekite">
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @csrf 
            <div class="form-group">
                <div  class="form-group">

                    <input type="text" name="name" class="form-control" placeholder="User vardas" value= "{{ $user->name }}" >
                </div>
                <div  class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="emailas" value= "{{ $user->email }}">
                </div>
                <!-- <div  class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="password" value= "{{ $user->password }}">
                </div> -->

                <div class="form-group">
                    <label>Rolės</label><br>
                    <select name="role" class="form-select">
                    @foreach ($roles as $role)
                        
                            <Option value="{{$role->id}}">{{$role->name}}</Option>
                    </><br>
                        @endforeach
                        </select>

                </div>
                <button type="submit" class="btn btn-primary">Atnaujinti!</button>
            </div>
            </form>
            </div>
</div>

@endsection
@endcan
