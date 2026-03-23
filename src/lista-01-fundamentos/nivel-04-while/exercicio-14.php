<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-14.php
 * Responsabilidade: Executar acúmulo de estado dinâmico em laço indeterminado.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Zero-State)
$limite_soma = 100;
$soma_total = 0;
$numero_atual = 0;
$total_iteracoes = 0;

// 2. PROCESSAMENTO (Regra de Negócio)
// A condição é avaliada antes de cada ciclo.
while ($soma_total <= $limite_soma) {
    $numero_atual++; // Avança para o próximo número consecutivo
    $soma_total += $numero_atual; // Acumula o valor
    $total_iteracoes++; // Registra o esforço computacional do motor
}

// Ao final do bloco, a memória guarda o estado exato do momento do rompimento da condição.

// 3. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-14.php';