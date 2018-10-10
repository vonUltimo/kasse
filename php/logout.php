<?php
/**
 * @author Ultimo <von.ultimo@gmail.com>
 * Version: 0.11
 */
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <link rel="stylesheet" href="../css/skeleton.css">
</head>

<body>
<div class="container">
    <div class="row">
        <h4>Du hast dich erfolgreich abgemeldet, klasse!</h4>
        <meta http-equiv="refresh" content="3; URL=..//index.php"/>
    </div>
</div>
</body>
</html>


