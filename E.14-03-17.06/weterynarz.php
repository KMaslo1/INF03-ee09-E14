<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weterynarz</title>
    <link rel="stylesheet" href="weterynarz.css">
</head>
<body>
    
    <section id="baner">
        <h1>GABINET WETERYNARYJNY</h1>
    </section>

    <section id="lewy">
        <h2>PSY</h2>
        <!--Skrypt 1-->
        <?php
        $link = mysqli_connect("localhost","root","","weterynarz");
        $wynik = $link->query("SELECT id, imie, wlasciciel FROM zwierzeta WHERE rodzaj = 1;");
        while($row = $wynik->fetch_array()){
            echo("
            $row[0] $row[1] $row[2]<br>
            ");
        }
        
        $link->close();
        ?>

        <h2>KOTY</h2>
        <!--Skrypt2-->
        <?php
        $link = mysqli_connect("localhost","root","","weterynarz");
        $wynik = $link->query("SELECT id, imie, wlasciciel FROM zwierzeta WHERE rodzaj = 2;");
        while($row = $wynik->fetch_array()){
            echo("
            $row[0] $row[1] $row[2]<br>
            ");
        }
        
        $link->close();
        ?>
    </section>

    <section id="srodkowy">
        <h2>SZCZEGÓŁOWA INFORMACJA O ZWIERZĘTACH</h2>
        <!--Skrypt 3-->
        <?php
        $link = mysqli_connect("localhost","root","","weterynarz");
        $wynik = $link->query("SELECT imie, telefon, szczepienie, opis FROM zwierzeta;");
        while($row = $wynik->fetch_assoc()){
            echo("
            Pacjent: $row[imie]<br>
            Telefon właściciela: $row[telefon]
            ostatnie szczepienie: $row[szczepienie]
            informacje: $row[opis] <hr>
            ");
        }
        
        $link->close();
        
        
        ?>
    </section>

    <section id="prawy">
        <h2>WETERYNARZ</h2>
        <a href="./logo.jpeg"><img src="./logo-mini.jpg"></a>
        <p>Krzysztof Nowakowski, lekarz weterynarii</p>
        <h2>GODZINY PRZYJĘĆ</h2>
        <table>
            <tr>
                <td>Poniedziałek</td>
                <td>15:00 - 19:00</td>
            </tr>
            <tr>
                <td>Wtorek</td>
                <td>15:00 - 19:00</td>
            </tr>
        </table>
    </section>

</body>
</html>