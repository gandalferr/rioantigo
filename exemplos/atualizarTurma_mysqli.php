<?php

    include "acesso_bd/carregarListaProfessores.php";

    $codigo = (int)$_POST["codigo"];
    $serie = (int)$_POST["serie"];
    $sala = (int)$_POST["sala"];
    $hora_inicial = (int)$_POST["horaInicial"];
    $hora_final = (int)$_POST["horaFinal"];
    $matricula = (int)$_POST["matriculaProfessor"];

    $conexao = conectarBD();
    $sql = "UPDATE turmas SET serie=$serie sala=$sala hora_inicial=$hora_inicial hora_final=$hora_final professores_matricula=$matricula WHERE codigo=$codigo"
    
    if ($conexao->executarQuery($conexao, $sql) === TRUE) {
        echo "Success!";
    } else {
        echo "Ehh . . . -> " . $conexao->error;
    }

    desconectarBD($conexao);

?>