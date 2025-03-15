<?php
session_start();

$error = isset($_SESSION['error']) ? $_SESSION['error'] : "";
unset($_SESSION['error']);

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Username tidak valid!";
        header("Location: login.php");
        exit();
    } else {
        $domain = "@" . explode("@", $username)[1];

        if ($password === $domain) {
            $_SESSION['username'] = $username;
            header("Location: form.php");
            exit();
        } else {
            $_SESSION['error'] = "Password salah!";
            header("Location: login.php"); 
            exit();
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gradient-to-r from-blue-600 to-purple-800">
  <div class="bg-white w-[400px] p-8 rounded-xl shadow-lg text-gray-800">
    <h2 class="text-3xl text-center font-bold mb-5">Welcome Back</h2>

    <?php if ($error): ?>
        <p class="text-red-600 bg-red-100 p-2 rounded-md text-center mb-4"> <?php echo $error; ?> </p>
    <?php endif; ?>

    <form action="login.php" method="post" class="space-y-4">
        <div>
            <label for="username" class="block font-semibold">Email</label>
            <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" id="username" name="username" placeholder="user@gmail.com" autocomplete="off" required>
        </div>

        <div>
            <label for="password" class="block font-semibold">Password</label>
            <input class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="password" id="password" name="password" placeholder="*******" autocomplete="off" required>
        </div>

        <input class="w-full h-[45px] bg-blue-600 text-white rounded-md font-bold mt-4 cursor-pointer hover:bg-blue-700 transition" type="submit" name="login" value="Login">
    </form>
  </div>
</body>
</html>
