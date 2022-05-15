<?php

// Incluir a conexao com o BD
include_once './conexao.php';

// Receber o tipo que a senha deve ser liberada
$tipo = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_NUMBER_INT);

// Verifica se vem o tipo de senha que deve ser liberada
if (!empty($tipo)) {
    // Alterar o status da senha gerada
    $query_edit_senha = "UPDATE senhas SET sits_senha_id = 1 
                WHERE tipos_senha_id=:tipos_senha_id";

    // Preparar a QUERY
    $edit_senha = $conn->prepare($query_edit_senha);

    // Substituir o link pelo valor
    $edit_senha->bindParam(':tipos_senha_id', $tipo, PDO::PARAM_INT);

    // Executar a QUERY
    $edit_senha->execute();

    // Criar o array com a posição indicando que houve erro e a mensagem de erro
    $retorna = ['status' => true, 'msg' => "<p style='color: green;'>Liberado as senhas!</p>"];
} else {
    // Criar o array com a posição indicando que houve erro e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Tipo de senha para liberar inválido!</p>"];
}

// Retornar os dados para o JavaScript
echo json_encode($retorna);
