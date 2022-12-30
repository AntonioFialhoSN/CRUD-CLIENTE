<?php
include_once "conn.php";

$pagina = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
// diferente de vazia
if(!empty($pagina)) {
    // calcular pagina
    $qnt_result_pg = 10;
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    $query_usuarios = "SELECT cadastro.id, nome, telefone, email, n_sexo From `cadastro` INNER JOIN `sexo` ON cadastro.sexo = sexo.id ORDER by cadastro.id DESC LIMIT $inicio, $qnt_result_pg;";

    $grid_usuarios = $conn->prepare($query_usuarios);
    $grid_usuarios->execute();


    $dados = "<div class='table-responsive'>
                <table class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>EMAIL</th>
                            <th>TELEFONE</th>
                            <th>GÊNERO</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>";
    while ($row_usuario = $grid_usuarios ->fetch(PDO::FETCH_ASSOC)){
        // var_dump($row_usuario);
        extract($row_usuario);
        // echo"<td>".$row_usuario['id']."<br></td>"; 
        // ao dar extract não precisso desse formato 
        $dados .= "<tr><td>$id</td>
                    <td>$nome</td>
                    <td>$email</td>
                    <td>$telefone</td>
                    <td>$n_sexo</td>
                    <td>    
                    
                    <button id='$id' class='btn btn-outline-primary btn-sm' onclick='visUsuario($id)' > Visualizar </button>

                    <button id='$id' class='btn btn-outline-warning btn-sm' onclick='editUsuario($id)' > Alterar </button>

                    <button id='$id' class='btn btn-outline-danger btn-sm' onclick='deleteUsuario($id)' > Apagar </button>
                    </td>
                    </tr>";

                    
        // echo "<br><td>$id</td> - <span>";
        // echo "<td>$nome</td> - <span>";
        // echo "<td>$email</td> - <span>";
        // echo "<td>$telefone</td> - <span>";
        // echo "<td>$sexo</td><span>  <br>"; // só teste
    }

    $dados .= "</tbody>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th>TELEFONE</th>
                        <th>GÊNERO</th>
                        <th>#</th>
                    </tr>
                </thead>
            </table>
        </div>";
        //paginação - somar quantidaded de usuarios
    $query_pg = "SELECT COUNT(id) as num_result from `cadastro`";
    $result_pg = $conn->prepare($query_pg);
    $result_pg->execute();
    $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

    // quantidade de pagina
    $quantidade_pg = ceil($row_pg['num_result']/ $qnt_result_pg);
    $max_links = 2;


    $dados .= '<nav aria-label="Page navigation example">
     <ul class="pagination justify-content-center">';

    $dados .=  "<li class='page-item'>
         <a class='page-link' href='#' onclick='listusuarios(1)'> Primeira </a>
       </li>";
    for($pag_an = $pagina - $max_links; $pag_an <= $pagina - 1;$pag_an++){
        if($pag_an >= 1){
            $dados .= "<li class='page-item'><a class='page-link' onclick='listusuarios($pag_an)' href='#'>$pag_an</a></li>";
        };
    };

    $dados .= "<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

    for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
        if($pag_dep<=$quantidade_pg){
            $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listusuarios($pag_dep)'>$pag_dep</a></li>";
        };
    };

    $dados .="<li class='page-item'>
         <a class='page-link' href='#' onclick='listusuarios($quantidade_pg)'> Ultima</a>
       </li>
     </ul>
   </nav>";

    echo $dados; 
} else {
 echo "<div class='alert alert-danger' role='aler'>
 A pagina não foi encontrada!
</div>";
};



