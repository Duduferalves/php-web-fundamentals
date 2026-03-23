<?php
$titulo_pagina = "Desafio 24 - Busca de Extremos";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Análise de Pico de Dados</h1>

<div class="result-card">
    <h2>Resultados da Varredura:</h2>
    
    <ul class="result-list">
        <li><strong>Amostras Analisadas:</strong> [ <?= implode(' ; ', $amostras) ?> ]</li>
        
        <?php if ($maior_numero !== null): ?>
            <li style="margin-top: 15px; padding-top: 15px; border-top: 1px solid var(--border-color);">
                <strong>Maior Valor Detectado:</strong> 
                <span style="color: var(--primary-color); font-weight: bold; font-size: 1.5rem;">
                    <?= number_format($maior_numero, 1, ',', '.') ?>
                </span>
            </li>
        <?php else: ?>
            <li><em>A coleção de dados está vazia. Impossível calcular extremos.</em></li>
        <?php endif; ?>
    </ul>

    <a href="/" class="btn-back">Voltar ao Painel</a>
</div>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>