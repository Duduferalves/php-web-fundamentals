<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-05-v2.php (Lista 2 - Desafio Extra)
 * Responsabilidade: Processar cadastro e preparar agregadores de dados.
 */

$lista_usuarios = [];
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

        // Adicionamos à lista
        $lista_usuarios[] = $novo_usuario;

        // Lógica de Contagem (Poderia ser feita aqui ou no foreach da View)
        foreach ($lista_usuarios as $user) {
            if ($user['is_maior']) {
                $total_maiores++;
            }
        }
    }
}

require_once __DIR__ . '/view-06.php';