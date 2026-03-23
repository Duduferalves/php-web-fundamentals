<?php
$titulo_pagina = "Lista 2 - Exercício 04 (Sistema de Notas)";
require_once dirname(__DIR__, 1) . '/templates/header.php';
?>

<h1>Sistema de Gestão Escolar</h1>

<?php if (!empty($erros)): ?>
    <div class="alert alert-danger">
        <ul class="alert-list">
            <?php foreach ($erros as $erro): ?>
                <li><?= htmlspecialchars($erro) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if (!$exibir_resultado): ?>
    <form action="" method="POST" class="form-container">
        <div class="form-group">
            <label for="nome" class="form-label">Nome Completo do Aluno:</label>
            <input type="text" id="nome" name="nome" class="form-input" required placeholder="Ex: Eduardo Silva">
        </div>

        <div style="display: flex; gap: 15px;">
            <div class="form-group" style="flex: 1;">
                <label for="n1" class="form-label">Nota 1:</label>
                <input type="number" id="n1" name="n1" class="form-input" required min="0" max="10" step="0.1">
            </div>
            <div class="form-group" style="flex: 1;">
                <label for="n2" class="form-label">Nota 2:</label>
                <input type="number" id="n2" name="n2" class="form-input" required min="0" max="10" step="0.1">
            </div>
            <div class="form-group" style="flex: 1;">
                <label for="n3" class="form-label">Nota 3:</label>
                <input type="number" id="n3" name="n3" class="form-input" required min="0" max="10" step="0.1">
            </div>
        </div>
        
        <button type="submit" class="btn-primary">Processar Notas</button>
    </form>
<?php else: ?>
    <div class="result-card">
        <h2>Boletim Eletrônico</h2>
        <ul class="result-list">
            <li><strong>Aluno:</strong> <?= htmlspecialchars($nome_aluno) ?></li>
            <li><strong>Média Final:</strong> 
                <span class="text-secondary" style="font-weight: bold;">
                    <?= number_format($media, 2, ',', '.') ?>
                </span>
            </li>
        </ul>

        <div class="alert <?= $cor_alerta ?>" style="margin-top: 20px; text-align: center;">
            <h3 style="margin: 0;">Situação: <?= $situacao ?></h3>
        </div>

        <br>
        <a href="exercicio-04.php" class="btn-back">Novo Lançamento</a>
    </div>
<?php endif; ?>

<?php require_once dirname(__DIR__, 1) . '/templates/footer.php'; ?>