<?php
include("../../conexao/conn.php");

$idNoticias = $_REQUEST['idNoticias'];

$sql = "SELECT * FROM Noticia WHERE idNoticias = $ID";
$resultado = $pdo->query($sql);

if($resultado) {
  $result = array();
  while($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
    $dados = array_map('utf8_encode', $row);
  }
  $dados = array(
    'tipo' => 'success',
    'mensagem' => '',
    'dados' => $dados
  );
} else {
  $dados = array(
    'tipo' => 'error',
    'mensagem' => 'Não foi possivel obter o registro solicitado!',
    'dados' => array()
  );
}

echo json_encode($dados);