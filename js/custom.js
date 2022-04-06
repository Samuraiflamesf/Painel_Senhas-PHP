// Funcao para gerar senha conforme o tipo da senha enviado
async function gerarSenha(tipoSenha){

    // chamar o arquivo PHP para gerar a senha
    const dados = await fetch('gerar_senha.php?tipo=' + tipoSenha);
    
    // Ler os dados retornados pelo PHP
    const resposta = await dados.json();
    console.log(resposta);
    // IF quando houver erro
    if(resposta['status']){
        //enviar a msg de erro para seletor "msgAlerta"
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }else{
        //enviar a msg de erro para seletor "msgAlerta"
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }
    
}
