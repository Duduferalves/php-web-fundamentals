<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-01.php (Lista 2)
 * Responsabilidade: Processar cálculos aritméticos via POST com tratamento de erro crítico.
 */

// 1. ALOCAÇÃO DE MEMÓRIA
$num1 = 0.0;
$num2 = 0.0;
$operacao = '';
$resultado = 0.0;

$exibir_resultado = false;
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Captura e coerção de tipos
    $num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : 0.0;
    $num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : 0.0;
    $operacao = $_POST['operacao'] ?? '';

    // 2. VALIDAÇÃO DE ENTRADA
    if ($operacao === '') {
        $erros[] = "Por favor, selecione uma operação válida.";
    }

    // 3. PROCESSAMENTO (Regra de Negócio com Switch)
    if (empty($erros)) {
        switch ($operacao) {
            case 'soma':
                $resultado = $num1 + $num2;
                $exibir_resultado = true;
                break;
            case 'subtracao':
                $resultado = $num1 - $num2;
                $exibir_resultado = true;
                break;
            case 'multiplicacao':
                $resultado = $num1 * $num2;
                $exibir_resultado = true;
                break;
            case 'divisao':
                // Tratamento obrigatório de Divisão por Zero
                if ($num2 == 0) {
                    $erros[] = "Erro Matemático: Não é possível dividir por zero.";
                } else {
                    $resultado = $num1 / $num2;
                    $exibir_resultado = true;
                }
                break;
            default:
                $erros[] = "Operação desconhecida pelo sistema.";
                break;
        }
    }
}

// 4. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-01.php';