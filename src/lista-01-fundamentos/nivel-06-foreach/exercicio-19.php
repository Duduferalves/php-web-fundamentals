<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-19.php
 * Responsabilidade: Instanciar um array numérico e executar agregação manual via foreach.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Estrutura de Dados)
$numeros = [15, 30, 45, 60, 75];
$soma_total = 0;

// 2. PROCESSAMENTO (Regra de Negócio: Acumulador iterativo)
foreach ($numeros as $numero) {
    // A cada volta, o valor atual do ponteiro do array é somado ao montante
    $soma_total += $numero;
}

// 3. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-19.php';