<?php
$titulo_pagina = "Exercício 11 - Gerador de Tabuada";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Gerador de Tabuada</h1>

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
            <label for="numero" class="form-label">Digite o número base da tabuada:</label>
            <input type="number" id="numero" name="numero" class="form-input" required step="1">
        </div>
        
        <button type="submit" class="btn-primary">Gerar Tabuada</button>
    </form>

<?php else: ?>

    <div class="result-card">
        <h2>Tabuada do <?= $numero ?>:</h2>
        <ul class="result-list" style="font-family: monospace; font-size: 1.2rem;">
            <?php 
            // O laço FOR é executado na camada de visualização para gerar os elementos da lista
            for ($i = 1; $i <= 10; $i++): 
            ?>
                <li>
                    <?= $numero ?> x <?= str_pad((string)$i, 2, '0', STR_PAD_LEFT) ?> = 
                    <strong style="color: var(--primary-color);">
                        <?= $numero * $i ?>
                    </strong>
                </li>
            <?php endfor; ?>
        </ul>
        <a href="" class="btn-back">Gerar Nova Tabuada</a>
    </div>

<?php endif; ?>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>