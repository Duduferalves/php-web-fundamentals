<?php
$titulo_pagina = "Desafio 22 - Filtro de Paridade";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Processamento de Números Pares</h1>

<div class="result-card">
    <h2>Coleção Gerada (1 a <?= $limite ?>):</h2>
    
    <div class="alert alert-danger">
        <h3 class="alert-title">Métricas de Processamento:</h3>
        <p>Para encontrar <?= count($numeros_pares) ?> números pares, o motor do PHP foi forçado a realizar <strong><?= $total_iteracoes_motor ?> ciclos completos</strong> de repetição e avaliação condicional.</p>
    </div>

    <ul class="result-list" style="display: flex; flex-wrap: wrap; gap: 10px; list-style: none; padding: 0;">
        <?php foreach ($numeros_pares as $numero): ?>
            <li style="background: var(--primary-color); color: white; padding: 5px 10px; border-radius: 4px; font-weight: bold;">
                <?= $numero ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <br>
    <a href="/" class="btn-back">Voltar ao Painel</a>
</div>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>