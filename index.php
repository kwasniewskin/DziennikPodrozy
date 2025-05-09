<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: entries.php');
} else {
    header('Location: login.php');
}
exit;
?>
