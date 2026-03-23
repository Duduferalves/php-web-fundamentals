<?php
$titulo_pagina = "Exercício 01 - Formulário Interativo";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Perfil do Desenvolvedor</h1>

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
            <label for="nome" class="form-label">Nome Completo:</label>
            <input type="text" id="nome" name="nome" class="form-input" required>
        </div>
        
        <div class="form-group">
            <label for="idade" class="form-label">Idade:</label>
            <input type="number" id="idade" name="idade" class="form-input" required min="1" max="120">
        </div>
        
        <div class="form-group">
            <label for="altura" class="form-label">Altura (ex: 1.75):</label>
            <input type="number" id="altura" name="altura" class="form-input" required step="0.01" min="0.5" max="3.0">
        </div>
        
        <button type="submit" class="btn-primary">Processar Dados</button>
    </form>

<?php else: ?>

    <div class="result-card">
        <h2>Dados Processados pelo Servidor:</h2>
        <ul class="result-list">
            <li><strong>Nome:</strong> <?= $nome ?></li>
            <li><strong>Idade:</strong> <?= $idade ?> anos</li>
            <li><strong>Altura:</strong> <?= number_format($altura, 2, ',', '.') ?> m</li>
        </ul>
        <a href="" class="btn-back">Testar Novamente</a>
    </div>

<?php endif; ?>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>