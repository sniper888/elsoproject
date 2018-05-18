<?php
// ha nincs munkament indítva, akkor indítunk egyet..
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<ul>
    <li><a href="index.php">Főoldal</a></li>
    <li><a href="regisztracio.php">Regisztráció</a></li>
    <?php if (isset($_SESSION['belepett'])) { ?>
        <li><a href="kilepes.php">Kilépés</a></li>
    <?php } else { ?>
        <li><a href="belepes.php">Belépés</a></li>
    <?php } ?>
</ul>