<?php
session_start();
require_once "backend/db/mysql_connect.php";
$errorMessage = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    print_r( $email);
        if ($password=="admin" &&($email=="admin@student.com") ) {
            $_SESSION["email"] = $email;
            echo "ehh";
                header("Location: report.php");
            exit();
        } else {
            // Invalid  credentials
            $errorMessage = "Incorrect Credentials";
        }
}
//closing the databse
require_once "backend/db/mysql-close.php";
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> System Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
 <style>
     html,
body {
  height: 100%;
}

.form-signin {
  max-width: 450px;
  padding: 1rem;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>
<body>
    
<main class="form-signin w-100 m-auto">
  <form class=" px-5  py-5 shadow" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
    <h1 class="h3 mb-3 fw-bold text-center">Login</h1>

    <div class="form-floating">
      <input class="form-control"  type="email" id="email" name="email" placeholder="Enter your email" required>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password" required>
      <label for="floatingPassword">Password</label>
    </div>
    <button  type="submit"  class="btn btn-primary w-100 py-2" type="submit">Login</button>
  </form>
</main>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>
