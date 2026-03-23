<?php
$titulo_pagina = "Exercício 15 - Simulação de Validação";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Validador Condicional (While)</h1>

<div class="result-card">
    <h2>Log de Auditoria de Acesso:</h2>
    
    <ul class="result-list" style="font-family: monospace;"> <?php foreach ($log_execucao as $linha): ?>
            <li><?= htmlspecialchars($linha, ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    </ul>

    <div class="alert <?= $acesso_concedido ? 'alert-success' : 'alert-danger' ?>">
        <h3 class="alert-title">Status Final da Simulação:</h3>
        <p><?= $acesso_concedido ? 'O laço foi interrompido porque a condição de sucesso foi alcançada.' : 'O laço encerrou por esgotamento de tentativas. Acesso bloqueado.' ?></p>
    </div>

    <a href="/" class="btn-back">Voltar ao Painel</a>
</div>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>