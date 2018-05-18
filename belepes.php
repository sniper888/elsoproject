<?php
// Munkamenet indítása
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Belépés</title>
    </head>
    <body>
        <?php require 'menu.php'; ?>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['email'])) {
                echo '<p>A E-mail kitöltése kötelező!</p>';
            } elseif (empty($_POST['jelszo'])) {
                echo '<p>A jelszó kitöltése kötelező!</p>';
            } else {
                require __DIR__ . '/mag/db.php'; //$conn
                //sql az adatbázisban való visszakereséshez
                $sql = "SELECT * FROM felhasznalok 
                        WHERE email='" . $_POST['email'] . "'";
                //sql futtatása az adatbázisban
                $result = $conn->query($sql);

                //sorok ellenőrzése van e legalább 1 találat
                if ($result->num_rows > 0) {
                    //egy sor lekérése a találatok közül
                    $row = $result->fetch_assoc();
                    //jelszó ellenőrzése
                    if (password_verify($_POST['jelszo'], $row['jelszo'])) {
                        //helyes jelszó
                        //echo 'Sikeres belépés!';
                        $_SESSION['belepett'] = true;
                        header('Location: index.php');
                    } else {
                        //hibás jelszó
                        echo 'Hibás email vagy jelszó!';
                    }
                } else {
                    //nincs felhasználó
                    echo 'Hibás email vagy jelszó!';
                }
            }
        }
        ?>
        <h1>Belépés:</h1>
        <form method="post">            
            E-mail: <input type="email" name="email"><br>
            Jelszó: <input type="password" name="jelszo"><br>
            <input type="submit">
        </form>
    </body>
</html>
