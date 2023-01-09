
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
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
    <div class="masterContainer">
        <div class="prekiuContainer">
            <div class="vartoju-lentele">
                <table>
                    <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Vardas</th>
                            <th>Pavarde</th>
                            <th>Adresas</th>
                            <th>Šalis</th>
                            <th>000000</th>
                            <th>Email</th>
                            <th>TeisiuID</th>
                            <th>Ištrinti</th>
                            <th>Redaguoti</th>


                    </tr>                 
                    <tr>
                            <td>ID</td>
                            <td>Username</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button type="submit" name="istrinti-vartotoja">Ištrinti</button></td>
                            <td><button type="submit" name="redaguoti-vartotoja">Redaguoti</button></td>




                        </tr>

                </table>

            </div>
            <!-- <form action="login.php" method ="POST" class="login-form susisiekite">
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
                <textarea name="Text1" cols="100" rows="5" placeholder="Jūsų klausimas"> </textarea>
                <br>

                <button type="submit" name="susiek" value="forma">Susisiek!</button>
                
            </form> -->
            <!-- <form action="login.php" method ="POST" class="registration-form" style="display: 
            <?php if (!isset($_POST["prisijungimas"])){
                echo 'none';
            } ?>"-->

        </div>
        <div class="rightBlock">
        <div class="infoContainer">
            <div class="infoCard">Lorem ipsum Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto aliquam optio quidem corporis. Temporibus tenetur eaque placeat ratione assumenda distinctio atque corporis neque magni expedita explicabo, eius aut adipisci eveniet. dolor sit amet consectetur adipisicing elit...</div>
            <div class="infoCard">Lorem ipsum dolor sit amet consectetur adipisicing elit... Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut quas cum quo eligendi sequi harum laudantium saepe commodi reiciendis molestiae quod odio, aperiam accusantium hic in eum cupiditate aliquid sunt!</div>
            <div class="infoCard">Lorem ipsum dolor Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi praesentium perspiciatis distinctio iusto ratione in delectus totam ex enim obcaecati fuga non nostrum, sequi est inventore optio doloribus. Neque, perspiciatis? sit amet consectetur adipisicing elit...</div>
            <div class="infoCard">Lorem ipsum dolor sit amet consectetur adipisicing elit...</div>
        </div>
        <div class="contactBox">
           <div class="contacts">
            <li>Kontaktai: random gatve Vilnius, Lietuva</li> 
            
           <li>Tel: 222223331344</li> 
            <li><a href="#">Privatumo politika</a></li>
        </div>
           <div class="mapBoxas">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30145.73201250757!2d25.263386910444936!3d54.68764019128842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd9419df4df72d%3A0x84cdab3f82f7f6fb!2sGediminas%20Castle%20Tower!5e0!3m2!1sen!2slt!4v1666022225781!5m2!1sen!2slt" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
           </div>
        </div>
    </div>
    </div>

    <script src="{{ asset('js/script.js') }}" defer></script>
</body>
</html>