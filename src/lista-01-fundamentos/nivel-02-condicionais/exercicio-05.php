<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-05.php
 * Responsabilidade: Receber a idade, validar limites lógicos e classificar a maioridade civil.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Zero-State)
$idade = 0;
$status_maioridade = '';

$exibir_resultado = false;
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $post_idade = $_POST['idade'] ?? '';
    
    // 2. VALIDAÇÃO DE BACKEND
    // Em sistemas reais de clínicas ou de RH, a idade não pode ser negativa ou irreal
    if ($post_idade === '' || !is_numeric($post_idade)) {
        $erros[] = "A idade é obrigatória e deve conter apenas números.";
    } elseif ((int) $post_idade < 0 || (int) $post_idade > 130) {
        $erros[] = "Informe uma idade válida e humanamente possível (entre 0 e 130 anos).";
    }
    
    // 3. PROCESSAMENTO (Regra de Negócio)
    if (empty($erros)) {
        $idade = (int) $post_idade;
        
        // Estrutura Condicional Padrão
        if ($idade >= 18) {
            $status_maioridade = "Maior de idade";
        } else {
            $status_maioridade = "Menor de idade";
        }
        
        $exibir_resultado = true;
    }
}

// Injeção na View
require_once __DIR__ . '/view-05.php';