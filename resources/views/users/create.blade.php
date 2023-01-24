@extends('layouts.app')

    @section('content')
    <div class="login-container left-container">
            <div class="susisiekite">
            <form method="post" action="{{route('users.store')}}">
                @csrf 
            <div class="form-group">
                <div  class="form-group">

                    <input type="text" name="name" class="form-control" placeholder="User vardas">
                </div>
                <div  class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="emailas">
                </div>
                <div  class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="password">
                </div>
                <div class="form-group">
                    <label>Roles</label><br>
                    <select name="role" class="form-select">
                    @foreach ($roles as $role)
                        
                            <Option value="{{$role->id}}">{{$role->name}}</Option>
                    </><br>
                        @endforeach
                        </select>

                </div>
                <button type="submit" class="btn btn-primary">Sukurti!</button>
            </div>
            </form>
            </div>
</div>

@endsection