<?php
include('../../conexao/conn.php');
$ID = $_REQUEST['ID'];
$sql = "DELETE FROM NOTICIA WHERE ID = $ID";

$resultado = $pdo->query($sql);

if($resultado) {
  $dados = array(
    'tipo' => 'success',
    'mensagem' => 'Noticia excluida.'
  );
} else {
  $dados = array(
    'tipo' => 'error',
    'mensagem' => 'OPS... Não foi possivel exluir esta noticia. Tente mais tarde.'
  );
}

echo json_encode($dados);