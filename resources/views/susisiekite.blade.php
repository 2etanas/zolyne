@extends('layouts.app')

            @section('content')
            <div class="login-container left-container">
            <div class="susisiekite">
            <form action="/susisiekite/store" method ="POST" class="login-form" name="susisiekimas" id="susisiekimas">
            @csrf    
            <h1>Susisiekite!</h1>
                <br>
                <div class="susisiekite-forma form">
                <label for="name">Vardas:</label>

                <input type="text" class="form-control" placeholder="Vardas" id="vardas" name = "vardas" required>
                <br>
                <label for="email">El.paštas:</label>

                <input type="email" class="form-control" placeholder="El.paštas" id="epastas" name="epastas" required>
                </div>
                <br>
                <textarea name="zinute" placeholder="Jūsų klausimas" id="zinute" class = "textarea-susisiekite form-control" required> </textarea>
                <br>
                
                <button type="submit" name="susisiek" value="add" class="btn btn-info">Susisiek!</button>

            </form>
            </div>
            </div>

            @endsection