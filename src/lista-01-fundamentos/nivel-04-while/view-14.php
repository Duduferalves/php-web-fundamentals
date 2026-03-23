<?php
$titulo_pagina = "Exercício 14 - Acumulador Dinâmico";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Acumulador Condicional (While)</h1>

<div class="result-card">
    <h2>Relatório de Processamento no Servidor:</h2>
    <ul class="result-list">
        <li><strong>Alvo Estipulado:</strong> Ultrapassar <?= $limite_soma ?></li>
        <li><strong>Último Número Adicionado:</strong> <?= $numero_atual ?></li>
        <li><strong>Total de Ciclos (Iterações):</strong> <?= $total_iteracoes ?> repetições</li>
        <li style="margin-top: 10px; padding-top: 10px; border-top: 1px solid var(--border-color);">
            <strong>Soma Final Alcançada:</strong> 
            <span style="color: var(--primary-color); font-weight: bold; font-size: 1.5rem;">
                <?= $soma_total ?>
            </span>
        </li>
    </ul>
    
    <div style="margin-top: 20px; padding: 15px; background: #e9ecef; border-left: 4px solid var(--secondary-color); font-size: 0.95rem;">
        <strong>Log de Engenharia:</strong> O loop foi encerrado automaticamente pelo motor do PHP assim que o estado da memória ultrapassou o limite parametrizado.
    </div>

    <br>
    <a href="/" class="btn-back">Voltar ao Painel</a>
</div>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>