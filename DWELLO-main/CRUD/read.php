<?php
    include "../conexao.php";
    if(isset($_GET['codigo'])) {
        $AEL_codigo = $_GET['codigo'];
        $AEL_sql = "SELECT * FROM produtos WHERE codigo = $AEL_codigo";
        $AEL_result = mysqli_query($AEL_conn, $AEL_sql);
        $AEL_row = mysqli_fetch_assoc($AEL_result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Detalhes da mercadoria</title>
</head>

<body class="p-3 mb-2 bg-warning text-dark">
    <div class="container p-3 mb-2 bg-light text-dark" style="border-radius: 10px; font-size: 20px; font-weight:bold;">
        <?php if($AEL_row): ?>
            <h2>Mercadoria: <?php echo $AEL_row['nome']?></h2>
            <p><strong>Código:</strong> <?php echo $AEL_row['codigo'] ?></p>
            <p><strong>Nome:</strong> <?php echo $AEL_row['nome'] ?></p>
            <p><strong>Valor:</strong> <?php echo $AEL_row['valor'] ?></p>
            <p><strong>Cor:</strong> <?php echo $AEL_row['cor'] ?></p>
            <p><strong>Material:</strong> <?php echo $AEL_row['material'] ?></p>
            <p><strong>Tamanho:</strong> <?php echo $AEL_row['tamanho'] ?></p>
            <p><strong>Formato:</strong> <?php echo $AEL_row['formato'] ?></p>
            <p><strong>Peso:</strong> <?php echo $AEL_row['peso'] ?></p>
            <p><strong>Quantidade no Estoque:</strong> <?php echo $AEL_row['qnt_estoque'] ?></p>
            <?php endif; ?>

            <a class="btn btn-outline-primary btn-lg" href="../index.php">Voltar</a>

     
    </div>
    
</body>
</html>