<?php

    // Obter conexão com o banco de dados
    include('../../conexao/conn.php');

    // Obter os dados enviados do formulário via $_REQUEST
    $requestData = $_REQUEST;

    // Verificação de campos obrigatórios do formulário
    if(empty($requestData['TITULO, DATA, DESCRICAO'])) {
        // Caso a variável venha vazia do formulário, retornar um erro
        $dados = array(
            "tipo" => 'error',
            "mensagem" => 'Existe(m) campo(s) obrigatório(s) não preenchido(s).'
        );
    } else {
        // Caso os campos obrigatórios venha, preenchidos iremos realizar o cadastro
        $ID = isset($requestData['ID']) ? $requestData['ID'] : '';
        $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : '';

        // Verificação para cadastro ou atualização de registro
        if($operacao == 'insert') {
            // Comandos para INSERT no banco de dados ocorrerem
            try{
                $stmt = $pdo->prepare('INSERT INTO NOTICIA (TITULO, DATA, DESCRICAO) VALUES (:a, :b, :c)');
                $stmt->execute(array(
                    ':a' => utf8_decode($requestData['TITULO'],
                    ':b' => utf8_decode($requestData['DATA'],
                    ':c' => utf8_decode($requestData['DESCRICAO'])
                ));
                $dados = array(
                    "tipo" => 'success',
                    "mensagem" => 'Noticia salva com sucesso'
                );
            } catch(PDOException $e) {
                $dados = array(
                    "tipo" => 'error',
                    "mensagem" => 'Não foi possível salvar a noticia:'.$e
                );
            }
        } else {
            // Se a nossa operação vir vazia então realizar um UPDATE
            try{
                $stmt = $pdo->prepare('UPDATE NOTICIA SET TITULO, DATA, DESCRICAO = :a, :b, :c WHERE ID = :id');
                $stmt->execute(array(
                    ':id' => $ID,
                    ':a' => utf8_decode($requestData['TITULO'],
                    ':b' => utf8_decode($requestData['DATA'],
                    ':c' => utf8_decode($requestData['DESCRICAO'])
                ));
                $dados = array(
                    "tipo" => 'success',
                    "mensagem" => 'Noticia atualizada com sucesso.'
                );
            } catch(PDOException $e) {
                $dados = array(
                    "tipo" => 'error',
                    "mensagem" => 'Não foi possível atualizar a noticia:'.$e
                );
            }
        }
    }

    // Converter o nosso array de retorno em uma representação de JSON
    echo json_encode($dados);