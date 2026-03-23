<?php
$titulo_pagina = "Exercício 03 - Conversão de Temperatura";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Conversor: Celsius para Fahrenheit</h1>

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
            <label for="celsius" class="form-label">Temperatura em Celsius (°C):</label>
            <input type="number" id="celsius" name="celsius" class="form-input" required step="any">
        </div>
        
        <button type="submit" class="btn-primary">Converter Temperatura</button>
    </form>

<?php else: ?>

    <div class="result-card">
        <h2>Resultado da Conversão:</h2>
        <ul class="result-list">
            <li><strong>Temperatura informada:</strong> <?= number_format($celsius, 1, ',', '.') ?> °C</li>
            <li><strong>Equivalente em Fahrenheit:</strong> <?= number_format($fahrenheit, 1, ',', '.') ?> °F</li>
        </ul>
        <a href="" class="btn-back">Fazer Nova Conversão</a>
    </div>

<?php endif; ?>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>