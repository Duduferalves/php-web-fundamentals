<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-12.php
 * Responsabilidade: Executar processamento em lote (loop acumulativo) e blindar a View da lógica matemática.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Zero-State)
$limite = 100;
$soma_total = 0;

// 2. PROCESSAMENTO (Regra de Negócio Centralizada)
// O laço O(n) roda integralmente no servidor antes de qualquer HTML ser gerado.
for ($i = 1; $i <= $limite; $i++) {
    // Operador de atribuição com adição (+=)
    // Equivalente a: $soma_total = $soma_total + $i;
    $soma_total += $i;
}

// 3. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-12.php';