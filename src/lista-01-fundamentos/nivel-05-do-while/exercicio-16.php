<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-16.php
 * Responsabilidade: Executar processamento pós-testado garantindo execução mínima única.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Zero-State)
$condicao_verificadora = false; // A condição já nasce morta (falsa)
$total_execucoes = 0;
$log_auditoria = [];

// 2. PROCESSAMENTO (Regra de Negócio)
// A instrução 'do' empurra a execução para dentro do bloco cegamente.
do {
    $total_execucoes++;
    $log_auditoria[] = "Ciclo de processamento {$total_execucoes} executado.";
    
    // Na vida real, você poderia alterar o estado da variável $condicao_verificadora aqui dentro.
    // Neste caso, deixaremos ela falsa para forçar a quebra no primeiro teste.
    
} while ($condicao_verificadora === true); // O teste só ocorre AQUI, na saída.

// Ao final da linha 24, o motor do PHP lê: "Enquanto false for igual a true". 
// A expressão retorna false e o loop é destruído, mas o log já foi gravado.

// 3. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-16.php';