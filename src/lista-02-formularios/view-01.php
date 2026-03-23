<?php
$titulo_pagina = "Lista 2 - Exercício 01 (Calculadora)";
require_once dirname(__DIR__, 1) . '/templates/header.php';
?>

<h1>Calculadora Aritmética</h1>

<?php if (!empty($erros)): ?>
    <div class="alert alert-danger">
        <h3 class="alert-title">Atenção:</h3>
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
            <label for="num1" class="form-label">Primeiro Valor:</label>
            <input type="number" id="num1" name="num1" class="form-input" required step="any" value="<?= $num1 ?>">
        </div>

        <div class="form-group">
            <label for="operacao" class="form-label">Operação Desejada:</label>
            <select id="operacao" name="operacao" class="form-input" required>
                <option value="">Selecione...</option>
                <option value="soma" <?= $operacao === 'soma' ? 'selected' : '' ?>>Soma (+)</option>
                <option value="subtracao" <?= $operacao === 'subtracao' ? 'selected' : '' ?>>Subtração (-)</option>
                <option value="multiplicacao" <?= $operacao === 'multiplicacao' ? 'selected' : '' ?>>Multiplicação (*)</option>
                <option value="divisao" <?= $operacao === 'divisao' ? 'selected' : '' ?>>Divisão (/)</option>
            </select>
        </div>

        <div class="form-group">
            <label for="num2" class="form-label">Segundo Valor:</label>
            <input type="number" id="num2" name="num2" class="form-input" required step="any" value="<?= $num2 ?>">
        </div>
        
        <button type="submit" class="btn-primary">Calcular Agora</button>
    </form>

<?php else: ?>

    <div class="result-card">
        <h2>Cálculo Processado:</h2>
        <ul class="result-list">
            <li><strong>Operação:</strong> <?= ucfirst($operacao) ?></li>
            <li><strong>Resultado Final:</strong> 
                <span class="text-primary" style="font-weight: bold; font-size: 1.5rem;">
                    <?= number_format($resultado, 2, ',', '.') ?>
                </span>
            </li>
        </ul>
        <a href="" class="btn-back">Novo Cálculo</a>
    </div>

<?php endif; ?>

<?php require_once dirname(__DIR__, 1) . '/templates/footer.php'; ?>