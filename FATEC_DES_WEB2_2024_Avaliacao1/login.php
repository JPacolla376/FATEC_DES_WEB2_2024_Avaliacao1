<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'portaria' && $password === 'FatecAraras') {
        $_SESSION['logged_in'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "Login ou senha inválidos";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif, sans-serif;
            background-color: #e6f7ff; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 300px;
        }

        .login-container h1 {
            font-size: 24px;
            color: #007bff; 
            margin-bottom: 20px;
        }

        .login-container label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #333;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-container button:hover {
            background-color: #0056b3; 
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form method="POST">
            <label for="username">Usuário:</label>
            <div class="left">
                <input type="text" name="username" required><br>
            </div>

            <label for="password">Senha:</label>
            <input type="password" name="password" required><br>

            <button type="submit">Entrar</button>
        </form>

        <?php if (isset($error)): ?>
        <p class="error-message"><?= $error ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
