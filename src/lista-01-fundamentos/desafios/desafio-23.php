<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-23.php
 * Responsabilidade: Receber uma string e iterar seus caracteres para contagem de vogais (Multibyte Safe).
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Zero-State)
$palavra_original = '';
$total_vogais = 0;
$exibir_resultado = false;
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $post_palavra = $_POST['palavra'] ?? '';
    
    // 2. VALIDAÇÃO DE BACKEND
    if (trim($post_palavra) === '') {
        $erros[] = "A entrada é obrigatória. Digite uma palavra ou frase.";
    }
    
    // 3. PROCESSAMENTO (A exigência acadêmica: FOR)
    if (empty($erros)) {
        // Higienização inicial
        $palavra_original = trim($post_palavra);
        
        // Converte para minúsculas usando função Multibyte para não quebrar acentos (Ex: 'Á' -> 'á')
        $palavra_processamento = mb_strtolower($palavra_original, 'UTF-8');
        
        // Define o dicionário de vogais válidas (incluindo acentuadas do PT-BR)
        $dicionario_vogais = ['a', 'e', 'i', 'o', 'u', 'á', 'é', 'í', 'ó', 'ú', 'ã', 'õ', 'â', 'ê', 'î', 'ô', 'û'];
        
        // Obtém o tamanho real em caracteres (não em bytes)
        $tamanho_string = mb_strlen($palavra_processamento, 'UTF-8');
        
        // Iteração com FOR
        for ($i = 0; $i < $tamanho_string; $i++) {
            // Extrai exatamente 1 caractere na posição $i considerando UTF-8
            $caractere_atual = mb_substr($palavra_processamento, $i, 1, 'UTF-8');
            
            // Busca o caractere no dicionário (Busca estrita)
            if (in_array($caractere_atual, $dicionario_vogais, true)) {
                $total_vogais++;
            }
        }
        
        $exibir_resultado = true;
    }
}

// 4. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-23.php';