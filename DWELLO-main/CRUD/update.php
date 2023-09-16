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
        $AEL_qnt_estoque = $_POST['qnt_estoque'];

        $AEL_sql = "UPDATE produtos SET nome = '$AEL_nome', valor = '$AEL_valor', cor='$AEL_cor', material = '$AEL_material', tamanho = '$AEL_tamanho', formato = '$AEL_formato', peso = '$AEL_peso', qnt_estoque = '$AEL_qnt_estoque' WHERE codigo = '$AEL_codigo'";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/css/bootstrap.min.css">
    <title>Editar Mercadoria</title>
</head>
<body class="container p-3 mb-2 bg-warning text-dark">
    <div class="p-3 mb-2 bg-light text-dark" style= "border-radius: 10px;">
        <?php if($AEL_row): ?>
            <h2>Atualizar Dados da Mercadoria <?php echo $AEL_row['nome']?></h2>
            <form action="" method="POST" style="margin-top:2%; font-size: 20px; font-weight:bold;">
            <div>
                <label for="codigo">Código</label><br>
                <input type="text" type="hidden" name="codigo" value="<?php echo $AEL_row['codigo']?>" readonly>
            </div>
            <div>
                <label for="nome" >Nome</label><br>
                <input maxlength="40" type="text" value="<?php echo $AEL_row['nome']?>" name="nome">
            </div>
            <div>
                <label for="valor">Valor</label><br>
                <input type="text" maxlength="30" value="<?php echo $AEL_row['valor']?>" name="valor">
            </div>
            <div>
                <label for="cor">Cor</label><br>
                <input type="text" maxlength="30" value="<?php echo $AEL_row['cor']?>" name="cor">
            </div>
            <div>
                <label for="material">Material</label><br>
                <input type="text" maxlength="30" value="<?php echo $AEL_row['material']?>" name="material">
            </div>
            <div>
                <label for="tamanho">Tamanho</label><br>
                <input type="text" maxlength="30" value="<?php echo $AEL_row['tamanho']?>" name="tamanho">
            </div>
            <div>
                <label for="formato">Formato</label><br>
                <input type="text" maxlength="30" value="<?php echo $AEL_row['formato']?>" name="formato">
            </div>
            <div>
                <label for="peso">Peso</label><br>
                <input type="text" maxlength="30" value="<?php echo $AEL_row['peso']?>" name="peso">
            </div>
            <div>
                <label for="qnt_estoque">Quantidade no estoque</label><br>
                <input type="number" maxlength="30" value="<?php echo $AEL_row['qnt_estoque']?>" name="qnt_estoque">
            </div>
            <div style="margin-top: 2%;">
                <input class="btn btn-warning btn-lg" type="submit" value="Atualizar Mercadoria">
                <a href="../index.php" style="margin-left:2%;">Voltar</a>
            </div>
                
        </form>
        <?php else: ?>
            <p>Erro ao atualizar a mercadoria</p>
        <?php endif; ?>
    </div>
</body>
</html>