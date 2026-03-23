<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-07.php
 * Responsabilidade: Receber um número inteiro, validar sua tipagem rigorosa e verificar a paridade.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Zero-State)
$numero = 0;
$classificacao = '';

$exibir_resultado = false;
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $post_numero = $_POST['numero'] ?? '';
    
    // 2. VALIDAÇÃO DE BACKEND (Rigor Arquitetural)
    // filter_var com FILTER_VALIDATE_INT recusa letras, vazios e decimais (ex: 2.5 falha aqui).
    if (filter_var($post_numero, FILTER_VALIDATE_INT) === false) {
        $erros[] = "O valor informado é inválido. Digite um número inteiro (sem casas decimais).";
    }
    
    // 3. PROCESSAMENTO (Regra de Negócio)
    if (empty($erros)) {
        $numero = (int) $post_numero;
        
        // Operador Módulo (%) verifica o resto da divisão por 2
        if ($numero % 2 === 0) {
            $classificacao = "Par";
        } else {
            $classificacao = "Ímpar";
        }
        
        $exibir_resultado = true;
    }
}

// Injeção na View
require_once __DIR__ . '/view-07.php';