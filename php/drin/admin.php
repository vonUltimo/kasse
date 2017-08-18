<?php
/**
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @author Jan Nemeth <jpnemeth3012@gmail.com>
 * Version: 0.1
 */
session_start();
if($_SESSION["usergroup"]!=1){
    echo "Netter Versuch ;-)";
    echo "<meta http-equiv=\"refresh\" content=\"3; URL=../index.php\">";
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>

</body>
</html>
