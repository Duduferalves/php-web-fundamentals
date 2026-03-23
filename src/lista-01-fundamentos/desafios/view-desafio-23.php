<?php
$titulo_pagina = "Desafio 23 - Analisador Lexical";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Contador de Vogais</h1>

<?php if (!empty($erros)): ?>
    <div class="alert alert-danger">
        <h3 class="alert-title">Falha na Validação:</h3>
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
            <label for="palavra" class="form-label">Digite uma palavra ou frase:</label>
            <input type="text" id="palavra" name="palavra" class="form-input" required>
        </div>
        
        <button type="submit" class="btn-primary">Analisar String</button>
    </form>

<?php else: ?>

    <div class="result-card">
        <h2>Relatório de Análise:</h2>
        <ul class="result-list">
            <li><strong>Texto Analisado:</strong> <?= htmlspecialchars($palavra_original, ENT_QUOTES, 'UTF-8') ?></li>
            <li><strong>Total de Vogais Encontradas:</strong> 
                <span class="text-primary" style="font-weight: bold; font-size: 1.2rem;">
                    <?= $total_vogais ?>
                </span>
            </li>
        </ul>
        <a href="" class="btn-back">Analisar Novo Texto</a>
    </div>

<?php endif; ?>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>