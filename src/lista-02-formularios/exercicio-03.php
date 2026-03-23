<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-03.php (Lista 2)
 * Responsabilidade: Validar entrada numérica e preparar o estado para a geração da tabuada.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Estado Inicial)
$numero_base = null;
$exibir_resultado = false;
$erros = [];

// 2. CAPTURA DE DADOS via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $entrada = $_POST['numero'] ?? '';

    // Validação de Backend: Verificamos se não está vazio e se é um número
    if ($entrada === '') {
        $erros[] = "O campo número é obrigatório.";
    } elseif (!is_numeric($entrada)) {
        $erros[] = "Por favor, insira um valor numérico válido.";
    } else {
        $numero_base = (float)$entrada; // Aceitamos decimais para uma tabuada científica
        $exibir_resultado = true;
    }
}

// 3. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-03.php';