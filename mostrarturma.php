<!-- inicio do codigo HTML -->
<!DOCType HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Exercícios PHP</title>

    <link href="" rel="stylesheet">
</head>

<body>
    <!-- inicio do codigo HTML -->
    <main class="conteudo largura-padrao">

        <h2> Informçôes da turma</h2>

        <table>
            <thead>
                <tr>
                    
                    <th>Código</th>
                    <th>Série</th>
                    <th>Sala</th>
                    <th>Hora Inicial</th>
                    <th>Hora Final</th>
                   
                </tr>
            </thead>

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


/* listar os professores da tabela professor */

$consulta  = "SELECT codigo, serie, sala, hora_inicial, hora_final, professores_matricula FROM turmas WHERE codigo = codigo";
$resultado = mysqli_query($con, $consulta);

if ($resultado) {

    while ( $linha = mysqli_fetch_array($resultado) ) {
        $codigo = $linha['codigo'];
        $serie = $linha['serie'];
        $sala = $linha['sala'];
        $hora_inicial = $linha['hora_inicial'];
        $hora_final = $linha['hora_final'];
        $MatProf = $linha['professores_matricula'];


            ?>

                <tr>
                    <td>
                        <?=$codigo?>
                    </td>    
                    <td>
                        <?=$serie?>
                    </td>
                    <td>
                        <?=$sala?>
                    </td>
                    <td>
                        <?=$hora_inicial?>
                    </td>
                    <td>
                        <?=$hora_final?>
                    </td>
                </tr>
                <?php
                    }

                }

                /* fecha o objeto query */
                if (is_object($resultado)) {
                    mysqli_free_result($resultado);
                }
                ?>
        </table>

    </main>
    <!-- fim do codigo HTML -->

    <!-- inicio do codigo Javascript -->
    <script type="text/javascript">
    </script>
    <!-- fim do codigo Javascript -->

</body>

</html>