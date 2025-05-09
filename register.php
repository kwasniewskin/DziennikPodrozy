<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Rejestracja</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  

<div class="header">
  <h1>Dziennik Podróży</h1>
</div>
<div class="nav">
  <a href="login.php">Logowanie</a>
  <a href="register.php">Rejestracja</a>
</div>

  <div class="container">
    <h2>Rejestracja</h2>
    <?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "<p class='message'>Zarejestrowano pomyślnie.</p>";
    } else {
        echo "<p class='message'>Błąd: " . $stmt->error . "</p>";
    }
}
?>
<form method="post">
  <label>Nazwa użytkownika:</label>
  <input type="text" name="username" required>

  <label>Hasło:</label>
  <input type="password" name="password" required>

  <input type="submit" value="Zarejestruj się">
</form>

  </div>
</body>
</html>
