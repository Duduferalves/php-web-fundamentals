<?php
$titulo_pagina = "Exercício 09 - Laço FOR";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Contagem Determinística</h1>

<div class="result-card">
    <h2>Sequência Gerada (1 a <?= $limite_contagem ?>):</h2>
    <ul class="result-list">
        <?php 
        // A sintaxe com dois pontos (:) é obrigatória em Views para manter o HTML limpo,
        // evitando a poluição visual das chaves { }.
        for ($i = 1; $i <= $limite_contagem; $i++): 
        ?>
            <li>Número da iteração: <strong><?= $i ?></strong></li>
        <?php endfor; ?>
    </ul>
    
    <a href="/" class="btn-back">Voltar ao Painel</a>
</div>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>