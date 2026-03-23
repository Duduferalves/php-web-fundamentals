<?php
$titulo_pagina = "Exercício 18 - Iteração de Arrays";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Pacientes Cadastrados</h1>

<div class="result-card">
    <h2>Registros em Memória:</h2>
    <ul class="result-list">
        <?php 
        // O foreach assume o controle do ponteiro de memória do array.
        foreach ($lista_pacientes as $paciente): 
        ?>
            <li><?= htmlspecialchars($paciente, ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    </ul>
    
    <a href="/" class="btn-back">Voltar ao Painel</a>
</div>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>