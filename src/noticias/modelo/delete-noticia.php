<?php
include('../../conexao/conn.php');
$ID = $_REQUEST['idNoticia'];
$sql = "DELETE FROM Noticia WHERE ID = $ID";

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