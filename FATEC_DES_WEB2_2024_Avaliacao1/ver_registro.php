<?php
    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
}


function lerRegistros() {
    $registros = [];
    $arquivo = 'alunos.txt';

    if (file_exists($arquivo)) {
        $linhas = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($linhas as $linha) {
            list($nome, $ra, $placa) = explode('|', $linha);
            $registros[] = ['Nome' => $nome, 'R.A.' => $ra, 'Placa' => $placa];
        }
    }

    return $registros;
}


if (isset($_POST['ver_registro'])) {
    $registros = lerRegistros();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verificar Registros</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif, sans-serif;
            background-color: #e6f7ff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            padding: 30px;
        }

        .container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .btn-primary {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            margin-right: 10px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">

        <h1>Verificar Registros</h1>
        
       
        <form method="POST">
            <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" required>    
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>

            <button class="btn-primary" type="submit">Registrar</button>
            <button class="btn-primary" type="submit" name="ver_registro">Ver Registro</button>
        </form>

        
        <?php if (isset($registros)): ?>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>R.A.</th>
                    <th>Placa</th>
                </tr>
                <?php foreach ($registros as $registro): ?>
                    <tr>
                        <td><?= $registro['Nome'] ?></td>
                        <td><?= $registro['R.A.'] ?></td>
                        <td><?= $registro['Placa'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>