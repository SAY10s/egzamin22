<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="style.css">
    <?php
        $con = mysqli_connect("localhost", "root", "", "biblioteka");
    ?>
</head>
<body>
    <div class="baner"><h2>Miejska Biblioteka Publiczna w Książkowicach</h2></div>
    <div class="lewy">
        <h3>
            W naszych zbiorach znajdziesz dzieła następujących 
        autorów:
        </h3>
        <ul>
        <?php
            $res = mysqli_query($con, "SELECT imie, nazwisko FROM czytelnicy");
            // echo($res[0]);
            while($row = mysqli_fetch_array($res)){
                echo "<li>";
                echo $row['imie']." ";
                echo $row['nazwisko'];
                echo "</li>";
            }
        ?>
        </ul>
    </div>
    <div class="srodkowy">
        <h3>Dodaj nowego czytelnika</h3>
        <form method="post">
            imię<input type="text" name="imie" id="imie"><br>
            nazwisko<input type="text" name="nazwisko" id="nazwisko"><br>
            rok urodzenia<input type="number" name="rokurodzenia" id="rokurodzenia"><br>
            <button type="submit">DODAJ</button>
        </form>
        <?php
            if(isset($_POST["imie"]) && isset($_POST["nazwisko"]) && isset($_POST["rokurodzenia"])){
                echo($_POST["imie"]);
                echo($_POST["nazwisko"]);
                echo($_POST["rokurodzenia"]);
                $kod = $_POST["imie"][0].$_POST["imie"][1].$_POST["rokurodzenia"][-2].$_POST["rokurodzenia"][-1].$_POST["nazwisko"][0].$_POST["nazwisko"][1];
                echo($kod);
            }
        ?>
    </div>
    <div class="prawy">
        <img src="biblioteka.png" alt="książki">
        <h4>ul. Czytelnicza 25 <br>12-120 Książkowice <br>tel.: 123123123<br>
            e-mail: <a href="mailto:biuro@biblioteka.pl">biuro@biblioteka.pl</a> </h4>
    </div>
    <div class="stopka">
        <p>Projekt strony: eepy cat studio</p>
    </div>
</body>
</html>