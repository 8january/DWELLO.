<?php
    if(isset($_GET['codigo'])){
        include "../conexao.php";
        $AEL_codigo = $_GET['codigo'];
        $AEL_sql = "DELETE FROM produtos WHERE codigo = $AEL_codigo";
        $AEL_result = mysqli_query($AEL_conn, $AEL_sql);

        if($AEL_result){
            header("Location: ../index.php");
            exit();
        } else {
            echo "Erro ao excluir o livro";
        }
    }

?>
