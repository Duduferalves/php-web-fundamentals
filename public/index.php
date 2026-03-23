<?php

/**
 * FRONT CONTROLLER - ARQUITETURA LIMPA
 */

$pasta_src = dirname(__DIR__) . '/src';
$arquivo_solicitado = $_GET['arquivo'] ?? null;

// 1. ROTEAMENTO SEGURO
if ($arquivo_solicitado) {
    $caminho_absoluto = realpath($pasta_src . '/' . $arquivo_solicitado);
    if ($caminho_absoluto && strpos($caminho_absoluto, realpath($pasta_src)) === 0) {
        require_once $caminho_absoluto;
        exit;
    }
}

// 2. CONSTRUÇÃO DA ÁRVORE (Lógica de Negócio)
$arvore = [];
// Array de pastas que o sistema está proibido de renderizar na interface
$pastas_ignoradas = ['templates', 'config', 'assets'];

if (is_dir($pasta_src)) {
    $directory = new RecursiveDirectoryIterator($pasta_src, RecursiveDirectoryIterator::SKIP_DOTS);
    $iterator = new RecursiveIteratorIterator($directory, RecursiveIteratorIterator::SELF_FIRST);

    foreach ($iterator as $info) {
        if ($info->isFile() && $info->getExtension() === 'php' && !str_starts_with($info->getFilename(), 'view-')) {
            $caminho_relativo = str_replace($pasta_src . DIRECTORY_SEPARATOR, '', $info->getPathname());
            $partes = explode(DIRECTORY_SEPARATOR, $caminho_relativo);

            // FILTRO DE SEGURANÇA E ARQUITETURA:
            // Pega o nome do diretório raiz deste arquivo (ex: "templates" ou "Lista 1")
            $diretorio_raiz_do_arquivo = $partes[0];

            // Se o diretório raiz estiver na nossa blacklist, pula para a próxima iteração do loop (ignora o arquivo)
            if (in_array($diretorio_raiz_do_arquivo, $pastas_ignoradas)) {
                continue;
            }

            $temp = &$arvore;
            foreach ($partes as $parte) {
                if (!isset($temp[$parte])) $temp[$parte] = [];
                $temp = &$temp[$parte];
            }
            $temp['__path__'] = $caminho_relativo;
        }
    }
}

// 3. RENDERIZAÇÃO (View Helper)
function renderizarArvore($dados)
{
    // AQUI ENTRA O ALGORITMO SUBSTITUINDO O ksort:
    uksort($dados, function($a, $b) {
        if ($a === '__path__') return -1;
        if ($b === '__path__') return 1;

        $pesoA = str_contains(strtolower($a), 'desafio') ? 1 : 0;
        $pesoB = str_contains(strtolower($b), 'desafio') ? 1 : 0;

        if ($pesoA !== $pesoB) {
            return $pesoA <=> $pesoB; 
        }

        return strnatcasecmp($a, $b);
    });

    // O RESTANTE DO SEU CÓDIGO CONTINUA INALTERADO:
    foreach ($dados as $nome => $filhos) {
        if ($nome === '__path__') continue;

        $id_unico = "f-" . substr(md5($nome . rand()), 0, 8);
        $is_file = isset($filhos['__path__']);

        if ($is_file): ?>
            <div class='item file'>
                <a href='?arquivo=<?= urlencode($filhos['__path__']) ?>'>📄 <?= htmlspecialchars($nome) ?></a>
            </div>
        <?php else: ?>
            <div class='folder-container'>
                <div class='item folder' onclick="toggleFolder('<?= $id_unico ?>')">
                    📁 <?= htmlspecialchars($nome) ?> <span class='arrow'>▶</span>
                </div>
                <div id='<?= $id_unico ?>' class='submenu' style='display:none;'>
                    <?php renderizarArvore($filhos); ?>
                </div>
            </div>
        <?php endif;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorador de Exercícios PHP</title>
    
    <link rel="stylesheet" href="css/variables.css?v=<?= time() ?>">
    <link rel="stylesheet" href="css/reset.css?v=<?= time() ?>">
    <link rel="stylesheet" href="css/layout.css?v=<?= time() ?>">
    <link rel="stylesheet" href="css/components.css?v=<?= time() ?>">
</head>     

<body>
    <div class="container">
        <h1>Dashboard de Estudos</h1>
        <div class="tree-root">
            <?php renderizarArvore($arvore); ?>
        </div>
    </div>

    <script>
        function toggleFolder(id) {
            const el = document.getElementById(id);
            const header = el.previousElementSibling;
            const isHidden = el.style.display === 'none';
            el.style.display = isHidden ? 'block' : 'none';
            header.classList.toggle('active', isHidden);
        }
    </script>
</body>

</html>