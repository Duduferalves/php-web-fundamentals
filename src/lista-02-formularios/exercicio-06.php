<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-06.php (Lista 2 - Desafio Extra)
 * Responsabilidade: Processar cadastro e preparar agregadores de dados.
 */

// 0. INICIALIZAÇÃO DA SESSÃO PARA PERSISTÊNCIA
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lógica para limpar a lista
if (isset($_GET['limpar'])) {
    $_SESSION['lista_06_usuarios'] = [];
    header("Location: ?arquivo=lista-02-formularios/exercicio-06.php");
    exit;
}

// 1. ALOCAÇÃO DE MEMÓRIA (Recuperamos da sessão)
$lista_usuarios = $_SESSION['lista_06_usuarios'] ?? [];
$total_maiores = 0; // Acumulador de Agregação
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $idade = isset($_POST['idade']) ? (int)$_POST['idade'] : null;

    if (empty($nome) || $idade === null || $idade < 0) {
        $erros[] = "Dados de entrada inválidos para o cadastro.";
    }

    if (empty($erros)) {
        // Estrutura de dados do registro
        $novo_usuario = [
            'nome'  => $nome,
            'idade' => $idade,
            'is_maior' => ($idade >= 18) 
        ];

        // Adicionamos à lista na SESSÃO
        $_SESSION['lista_06_usuarios'][] = $novo_usuario;

        // Atualizamos a lista local
        $lista_usuarios = $_SESSION['lista_06_usuarios'];
    }
}

// Lógica de Contagem de Agregação (Calculada sobre a lista persistida)
foreach ($lista_usuarios as $user) {
    if ($user['is_maior']) {
        $total_maiores++;
    }
}

require_once __DIR__ . '/view-06.php';