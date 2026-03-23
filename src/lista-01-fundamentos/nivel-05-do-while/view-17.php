<?php
$titulo_pagina = "Exercício 17 - Simulação de Menu (Do...While)";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Processamento de Menu Interativo</h1>

<div class="result-card">
    <h2>Log de Roteamento do Servidor:</h2>
    
    <div class="alert alert-success">
        <h3 class="alert-title">Buffer Analisado</h3>
        <p>O sistema processou a fila de comandos perfeitamente até encontrar a instrução de saída.</p>
    </div>

    <ul class="result-list">
        <?php foreach ($log_execucao as $linha): ?>
            <li><?= htmlspecialchars($linha, ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    </ul>

    <a href="/" class="btn-back">Voltar ao Painel</a>
</div>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>