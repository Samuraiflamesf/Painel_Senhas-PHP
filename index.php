<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar Senha</title>
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="js/time.js"></script>
</head>
<body onload="startTime()">
    <h2 class='titulo'>GERAR SENHA DE ATENDIMENTO</h2>
        <div class="corpo">
        <p class='subtitulo'><strong>CIMEB</strong><br>
        Centro de Infusões e Medicamentos Especializados da Bahia</p> <br>
        <div class="display"> <div class="div_time">
             <!-- Relogio-->
            <p id="horario">Horário Atual</p><p id="relogio"></p></div>
        </div>
    </div><br>
      <!-- Chamar a função para mostra erros
   -->
   <div >
        <!-- Receber a mensagem de erro do JavaScript -->
        <p id="statusSenha"><span id="msgAlerta">-------</span>
        <!-- Receber a senha do JavaScript -->
        <br>Senha Gerarda: <span id="senhaGerada"></span></p><br>
    </div>
      
    <div class='container'>
    <!--Chamar a função "gerarSenha" do Js para atendimento Dispensação-->
    <div class="dispensação">
        <br><h3>Gerar Senhas Dispensação</h3>
    <a><button type="button" onclick="gerarSenha(1)">Dispensação</button></a>
    <a><button type="button" onclick="gerarSenha(2)">Dispensação Preferencial</button></a>
    </div>
    <!--
    Chamar a função "gerarSenha" do Js para atendimento Farmaceutico-->    
    <div class="Farmaceutico">
        <br><h3>Gerar Senhas para Farmacêuticos</h3>
    <a><button type="button" onclick="gerarSenha(3)">Farmacêutico</button></a>
    <a><button type="button" onclick="gerarSenha(4)">Farmacêutico Preferencial</button></a>
    </div>
    <!--
    Chamar a função "gerarSenha" do Js para atendimento ação judicial--> 
    <div class="acaojudicial">
    <br><h3>Gerar Senhas para Ação Judicial</h3>
    <a><button type="button" onclick="gerarSenha(5)">Ação Judicial</button></a>
    <a><button type="button" onclick="gerarSenha(6)">Ação Judicial - Extra</button></a>
    </div>  

</div>
<div class="footer">
        <br><br>
        <a href="index.php"><button type="button">Gerar Senha</button></a>
        <a href="paniel.php"><button type="button" >Painel</button></a>
        <a href="atendimento.php"><button type="button">Chamar Senha</button></a>
        <br><br>
        <p>2022 - @BernardoNogueira8</p>
        <br><br>
</div>
<script src="js/custom.js"></script>
</body>
</html>