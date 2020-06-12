<?php
require 'connection.php';

if ($_GET['limit']) {
    $limitSQL = ' limit 0, ' . $_GET['limit'];
} else {
    $limitSQL = '';
}

$query = "SELECT * FROM snus" . mysqli_real_escape_string($mysqli ,$limitSQL);

$snus1 =
    [
        'info' => [
            'name' => 'Alex Nurmberg',
            'description' => 'Snus'
        ],
    ];

if ($result = $mysqli->query($query)) {
    while ($snus = $result->fetch_array()) {
        $snus1['data'][] =
            [
                'id' => $snus['id'],
                'name' => $snus['name'],
               'description' => $snus['description'],
                'image' => $snus['image'],
                'topic1'=> $snus['flavor'],
                'topic2' => $snus['price']
        ];
    }
    $result->close();
}
header('Content-Type: application/json');
echo json_encode($snus1);