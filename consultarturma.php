<!-- inicio do codigo HTML -->
<!DOCType HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercícios PHP</title>
</head>
<?php

$consulta  = "SELECT codigo FROM turmas";

?>
<body>
    
    <main>

        <h2>Consulta</h2>

          <form method="$_POST" action="mostrarturma.php">
          <label for="codigo">Informe o Codigo da turma</label><br>
          <input type="text" id="codigo" name="codigo" value=""><br>
          <input type="submit" value="Submit">
          </form> 










    <?php

    $host = "localhost";
    $dbUsuario = "root";
    $dbSenha = "";
    $dbSchema = "lista_chamadas_v2";

/* conectar o bd */
            $con = mysqli_connect($host, $dbUsuario, $dbSenha, $dbSchema);
            if (mysqli_connect_errno()) { // verifica se a conexao foi efetuado com sucesso
            $msgBD = mysqli_connect_error();
            echo "Falha na conexao com o BD: $msgBD";
            exit();
}


                /* fecha a conexao com o BD*/
                mysqli_close($con);
            ?>
            <!-- fim bloco PHP com HTML -->
        
        </table>

    </main>
    <!-- fim do codigo HTML -->

    <!-- inicio do codigo Javascript -->
    <script type="text/javascript">
    </script>
    <!-- fim do codigo Javascript -->

</body>

</html>