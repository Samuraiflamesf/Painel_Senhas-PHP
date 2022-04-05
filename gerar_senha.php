<?php
// Recebe o tipo que a senha deve ser gerada
$tipo = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_NUMBER_INT);

// Verifica se vem o tipo de senha que deve ser gerada
if(!empty($tipo)){

    $retorno = ['status' => false, 'msg' => "<p style='color: #green;'>Senha gerada!</p>"];
}else{
    // Criar o arry com a posição indicando que houve erro e a mensagem de erro
    $retorno = ['status' => true, 'msg' => "<p style='color: #f00;'>Erro: Senha não gerada!</p>"];
}

//Retorna os dados para Js
echo json_encode($retorno);