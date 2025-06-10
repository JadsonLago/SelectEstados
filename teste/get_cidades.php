<?php
header('Content-Type: application/json');

$cidadesPorEstado = [
    1 => [ // SP
        ['id' => 1, 'nome' => 'São Paulo'],
        ['id' => 2, 'nome' => 'Campinas'],
        ['id' => 3, 'nome' => 'Santos']
    ],
    2 => [ // RJ
        ['id' => 4, 'nome' => 'Rio de Janeiro'],
        ['id' => 5, 'nome' => 'Niterói']
    ],
    3 => [ // MG
        ['id' => 6, 'nome' => 'Belo Horizonte'],
        ['id' => 7, 'nome' => 'Uberlândia']
    ]
];

$estadoId = isset($_GET['estado_id']) ? (int)$_GET['estado_id'] : 0;
$cidades = $cidadesPorEstado[$estadoId] ?? [];

echo json_encode($cidades);
?>