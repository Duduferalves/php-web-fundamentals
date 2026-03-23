<?php
$titulo_pagina = "Exercício 04 - Concatenação de Strings";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Processamento de Nomes</h1>

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
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-input" required>
        </div>
        
        <div class="form-group">
            <label for="sobrenome" class="form-label">Sobrenome:</label>
            <input type="text" id="sobrenome" name="sobrenome" class="form-input" required>
        </div>
        
        <button type="submit" class="btn-primary">Concatenar Nomes</button>
    </form>

<?php else: ?>

    <div class="result-card">
        <h2>Resultado da Concatenação:</h2>
        <ul class="result-list">
            <li><strong>Variável 1 (Nome):</strong> <?= $nome ?></li>
            <li><strong>Variável 2 (Sobrenome):</strong> <?= $sobrenome ?></li>
            <li><strong>String Final:</strong> <span style="color: var(--primary-color); font-weight: bold;"><?= $nome_completo ?></span></li>
        </ul>
        <a href="" class="btn-back">Processar Novo Nome</a>
    </div>

<?php endif; ?>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>