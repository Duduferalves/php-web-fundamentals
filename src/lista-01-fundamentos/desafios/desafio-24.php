<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-24.php
 * Responsabilidade: Iterar uma coleção para encontrar o valor máximo absoluto (Busca Linear).
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Estrutura de Dados)
$amostras = [15.5, -4.2, 8.9, 42.1, -10.0, 33.3];
$maior_numero = null;

// 2. PROCESSAMENTO (A exigência acadêmica: FOREACH + IF)
if (!empty($amostras)) {
    // Regra de Ouro: O valor base DEVE ser um elemento real do conjunto.
    $maior_numero = $amostras[0]; 
    
    foreach ($amostras as $numero) {
        if ($numero > $maior_numero) {
            $maior_numero = $numero; // Atualiza o ponteiro do maior valor encontrado
        }
    }
}

// 3. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-24.php';