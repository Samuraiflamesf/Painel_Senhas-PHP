<?php

// Incluir a conexao com o BD
include_once './conexao.php';

// Alterar o status da senha gerada
$query_edit_senha = "UPDATE senhas SET sits_senha_id = 1";

// Preparar a QUERY
$edit_senha = $conn->prepare($query_edit_senha);

// Executar a QUERY
$edit_senha->execute();

// Criar o array com a posição indicando que houve erro e a mensagem de erro
$retorna = ['status' => true, 'msg' => "<p style='color: green;'>Liberado todas as senhas!</p>"];

// Retornar os dados para o JavaScript
echo json_encode($retorna);
