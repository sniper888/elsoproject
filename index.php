<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Elso php projektem</title>
    </head>
    <body>
        <h1>Elso php projektem</h1>      
        <?php if (!empty($_POST["name"]) && !empty($_POST["email"])) { ?>
            Welcome <?php echo $_POST["name"]; ?><br>
            Your email address is: <?php echo $_POST["email"]; ?>
        <?php } ?>

        <?php if (isset($_POST["kuld"]) && (empty($_POST["name"]) || empty($_POST["email"]))) { ?>
            <p style="color:red;">Kérem töltse ki az összes mezőt!</p>
        <?php } ?>
        <form method="post">
            Név: <input type="text" name="name"><br>
            E-mail: <input type="text" name="email"><br>
            <input type="submit" name="kuld">
        </form>
    </body>
</html>
