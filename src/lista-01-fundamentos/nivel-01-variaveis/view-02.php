<?php
$titulo_pagina = "Exercício 02 - Operações Matemáticas";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Calculadora de Operações Básicas</h1>

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
            <label for="numero1" class="form-label">Primeiro Número (Dividendo):</label>
            <input type="number" id="numero1" name="numero1" class="form-input" required step="any">
        </div>
        
        <div class="form-group">
            <label for="numero2" class="form-label">Segundo Número (Divisor):</label>
            <input type="number" id="numero2" name="numero2" class="form-input" required step="any">
        </div>
        
        <button type="submit" class="btn-primary">Calcular Operações</button>
    </form>

<?php else: ?>

    <div class="result-card">
        <h2>Resultados do Processamento:</h2>
        <ul class="result-list">
            <li><strong>Soma:</strong> <?= number_format($numero1, 2, ',', '.') ?> + <?= number_format($numero2, 2, ',', '.') ?> = <strong><?= number_format($soma, 2, ',', '.') ?></strong></li>
            <li><strong>Subtração:</strong> <?= number_format($numero1, 2, ',', '.') ?> - <?= number_format($numero2, 2, ',', '.') ?> = <strong><?= number_format($subtracao, 2, ',', '.') ?></strong></li>
            <li><strong>Multiplicação:</strong> <?= number_format($numero1, 2, ',', '.') ?> * <?= number_format($numero2, 2, ',', '.') ?> = <strong><?= number_format($multiplicacao, 2, ',', '.') ?></strong></li>
            <li><strong>Divisão:</strong> <?= number_format($numero1, 2, ',', '.') ?> / <?= number_format($numero2, 2, ',', '.') ?> = <strong><?= number_format($divisao, 2, ',', '.') ?></strong></li>
        </ul>
        <a href="" class="btn-back">Realizar Novo Cálculo</a>
    </div>

<?php endif; ?>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>