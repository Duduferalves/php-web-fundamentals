<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-05.php (Lista 2)
 * Responsabilidade: Processar cadastro simples e classificar maioridade em lote.
 */

// 0. INICIALIZAÇÃO DA SESSÃO PARA PERSISTÊNCIA
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lógica para limpar a lista se o usuário desejar
if (isset($_GET['limpar'])) {
    $_SESSION['lista_05_usuarios'] = [];
    header("Location: ?arquivo=lista-02-formularios/exercicio-05.php");
    exit;
}

// 1. ALOCAÇÃO DE MEMÓRIA (Recuperamos da sessão ou iniciamos vazio)
$usuario_cadastrado = null;
$lista_usuarios = $_SESSION['lista_05_usuarios'] ?? [];
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $idade = isset($_POST['idade']) ? (int)$_POST['idade'] : null;

    // 2. VALIDAÇÃO DE ENTRADA
    if (empty($nome)) {
        $erros[] = "O campo 'Nome' não pode estar vazio.";
    }
    if ($idade === null || $idade < 0) {
        $erros[] = "Informe uma idade válida (maior ou igual a zero).";
    }

    // 3. PROCESSAMENTO (Estruturação do Registro)
    if (empty($erros)) {
        // Criamos um Array Associativo para representar o objeto "Usuário"
        $usuario_cadastrado = [
            'nome'  => $nome,
            'idade' => $idade,
            'situacao' => ($idade >= 18) ? 'Maior de idade' : 'Menor de idade',
            'classe_css' => ($idade >= 18) ? 'text-primary' : 'text-secondary'
        ];

        // Adicionamos à lista na SESSÃO
        $_SESSION['lista_05_usuarios'][] = $usuario_cadastrado;

        // Atualizamos a variável local para refletir a sessão atualizada
        $lista_usuarios = $_SESSION['lista_05_usuarios'];
    }
}

// 4. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-05.php';