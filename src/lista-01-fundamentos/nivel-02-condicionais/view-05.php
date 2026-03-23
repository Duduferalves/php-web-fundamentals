<?php
$titulo_pagina = "Exercício 05 - Verificação de Maioridade";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Controle de Acesso por Idade</h1>

<?php if (!empty($erros)): ?>
    <div class="alert alert-danger">
        <h3 class="alert-title">Erro de Validação:</h3>
        <ul class="alert-list">
            <?php foreach ($erros as $erro): ?>
                <li><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if (!$exibir_resultado): ?>

    <form action="" method="POST" class="form-container">
        <div class="form-group">
            <label for="idade" class="form-label">Informe a sua idade:</label>
            <input type="number" id="idade" name="idade" class="form-input" required min="0" max="130">
        </div>
        
        <button type="submit" class="btn-primary">Verificar Status</button>
    </form>

<?php else: ?>

    <div class="result-card">
        <h2>Resultado da Análise:</h2>
        <ul class="result-list">
            <li><strong>Idade registrada:</strong> <?= $idade ?> anos</li>
            <li><strong>Classificação Legal:</strong> 
                <span style="font-weight: bold; color: <?= $idade >= 18 ? 'var(--primary-color)' : '#d90429' ?>;">
                    <?= $status_maioridade ?>
                </span>
            </li>
        </ul>
        <a href="" class="btn-back">Fazer Nova Verificação</a>
    </div>

<?php endif; ?>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>