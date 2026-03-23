<?php
$titulo_pagina = "Exercício 20 - Catálogo de Produtos";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Catálogo do Sistema</h1>

<div class="result-card">
    <h2>Lista de Preços (Array Associativo):</h2>
    
    <ul class="result-list">
        <?php 
        // O motor do PHP extrai a string para $produto e o float para $preco
        foreach ($catalogo_produtos as $produto => $preco): 
        ?>
            <li>
                <strong>Produto:</strong> <?= htmlspecialchars($produto, ENT_QUOTES, 'UTF-8') ?> 
                &mdash; 
                <strong>Preço:</strong> <span class="text-primary">R$ <?= number_format($preco, 2, ',', '.') ?></span>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="/" class="btn-back">Voltar ao Painel</a>
</div>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>