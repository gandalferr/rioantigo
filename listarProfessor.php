<!-- inicio do codigo HTML -->
<!DOCType HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Exercícios PHP</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <style>
        * {
            font-family: 'Open Sans', sans-serif;
            font-size: 20px;
        }
        
        main h2 {
            font-size: 36px;
            font-weight: bold;
            color:darkred;
            border-bottom: darkred 1px solid;       
        }    

        table {
            margin: 0 auto;
            border-spacing: 0;
        }

        th {
            text-align: center;
            color: blue;
            border-bottom: 1px blue solid;
        }

        th, tr {
            padding: 12px 0;
            text-align: center;
            vertical-align: middle;
        }

        td:nth-child(2) {
           text-align: left;
        }

        tbody > tr:hover {
            color: blue;
            background-color: #e6eed5;
        }

    </style>
</head>

<body>
    <!-- inicio do codigo HTML -->
    <main>

        <h2>Listar Professores</h2>

            <table>
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Professor</th>
                        <th colspan="2">Ações</th>
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
            
                    /* listar os professores da tabela professor */
                    $consulta  = "SELECT matricula, nome FROM professores";
                    $resultado = mysqli_query($con, $consulta);
                    
                    if ($resultado) {

                        while ( $linha = mysqli_fetch_array($resultado) ) {
                            $matricula = $linha['matricula'];
                            $nome = $linha['nome'];
                            $atualizarProfessor = "atualizarProfessor.php?matricula=" . $matricula;
                ?>

                    <tr>
                        <td>
                            <?=$matricula?>
                        </td>    
                        <td>
                            <?=$nome?>
                        </td>
                        <td>
                            <a href="atualizarProfessor.php?matricula=<?=$matricula?>" >
                            <span class="material-icons">update</span></a> 
                        </td>
                        <td>
                            <a href="excluirProfessor.php?matricula=<?=$matricula?>" >
                            <span class="material-icons">delete_forever</span></a> 
                        </td>

                    </tr>

                <?php
                        }

                    }

                    /* fecha o objeto query */
                    if (is_object($resultado)) {
                        mysqli_free_result($resultado);
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