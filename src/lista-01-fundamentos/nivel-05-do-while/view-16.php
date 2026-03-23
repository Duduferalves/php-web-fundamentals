<?php
$titulo_pagina = "Exercício 16 - Laço Pós-Testado (Do...While)";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Garantia de Execução (Do...While)</h1>

<div class="result-card">
    <h2>Relatório de Execução do Servidor:</h2>
    
    <div class="alert alert-danger">
        <h3 class="alert-title">Estado Inicial da Memória:</h3>
        <p>A condição de repetição foi definida como <strong>FALSE</strong> antes mesmo do laço começar.</p>
    </div>

    <ul class="result-list">
        <li><strong>Total de Iterações Realizadas:</strong> <?= $total_execucoes ?> vez(es)</li>
    </ul>

    <h3>Log de Auditoria:</h3>
    <ul class="result-list">
        <?php foreach ($log_auditoria as $linha): ?>
            <li><?= htmlspecialchars($linha, ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    </ul>
    
    <div style="margin-top: 20px; padding: 15px; background: #e9ecef; border-left: 4px solid var(--secondary-color); font-size: 0.95rem;">
        <strong>Conclusão Arquitetural:</strong> O bloco de código foi executado independentemente da validação, provando o comportamento do laço pós-testado.
    </div>

    <br>
    <a href="/" class="btn-back">Voltar ao Painel</a>
</div>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>