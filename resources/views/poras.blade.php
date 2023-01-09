@extends('layouts.app')

@section('content')
<div class="bg-white">labas
    <h1>pumpuras poro grazus eina</h1>
    <form action="/skaityk" method="POST">
    @csrf
    <input type="text" name="tekstas">
    <button type="submit">fuuu</button>
    </form>
    <br><br>
    <div>
        @if(session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
        @endif
</div>
</div>
@endsection


@section('content2')
<div class="bg-white">labas
    <h1>pumpuras poro grazus eina</h1>
    <div class="bg-red">g</div>

    
    
</div>
@endsection

@section('unike')
<div > Lorem ipsum dolor, sit amet consectetur adipisicing elit. Praesentium eligendi, assumenda, cupiditate maxime magni possimus harum error sit dignissimos excepturi illo minus, repudiandae repellendus veniam ipsam aperiam vitae. Dolore, sed.</div>
@show