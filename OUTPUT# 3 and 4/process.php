<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_person'])) {
    $firstName     = trim($_POST['first_name']);
    $middleName    = trim($_POST['middle_name']);
    $lastName      = trim($_POST['last_name']);
    $age           = (int)$_POST['age'];
    $gender        = $_POST['gender'] ?? '';
    $email         = trim($_POST['email']);
    $address       = trim($_POST['address']);
    $contactNumber = trim($_POST['contact_number']);

    $sql = "INSERT INTO db_felias (first_name, middle_name, last_name, age, gender, email, address, contact_number) 
            VALUES (:first_name, :middle_name, :last_name, :age, :gender, :email, :address, :contact_number)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':first_name'     => $firstName,
        ':middle_name'    => $middleName,
        ':last_name'      => $lastName,
        ':age'            => $age,
        ':gender'         => $gender,
        ':email'          => $email,
        ':address'        => $address,
        ':contact_number' => $contactNumber
    ]);

    header("Location: index.php?status=success");
    exit();
}
?>