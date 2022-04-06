<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paninel</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <h2 class='page-title'>GERAR SENHA DE ATENDIMENTO</h2>
    <div class="wrapper">
        <p class='page-subtitle'><strong>CIMEB</strong><br>
        Centro de Infusões e Medicamentos Especializados da Bahia</p>
        <div class="display"> <div id="time">12:00</div>
        </div>
    </div>
    <span></span>
    <span></span>
    <!--
        Chamar a função "gerarSenha" do Js para atendimento Dispensação
    -->
    <div class='container'>
    <p><button type="button" onclick="gerarSenha(1)">Dispensação</button></p>
    <p><button type="button" onclick="gerarSenha(2)">Dispensação Preferencial</button></p>
        <!--
        Chamar a função "gerarSenha" do Js para atendimento Farmaceutico
    -->
    <p><button type="button" onclick="gerarSenha(3)">Farmacêutico</button></p>
    <p><button type="button" onclick="gerarSenha(4)">Farmacêutico Preferencial</button></p>
    </div>
    
    <p>2022 - @BernardoNogueira8</p>
    <script src="js/custom.js"></script>
</body>
</html>