<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przychodnia</title>
    <link rel="stylesheet" href="przychodnia.css">
</head>
<body>
    
    <section id="baner">
        <h1>PRAKTYKA LEKARZA RODZINNEGO</h1>
    </section>

    <section id="lewy">
        <h3>LISTA PACJENTÓW</h3>
        <!--Skrypt 1-->
        <?php
        $link = new mysqli('localhost', 'root', '', 'przychodnia');
        $wynik = $link->query("SELECT id, imie, nazwisko FROM pacjenci;");
        while( $row = $wynik->fetch_array() ){
            echo("
            $row[0] $row[1] $row[2]<br>
            ");
        }
        
        $link->close();
        ?>

        <form action="pacjent.php" method="post">
            Podaj id:<br>
            <input type="number" name="number" id="number"> <input type="submit" value="Pokaż dane">
        </form>

        <h3>LEKARZE</h3>
        <ul>
            <li>pn - śr
                <ol>
                    <li>Anna Kwiatkowska</li>
                    <li>Jan Kowalewski</li>
                </ol>
            </li>
            <li>czw - pt
                <ol>
                    <li>Krzysztof Nowak</li>
                </ol>
            </li>
        </ul>
    </section>
    <section id="prawy">
        <h2>INFORMACJE SZCZEGÓŁOWE O PACJENCIE</h2>
        <!--Skrypt 2-->
        <?php
            if(isset($_POST['number'])) {
                $link = new mysqli('localhost', 'root', '', 'przychodnia');
                $numer = $_POST['number'];
                $zapytanie = "SELECT imie, nazwisko, choroby_przewlekle, uczulenia FROM pacjenci WHERE id = $numer;";
                $wynik = $link->query($zapytanie);
                while($row = $wynik->fetch_assoc()) {
                    echo("
                    <p>Imię i nazwisko: $row[imie] $row[nazwisko]</p>
                    <p>Choroby przewlekłe: $row[choroby_przewlekle]</p>
                    <p>Uczulenia: $row[uczulenia]</p>
                    ");
                }
                
                $link->close();
            }
        ?>
    </section>

    <section id="stopka">
        <p>utworzone przez: https://github.com/KMaslo1</p><br>
        <a href="./kwerendy.txt">Pobierz plik z kwerendami</a>
    </section>


</body>
</html>