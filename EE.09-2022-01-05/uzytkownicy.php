<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>

    <div class="header-left">
        <h2>Nasze osiedle</h2>
    </div>
    <div class="header-right">
        <!--Skrypt 1-->
        <?php
        $link = new mysqli('localhost', 'root', '', 'portal');
        $zapytanie = "SELECT COUNT(id) FROM dane; ";
        $wynik = $link->query($zapytanie);
        while ($row = $wynik->fetch_array()) {
            echo("
                <h5>Liczba użytkowników portalu: $row[0]</h5>
            ");
        }
        $link->close();
        ?>
    </div>

    <div class="main-left">
        <h3>Logowanie</h3>

        <form action="uzytkownicy.php" method="post">
            <label>login<br>
                <input type="text" name="login" id="login">
            </label><br>
            <label>hasło<br>
                <input type="password" name="haslo" id="haslo">
            </label><br>
            <input type="submit" value="Zaloguj">
        </form>
    </div>
    <div class="main-right">
        <h3>Wizytówka</h3>

        <div class="wizytowka">
            <!--Skrypt 2-->
            <?php
            $link = new mysqli('localhost', 'root', '', 'portal');

            if((!empty($_POST['login'])) && (!empty($_POST['haslo']))){
                $login = $_POST['login'];
                $haslo = $_POST['haslo'];

                $zapytanie = "SELECT haslo FROM uzytkownicy WHERE login = '$login';";
                $wynik = $link->query($zapytanie);
                
                if($wynik->num_rows > 0){
                    $hasloHash = sha1($haslo);
                    $zapytanie = "SELECT haslo FROM uzytkownicy WHERE haslo = '$hasloHash';";
                    $wynik = $link->query($zapytanie);

                    if($wynik->num_rows > 0){
                        $zapytanie = "SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM uzytkownicy INNER JOIN dane ON uzytkownicy.id = dane.id WHERE uzytkownicy.login = '$login';";
                        $wynik = $link->query($zapytanie);

                        $data = date('Y');
                        while($row = $wynik->fetch_assoc()){
                            $rokU = $data - $row['rok_urodz'];
                            echo<<<END
                                <img src='$row[zdjecie]' alt='osoba'>
                                <h4>$rokU</h4>
                                <p>hobby: $row[hobby]</p>
                                <h1><img src='icon-on.png'>$row[przyjaciol]</h1>
                                <button onclick='window.open("dane.html", "_self")'>Więcej informacji</button>
                            END;
                        }
                    }
                    else{
                        echo("hasło nieprawidłowe");
                    }
                }   
                else{
                    echo("login nie istnieje");
                }
            }
            
            
            
            ?>
        </div>
    </div>

    <div class="footer">
        Stronę wykonał: https://github.com/KMaslo1
    </div>
    
</body>
</html>