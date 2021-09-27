<?php
    $host = "localhost";
    $dbUsuario = "root";
    $dbSenha = "";
    $dbSchema = "lista_chamadas_v2";
    
    $nomeAluno = $_POST['nomeAluno'];
    $matriculaAluno = $_POST['matriculaAluno'];
    $turmaAluno = $_POST['turmaAluno'];
    
    /* CONECTAR O BANCO DE DADOS */
    $con = mysqli_connect($host, $dbUsuario, $dbSenha, $dbSchema);
    if(mysqli_connect_errno()){// Verifica se a conexão foi realizada com sucesso.
        $msgBD = mysqli_connect_error();
        echo "Falha na conexão com o Banco de Dados: $msgBD";
        exit();
    }
    /* INSERIR O ALUNO */
    $consulta = "INSERT INTO alunos (matricula, nome, turmas_codigo) VALUES ('$matriculaAluno', '$nomeAluno', '$turmaAluno')";
    echo $consulta . PHP_EOL;
    $resultado = mysqli_query($con, $consulta);

    if($resultado){
        $mensagemRetorno = "Aluno $nomeAluno de código $matriculaAluno inserido com sucesso.";
    } else {
        $mensagemRetorno = "Falha ao inserir o aluno $nomeAluno com o código $matriculaAluno.";
    }

    /* FECHAR A CONEXÃO */
    mysqli_close($con);
    echo $mensagemRetorno;