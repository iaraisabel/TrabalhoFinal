<?php
session_start();
include('conexao.php'); // arquivo de conexão com o banco

// Verifica se os campos foram enviados
if (empty($_POST['nome']) || empty($_POST['nascimento']) || empty($_POST['rua']) || empty($_POST['numero']) || empty($_POST['bairro']) 
    || empty($_POST['cep']) || empty($_POST['responsavel']) || empty($_POST['tipo_responsavel']) || empty($_POST['curso'])) {
    $_SESSION['mensagem'] = "Preencha todos os campos!";
    header('Location: telaformulario.php'); // sua página de cadastro
    exit();
}

$nome  = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$nascimento = mysqli_real_escape_string($conexao, trim($_POST['nascimento']));
$rua = mysqli_real_escape_string($conexao, trim($_POST['rua']));
$numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
$bairro = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
$responsavel = mysqli_real_escape_string($conexao, trim($_POST['responsavel']));
$tipo_responsavel = mysqli_real_escape_string($conexao, trim($_POST['tipo_responsavel']));
$curso = mysqli_real_escape_string($conexao, trim($_POST['curso']));

// Insere o novo usuário
$sql = "INSERT INTO cad_aluno (nome_completo, data_nasc, end_rua, end_num, end_bairro, end_cep, resp_nome, resp_tipo, curso_nome) 
VALUES ('$nome', '$nascimento', '$rua', '$numero', '$bairro', '$cep', '$responsavel', '$tipo_responsavel', '$curso')";

if (mysqli_query($conexao, $sql)) {
    $_SESSION['mensagem'] = "Cadastro realizado com sucesso! Faça login.";
    header('Location: consulta.php'); // redireciona para o login
    exit();
} else {
    $_SESSION['mensagem'] = "Erro ao cadastrar: " . mysqli_error($conexao);
    header('Location: telaformulario.php');
    exit();
}
?>