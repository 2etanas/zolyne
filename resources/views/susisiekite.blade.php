@extends('layouts.app')

            @section('content')
            <div class="susisiekite">
            <form action="login.php" method ="POST" class="login-form" name="susisiekimas">
            @csrf    
            <h1>Susisiekite</h1>
                <br>
                <div class="susisiekite-forma">
                <label for="name">Vardas:</label>

                <input type="text" placeholder="Vardas">
                <br>
                <label for="email">El.paštas:</label>

                <input type="email" placeholder="El.paštas">
                </div>
                <br>
                <textarea name="Text1" placeholder="Jūsų klausimas" class = "textarea-susisiekite"> </textarea>
                <br>
                
                <button type="submit" name="susiek" value="forma">Susisiek!</button>

            </form>
            </div>
            @endsection