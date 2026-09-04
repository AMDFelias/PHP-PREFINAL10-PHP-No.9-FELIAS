<?php
require_once 'controllers/FacultyController.php';

$controller = new FacultyController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

switch ($action) {
    case 'add':
        $controller->add();
        break;
    case 'edit':
        if ($id) $controller->edit($id);
        else header("Location: index.php");
        break;
    case 'delete':
        if ($id) $controller->delete($id);
        else header("Location: index.php");
        break;
    default:
        $controller->index();
        break;
}
?>