<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-21.php
 * Responsabilidade: Instanciar a estrutura associativa de dados brutos e definir regras.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Estrutura Associativa)
$boletim_notas = [
    'Alice Ferreira' => 8.5,
    'Bruno Costa' => 6.0,
    'Carlos Mendes' => 9.2,
    'Daniela Alves' => 4.5,
    'Eduardo Silva' => 7.0
];

// Regra de Negócio Centralizada
// Nunca deixe "Magic Numbers" (como o 7) soltos no meio do HTML.
$nota_corte = 7.0;

// 2. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-21.php';