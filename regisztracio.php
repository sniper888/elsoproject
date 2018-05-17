<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Regisztráció</title>
    </head>
    <body>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['nev'])) {
                echo '<p>A név kitöltése kötelező!</p>';
            } elseif (empty($_POST['email'])) {
                echo '<p>A E-mail kitöltése kötelező!</p>';
            } elseif (empty($_POST['jelszo'])) {
                echo '<p>A jelszó kitöltése kötelező!</p>';
            } else {
                require __DIR__ . '/mag/db.php'; //$conn

                $jelszo = password_hash($_POST['jelszo'], PASSWORD_DEFAULT);

                $sql = "INSERT INTO felhasznalok (nev, email, jelszo)
VALUES ('" . $_POST['nev'] . "', '" . $_POST['email'] . "', '" . $jelszo . "')";

                if ($conn->query($sql) === TRUE) {
                    echo "Sikeres regisztráció";
                } else {
                    echo "Hiba: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        ?>
        <form method="post">
            Név: <input type="text" name="nev"><br>
            E-mail: <input type="email" name="email"><br>
            Jelszó: <input type="password" name="jelszo"><br>
            <input type="submit" name="kuld">
        </form>
    </body>
</html>
