<?php 
    include "acesso_bd/carregarListaProfessores.php";

    //* abre conexao com banco de dados
    $conexao = conectarBD();
    
    //* executar consultar SQL
    $turmas = executarQuery($conexao, "SELECT * FROM turmas");
    $professores = executarQuery($conexao, "SELECT * FROM professores");
    
    //* fechar a conexao
    desconectarBD($conexao);
?>

<!-- inicio do codigo HTML -->
<!DOCType HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Exercícios PHP</title>

    <link href="css/meu-estilo-original.css" rel="stylesheet">
</head>

<body>
    <!-- inicio do codigo HTML -->
    <main class="conteudo largura-padrao">

        <h2>Atualizar Turma</h2>

        <div class="divform">
            
            <div id="idFrmProfessor" class="entrada">

                <form name="frmCadastrarProfessor" method="post" action="atualizarTurma_mysqli.php">

                    <fieldset>
                        <div class="label">
                            <label for="idCodigoTurma">Código da Turma</label>
                        </div>
                        <div>
                            <select id="idCodigoTurma" name="codigo" onchange="fun()">
                                <option value=0 selected>Selecione...</option>
                                <?php
                                    foreach ($turmas as $turma) {                           
                                        $codigo = $turma["codigo"];
                                ?>
                                <option value=<?=$codigo;?> > <?=$codigo;?> </option>
                                <?php
                                    }
                                    unset($turma);
                                ?>
                            </select>
                        </div>

                        <div class="label">
                            <label for="idSerieTurma">Série da Turma</label>
                        </div>
                        <div>
                            <?php
                                foreach ($turmas as $turma) {                           
                                    $codigo = $turma["codigo"];
                                    $serie = $turma["serie"];
                                ?>
                            <input id="idSerieTurma_<?= $codigo ?>" value="<?= $serie ?>" style="display: none">
                            <?php
                                }
                                unset($turma);
                            ?>
                            <input 
                                type="text" 
                                id="idSerieTurma" 
                                name="serie" 
                                maxlength="10" 
                                placeholder="Informe a série da turma"
                                value=""
                                required>
                        </div>

                        <div class="label">
                            <label for="idSalaTurma">Sala da Turma</label>
                        </div>
                        <div>
                            <?php
                                foreach ($turmas as $turma) {                           
                                    $codigo = $turma["codigo"];
                                    $sala = $turma["sala"];
                            ?>
                            <input id="idSalaTurma_<?= $codigo ?>" value="<?= $sala ?>" style="display: none">
                            <?php
                                }
                                unset($turma);
                            ?>
                            <input 
                                type="text" 
                                id="idSalaTurma" 
                                name="sala"  
                                placeholder="Informe a sala da turma" 
                                value=""
                                required>
                        </div>

                        <div class="label">
                            <label for="idHoraInicialTurma">Hora de início da Turma</label>
                        </div>
                        <div>
                            <?php
                                foreach ($turmas as $turma) {                           
                                    $codigo = $turma["codigo"];
                                    $hora_inicial = $turma["hora_inicial"];
                            ?>
                            <input id="idHoraInicialTurma_<?= $codigo ?>" value="<?= $hora_inicial ?>" style="display: none">
                            <?php
                                }
                                unset($turma);
                            ?>
                            <input 
                                type="time" 
                                id="idHoraInicialTurma" 
                                name="horaInicial" 
                                value=""
                                required>
                        </div>

                        <div class="label">
                            <label for="idHoraFinalTurma">Hora de fim da Turma</label>
                        </div>
                        <div>
                            <?php
                                foreach ($turmas as $turma) {                           
                                    $codigo = $turma["codigo"];
                                    $hora_final = $turma["hora_final"];
                            ?>
                            <input id="idHoraFinalTurma_<?= $codigo ?>" value="<?= $hora_final ?>" style="display: none">
                            <?php
                                }
                                unset($turma);
                            ?>
                            <input 
                                type="time" 
                                id="idHoraFinalTurma" 
                                name="horaFinal" 
                                value=""
                                required>
                        </div>

                        <div class="label">
                            <label for="idProfessor">Professor da Turma</label>
                        </div>
                        
                        <div>
                            <?php
                                foreach ($turmas as $turma) {                           
                                    $codigo = $turma["codigo"];
                                    $matricula = $turma["professores_matricula"];
                            ?>
                            <input id="idProfessor_<?= $codigo ?>" value="<?= $matricula ?>" style="display: none">
                            <?php
                                }
                                unset($turma);
                            ?>
                            <select id="idProfessor" name="matriculaProfessor">
                                <option value=0 selected>Selecione...</option>

                            <?php
                                foreach ($professores as $professor) {                           
                                    $matricula = $professor["matricula"];
                                    $nome = $professor["nome"]; 
                            ?>
                                
                                <option value=<?=$matricula;?>> <?=$nome;?> </option>
                            
                            <?php
                                }
                            ?>

                            </select>
                        </div>

                        <div class="botoes">
                            <input type="reset" value="Limpar">
                            <input type="submit" value="Atualizar">
                        </div>

                    </fieldset>
                </form>

            </div>

        </div>
    </main>
    <!-- fim do codigo HTML -->

    <!-- inicio do codigo Javascript -->
    <script type="text/javascript">
        function fun() {
            var codigo = document.getElementById("idCodigoTurma").value;
            document.getElementById("idSerieTurma").value = document.getElementById("idSerieTurma_" + codigo).value;
            document.getElementById("idSalaTurma").value = document.getElementById("idSalaTurma_" + codigo).value;
            document.getElementById("idHoraInicialTurma").value = document.getElementById("idHoraInicialTurma_" + codigo).value;
            document.getElementById("idHoraFinalTurma").value = document.getElementById("idHoraFinalTurma_" + codigo).value;
            document.getElementById("idProfessor").value = document.getElementById("idProfessor_" + codigo).value;
        }
    </script>
    <!-- fim do codigo Javascript -->

</body>

</html>