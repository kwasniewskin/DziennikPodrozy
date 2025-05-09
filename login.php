<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Logowanie</title>
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
  <h2>Logowanie</h2>
  <?php
  require_once 'config.php';
  session_start();

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $username = $_POST["username"];
      $password = $_POST["password"];

      $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows === 1) {
          $user = $result->fetch_assoc();
          $_SESSION["user_id"] = $user["id"];
          header("Location: index.php");
          exit;
      } else {
          echo "<p class='message'>Błąd logowania.</p>";
      }
  }
  ?>
  <form method="post">
    <label>Nazwa użytkownika:</label>
    <input type="text" name="username" required>

    <label>Hasło:</label>
    <input type="password" name="password" required>

    <input type="submit" value="Zaloguj">
  </form>
</div>
</body>
</html>
