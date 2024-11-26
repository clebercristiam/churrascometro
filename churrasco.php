<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Churrasco</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: black;
            color: white;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="number"],
        input[type="submit"] {
            padding: 10px;
            margin-top: 10px;
        }

        h2 {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Calculadora de Churrasco</h1>
    <form action="" method="post">
        <label for="pessoas">Quantidade de pessoas:</label>
        <input type="number" id="pessoas" name="pessoas" required min="1">
        <input type="submit" value="Calcular">
    </form>

    <?php
    // Função para calcular a quantidade total de alimentos
    function calcularChurrasco($pessoas)
    {
        $porcoes = [
            'Carne' => 100, // em gramas
            'Linguiça' => 50, // em gramas
            'Frango' => 50, // em gramas
            'Pão' => 2, // número de pães
            'Salada' => 150 // em gramas
        ];

        $resultado = [];
        foreach ($porcoes as $alimento => $quantidade) {
            $resultado[$alimento] = $pessoas * $quantidade;
        }

        return $resultado;
    }

    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pessoas = intval($_POST['pessoas']); // Captura a quantidade de pessoas

        if ($pessoas > 0) {
            $resultado = calcularChurrasco($pessoas);

            echo "<h2>Para $pessoas pessoas, você precisará de:</h2>";
            foreach ($resultado as $alimento => $quantidade) {
                echo "<p>$quantidade gramas de $alimento</p>";
            }
        } else {
            echo "<p>Por favor, insira um número válido de pessoas.</p>";
        }
    }
    ?>
</body>

</html>