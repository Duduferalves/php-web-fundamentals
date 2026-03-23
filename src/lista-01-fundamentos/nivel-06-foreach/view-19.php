<?php
$titulo_pagina = "Exercício 19 - Agregação de Array";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Somatório de Coleção Numérica</h1>

<div class="result-card">
    <h2>Dados Processados no Servidor:</h2>
    
    <ul class="result-list">
        <li><strong>Conjunto de Dados (Array):</strong> [ <?= implode(', ', $numeros) ?> ]</li>
        <li><strong>Total Acumulado:</strong> 
            <span style="color: var(--primary-color); font-weight: bold; font-size: 1.2rem;">
                <?= number_format($soma_total, 2, ',', '.') ?>
            </span>
        </li>
    </ul>

    <div class="alert alert-success">
        <h3 class="alert-title">Log do Iterador:</h3>
        <p>O laço <code>foreach</code> percorreu os <?= count($numeros) ?> índices do array com sucesso para consolidar o valor.</p>
    </div>

    <a href="/" class="btn-back">Voltar ao Painel</a>
</div>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>