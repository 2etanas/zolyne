@extends('layouts.app')

@section('content')
  


@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<nav class="navbar">
    <a href="/"><img src="{{ asset('storephoto/Logo-01.png')}}" alt="logo" height="200px" class="pav-logo"></a>
        <li class="navbaras">
            <ul><a href="/">Home</a></ul>
            <!-- <ul><a href="#">About</a></ul>
            <ul><a href="#">Prekės</a></ul> -->
            <ul><a href="/krepselis">Krepšelis</a></ul>
            <ul><a href="/login">Login/Sign-Up</a></ul>
            <ul><a href="/susisiekite">Susisiekite</a></ul>

        </li>
    </nav>


    <form method="POST">
    <input type="password" name="klientukai">
    <!-- jei paswordas geras, tada atsidaro klientu sarasas -->
<?php
    if (isset($_POST["klientukai"]) && $_POST["klientukai"] == "1234"){
        echo "<br>";
        echo "labas";







    }



?>
<div>o</div>
<table style= "display=none">labas</table>

    </form>
    <script src="{{ asset('js/script.js') }}" defer></script>
</body>
</html>