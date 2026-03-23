<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-04.php (Lista 2)
 * Responsabilidade: Calcular média escolar e classificar situação acadêmica.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Estado Inicial)
$nome_aluno = '';
$nota1 = $nota2 = $nota3 = 0.0;
$media = 0.0;
$situacao = '';
$cor_alerta = ''; // Classe CSS para feedback visual

$exibir_resultado = false;
$erros = [];

// 2. CAPTURA DE DADOS via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nome_aluno = trim($_POST['nome'] ?? '');
    $nota1 = isset($_POST['n1']) ? (float)$_POST['n1'] : 0.0;
    $nota2 = isset($_POST['n2']) ? (float)$_POST['n2'] : 0.0;
    $nota3 = isset($_POST['n3']) ? (float)$_POST['n3'] : 0.0;

    // 3. VALIDAÇÃO DE NEGÓCIO
    if (empty($nome_aluno)) {
        $erros[] = "O nome do aluno é obrigatório para o registro.";
    }

    if (empty($erros)) {
        // 4. PROCESSAMENTO MATEMÁTICO
        $media = ($nota1 + $nota2 + $nota3) / 3;

        // 5. MOTOR DE REGRAS (Lógica de Decisão Encadeada)
        if ($media >= 7) {
            $situacao = "Aprovado";
            $cor_alerta = "alert-success"; // Verde
        } elseif ($media >= 5 && $media < 7) {
            $situacao = "Recuperação";
            $cor_alerta = "alert-warning"; // Amarelo/Laranja
        } else {
            $situacao = "Reprovado";
            $cor_alerta = "alert-danger";  // Vermelho
        }

        $exibir_resultado = true;
    }
}

// 6. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-04.php';