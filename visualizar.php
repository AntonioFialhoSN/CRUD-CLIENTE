<?php
include_once "conn.php";

$id= filter_input(INPUT_GET,"id", FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {

    $query_usuario = "SELECT cadastro.id, nome, telefone, email, n_sexo From `cadastro` INNER JOIN `sexo` ON cadastro.sexo = sexo.id WHERE cadastro.id = :id LIMIT 1";
    $stmt = $conn ->prepare($query_usuario);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $registro = $stmt->fetch(PDO::FETCH_ASSOC);

    $retorna = ['erro' => false, 'dados' => $registro ];

}else{
    // variavel recebendo array , onde o 1 erro, 2 msg para isso usa json encode 
   $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>
    Nenhum usuário foi encontrada!
    </div>"];
}

echo json_encode($retorna);

