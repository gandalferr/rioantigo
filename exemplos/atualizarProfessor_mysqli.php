<?php

$host = "localhost";
$dbUsuario = "root";
$dbSenha = "";
$dbSchema = "lista_chamadas_v2";

// recuperar matricula e nome do formulario de atualizacao 
$matriculaProfessor = intval($_POST['matriculaProfessor']);
$nomeProfessor = $_POST['nomeProfessor'];

/* conectar o bd */
$con = mysqli_connect($host, $dbUsuario, $dbSenha, $dbSchema);
if (mysqli_connect_errno()) {
    $msgBD = mysqli_connect_error();
    echo "Falha na conexao com o BD: $msgBD";
    exit();
}

/* insertir o professor informado */
$consulta  = "UPDATE professores
              SET nome = '$nomeProfessor'
              WHERE matricula = $matriculaProfessor
              ";

$resultado = mysqli_query($con, $consulta);

/* fechar a conexao */
mysqli_close($con);

header('location: listarProfessor.php');

