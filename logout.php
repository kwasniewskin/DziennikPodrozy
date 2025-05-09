<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Wylogowano</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="header">
  <h1>Dziennik Podróży</h1>
</div>


<div class="nav">
  <a href="entries.php">Wpisy</a>
  <a href="add_entry_form.php">Dodaj wpis</a>
  <a href="logout.php">Wyloguj</a>
</div>

  <div class="container">
    <h2>Wylogowano</h2>
    <p class='message'>Zostałeś wylogowany.</p>
    <a href='login.php'>Zaloguj ponownie</a>
  </div>
</body>
</html>
