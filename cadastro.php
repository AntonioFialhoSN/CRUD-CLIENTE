<?php
include_once('conn.php');

$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);

// $result = mysqli_query($conn, "INSERT INTO `cadastro` (`nome`, `email`, `telefone`, `sexo`) VALUES ('".$nome."', '".$email."', '".$telefone."', ".$sexo.");");

if(empty($dados['nome'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>
        Erro! Necessário preencher o seu Nome.
    </div>"];
} elseif (empty($dados['email'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>
        Erro! Necessário preencher o seu E-mail.
    </div>"];
} elseif (empty($dados['telefone'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>
        Erro! Necessário preencher o seu Telefone.
    </div>"];
} else {
    $sql= "INSERT INTO `cadastro` (nome, email, telefone, sexo) VALUES (:nome, :email, :telefone, :sexo);";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $dados['nome']);
    $stmt->bindParam(':email', $dados['email']);
    $stmt->bindParam(':telefone', $dados['telefone']);
    $stmt->bindParam(':sexo', $dados['gridRadios']);

    $stmt->execute();

    if($stmt->rowCount()){
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-info' role='alert'>
        Usuario cadastrado com sucesso!
    </div>"];
    }else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>
        Erro usuario não cadastrado!
    </div>"];
    }
};
echo json_encode($retorna);

?>