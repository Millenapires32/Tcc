<?php

    // Obter conexão com o banco de dados
    include('../../conexao/conn.php');

    // Obter os dados enviados do formulário via $_REQUEST
    $requestData = $_REQUEST;

    // Verificação de campos obrigatórios do formulário
    if(empty($requestData['Titulo, Data, Descricao'])) {
        // Caso a variável venha vazia do formulário, retornar um erro
        $dados = array(
            "tipo" => 'error',
            "mensagem" => 'Existe(m) campo(s) obrigatório(s) não preenchido(s).'
        );
    } else {
        // Caso os campos obrigatórios venha, preenchidos iremos realizar o cadastro
        $idNoticias = isset($requestData['idNoticias']) ? $requestData['idNoticias'] : '';
        $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : '';

        // Verificação para cadastro ou atualização de registro
        if($operacao == 'insert') {
            // Comandos para INSERT no banco de dados ocorrerem
            try{
                $stmt = $pdo->prepare('INSERT INTO Noticia (Titulo, Data, Descricao) VALUES (:a, :b, :c)');
                $stmt->execute(array(
                    ':a' => utf8_decode($requestData['Titulo'],
                    ':b' => utf8_decode($requestData['Data'],
                    ':c' => utf8_decode($requestData['Descricao'])
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
                $stmt = $pdo->prepare('UPDATE Noticia SET Titulo, Data, Descricao = :a, :b, :c WHERE idNoticias = :idNoticias');
                $stmt->execute(array(
                    ':idNoticas' => $ID,
                    ':a' => utf8_decode($requestData['Titulo'],
                    ':b' => utf8_decode($requestData['Data'],
                    ':c' => utf8_decode($requestData['Descricao'])
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