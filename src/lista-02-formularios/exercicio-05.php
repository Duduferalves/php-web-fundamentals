<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-05.php (Lista 2)
 * Responsabilidade: Processar cadastro simples e classificar maioridade em lote.
 */

// 1. ALOCAÇÃO DE MEMÓRIA
$usuario_cadastrado = null;
$lista_usuarios = [];
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

        // Simulamos a inserção em uma lista (Coleção)
        // Em um sistema real, aqui você faria o INSERT no Banco de Dados.
        $lista_usuarios[] = $usuario_cadastrado;
    }
}

// 4. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-05.php';