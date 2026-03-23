<?php
$titulo_pagina = "Lista 2 - Exercício 02 (Analisador GET)";
require_once dirname(__DIR__, 1) . '/templates/header.php';
?>

<h1>Analisador Numérico via GET</h1>

<?php if (!empty($erros)): ?>
    <div class="alert alert-danger">
        <h3 class="alert-title">Erro de Entrada:</h3>
        <ul class="alert-list">
            <?php foreach ($erros as $error): ?>
                <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="" method="GET" class="form-container">
    <div class="form-group">
        <label for="numero" class="form-label">Digite um número inteiro:</label>
        <input type="number" id="numero" name="numero" class="form-input" 
               required step="1" value="<?= htmlspecialchars((string)$numero) ?>">
    </div>
    
    <button type="submit" class="btn-primary">Verificar Propriedades</button>
</form>

<?php if ($exibir_resultado): ?>
    <hr class="divider">
    
    <div class="result-card">
        <h2>Análise do Número: <?= $numero ?></h2>
        <ul class="result-list">
            <li><strong>Paridade:</strong> 
                <span class="text-secondary"><?= $paridade ?></span>
            </li>
            <li><strong>Sinal:</strong> 
                <span class="text-primary"><?= $sinal ?></span>
            </li>
        </ul>
        <a href="exercicio-02.php" class="btn-back">Limpar Busca</a>
    </div>
<?php endif; ?>

<?php require_once dirname(__DIR__, 1) . '/templates/footer.php'; ?>