<?php //Incluindo a conexao com banco de dados
include_once "./conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Chamar Senha</title>
    <link rel="stylesheet" href="../css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/time.js"></script>
</head>

<body onload="startTime()">
    <br>
    <div class="relogio">
        <!--Titulo da pagina e parte superior
        -->
        <div class="corpo">
        <p class='subtitulo'><strong class="titulo">CIMEB</strong><br>
                Centro de Infusões e Medicamentos Especializados da Bahia</p> <br>
            <div class="display">
                <div class="div_time">
                    <!-- Relogio-->
                    <p id="horario">Horário Atual</p>
                    <p id="relogio"></p>
                </div>
            </div>
        </div>
    </div>
    <h2 class='titulo'>CHAMAR SENHA</h2>
    <br>
    <!-- Chamar a função para mostra erros
   -->
    <div class="msgAlerta">
        <!-- Receber a mensagem de erro do JavaScript -->
        <p id="statusSenha">Senha chamada:<span id="msgAlerta"></span>
        </p>
    </div>
    <div class="aling"> 
        <div class="navChamar">
        <?php
            $query_tipos_senhas = "SELECT id, nome FROM tipos_senhas";
            $result_tipos_senhas = $conn->prepare($query_tipos_senhas);
            $result_tipos_senhas->execute();

            if (($result_tipos_senhas) and ($result_tipos_senhas->rowCount() != 0)) {
                while ($row_tipo_senha = $result_tipos_senhas->fetch(PDO::FETCH_ASSOC)) {
                    extract($row_tipo_senha);
                // Botao para chamar a funcao "chamarSenha". Funcao que chama a senha 
                echo "<button type='button' onclick='chamarSenha($id)'>$nome</button>";
        }
    }?>
        </div>
    </div>
    <div class="flex-box">
        <div class="scroll">
            <?php
            //Recuperar a senhas geradas que ainda nao foram chamadas, ou seja situação 2 "EMITIDAS"
            $query_senhas_gerasdas = "SELECT senger.id,
            sen.nome_senha,
            tip.nome
            FROM senhas_geradas as senger
            INNER JOIN senhas AS sen ON sen.id=senger.senha_id
            INNER JOIN tipos_senhas AS tip ON tip.id=sen.tipos_senha_id
            WHERE senger.sits_senha_id = 2
            ORDER BY senger.id ASC";

            //Preparar a QUERY
            $result_senhas_geradas = $conn->prepare($query_senhas_gerasdas);

            //Execultar a QUERY
            $result_senhas_geradas->execute();

            // Inicio SELETOR utilizado para indicar qual senha deve ser excluida quando a mesma for chamada
            echo "<div id='senha-gerada-$id'>";

            //Ler a QUERy
            while ($row_senha_gerada = $result_senhas_geradas->fetch(PDO::FETCH_ASSOC)) {
                //var_dump($row_senha_gerada);

                //INICIO DO SELETOR QUAL DEVE SER EXCLUIDA
                echo "<div id='senha-gerada-$id'>";

                //Extrair Para imprimir atraves da chave No Arry
                extract($row_senha_gerada);

                //Imprimir dados da senha
                echo "ID da senha: $id <br>";
                echo "Nome da senha: $nome_senha <br>";
                echo "Tipo da senha: $nome <br>";

                echo "<hr>";
                echo "</div>";
            }
            //FIM DO SELETOR
            echo "</div>";
            ?>

        </div>
    </div>
    </div>
    <div class="footer">
        <!-- 
        Começo da barra debaixo-->
        <a href="../../frontend/index.php"><button type="button">Painel</button></a>
        <a href="index.php"><button type="button">Gerar Senha</button></a>
        <a href="atendimento.php"><button type="button">Chamar Senha</button></a>
        <a href="liberar_senha.php"><button type="button">Liberar Senha</button></a>
        <br><br>
        <p>2022 - @BernardoNogueira8</p>
        <br>
    </div>
<script src="../js/custom.js"></script>
</body>

</html>