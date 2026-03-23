<?php
$titulo_pagina = "Exercício 13 - Laço WHILE";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Contagem Condicional</h1>

<div class="result-card">
    <h2>Sequência Gerada via Laço Indeterminado:</h2>
    <ul class="result-list">
        <?php 
        // Inicializamos a variável de controle da View baseada no Controlador
        $i = $contador_inicial;
        
        // O laço avalia a condição ANTES de executar o bloco
        while ($i <= $limite_contagem): 
        ?>
            <li>Iteração atual: <strong style="color: var(--primary-color);"><?= $i ?></strong></li>
        <?php 
            // OBRIGATÓRIO: Atualização da variável de controle
            $i++; 
        endwhile; 
        ?>
    </ul>
    
    <a href="/" class="btn-back">Voltar ao Painel</a>
</div>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>    