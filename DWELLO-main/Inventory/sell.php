<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "../conexao.php";

        $AEL_codigo = $_POST['codigo'];
        $AEL_nome = $_POST['nome'];
        $AEL_valor = $_POST['valor'];
        $AEL_cor = $_POST['cor'];
        $AEL_material = $_POST['material'];
        $AEL_tamanho = $_POST['tamanho'];
        $AEL_formato = $_POST['formato'];
        $AEL_peso = $_POST['peso'];
        $AEL_qnt_estoque = intval($_POST['qnt_estoque']);
        $AEL_qnt_venda = intval($_POST['qnt_venda']);
        $AEL_estoque = $AEL_qnt_estoque - $AEL_qnt_venda;

        $AEL_sql = "UPDATE produtos SET qnt_estoque = '$AEL_estoque' WHERE codigo = '$AEL_codigo'";
        echo $AEL_sql; 
        $AEL_result = mysqli_query($AEL_conn, $AEL_sql);

        if($AEL_result){
        header('Location: ../index.php');
        exit();
        }else{
            echo "Erro ao atualizar dados do produto";
            die(mysqli_error($AEL_conn));
        }
    }elseif(isset($_GET['codigo'])){
        include "../conexao.php";

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
    <title>Vender Mercadoria</title>
</head>
<body class="p-3 mb-2 bg-warning text-dark">
    <div class="container p-3 mb-2 bg-light text-dark" style="border-radius: 10px;">
        <?php if($AEL_row): ?>
            <h2>Realizar venda da mercadoria: <?php echo $AEL_row['nome']?></h2>
            <form action="" method="POST" style="font-size: 20px; font-weight:bold;">
            <div class='row p-1'>
                <label for="codigo" class="col-6 col-sm-4">Código:</label>
                <input type="text" type="hidden" name="codigo" value="<?php echo $AEL_row['codigo']?>" class="col-6 col-sm-3" readonly>
            </div>
            <div class='row p-1'>
                <label for="nome"  class="col-6 col-sm-4"> Nome:</label>
                <input maxlength="40" type="text" value="<?php echo $AEL_row['nome']?>" name="nome" class="col-6 col-sm-3" disabled>
            </div>
            <div class='row p-1'>
                <label for="valor" class="col-6 col-sm-4">Valor:</label>
                <input type="text" maxlength="30" value="<?php echo $AEL_row['valor']?>" name="valor"  class="col-6 col-sm-3" disabled>
            </div>
            <div class='row p-1'>
                <label for="cor" class="col-6 col-sm-4">Cor:</label>
                <input type="text" maxlength="30" value="<?php echo $AEL_row['cor']?>" name="cor" class="col-6 col-sm-3" disabled>
            </div>
            <div class='row p-1'>
                <label for="material" class="col-6 col-sm-4">Material:</label>
                <input type="text" maxlength="30" value="<?php echo $AEL_row['material']?>" name="material" class="col-6 col-sm-3" disabled>
            </div>
            <div class='row p-1'>
                <label for="tamanho" class="col-6 col-sm-4">Tamanho:</label>
                <input type="text" maxlength="30" value="<?php echo $AEL_row['tamanho']?>" name="tamanho"class="col-6 col-sm-3"  disabled>
            </div>
            <div class='row p-1'>
                <label for="formato" class="col-6 col-sm-4">Formato:</label>
                <input type="text" maxlength="30" value="<?php echo $AEL_row['formato']?>" name="formato" class="col-6 col-sm-3" disabled>
            </div>
            <div class='row p-1'>
                <label for="peso" class="col-6 col-sm-4">Peso:</label>
                <input type="text" maxlength="30" value="<?php echo $AEL_row['peso']?>" name="peso" class="col-6 col-sm-3" disabled>
            </div>
            <div class='row p-1'>
                <label for="qnt_estoque" class="col-6 col-sm-4">Quantidade no estoque:</label>
                <input type="number" maxlength="30" value="<?php echo $AEL_row['qnt_estoque']?>" name="qnt_estoque" class="col-6 col-sm-3" readonly>
            </div>
            <div class='row p-1'>
                <label for="qnt_venda" class='col-6 col-sm-4'>Quantidade a ser vendida</label>
                <input type="number" maxlength="30" name="qnt_venda" min='1' max="<?php echo $AEL_row['qnt_estoque']?>" class='col-6 col-sm-3'>
            </div>

            <div style="margin-top: 2%;">
                <input class="btn btn-outline-success btn-lg" type="submit" value="Vender Mercadoria">
                <a href="../index.php" style="margin-left: 2%;">Voltar</a>
            </div>
        </form>
        <?php else: ?>
            <p>Erro ao atualizar o estoque da mercadoria</p>
        <?php endif; ?>
    </div>
</body>
</html>