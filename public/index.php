<?php
/**
 * FRONT CONTROLLER & ROTEADOR
 * Arquivo: public/index.php
 */

// 1. NAVEGAÇÃO DE DIRETÓRIO Segura
// dirname(__DIR__) sobe um nível. Sai de 'public/' e vai para a raiz do projeto.
// Depois, concatenamos com '/src' para acessar o diretório de regras de negócio.
$pasta_src = dirname(__DIR__) . '/src';

// 2. ROTEADOR BÁSICO (Lógica de execução de exercícios)
// Verifica se a URL enviou um parâmetro 'arquivo' (ex: ?arquivo=lista-01-fundamentos/exercicio1.php)
$arquivo_solicitado = $_GET['arquivo'] ?? null;

if ($arquivo_solicitado) {
    // SEGURANÇA CRÍTICA: Prevenção de Path Traversal (LFI - Local File Inclusion)
    // realpath() resolve o caminho absoluto e retorna false se o arquivo não existir ou for malicioso (ex: ../../../etc/passwd)
    $caminho_absoluto = realpath($pasta_src . '/' . $arquivo_solicitado);

    // Valida se o arquivo existe E se ele realmente está dentro da pasta 'src'
    if ($caminho_absoluto && strpos($caminho_absoluto, realpath($pasta_src)) === 0) {
        // Importa e executa o código do exercício
        require_once $caminho_absoluto;
        exit; // Encerra o script para não carregar o HTML do índice abaixo
    } else {
        http_response_code(404);
        die("<h3>Erro 404: Arquivo não encontrado ou acesso negado pela política de segurança.</h3>");
    }
}

// 3. LÓGICA DE LISTAGEM (Caso nenhuma rota seja chamada)
$modulos = [];
if (is_dir($pasta_src)) {
    $conteudo = scandir($pasta_src);
    foreach ($conteudo as $item) {
        // Filtra apenas diretórios reais dentro de src (ignora arquivos soltos e ponteiros ./..)
        if ($item !== '.' && $item !== '..' && is_dir($pasta_src . '/' . $item)) {
            $modulos[] = $item;
        }
    }
    sort($modulos);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambiente de Desenvolvimento - Exercícios</title>
    
    <link rel="stylesheet" href="css/global.css?v=<?= time() ?>">
</head>
<body>
    <div class="container">
        <h1>Módulos de Estudo (Diretório src/)</h1>
        
        <?php if (empty($modulos)): ?>
            <p>Nenhum módulo encontrado na pasta 'src'.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($modulos as $modulo): ?>
                    <li>
                        <strong><?= htmlspecialchars($modulo, ENT_QUOTES, 'UTF-8') ?></strong>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>
</html>