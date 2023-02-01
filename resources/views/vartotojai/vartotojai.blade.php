@extends('layouts.app')



@section('content')

<div class="left-container basket-container morzesBlock">
    
@foreach ($vartotojai as $vartotojas)
<div>{{ $vartotojas->vardas }}</div>

@endforeach

</div>

@endsection