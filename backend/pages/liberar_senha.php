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
    <h2 class='titulo'>LIBERAR SENHA</h2>
    <br>
    <!-- Chamar a função para mostra erros
   --><!-- Receber a mensagem de erro do JavaScript -->
        <span id="msgAlerta"></span>
    <div class="aling"> 
        <div class="navChamar">
        <?php
            $query_tipos_senhas = "SELECT id, nome FROM tipos_senhas";
            $result_tipos_senhas = $conn->prepare($query_tipos_senhas);
            $result_tipos_senhas->execute();

        if (($result_tipos_senhas) and ($result_tipos_senhas->rowCount() != 0)) {
            while ($row_tipo_senha = $result_tipos_senhas->fetch(PDO::FETCH_ASSOC)) {
                extract($row_tipo_senha);

                // Chamar a funcao "liberarSenha" do JavaScript para liberar senha para atendimento
                echo "<button type='button' onclick='liberarSenha($id)'>$nome</button>";
            }
        }
        ?>

    <!-- Chamar a funcao "liberarSenhaTotal" do JavaScript para liberar todas as senha -->
    <p><br><br><br><button type="button" onclick="liberarSenhaTotal()">Todas</button></p>

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