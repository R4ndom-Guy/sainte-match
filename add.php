<?php

require_once('init.php');

if (isset($_POST['done'])) {
    $folder = 'assets/';
    $ext = '.jpg';
    $name = $mysqli->mysql_real_escape_string($_POST['name']);
    $mysqli->query('
    INSERT INTO assets
    SET token = "' . md5($name . 'Sainte Match') . '",
        name= "' . $name . '",
        path ="' . $folder . strtolower($name) . $ext . '"');
        header ('Location: add.php');
        exit;
}

?>

<form action="" method="post">
    <input type="text" name="name" placeholder="Nom de l'image" />
    <button type="submit" name="done">Ajouter</button>
</form>