<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paninel</title>
</head>
<body>
    <h2>Gerar senha de aterndimento</h2>
    <!--
        Chamar a função "gerarSenha" do Js para atendimento Dispensação
    -->
    <p><button type="button" onclick="gerarSenha(1)">Dispensação</button></p>
    <p><button type="button" onclick="gerarSenha(2)">Dispensação Preferencial</button></p>
        <!--
        Chamar a função "gerarSenha" do Js para atendimento Farmaceutico
    -->
    <p><button type="button" onclick="gerarSenha(3)">Farmaceutico</button></p>
    <p><button type="button" onclick="gerarSenha(4)">Farmaceutico Preferencial</button></p>


    <script src="js/custom.js"></script>
</body>
</html>