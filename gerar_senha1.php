<?php

//Incluir a conexao com o BD
include_once './conexao.php';

// Recebe o tipo que a senha deve ser gerada
$tipo = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_NUMBER_INT);

// Verifica se vem o tipo de senha que deve ser gerada
if(!empty($tipo)){
// Criar a QUERY para recuperar os registros do BD
    $query_senha = "SELECT id, nome_senha 
                    FROM senhas
                    WHERE sits_senha_id=:sits_senha_id
                    AND tipos_senha_id=:tipos_senha_id
                    ORDER BY id ASC 
                    LIMIT 1";

    // Preparar a QUERY
    $result_senha = $conn->prepare($query_senha);
    
    // Substituir o link pelo valor
    $result_senha->bindValue(':sits_senha_id', 1, PDO::PARAM_INT);
    $result_senha->bindParam(':tipos_senha_id', $tipo, PDO::PARAM_INT);

    // Executar a QUERY
    $result_senha->execute();

    //Verificar se encontrou alguma senha no bd
    if(($result_senha) and ($result_senha->rowCount() != 0)){

        $retorno = ['status' => false, 'msg' => "<p style='color: #00ff ;'>Senha criada!</p>"];
    
    }else{
        $retorno = ['status' => true, 'msg' => "<p style='color: #f00;'>Erro: Senha esgotadas</p>"];   
    }

}else{
    // Criar o arry com a posição indicando que houve erro e a mensagem de erro
    $retorno = ['status' => true, 'msg' => "<p style='color: #f00;'>Erro: Senha não gerada!</p>"];
}

//Retorna os dados para Js
echo json_encode($retorno);