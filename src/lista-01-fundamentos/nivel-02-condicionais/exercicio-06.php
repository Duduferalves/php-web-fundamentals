<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-06.php
 * Responsabilidade: Receber um número real, validar e classificar seu sinal matemático.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Zero-State)
// Usamos float pois números decimais (ex: 0.5) também possuem sinal.
$numero = 0.0;
$classificacao = '';

$exibir_resultado = false;
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $post_numero = $_POST['numero'] ?? '';
    
    // 2. VALIDAÇÃO DE BACKEND
    if ($post_numero === '' || !is_numeric($post_numero)) {
        $erros[] = "O valor informado é inválido. Digite um número real.";
    }
    
    // 3. PROCESSAMENTO (Regra de Negócio)
    if (empty($erros)) {
        $numero = (float) $post_numero;
        
        // Estrutura Condicional Múltipla
        if ($numero > 0) {
            $classificacao = "Positivo";
        } elseif ($numero < 0) {
            $classificacao = "Negativo";
        } else {
            // Se não é maior que zero, nem menor que zero, logicamente é o próprio zero.
            $classificacao = "Zero";
        }
        
        $exibir_resultado = true;
    }
}

// Injeção na View
require_once __DIR__ . '/view-06.php';