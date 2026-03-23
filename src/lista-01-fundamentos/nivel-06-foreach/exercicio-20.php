<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-20.php
 * Responsabilidade: Instanciar uma estrutura de dados de chave-valor (Hash Map).
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Estrutura de Dados Associativa)
// A chave (Key) é a string, o valor (Value) é o float.
$catalogo_produtos = [
    'Monitor Dell 24"' => 1250.00,
    'Teclado Mecânico Keychron' => 650.50,
    'Mouse Logitech MX Master 3' => 580.99,
    'Suporte Articulado' => 180.00,
    'Webcam Full HD' => 320.75
];

// 2. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-20.php';