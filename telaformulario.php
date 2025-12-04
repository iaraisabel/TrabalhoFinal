<?php
session_start();
include('navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Bootstrap 5 Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100">
                    </div>
                    <div class="card shadow-lg">
                <div class="card-body p-5">
    <h1 class="fs-4 card-title fw-bold mb-4">Cadastro</h1>

    <!-- Mensagem de cadastro início -->
    <?php 
        if(isset($_SESSION['mensagem'])):
    ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?= $_SESSION['mensagem']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php 
        unset($_SESSION['mensagem']);
        endif;
    ?>

   <div class="container mt-3">
    <form action="formulario.php" method="POST">
        <div class="row g-3">

            <!-- Nome Completo -->
            <div class="col-md-6">
                <label class="form-label">Nome Completo</label>
                <input type="text" class="form-control" name="nome" required>
            </div>

            <!-- Data de Nascimento -->
            <div class="col-md-6">
                <label class="form-label">Data Nascimento</label>
                <input type="date" class="form-control" name="nascimento" required>
            </div>

            <!-- Rua -->
            <div class="col-md-6">
                <label class="form-label">Rua</label>
                <input type="text" class="form-control" name="rua" required>
            </div>

            <!-- Número -->
            <div class="col-md-6">
                <label class="form-label">Número</label>
                <input type="text" class="form-control" name="numero" required>
            </div>

            <!-- Bairro -->
            <div class="col-md-6">
                <label class="form-label">Bairro</label>
                <input type="text" class="form-control" name="bairro" required>
            </div>

            <!-- CEP -->
            <div class="col-md-6">
                <label class="form-label">CEP</label>
                <input type="text" class="form-control" name="cep" required>
            </div>

            <!-- Nome responsável -->
            <div class="col-md-6">
                <label class="form-label">Nome do Responsável</label>
                <input type="text" class="form-control" name="responsavel" required>
            </div>

            <!-- Tipo de responsável -->
            <div class="col-md-6">
                <label class="form-label">Tipo de Responsável</label>
                <select class="form-select" name="tipo_responsavel" required>
                    <option selected disabled value="">Selecione...</option>
                    <option>Mãe</option>
                    <option>Pai</option>
                    <option>Avô/Avó</option>
                    <option>Tio/Tia</option>
                    <option>Outro</option>
                </select>
            </div>

            <!-- Curso -->
            <div class="col-md-6">
                <label class="form-label">Curso</label>
                <select class="form-select" name="curso" required>
                    <option selected disabled value="">Selecione o curso</option>
                    <option>Desenvolvimento de Sistemas</option>
                    <option>Enfermagem</option>
                    <option>Informática</option>
                    <option>Administração</option>
                </select>
            </div>
             <div class="col-md-6 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </div>
            </div>
            </div>
    </form>
</div>
