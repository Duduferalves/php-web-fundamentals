<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-11.php
 * Responsabilidade: Coletar o número base, higienizar e autorizar a geração da tabuada.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Zero-State)
$numero = 0;

$exibir_resultado = false;
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $post_numero = $_POST['numero'] ?? '';
    
    // 2. VALIDAÇÃO DE BACKEND
    // Tabuadas clássicas operam no conjunto dos Inteiros.
    if (filter_var($post_numero, FILTER_VALIDATE_INT) === false) {
        $erros[] = "O valor informado é inválido. Digite um número inteiro.";
    }
    
    // 3. PROCESSAMENTO
    if (empty($erros)) {
        $numero = (int) $post_numero;
        $exibir_resultado = true;
    }
}

// Injeção na View
require_once __DIR__ . '/view-11.php';