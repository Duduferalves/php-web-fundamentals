<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-25.php
 * Responsabilidade: Simular transação de débito aplicando validação de limite de saldo e tipagem monetária.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Estado Inicial em Centavos)
// R$ 5.000,00 = 500000 centavos
$saldo_inicial_centavos = 500000; 
$saldo_atual_centavos = $saldo_inicial_centavos;

$exibir_resultado = false;
$erros = [];
$valor_saque_formatado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $post_saque = $_POST['saque'] ?? '';
    
    // 2. VALIDAÇÃO DE BACKEND E HIGIENIZAÇÃO MONETÁRIA
    if ($post_saque === '' || !is_numeric($post_saque)) {
        $erros[] = "Valor de saque inválido. Insira um número válido.";
    } else {
        // Conversão segura da entrada do usuário (Reais) para a arquitetura do motor (Centavos)
        // O round() evita perda de precisão bizarra do PHP ao multiplicar floats.
        $saque_centavos = (int) round((float) $post_saque * 100);
        
        // Validação da Invariante de Domínio (O IF exigido pelo exercício)
        if ($saque_centavos <= 0) {
            $erros[] = "O valor do saque deve ser estritamente maior que zero.";
        } elseif ($saque_centavos > $saldo_atual_centavos) {
            $erros[] = "Transação Negada: Saldo insuficiente para esta operação.";
        }
    }
    
    // 3. PROCESSAMENTO (Mutação de Estado)
    if (empty($erros)) {
        // A matemática real ocorre APENAS com números inteiros
        $saldo_atual_centavos -= $saque_centavos;
        
        // Preparação do DTO para a View
        $valor_saque_formatado = number_format($saque_centavos / 100, 2, ',', '.');
        $exibir_resultado = true;
    }
}

// 4. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-25.php';