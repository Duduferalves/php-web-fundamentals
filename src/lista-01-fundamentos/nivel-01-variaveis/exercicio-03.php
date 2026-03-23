<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-03.php
 * Responsabilidade: Coletar temperatura em Celsius, validar e converter para Fahrenheit.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Zero-State)
$celsius = 0.0;
$fahrenheit = 0.0;

$exibir_resultado = false;
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Captura bruta
    $post_celsius = $_POST['celsius'] ?? '';
    
    // 2. VALIDAÇÃO DE BACKEND
    if ($post_celsius === '' || !is_numeric($post_celsius)) {
        $erros[] = "A temperatura em Celsius é obrigatória e deve ser um número válido.";
    }
    
    // 3. PROCESSAMENTO MATEMÁTICO (Regra de Negócio)
    if (empty($erros)) {
        $celsius = (float) $post_celsius;
        
        // Conversão: F = (C * 1.8) + 32
        $fahrenheit = ($celsius * 1.8) + 32.0;
        
        $exibir_resultado = true;
    }
}

// Injeção na View
require_once __DIR__ . '/view-03.php';