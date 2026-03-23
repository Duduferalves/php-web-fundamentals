<?php
$titulo_pagina = "Exercício 25 - Terminal de Autoatendimento";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Terminal de Saque (Simulação)</h1>

<div class="result-card" style="margin-bottom: 20px;">
    <h2>Saldo Disponível em Conta:</h2>
    <span style="font-size: 2rem; color: var(--primary-color); font-weight: bold;">
        R$ <?= number_format($saldo_inicial_centavos / 100, 2, ',', '.') ?>
    </span>
</div>

<?php if (!empty($erros)): ?>
    <div class="alert alert-danger">
        <h3 class="alert-title">Falha na Operação:</h3>
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
            <label for="saque" class="form-label">Informe o valor do saque (R$):</label>
            <input type="number" id="saque" name="saque" class="form-input" required step="0.01" min="0.01">
        </div>
        
        <button type="submit" class="btn-primary">Confirmar Saque</button>
    </form>

<?php else: ?>

    <div class="result-card">
        <div class="alert alert-success">
            <h3 class="alert-title">Transação Aprovada</h3>
            <p>Retire as cédulas no local indicado.</p>
        </div>
        <ul class="result-list">
            <li><strong>Valor Sacado:</strong> R$ <?= $valor_saque_formatado ?></li>
            <li style="margin-top: 15px; padding-top: 15px; border-top: 1px solid var(--border-color);">
                <strong>Novo Saldo em Conta:</strong> 
                <span class="text-primary" style="font-weight: bold; font-size: 1.2rem;">
                    R$ <?= number_format($saldo_atual_centavos / 100, 2, ',', '.') ?>
                </span>
            </li>
        </ul>
        <a href="" class="btn-back">Realizar Nova Operação</a>
    </div>

<?php endif; ?>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>