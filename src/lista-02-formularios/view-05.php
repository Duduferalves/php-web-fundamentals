<?php
$titulo_pagina = "Lista 2 - Exercício 05 (Cadastro com Lista)";
require_once dirname(__DIR__, 1) . '/templates/header.php';
?>

<h1>Cadastro de Usuários</h1>

<?php if (!empty($erros)): ?>
    <div class="alert alert-danger">
        <ul class="alert-list">
            <?php foreach ($erros as $erro): ?>
                <li><?= htmlspecialchars($erro) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="" method="POST" class="form-container">
    <div class="form-group">
        <label for="nome" class="form-label">Nome do Usuário:</label>
        <input type="text" id="nome" name="nome" class="form-input" required placeholder="Ex: Ana Souza">
    </div>

    <div class="form-group">
        <label for="idade" class="form-label">Idade:</label>
        <input type="number" id="idade" name="idade" class="form-input" required min="0" max="120">
    </div>
    
    <button type="submit" class="btn-primary">Cadastrar na Lista</button>
</form>

<?php if (!empty($lista_usuarios)): ?>
    <hr class="divider">

    <div class="result-card">
        <h2>Registros Processados</h2>
        
        <table class="data-table" style="width: 100%; border-collapse: collapse; margin-top: 15px;">
            <thead>
                <tr style="background-color: var(--primary-color); color: white; text-align: left;">
                    <th style="padding: 12px; border: 1px solid var(--border-color);">Nome</th>
                    <th style="padding: 12px; border: 1px solid var(--border-color);">Idade</th>
                    <th style="padding: 12px; border: 1px solid var(--border-color);">Situação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista_usuarios as $user): ?>
                    <tr>
                        <td style="padding: 12px; border: 1px solid var(--border-color);">
                            <?= htmlspecialchars($user['nome']) ?>
                        </td>
                        <td style="padding: 12px; border: 1px solid var(--border-color);">
                            <?= $user['idade'] ?> anos
                        </td>
                        <td style="padding: 12px; border: 1px solid var(--border-color); font-weight: bold;" class="<?= $user['classe_css'] ?>">
                            <?= $user['situacao'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<?php require_once dirname(__DIR__, 1) . '/templates/footer.php'; ?>