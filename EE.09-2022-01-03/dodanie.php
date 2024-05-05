<?php

if(isset($_POST['dodaj'])){
    $link = new mysqli('localhost', 'root', '', 'ee09');

    $nrKaretki = $_POST['numer'];
    $ratownik1 = $_POST['ratownik1'];
    $ratownik2 = $_POST['ratownik2'];
    $ratownik3 = $_POST['ratownik3'];


    $zapytanie = "INSERT INTO ratownicy VALUES(NULL, $nrKaretki, '$ratownik1', '$ratownik2', '$ratownik3');";
    $link->query($zapytanie);

    echo("Do bazy danych zostało wysłane zapytanie: $zapytanie");

    $link->close();
}

?>