<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-02.php (Lista 2)
 * Responsabilidade: Analisar propriedades matemáticas de um número via GET.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Zero-State)
$numero = null;
$paridade = '';
$sinal = '';

$exibir_resultado = false;
$erros = [];

// 2. CAPTURA DE DADOS (Verificamos se a chave 'numero' existe na Query String)
if (isset($_GET['numero']) && $_GET['numero'] !== '') {
    
    $entrada = $_GET['numero'];

    // Validação de integridade: Deve ser um número inteiro para análise de paridade
    if (!is_numeric($entrada)) {
        $erros[] = "O valor informado deve ser um número válido.";
    } else {
        $numero = (int)$entrada;
        $exibir_resultado = true;

        // 3. PROCESSAMENTO - ANALISE DE SINAL (Positivo, Negativo ou Zero)
        if ($numero > 0) {
            $sinal = "Positivo";
        } elseif ($numero < 0) {
            $sinal = "Negativo";
        } else {
            $sinal = "Zero";
        }

        // 4. PROCESSAMENTO - ANALISE DE PARIDADE (Par ou Ímpar)
        // O zero é matematicamente considerado Par.
        if ($numero % 2 === 0) {
            $paridade = "Par";
        } else {
            $paridade = "Ímpar";
        }
    }
}

// 5. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-02.php';