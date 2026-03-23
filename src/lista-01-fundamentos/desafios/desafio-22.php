<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-22.php
 * Responsabilidade: Gerar uma coleção de números pares baseada em iteração e desvio condicional.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Zero-State)
$limite = 50;
$numeros_pares = [];
$total_iteracoes_motor = 0;

// 2. PROCESSAMENTO (A exigência acadêmica: FOR + IF)
for ($i = 1; $i <= $limite; $i++) {
    $total_iteracoes_motor++;
    
    // O desvio condicional (IF) atua como um filtro (Gargalo lógico)
    if ($i % 2 === 0) {
        $numeros_pares[] = $i;
    }
}

// 3. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-22.php';