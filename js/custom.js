// Funcao para gerar senha conforme o tipo da senha enviado
async function gerarSenha(tipoSenha){

    // chamar o arquivo PHP para gerar a senha
    const dados = await fetch('gerar_senha.php?tipo=' + tipoSenha);
    
    // Ler os dados retornados pelo PHP
    const resposta = await dados.json();
    console.log(resposta);
}
