<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-08.php
 * Responsabilidade: Coletar dois números e um operador, validar e rotear a execução matemática.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Zero-State)
$numero1 = 0.0;
$numero2 = 0.0;
$operacao = '';
$resultado = 0.0;

$exibir_resultado = false;
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $post_num1 = $_POST['numero1'] ?? '';
    $post_num2 = $_POST['numero2'] ?? '';
    $post_operacao = trim($_POST['operacao'] ?? '');
    
    // 2. VALIDAÇÃO DE BACKEND
    if ($post_num1 === '' || !is_numeric($post_num1)) {
        $erros[] = "O primeiro número é inválido.";
    }
    
    if ($post_num2 === '' || !is_numeric($post_num2)) {
        $erros[] = "O segundo número é inválido.";
    }
    
    // Whitelist de Segurança
    $operacoes_permitidas = ['+', '-', '*', '/'];
    if (!in_array($post_operacao, $operacoes_permitidas, true)) {
        $erros[] = "Operação matemática inválida ou não suportada.";
    }
    
    // Prevenção de Exceção Fatal (DivisionByZeroError)
    if ($post_operacao === '/' && is_numeric($post_num2) && (float) $post_num2 === 0.0) {
        $erros[] = "A matemática proíbe divisão por zero. Altere o segundo número.";
    }
    
    // 3. PROCESSAMENTO (Roteamento Lógico)
    if (empty($erros)) {
        $numero1 = (float) $post_num1;
        $numero2 = (float) $post_num2;
        $operacao = $post_operacao;
        
        // Atendendo ao requisito do exercício: Roteamento com IF
        if ($operacao === '+') {
            $resultado = $numero1 + $numero2;
        } elseif ($operacao === '-') {
            $resultado = $numero1 - $numero2;
        } elseif ($operacao === '*') {
            $resultado = $numero1 * $numero2;
        } elseif ($operacao === '/') {
            $resultado = $numero1 / $numero2;
        }
        
        $exibir_resultado = true;
    }
}

// Injeção na View
require_once __DIR__ . '/view-08.php';