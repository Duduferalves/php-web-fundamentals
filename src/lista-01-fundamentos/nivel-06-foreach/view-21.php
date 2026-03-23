<?php
$titulo_pagina = "Exercício 21 - Validação de Status";
require_once dirname(__DIR__, 2) . '/templates/header.php';
?>

<h1>Avaliação de Turma</h1>

<div class="result-card">
    <h2>Status de Aprovação (Corte: <?= number_format($nota_corte, 1, ',', '.') ?>):</h2>
    
    <ul class="result-list">
        <?php 
        // Iteração e Desvio Condicional misturados na camada visual (Padrão Acadêmico)
        foreach ($boletim_notas as $nome => $nota): 
            
            // O IF exigido pelo exercício
            if ($nota >= $nota_corte) {
                $status = 'Aprovado';
                $cor_status = 'var(--primary-color)'; // Verde/Primária
            } else {
                $status = 'Reprovado';
                $cor_status = '#d90429'; // Vermelho
            }
        ?>
            <li>
                <strong>Aluno:</strong> <?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?> 
                &mdash; 
                <strong>Nota:</strong> <?= number_format($nota, 1, ',', '.') ?>
                &mdash; 
                <span style="color: <?= $cor_status ?>; font-weight: bold;">[ <?= $status ?> ]</span>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="/" class="btn-back">Voltar ao Painel</a>
</div>

<?php require_once dirname(__DIR__, 2) . '/templates/footer.php'; ?>