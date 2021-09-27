<?php
    $matProf = $_POST['matricula'];

    $conexao = conectarBD();

    $professores = executarQuery($conexao, "SELECT * FROM professores WHERE matricula = $matProf");

    desconectarBD($conexao);
?>

<DOCType html>
    <html lang="pt-br">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Atualização Professor</title>
            <link href="css/meu-estilo-original.css" rel="stylesheet">

        </head>
        <body>
        <main class="conteudo largura-padrao">

        <h2>Atualizar Professor</h2>

        <div class="divform">

        <div id="idFrmProf" class="entrada">

            <form name="frmAtualizarProfe" method="post" action="atualizarProf_mysqli.php">

                <fieldset>
                    <div class="label">
                        <label for="idMatriculaProfessor">Matricula do Professor</label>
                    </div>

                    <?php
                            foreach ($professores as $professor) {                           
                                $matricula = $professor["matricula"];
                                $nome = $professor["nome"]; 
                    ?>

                        <div>
                            <input type="text"
                                id="idMatProf" 
                                name="matProf" 
                                disabled 
                                value="<?=$matricula?>">
                        </div>

                        <div class="label">
                            <label for="idNomeProf">Nome do Professor</label>
                        </div>
                        <div>
                            <input type="text" 
                                id="idNomeProf" 
                                name="nomeProf" 
                                maxlength="45"
                                value="<?=$nome?>"
                                required>
                        </div>
                    <?php
                        }
                    ?>

                    <div class="botoes">
                        <input type="reset" value="Limpar" href ="img/excluir">
                    <input type="submit" value="Atualizar" href = "img/alterar">
                </div>

            </fieldset>
        </form>

    </div>

</div>
</main>
<!-- fim do codigo HTML -->

<!-- inicio do codigo Javascript -->
<script type="text/javascript">
</script>
<!-- fim do codigo Javascript -->

</body>

</html>
