<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>labas</h2>
    <a href="/prekes/ikelimas/upload">spausk</a>
    <form method = "post" action="/prekes/ikelimas/upload" enctype = "multipart/form-data"  >
    @csrf
    <input type="file" name= "TestPhotoSita">
    <input type="submit" name="Upload">

    </form>
    <br>
<ul>
@foreach ($photos as $photo)
    <li> {{ $photo->name }} <img src="{{ asset('storage/images/'. $photo->name)}}" alt=""></li>

@endforeach
</ul>
</body>
</html>