<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-04.php
 * Responsabilidade: Receber duas strings, higienizar contra XSS e concatená-las.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Zero-State)
$nome = '';
$sobrenome = '';
$nome_completo = '';

$exibir_resultado = false;
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Captura bruta
    $post_nome = $_POST['nome'] ?? '';
    $post_sobrenome = $_POST['sobrenome'] ?? '';
    
    // 2. VALIDAÇÃO DE BACKEND
    if (empty(trim($post_nome))) {
        $erros[] = "O campo Nome é obrigatório e não pode estar em branco.";
    }
    
    if (empty(trim($post_sobrenome))) {
        $erros[] = "O campo Sobrenome é obrigatório e não pode estar em branco.";
    }
    
    // 3. PROCESSAMENTO (Regra de Negócio)
    if (empty($erros)) {
        // Higienização rigorosa antes da concatenação
        $nome = htmlspecialchars(trim($post_nome), ENT_QUOTES, 'UTF-8');
        $sobrenome = htmlspecialchars(trim($post_sobrenome), ENT_QUOTES, 'UTF-8');
        
        // Concatenação utilizando o operador de ponto (.)
        // O espaço em branco ' ' é inserido literalmente entre as variáveis
        $nome_completo = $nome . ' ' . $sobrenome;
        
        $exibir_resultado = true;
    }
}

// Injeção na View
require_once __DIR__ . '/view-04.php';