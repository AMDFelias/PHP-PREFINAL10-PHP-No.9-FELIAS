<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM db_felias ORDER BY id DESC");
$persons = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Output No. 3 & 4 FELIAS</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        fieldset { border: 1px solid #ccc; padding: 15px; margin-bottom: 20px; }
        label { display: inline-block; width: 130px; font-weight: bold; }
        .form-group { margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h1>PHP Output No. 3 & 4</h1>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
        <p style="color: green; font-weight: bold;">Record saved successfully to the database!</p>
    <?php endif; ?>

    <fieldset>
        <legend>Register New Person</legend>
        <form action="process.php" method="POST">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" required>
            </div>
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" name="middle_name">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" required>
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="number" name="age" required>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <input type="radio" name="gender" value="Male" required> Male
                <input type="radio" name="gender" value="Female"> Female
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" required>
            </div>
            <div class="form-group">
                <label>Contact Number</label>
                <input type="text" name="contact_number" required>
            </div>
            <br>
            <button type="submit" name="submit_person">Submit</button>
            <button type="reset">Cancel</button>
        </form>
    </fieldset>

    <fieldset>
        <legend>List of Registered Persons</legend>
        <?php if (!empty($persons)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($persons as $person): ?>
                        <tr>
                            <td><?= htmlspecialchars($person['id']) ?></td>
                            <td>
                                <?= htmlspecialchars(trim($person['first_name'] . ' ' . $person['middle_name'] . ' ' . $person['last_name'])) ?>
                            </td>
                            <td><?= htmlspecialchars($person['age']) ?></td>
                            <td><?= htmlspecialchars($person['gender']) ?></td>
                            <td><?= htmlspecialchars($person['email']) ?></td>
                            <td><?= htmlspecialchars($person['address']) ?></td>
                            <td><?= htmlspecialchars($person['contact_number'] ?? '') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No records found.</p>
        <?php endif; ?>
    </fieldset>

</body>
</html>