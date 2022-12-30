<?php
// include_once "conn.php";

?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>CRUD - PHP FETCH</title>
</head>
<body>
    <div class="container">
        <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-itens-center">
                <div>
                    <h2>Lista de Usuários</h2>
                </div>
                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cadUsuarioModal">
                    Cadastrar
                    </button>
                </div>
            </div>
        </div>
        <hr>
        <span id ="msgAlert2"></span>
        <div class="row">
            <div class="col-lg-12">
                <span class="listar_usuarios"></span>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cadUsuarioModal" tabindex="-1" aria-labelledby="cadUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cadUsuarioModalLabel">Cadastrar Usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="cad-usuario-form">
                        <span id ="msgAlert"></span>
                        <div class="mb-3">
                            <label for="nome" class="col-form-label">Nome
                            :</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome" >
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">E-mail :</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email" >
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="col-form-label">Telefone:</label>
                            <input type="tel" class="form-control" name="telefone" placeholder=" Digite seu telefone" id="telefone" >
                        </div>

                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Gênero</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                    Masculino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="2">
                                    <label class="form-check-label" for="gridRadios2">
                                    Feminino
                                    </label>
                                </div>
                                <div class="form-check disabled">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="3">
                                    <label class="form-check-label" for="gridRadios3">
                                    Outros
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar </button>
                            <input type="submit" class="btn btn-outline-success" id="cad-usuario-btn" value="Cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="visUsuarioModal" tabindex="-1" aria-labelledby="visUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="visUsuarioModalLabel">Detalhes do Usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id ="msgAlertErroVis"></span>
                    <dl class="row">
                        <dt class="col-sm-3">ID: </dt>
                        <dd class="col-sm-9"><span id="idusuario"></span></dd>
                        <dt class="col-sm-3">Nome: </dt>
                        <dd class="col-sm-9"><span id="nomeusuario"></span></dd></dd>
                        <dt class="col-sm-3">Email: </dt>
                        <dd class="col-sm-9"><span id="emailusuario"></span></dd></dd>
                        <dt class="col-sm-3">Telefone: </dt>
                        <dd class="col-sm-9"><span id="telusuario"></span></dd></dd>
                        <dt class="col-sm-3">Gênero: </dt>
                        <dd class="col-sm-9"><span id="sexusuario"></span></dd></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edUsuarioModal" tabindex="-1" aria-labelledby="edUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edUsuarioModalLabel">Editar Usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="ed-usuario-form">
                        <span id ="msgAlertedit"></span>
                            <input type="hidden" name="id" id="editid">
                        <div class="mb-3">
                            <label for="nome" class="col-form-label">Nome
                            :</label>
                            <input type="text" class="form-control" name="nome" id="editnome" placeholder="Digite seu nome" >
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">E-mail :</label>
                            <input type="email" class="form-control" name="email" id="editemail" placeholder="Digite seu email">
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="col-form-label">Telefone:</label>
                            <input type="tel" class="form-control" name="telefone" placeholder=" Digite seu telefone" id="edittelefone">
                        </div>

                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Gênero</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="editgridRadios" id="gridRadios1" value="1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                    Masculino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="editgridRadios" id="gridRadios2" value="2">
                                    <label class="form-check-label" for="gridRadios2">
                                    Feminino
                                    </label>
                                </div>
                                <div class="form-check disabled">
                                    <input class="form-check-input" type="radio" name="editgridRadios" id="gridRadios3" value="3">
                                    <label class="form-check-label" for="gridRadios3">
                                    Outros
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar </button>
                            <input type="submit" class="btn btn-outline-warning" id="ed-usuario-btn" value="Salvar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>
</body>
</html>