<?php

/*
TURMA:
    I2A.
EQUIPE: 
    Ângelo Gabriel Sicssu da Silva.
    Esther Vitória Ferreira Leão.
    Leonardo Brandão do Amarante.
*/

    $AEL_host = "localhost";
    $AEL_username = "root";
    $AEL_password = "";
    $AEL_db = "bddwello";

    $AEL_conn = new mysqli($AEL_host, $AEL_username, $AEL_password, $AEL_db);

    if($AEL_conn->connect_errno != 0)
        echo "Falha de conexão: (".$AEL_conn->connect_errno.")";
?>