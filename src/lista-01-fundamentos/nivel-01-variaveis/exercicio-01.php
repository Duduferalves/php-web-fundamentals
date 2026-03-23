<?php
declare(strict_types=1);

// 1. ALOCAÇÃO DE MEMÓRIA (Zero-State)
$nome = '';
$idade = 0;
$altura = 0.0;
$exibir_resultado = false;

// Array para armazenar falhas de segurança/validação
$erros = []; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Captura os dados brutos (pode ser string vazia se o usuário burlar o HTML)
    $post_nome = $_POST['nome'] ?? '';
    $post_idade = $_POST['idade'] ?? '';
    $post_altura = $_POST['altura'] ?? '';
    
    // 2. VALIDAÇÃO DE BACKEND (A Barreira)
    
    // Verifica se a string está vazia após remover espaços
    if (empty(trim($post_nome))) {
        $erros[] = "O campo Nome é obrigatório e não pode conter apenas espaços.";
    }
    
    // Aqui nós barramos a "batata" e o campo vazio ANTES do casting.
    // is_numeric() garante que a string contém apenas números válidos.
    if ($post_idade === '' || !is_numeric($post_idade)) {
        $erros[] = "A idade deve ser informada e deve ser um número válido.";
    } elseif ((int) $post_idade <= 0) {
        $erros[] = "A idade deve ser maior que zero.";
    }
    
    if ($post_altura === '' || !is_numeric($post_altura)) {
        $erros[] = "A altura deve ser informada e deve ser um número decimal válido.";
    }
    
    // 3. PROCESSAMENTO (Só ocorre se o array de erros estiver vazio)
    if (empty($erros)) {
        $nome = htmlspecialchars(trim($post_nome), ENT_QUOTES, 'UTF-8');
        
        // Agora o Casting é 100% seguro, pois garantimos com is_numeric que não há lixo aqui
        $idade = (int) $post_idade;
        $altura = (float) $post_altura;
        
        $exibir_resultado = true;
    }
}

require_once __DIR__ . '/view-01.php';