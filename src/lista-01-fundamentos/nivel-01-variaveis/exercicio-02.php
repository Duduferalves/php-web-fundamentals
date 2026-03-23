<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-02.php
 * Responsabilidade: Receber dois números, validar integridade matemática e calcular operações.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Zero-State)
// Usamos float para permitir operações com números decimais.
$numero1 = 0.0;
$numero2 = 0.0;

$soma = 0.0;
$subtracao = 0.0;
$multiplicacao = 0.0;
$divisao = 0.0;

$exibir_resultado = false;
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Captura bruta
    $post_num1 = $_POST['numero1'] ?? '';
    $post_num2 = $_POST['numero2'] ?? '';
    
    // 2. VALIDAÇÃO DE BACKEND
    if ($post_num1 === '' || !is_numeric($post_num1)) {
        $erros[] = "O primeiro número é obrigatório e deve ser válido.";
    }
    
    if ($post_num2 === '' || !is_numeric($post_num2)) {
        $erros[] = "O segundo número é obrigatório e deve ser válido.";
    } else {
        // REGRA DE NEGÓCIO CRÍTICA: Prevenção de DivisionByZeroError
        if ((float) $post_num2 === 0.0) {
            $erros[] = "Na matemática, a divisão por zero é indefinida. Informe um divisor diferente de zero.";
        }
    }
    
    // 3. PROCESSAMENTO MATEMÁTICO
    if (empty($erros)) {
        // Casting seguro
        $numero1 = (float) $post_num1;
        $numero2 = (float) $post_num2;
        
        $soma = $numero1 + $numero2;
        $subtracao = $numero1 - $numero2;
        $multiplicacao = $numero1 * $numero2;
        $divisao = $numero1 / $numero2;
        
        $exibir_resultado = true;
    }
}

// Injeta as variáveis na camada de apresentação
require_once __DIR__ . '/view-02.php';