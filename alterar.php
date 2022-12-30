<?php
include_once('conn.php');

$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);

// $result = mysqli_query($conn, "INSERT INTO `cadastro` (`nome`, `email`, `telefone`, `sexo`) VALUES ('".$nome."', '".$email."', '".$telefone."', ".$sexo.");");
if(empty($dados['id'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>
        Erro! Tente mais Tarde.</div>"];
} elseif(empty($dados['nome'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>
        Erro! Necessário preencher o seu Nome.</div>"];
} elseif (empty($dados['email'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>
        Erro! Necessário preencher o seu E-mail.</div>"];
} elseif (empty($dados['telefone'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>
        Erro! Necessário preencher o seu Telefone.</div>"];
} else {
    // UPDATE `cadastro` SET `nome` = 'Rafaela Souza' WHERE `cadastro`.`id` = 3; não altera o sexo por ser uma chave estrangeira

    $sql= "UPDATE cadastro SET nome = :nome, email = :email, telefone = :telefone, sexo = :sexo  WHERE cadastro.id = :id; ";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $dados['nome']);
    $stmt->bindParam(':email', $dados['email']);
    $stmt->bindParam(':telefone', $dados['telefone']);
    $stmt->bindParam(':sexo', $dados['editgridRadios']);
    $stmt->bindParam(':id', $dados['id']);
    $stmt->execute();
    if($stmt->rowCount()){
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-info' role='alert'>
        Dados do usuario alterados com sucesso!</div>"];
    }else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>
        Erro dados não alterados!</div>"];
    }
};

echo json_encode($retorna);

?>