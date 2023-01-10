@extends('layouts.app')

            @section('content')
            <div class="login-container left-container">
            <div class="susisiekite">
            <form action="/susisiekite/store" method ="POST" class="login-form" name="susisiekimas" id="susisiekimas">
            @csrf    
            <h1>Susisiekite</h1>
                <br>
                <div class="susisiekite-forma">
                <label for="name">Vardas:</label>

                <input type="text" placeholder="Vardas" id="vardas" name = "vardas">
                <br>
                <label for="email">El.paštas:</label>

                <input type="email" placeholder="El.paštas" id="epastas" name="epastas">
                </div>
                <br>
                <textarea name="zinute" placeholder="Jūsų klausimas" id="zinute" class = "textarea-susisiekite"> </textarea>
                <br>
                
                <button type="submit" name="susisiek" value="add">Susisiek!</button>

            </form>
            </div>
            </div>

            @endsection