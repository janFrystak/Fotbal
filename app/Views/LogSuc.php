<?php
session_start();

// If user is not logged in, send them back to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Successful</title>
  <p><? $data ?></p>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
  <div class="text-center">
    <h1 class="text-success">✅ Login Successful!</h1>
    <p class="lead">Welcome, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></p>
    <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
  </div>
</body>
</html>
