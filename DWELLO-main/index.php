<?php
include "conexao.php";

if(isset($_GET['filter'])){
    $AEL_key = $_GET['filter'];
    $AEL_sql = "SELECT * FROM produtos where nome LIKE '$AEL_key%'";
}
else{
    $AEL_sql = "SELECT * FROM produtos";
}

if(isset($_GET['hasSubmitted'])){
    $AEL_preco_l = $_GET['preco_l'];
    $AEL_preco_r = $_GET['preco_r'];
    $AEL_estoque_l = $_GET['estoque_l'];
    $AEL_estoque_r = $_GET['estoque_r'];
    $AEL_cor = $_GET['cor'];
    $AEL_material = $_GET['material'];
    $AEL_peso_l = $_GET['peso_l'];
    $AEL_peso_r = $_GET['peso_r'];
    
    $AEL_sql = "SELECT * FROM produtos";
    
    if (!empty($AEL_preco_l) && !empty($AEL_preco_r)) {
        $AEL_sql .= " WHERE valor BETWEEN $AEL_preco_l AND $AEL_preco_r";
    }
    
    if (!empty($AEL_estoque_l) && !empty($AEL_estoque_r)) {
        if (strpos($AEL_sql, 'WHERE') !== false) {
            $AEL_sql .= " AND qnt_estoque BETWEEN $AEL_estoque_l AND $AEL_estoque_r";
        } else {
            $AEL_sql .= " WHERE qnt_estoque BETWEEN $AEL_estoque_l AND $AEL_estoque_r";
        }
    }
    
    if (!empty($AEL_cor)) {
        if (strpos($AEL_sql, 'WHERE') !== false) {
            $AEL_sql .= " AND cor = '$AEL_cor'";
        } else {
            $AEL_sql .= " WHERE cor = '$AEL_cor'";
        }
    }
    
    if (!empty($AEL_material)) {
        if (strpos($AEL_sql, 'WHERE') !== false) {
            $AEL_sql .= " AND material = '$AEL_material'";
        } else {
            $AEL_sql .= " WHERE material = '$AEL_material'";
        }
    }
    
    if (!empty($AEL_peso_l) && !empty($AEL_peso_r)) {
        if (strpos($AEL_sql, 'WHERE') !== false) {
            $AEL_sql .= " AND peso BETWEEN $AEL_peso_l AND $AEL_peso_r";
        } else {
            $AEL_sql .= " WHERE peso BETWEEN $AEL_peso_l AND $AEL_peso_r";
        }
    }
    }

$AEL_result = mysqli_query($AEL_conn, $AEL_sql);

