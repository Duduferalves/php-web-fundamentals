<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-17.php
 * Responsabilidade: Processar uma fila de ações simulada aplicando laço pós-testado para roteamento de menu.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Zero-State)
// Simulamos o usuário digitando: 1 (Continuar), 1, 1, e finalmente 2 (Sair).
// O último '1' no array atua como lixo de memória para provar que o laço quebra no '2' e não lê o resto.
$buffer_entrada = [1, 1, 1, 2, 1]; 

$indice = 0;
$opcao_escolhida = 0;
$log_execucao = [];

// 2. PROCESSAMENTO (Regra de Negócio via Máquina de Estados)
do {
    // Failsafe de Segurança: Evita Out of Bounds se o array acabar sem o comando de saída (2)
    if (!isset($buffer_entrada[$indice])) {
        $log_execucao[] = "ERRO DE SISTEMA: Fim do buffer atingido sem comando de encerramento.";
        break; 
    }

    $opcao_escolhida = $buffer_entrada[$indice];
    $ciclo = $indice + 1;

    // Roteamento
    if ($opcao_escolhida === 1) {
        $log_execucao[] = "[Iteração {$ciclo}] Renderizando Menu... Ação interceptada: 1 (Continuar).";
    } elseif ($opcao_escolhida === 2) {
        $log_execucao[] = "[Iteração {$ciclo}] Renderizando Menu... Ação interceptada: 2 (Sair). Quebrando ciclo.";
    } else {
        $log_execucao[] = "[Iteração {$ciclo}] Opção inválida interceptada.";
    }

    $indice++;
    
} while ($opcao_escolhida !== 2); // Pós-teste: Só avalia a saída após processar a escolha.

// 3. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-17.php';