<?php
$titulo_pagina = "Exercício 06 - Desafio Extra (Agregação)";
require_once dirname(__DIR__, 1) . '/templates/header.php';
?>

<h1>Cadastro com Contador de Maioridade</h1>

<form action="" method="POST" class="form-container">
    <div class="form-group">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-input" required>
    </div>
    <div class="form-group">
        <label for="idade" class="form-label">Idade:</label>
        <input type="number" id="idade" name="idade" class="form-input" required min="0">
    </div>
    <button type="submit" class="btn-primary">Adicionar e Contar</button>
</form>

<?php if (!empty($lista_usuarios)): ?>
    <div class="result-card" style="margin-top: 30px;">
        <table class="data-table" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: var(--primary-color); color: white;">
                    <th style="padding: 12px; border: 1px solid var(--border-color);">Nome</th>
                    <th style="padding: 12px; border: 1px solid var(--border-color);">Idade</th>
                    <th style="padding: 12px; border: 1px solid var(--border-color);">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista_usuarios as $user): ?>
                    <tr>
                        <td style="padding: 10px; border: 1px solid var(--border-color);">
                            <?= htmlspecialchars($user['nome']) ?>
                        </td>
                        <td style="padding: 10px; border: 1px solid var(--border-color);">
                            <?= $user['idade'] ?>
                        </td>
                        <td style="padding: 10px; border: 1px solid var(--border-color);">
                            <?= $user['is_maior'] ? 'Maior de idade' : 'Menor de idade' ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr style="background-color: #f8f9fa; font-weight: bold;">
                    <td colspan="2" style="padding: 15px; border: 1px solid var(--border-color); text-align: right;">
                        Total de Maiores de Idade:
                    </td>
                    <td style="padding: 15px; border: 1px solid var(--border-color); color: var(--secondary-color); font-size: 1.2rem;">
                        <?= $total_maiores ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
<?php endif; ?>

<?php require_once dirname(__DIR__, 1) . '/templates/footer.php'; ?>