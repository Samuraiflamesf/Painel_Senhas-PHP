<?php

// Incluir a conexao com o BD
include_once './conexao.php';

// Receber o tipo que a senha deve ser chamada
$tipo = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_NUMBER_INT);

// Verifica se vem o tipo de senha que deve ser chamada
if (!empty($tipo)) {
    
    // Recuperar a senha gerada que esta salva na tabela "senhas_geradas"
    // Recuperar conforme o tipo recebido pela URL
    $query_ssenha_gerada = "SELECT senger.id id_senha_gerada,
        sen.nome_senha
        FROM senhas_geradas AS senger
        INNER JOIN senhas AS sen ON sen.id=senger.senha_id
        WHERE senger.sits_senha_id = 2
        AND sen.tipos_senha_id=:tipos_senha_id
        ORDER BY senger.id ASC 
        LIMIT 1";
    // Preparar a QUERY
    $result_senha_gerada = $conn->prepare(($query_ssenha_gerada));

    // Substituir link pelo valor
    $result_senha_gerada->bindParam(':tipos_senha_id', $tipo, PDO::PARAM_INT);

    //Execultar a QUERY
    $result_senha_gerada->execute();

    //Verificar se Encontrou algum registro no BD
    if(($result_senha_gerada) and ($result_senha_gerada->rowCount() !=0)){
        // Ler as informações retornada do banco de dados
        $row_senha_gerada = $result_senha_gerada->fetch((PDO::FETCH_ASSOC));

        // Extrair para imprimir atraves da chave do array
        extract($row_senha_gerada);

        // Alterar o status da senha gerada
        $query_edit_senha_gerada = "UPDATE senhas_geradas 
                SET sits_senha_id = 4, modified = NOW()
                WHERE id=$id_senha_gerada";

        //Preparar a QUERY
        $edit_senha_gerada = $conn->prepare($query_edit_senha_gerada);

        //Execultar a QUERY
        $edit_senha_gerada->execute();



        // Não houve não erro e a mensagem com senha
        $retorna = ['status' => true, 'msg' => "<p style='color: #000;'>Senha chamada: $nome_senha</p>",
    "id_senha_gerada"=>$id_senha_gerada];
    } else {

        // Criar o array com a posição indicando que houve erro e a mensagem de erro
        $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Tipo de senha não encontrada!</p>"];
    }

} else {

  // Criar o array com a posição indicando que houve erro e a mensagem de erro
  $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Senha não chamada!</p>"];
}

// Retornar os dados para o JavaScript
echo json_encode($retorna);
?>