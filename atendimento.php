<?php 
//Incluindo a conexao com banco de dados
include_once "./conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamar Senha</title>
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="js/time.js"></script>
</head>
<body onload="startTime()">
    <!--Titulo da pagina e parte superior
    --><h2 class='titulo'>CHAMAR SENHA</h2>
    <div class="corpo">
        <p class='subtitulo'><strong>CIMEB</strong><br>
        Centro de Infusões e Medicamentos Especializados da Bahia</p> <br>
            <div class="display"> <div class="div_time">
                <!-- Relogio-->
                <p id="horario">Horário Atual</p><p id="relogio"></p>
            </div>
            </div>
    </div><br>
      <!-- Chamar a função para mostra erros
   -->  <div class="msgAlerta">
        <!-- Receber a mensagem de erro do JavaScript -->
        <p id="statusSenha"><span id="msgAlerta">-------</span>
        <!-- Receber a senha do JavaScript -->
        <br>Senha Chamada: <span id="senhaGerada"></span></p><br>
    </div>
    
     <div class="navChamar">
    <?php
    //Chamar a função "gerarSenha" do Js para atendimento Dispensação
    echo"<a><button type='button' onclick='chamarSenha(1)'>Dispensação</button></a>";

    //Chamar a função "gerarSenha" do Js para atendimento Farmacêutico
    echo"<a><button type='button' onclick='chamarSenha(3)'>Farmacêutico</button></a>";

    //Chamar a função "gerarSenha" do Js para atendimento Dispensação
    echo"<a><button type='button' onclick='chamarSenha(5)'>Ação Judicial</button></a>";
    
    //Chamar a função "gerarSenha" do Js para atendimento Dispensação Preferencial
    echo"<br><a><button type='button' onclick='chamarSenha(2)'>Dispensação Preferencial</button></a>";

    //Chamar a função "gerarSenha" do Js para atendimento Farmacêutico Preferencial
    echo"<a><button type='button' onclick='chamarSenha(4)'>Farmacêutico Preferencial</button></a>";
    
    //Chamar a função "gerarSenha" do Js para atendimento Ação Judicial - Extra
    echo"<a><button type='button' onclick='chamarSenha(6)'>Ação Judicial - Extra</button></a>";
    ?>
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

    // Inicio SELETOR Para excluir a senha chamada
    echo "<div id='lista-senha-gerada'>";


    //Ler a QUERy
    while($row_senha_gerada = $result_senhas_geradas->fetch(PDO::FETCH_ASSOC)){
        //var_dump($row_senha_gerada);

        //INICIO DO SELETOR QUAL DEVE SER EXCLUIDA
        echo "<div id='senha-gerada-$id'>";

        //Extrair Para imprimir atraves da chave No Arry
        extract($row_senha_gerada);

        //Imprimir dados da senha
        echo"ID da senha: $id <br>";
        echo"Nome da senha: $nome_senha <br>";
        echo"Tipo da senha: $nome <br>";

        echo"<hr>";
        echo"</div>";
    }
    //FIM DO SELETOR
    echo"</div>";
    ?>

    </div>
</div>

</div>
<div class="footer">
        
        <a href="index.php"><button type="button">Gerar Senha</button></a>
        <a href="paniel.php"><button type="button" >Painel</button></a>
        <a href="atendimento.php"><button type="button">Chamar Senha</button></a>
        <br><br>
        <p>2022 - @BernardoNogueira8</p>
        <br>
</div>
<script src="js/custom.js"></script>
</body>
</html>