<?php
session_start();

include('navbar.php');
include('conexao.php');

$sqlTotal = $conexao->query("SELECT COUNT(*) AS total FROM cad_aluno");
$totalRegistros = $sqlTotal->fetch_assoc()['total'];

function contarCurso($conexao, $curso) {
    $sql = $conexao->query("SELECT COUNT(*) AS total FROM cad_aluno WHERE curso_nome = '$curso'");
    return $sql->fetch_assoc()['total'];
}

$totalEnfermagem = contarCurso($conexao, "Enfermagem");
$totalInfo       = contarCurso($conexao, "Informática");
$totalDS         = contarCurso($conexao, "Desenvolvimento de Sistemas");
$totalAdm        = contarCurso($conexao, "Administração");

function contarResponsavel($conexao, $tipo) {
    $sql = $conexao->query("SELECT COUNT(*) AS total FROM cad_aluno WHERE resp_tipo = '$tipo'");
    return $sql->fetch_assoc()['total'];
}

$respMae   = contarResponsavel($conexao, "mae");
$respPai   = contarResponsavel($conexao, "pai");
$respOutro = contarResponsavel($conexao, "outro");

$sqlBairros = $conexao->query("
    SELECT end_bairro AS bairro, COUNT(*) AS total 
    FROM cad_aluno 
    GROUP BY end_bairro
");

$bairros = [];
while ($row = $sqlBairros->fetch_assoc()) {
    $bairros[] = $row;
}

usort($bairros, fn($a, $b) => $b['total'] <=> $a['total']);

$bairrosTop7 = array_slice($bairros, 0, 7);

$labelsBairros = array_column($bairrosTop7, 'bairro');
$valoresBairros = array_column($bairrosTop7, 'total');

$labelsBairrosJson  = json_encode($labelsBairros);
$valoresBairrosJson = json_encode($valoresBairros);

$sqlMedia = $conexao->query("
    SELECT AVG(TIMESTAMPDIFF(YEAR, data_nasc, CURDATE())) AS media_idade
    FROM cad_aluno
");

$mediaIdade = round($sqlMedia->fetch_assoc()['media_idade'], 1);

$sqlFaixa = $conexao->query("
    SELECT
        CASE 
            WHEN TIMESTAMPDIFF(YEAR, data_nasc, CURDATE()) <= 12 THEN '0-12 anos'
            WHEN TIMESTAMPDIFF(YEAR, data_nasc, CURDATE()) BETWEEN 13 AND 17 THEN '13-17 anos'
            WHEN TIMESTAMPDIFF(YEAR, data_nasc, CURDATE()) BETWEEN 18 AND 30 THEN '18-30 anos'
            ELSE '31+ anos'
        END AS faixa,
        COUNT(*) AS total
    FROM cad_aluno
    GROUP BY faixa
    ORDER BY total DESC
");

$faixas = [];
while ($f = $sqlFaixa->fetch_assoc()) {
    $faixas[] = $f;
}

$faixaLabels = json_encode(array_column($faixas, 'faixa'));
$faixaValores = json_encode(array_column($faixas, 'total'));

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Painel</title>
</head>

<body class="bg-light">

<h1 class="text-center fw-semibold mt-3">Informações dos Alunos</h1>
<div class="container mt-4">

<div class="row justify-content-center text-center">

    <div class="col-md-2 mb-2">
        <div class="card shadow">
            <div class="card-body">
                <h5>Total de Alunos</h5>
                <h2 class="text-primary"><?= $totalRegistros ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-2 mb-2">
        <div class="card shadow">
            <div class="card-body">
                <h5>Enfermagem</h5>
                <h2 class="text-success"><?= $totalEnfermagem ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-2 mb-2">
        <div class="card shadow">
            <div class="card-body">
                <h5>Informática</h5>
                <h2 class="text-info"><?= $totalInfo ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-2 mb-2">
        <div class="card shadow">
            <div class="card-body">
                <h5>D.S</h5>
                <h2 class="text-warning"><?= $totalDS ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-2 mb-2">
        <div class="card shadow">
            <div class="card-body">
                <h5>ADM</h5>
                <h2 class="text-danger"><?= $totalAdm ?></h2>
            </div>
        </div>
    </div>

        <div class="col-md-2 mb-2">
        <div class="card shadow border-0">
            <div class="card-body">
                <h5>Média de Idade</h5>
                <h2 class="text-secondary"><?= $mediaIdade ?> anos</h2>
            </div>
        </div>
    </div>

</div>

<div class="row mt-4">

   
    <div class="col-md-6 mb-3">
        <div class="card shadow p-3">
            <h5 class="text-center">Distribuição por Curso</h5>
            <canvas id="graficoCursos"></canvas>
        </div>
    </div>

    
    <div class="col-md-6 mb-3">
        <div class="card shadow p-3">
            <h5 class="text-center">Tipos de Responsáveis</h5>
            <canvas id="graficoResponsaveis"></canvas>
        </div>
    </div>

    
    <div class="col-md-12 mb-3">
        <div class="card shadow p-3">
            <h5 class="text-center">Bairros com Mais Alunos</h5>
            <canvas id="graficoBairros"></canvas>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card shadow p-3">
            <h5 class="text-center">Distribuição por Faixa Etária</h5>
            <canvas id="graficoFaixa"></canvas>
        </div>
    </div>

</div>

<script>

new Chart(document.getElementById('graficoCursos'), {
    type: 'pie',
    data: {
        labels: ['Enfermagem', 'Informática', 'Desenvolvimento de Sistemas', 'Administração'],
        datasets: [{
            data: [<?= $totalEnfermagem ?>, <?= $totalInfo ?>, <?= $totalDS ?>, <?= $totalAdm ?>]
        }]
    }
});

new Chart(document.getElementById('graficoResponsaveis'), {
    type: 'bar',
    data: {
        labels: ['Mãe', 'Pai', 'Outro'],
        datasets: [{
            label: 'Quantidade',
            data: [<?= $respMae ?>, <?= $respPai ?>, <?= $respOutro ?>]
        }]
    }
});

new Chart(document.getElementById('graficoBairros'), {
    type: 'bar',
    data: {
        labels: <?= $labelsBairrosJson ?>,
        datasets: [{
            label: 'Alunos',
            data: <?= $valoresBairrosJson ?>,
        }]
    },
    options: { indexAxis: 'y' }
});

new Chart(document.getElementById('graficoFaixa'), {
    type: 'bar',
    data: {
        labels: <?= $faixaLabels ?>,
        datasets: [{
            label: 'Quantidade',
            data: <?= $faixaValores ?>,
        }]
    },
    options: { scales: { y: { beginAtZero: true } } }
});
</script>

</body>
</html>
