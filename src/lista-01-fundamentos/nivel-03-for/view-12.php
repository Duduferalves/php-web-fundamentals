<?php
$titulo_pagina = "Exercício 12 - Acumulador Matemático";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Processamento de Soma em Lote</h1>

<div class="result-card">
    <h2>Resultado do Acumulador (1 a <?= $limite ?>):</h2>
    <ul class="result-list">
        <li><strong>Valor Final Calculado:</strong> 
            <span style="color: var(--primary-color); font-weight: bold; font-size: 1.5rem;">
                <?= number_format($soma_total, 0, ',', '.') ?>
            </span>
        </li>
    </ul>
    
    <div style="margin-top: 20px; padding: 15px; background: #e9ecef; border-left: 4px solid var(--secondary-color); font-size: 0.95rem;">
        <strong>Log do Sistema:</strong> O processamento ocorreu integralmente no Controlador. A View apenas renderizou o escalar final.
    </div>

    <br>
    <a href="/" class="btn-back">Voltar ao Painel</a>
</div>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>