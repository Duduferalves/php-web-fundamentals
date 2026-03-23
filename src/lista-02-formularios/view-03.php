<?php
$titulo_pagina = "Lista 2 - Exercício 03 (Tabuada Dinâmica)";
require_once dirname(__DIR__,1) . '/templates/header.php';
?>

<h1>Tabuada Dinâmica</h1>

<?php if (!empty($erros)): ?>
    <div class="alert alert-danger">
        <h3 class="alert-title">Erro de Processamento:</h3>
        <ul class="alert-list">
            <?php foreach ($erros as $erro): ?>
                <li><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="" method="POST" class="form-container">
    <div class="form-group">
        <label for="numero" class="form-label">Gerar tabuada do número:</label>
        <input type="number" id="numero" name="numero" class="form-input" 
               required step="any" placeholder="Ex: 7" value="<?= $numero_base ?>">
    </div>
    
    <button type="submit" class="btn-primary">Gerar Tabuada</button>
</form>

<?php if ($exibir_resultado): ?>
    <hr class="divider">

    <div class="result-card">
        <h2>Tabuada do <?= htmlspecialchars((string)$numero_base) ?></h2>
        
        <table class="data-table" style="width: 100%; border-collapse: collapse; margin-top: 15px;">
            <thead>
                <tr style="background-color: var(--primary-color); color: white; text-align: left;">
                    <th style="padding: 10px; border: 1px solid var(--border-color);">Operação</th>
                    <th style="padding: 10px; border: 1px solid var(--border-color);">Resultado</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Laço de Repetição determinístico para gerar as 10 linhas da tabela
                for ($i = 1; $i <= 10; $i++): 
                    $resultado_multiplicacao = $numero_base * $i;
                ?>
                    <tr>
                        <td style="padding: 10px; border: 1px solid var(--border-color);">
                            <?= $numero_base ?> x <?= $i ?>
                        </td>
                        <td style="padding: 10px; border: 1px solid var(--border-color); font-weight: bold; color: var(--secondary-color);">
                            <?= number_format($resultado_multiplicacao, 2, ',', '.') ?>
                        </td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>

        <br>
        <a href="exercicio-03.php" class="btn-back">Nova Tabuada</a>
    </div>
<?php endif; ?>

<?php require_once dirname(__DIR__, 1) . '/templates/footer.php'; ?>