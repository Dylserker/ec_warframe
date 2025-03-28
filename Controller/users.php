<?php
/**
 * @var PDO $pdo
 * @var string $actionName
 */
require "model/users.php";
$users = getUsers($pdo);
if(!is_array($users)) {
    $errors[] = $users;
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'
){
    switch ($actionName) {
        case 'toggle_enabled' :
            $id = cleanString($_GET['id']);
            $res = toggleEnabled($pdo, $id);
            header('Content-Type: application/json');
            if (is_bool($res)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['error' => $res]);
            }
            exit();
            break;
    }
}
require "view/users.php";
