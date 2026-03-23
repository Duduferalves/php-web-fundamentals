<?php
declare(strict_types=1);

/**
 * CONTROLADOR: exercicio-18.php
 * Responsabilidade: Instanciar uma estrutura de dados (Array Indexado) e delegar a renderização.
 */

// 1. ALOCAÇÃO DE MEMÓRIA (Estrutura de Dados)
// Em produção, este array seria populado por uma query SQL ou chamada de API.
$lista_pacientes = [
    'Carlos Eduardo Silva',
    'Maria Fernanda Oliveira',
    'João Pedro Souza',
    'Ana Clara Mendes',
    'Rafael Costa'
];

// 2. INJEÇÃO NA VIEW
require_once __DIR__ . '/view-18.php';