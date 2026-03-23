<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-15.php
 * Responsabilidade: Simular validação de credenciais via laço condicional (Brute Force Simulation).
 */

// 1. ALOCAÇÃO DE MEMÓRIA E REGRAS DE NEGÓCIO
$senha_correta = 'clinica2026';

// Simulação de um ataque ou de múltiplas tentativas automatizadas
$dicionario_tentativas = ['123456', 'admin', 'suporte', 'clinica2026', 'root'];

$indice = 0;
$max_tentativas = count($dicionario_tentativas);
$acesso_concedido = false;
$log_execucao = [];

// 2. PROCESSAMENTO (A simulação com WHILE exigida pelo exercício)
// O laço roda ENQUANTO o acesso for falso E ainda houver tentativas no array.
while (!$acesso_concedido && $indice < $max_tentativas) {
    
    $senha_teste = $dicionario_tentativas[$indice];
    
    if ($senha_teste === $senha_correta) {
        $acesso_concedido = true;
        $log_execucao[] = "SUCESSO: Senha '{$senha_teste}' validada no ciclo " . ($indice + 1);
    } else {
        $log_execucao[] = "FALHA: A tentativa '{$senha_teste}' foi negada.";
        $indice++; // Avança para a próxima tentativa obrigatoriamente para não gerar loop infinito
    }
}

// 3. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-15.php';