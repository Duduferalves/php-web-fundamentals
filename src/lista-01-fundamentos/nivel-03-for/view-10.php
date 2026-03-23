<?php
$titulo_pagina = "Exercício 10 - Laço FOR (Regressivo)";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Contagem Regressiva</h1>

<div class="result-card">
    <h2>Sequência Gerada (<?= $inicio_contagem ?> a <?= $fim_contagem ?>):</h2>
    <ul class="result-list">
        <?php 
        // A lógica do decremento ($i--) é o motor térmico deste bloco.
        for ($i = $inicio_contagem; $i >= $fim_contagem; $i--): 
        ?>
            <li>Status do contador: <strong style="color: var(--secondary-color);"><?= $i ?></strong></li>
        <?php endfor; ?>
    </ul>
    
    <a href="/" class="btn-back">Voltar ao Painel</a>
</div>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>