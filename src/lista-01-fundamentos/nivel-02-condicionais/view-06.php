<?php
$titulo_pagina = "Exercício 06 - Análise de Sinal Numérico";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Classificador Numérico</h1>

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
            <label for="numero" class="form-label">Digite um número qualquer:</label>
            <input type="number" id="numero" name="numero" class="form-input" required step="any">
        </div>
        
        <button type="submit" class="btn-primary">Analisar Sinal</button>
    </form>

<?php else: ?>

    <div class="result-card">
        <h2>Resultado da Análise:</h2>
        <ul class="result-list">
            <li><strong>Número informado:</strong> <?= number_format($numero, 2, ',', '.') ?></li>
            <li><strong>Classificação Matemática:</strong> <span style="font-weight: bold; color: var(--secondary-color);"><?= $classificacao ?></span></li>
        </ul>
        <a href="" class="btn-back">Analisar Novo Número</a>
    </div>

<?php endif; ?>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>