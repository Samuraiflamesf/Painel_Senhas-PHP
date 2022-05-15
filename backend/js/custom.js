// Funcao para gerar senha conforme o tipo da senha enviado no paramento
async function gerarSenha(tipoSenha) {

    // Chamar o arquivo PHP para gerar a senha
    const dados = await fetch('gerar_senha.php?tipo=' + tipoSenha);

    // Ler os dados retornado pelo PHP
    const resposta = await dados.json();
    //console.log(resposta);

    // Acessar o IF quando houve erro no arquivo "gerar_senha.php"
    if (!resposta['status']) {
        // Enviar a mensagem de erro para o SELETOR "msgAlerta"
        alert(resposta['msg']);
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];

        // Apagar a senha gerada anteriormente
        document.getElementById("senhaGerada").innerHTML = "";
    } else {
        // Enviar a senha gerada para o SELETOR "senhaGerada"
        document.getElementById("senhaGerada").innerHTML = resposta['nome_senha'];
        // Apagar a mensagem de erro caso exista 
        document.getElementById("msgAlerta").innerHTML = "";
    }
}
// Função Chamar senha conforme o tipo de senha recebida

async function chamarSenha(tipoSenha){
    //console.log("Chamar Senha, tipo de senha:" + tipoSenha);

    // Chamra o arquivo PHP 
    const dados = await fetch('chamar_senha.php?tipo=' + tipoSenha);

    // Ler os dados retornado pelo PHP
    const resposta = await dados.json();
    //console.log(resposta);

    //acessar o IF quando houver erro no arquivo "chamar_senha.php"
    if(!resposta['status']){
        //Enviar a mensagem de erro para seletor "msgAlerta"
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }else{
        //Enviar a mensagem de erro para seletor "msgAlerta"
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
        
        //Recuperar o Seletor que esta ao redor
        var listaSenha = document.getElementById("lista-senha-gerada");

        // Recuperar seletor da senha chamada
        var senha = document.getElementById("senha-gerada-" + resposta['id_senha_gerada']);

        //REMOVER SENHA CHAMADA 
        listaSenha.removeChild(senha);

    }
}// Funcao chamar senha especifica, receber o id da senha da tabela "senhas_geradas"
async function chamarSenhaEspecifica(idSenhaGerada) {
    //console.log("Chamar a senha: " + idSenha);

    // Chamar o arquivo PHP para chamar a senha especifica
    const dados = await fetch('chamar_senha_especifica.php?id_senha_gerada=' + idSenhaGerada);

    // Ler os dados retornado pelo PHP
    const resposta = await dados.json();
    //console.log(resposta);

    // Acessar o IF quando houve erro no arquivo "chamar_senha_especifica.php"
    if (!resposta['status']) {
        // Enviar a mensagem de erro para o SELETOR "msgAlerta"
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else { // Acessar o ELSE quando nao houve erro no arquivo "chamar_senha_especifica.php"
        // Enviar a mensagem de erro para o SELETOR "msgAlerta"
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];

        // Recuperar o SELETOR que esta ao redor da lista de senha
        var listaSenha = document.getElementById("lista-senha-gerada");

        // Recuperar o SELETOR da senha chamada
        var senha = document.getElementById("senha-gerada-" + resposta['id_senha_gerada']);

        // Remover a senha chamada da lista 
        listaSenha.removeChild(senha);
    }
}

// Funcao para liberar senha conforme o tipo da senha enviado no paramento
async function liberarSenha(tipoSenha) {
    //console.log("Liberar senha. Tipo: " + tipoSenha);

    // Chamar o arquivo PHP para liberar a senha
    const dados = await fetch('liberar_senha_tipo.php?tipo=' + tipoSenha);

    // Ler os dados retornado pelo PHP
    const resposta = await dados.json();
    //console.log(resposta);

    // Acessar o IF quando houve erro no arquivo "liberar_senha_tipo.php"
    if (!resposta['status']) {
        // Enviar a mensagem de erro para o SELETOR "msgAlerta"
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else { // Acessar o ELSE quando nao houve erro no arquivo "liberar_senha_tipo.php"
        // Enviar a mensagem de erro para o SELETOR "msgAlerta"
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }
}

// Funcao para liberar todas as senhas
async function liberarSenhaTotal() {
    //console.log("Liberar senha.");

    // Chamar o arquivo PHP para liberar a senha
    const dados = await fetch('liberar_senha_total.php');

    // Ler os dados retornado pelo PHP
    const resposta = await dados.json();
    //console.log(resposta);

    // Acessar o IF quando houve erro no arquivo "liberar_senha_tipo.php"
    if (!resposta['status']) {
        // Enviar a mensagem de erro para o SELETOR "msgAlerta"
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else { // Acessar o ELSE quando nao houve erro no arquivo "liberar_senha_tipo.php"
        // Enviar a mensagem de erro para o SELETOR "msgAlerta"
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }
}