if (!$AEL_result) {
    die("Erro na consulta: " . mysqli_error($AEL_conn));
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>DWELLO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/dwello-logo.svg" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>
<body class="p-3 mb-2 bg-warning text-dark">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

    <!--<div class="p-3 mb-2 bg-warning text-dark">-->
    <div class="container-xl" style="margin-top: 2%;">

    <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand">
            <img src="assets/dwello-logo.svg" alt="Logo" width="132" height="88">
            <span class='h2'>DWELLO</span>
        </a>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Produto" aria-label="Produto" name='filter'>
            <button class="btn btn-outline-dark" type="submit"> Pesquisar </button>
        </form>
    </div>
    <div class="imagem.d-flex" style="position:relative; margin-top: 1%; width: 100%; height: 100%; margin-bottom: 1%;">
        <img class="d-flex.align-self-center" src="assets/DWELLO-image-4.jpg" alt="DWELLO STORE" height="100%" width="100%">
        <div class="texto-dwello" style="position:absolute; background-color: rgba(0, 0, 0, 0.5); color: #fff; top:0%; width:100%; height: 100%">
            <h1 style="font-size: 320%; margin-top:3%; margin-left: 3%;">Controle de Estoque</h1>
        </div>
    </div>
    </nav>

        <ul class="nav nav-tabs bg-body-tertiary">
        <li class="nav-item">
            <a class="nav-link active" href="#"> Visualizar estoque </a>
        <li class="nav-item">
            <a class="nav-link" href="CRUD/create.php"> Registrar produto </a>
        </li>
        <li class="nav-item">
            <button class="nav-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
  Filtrar estoque
</button>
        </li>
        </ul>


    <div class="table-responsive-sm">
    <table class="table table-hover shadow-sm   ">
        <tr>
            <th>Nome</th>
            <th>Valor</th>
            <th>Cor</th>
            <th>Material</th>
            <th>Formato</th>
            <th>Estoque</th>
            <th>Operações</th>
        </tr>
        <?php while ($AEL_row = mysqli_fetch_assoc($AEL_result)): ?>
            <tr>
                <td><?php echo $AEL_row['nome']; ?></td>
                <td>R$ <?php echo $AEL_row['valor']; ?></td>
                <td><?php echo $AEL_row['cor']; ?></td>
                <td><?php echo $AEL_row['material']; ?></td>
                <td><?php echo $AEL_row['formato']; ?></td>
                <td><?php echo $AEL_row['qnt_estoque']; ?></td>
                <td class='d-grid gap-2 d-md-block'>
                        <a href="Inventory/sell.php?codigo=<?php echo $AEL_row['codigo']; ?>"><button class="btn btn-success btn-sm">Vender</button></a>
                        <a href="Inventory/add.php?codigo=<?php echo $AEL_row['codigo']; ?>"><button class="btn btn-secondary btn-sm">Adicionar</button></a>
                        <a href="CRUD/read.php?codigo=<?php echo $AEL_row['codigo']; ?>"><button class="btn btn-primary btn-sm">Detalhes</button></a>
                        <a href="CRUD/update.php?codigo=<?php echo $AEL_row['codigo']; ?>"><button class="btn btn-warning btn-sm">Editar</button></a>
                        <a href="CRUD/delete.php?codigo=<?php echo $AEL_row['codigo']; ?>"><button type="button" class="btn btn-outline-danger btn-sm">Excluir</button></a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    </div>
    </div>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filtro de estoque</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="" method='GET' class='container'>

<div class="row row-cols-4 text-left align-items-center g-3 p-2">
    <div class="col"><label for="" class='form-label'>Preço:</label></div>
    <div class="col"><input type="number" name="preco_l" id="" placeholder='0.00' class='form-control form-control-sm' step="any"></div>
    <div class="col"><label for="" class='form-label'>  entre </label></div>
    <div class="col"><input type="number" name="preco_r" id="" placeholder='0.00' class='form-control form-control-sm' step="any"></div>
</div>

<div class="row row-cols-4 text-left align-items-center g-3 p-2">
    <div class="col"><label for="" class='form-label'>Cor:</label></div>
    <div class="col"><input type="text" name="cor" id="" placeholder='branco' class='form-control form-control-sm'></div>
    <div class="col"><label for="" class='form-label'>Material:</label></div>
    <div class="col"><input type="text" name="material" id="" placeholder='madeira' class='form-control form-control-sm'></div>
</div>


<div class="row row-cols-4 text-left align-items-center g-3 p-2">
    <div class="col"><label for="" class='form-label'>Peso:</label></div>
    <div class="col"><input type="number" name="peso_l" id="" placeholder='0.00' class='form-control form-control-sm' step="any"></div>
    <div class="col"><label for="" class='form-label'>  entre </label></div>
    <div class="col"><input type="number" name="peso_r" id="" placeholder='0.00' class='form-control form-control-sm' step="any"></div>
</div>

<div class="row row-cols-4 text-left align-items-center g-3 p-2">
    <div class="col"><label for="" class='form-label'>Estoque:</label></div>
    <div class="col"><input type="number" name="estoque_l" id="" placeholder='0.00' class='form-control form-control-sm' step="any"></div>
    <div class="col"><label for="" class='form-label'>  entre </label></div>
    <div class="col"><input type="number" name="estoque_r" id="" placeholder='0.00' class='form-control form-control-sm' step="any"></div>
</div>

<input type="hidden" name="hasSubmitted" value="1">

<div class="d-grid gap-2">
  <button class="btn btn-outline-warning" type="submit">Filtrar</button>
</div>

            </form>
        </div>
        </div>
</body>
</html>