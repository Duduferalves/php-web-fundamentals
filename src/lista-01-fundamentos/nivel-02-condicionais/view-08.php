<?php
$titulo_pagina = "Exercício 08 - Calculadora de Roteamento";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Calculadora Simples</h1>

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
            <label for="numero1" class="form-label">Primeiro Número:</label>
            <input type="number" id="numero1" name="numero1" class="form-input" required step="any">
        </div>
        
        <div class="form-group">
            <label for="operacao" class="form-label">Operação:</label>
            <select id="operacao" name="operacao" class="form-input" required>
                <option value="">Selecione...</option>
                <option value="+">Soma (+)</option>
                <option value="-">Subtração (-)</option>
                <option value="*">Multiplicação (*)</option>
                <option value="/">Divisão (/)</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="numero2" class="form-label">Segundo Número:</label>
            <input type="number" id="numero2" name="numero2" class="form-input" required step="any">
        </div>
        
        <button type="submit" class="btn-primary">Calcular Resultado</button>
    </form>

<?php else: ?>

    <div class="result-card">
        <h2>Processamento Concluído:</h2>
        <ul class="result-list">
            <li><strong>Cálculo Realizado:</strong> 
                <?= number_format($numero1, 2, ',', '.') ?> 
                <strong><?= htmlspecialchars($operacao, ENT_QUOTES, 'UTF-8') ?></strong> 
                <?= number_format($numero2, 2, ',', '.') ?>
            </li>
            <li><strong>Resultado Final:</strong> <span style="color: var(--primary-color); font-weight: bold; font-size: 1.2rem;"><?= number_format($resultado, 2, ',', '.') ?></span></li>
        </ul>
        <a href="" class="btn-back">Fazer Novo Cálculo</a>
    </div>

<?php endif; ?>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>