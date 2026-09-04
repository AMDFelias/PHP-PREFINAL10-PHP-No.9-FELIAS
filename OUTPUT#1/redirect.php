<?php
    $req_type = $_SERVER['REQUEST_METHOD'] === 'POST' ? '$_POST' : '$_GET';
    $data = $_SERVER['REQUEST_METHOD'] === 'POST' ? $_POST : $_GET;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Output No. 1</title>
    <style>
        body { font-family: "Arial"; }
        .data-val { text-decoration: underline; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Data is sent here, and it is stored at <?php echo $req_type; ?> variable</h2>
    <table>
        <tr>
            <td width="140">First Name:</td>
            <td class="data-val"><?php echo htmlspecialchars($data['fname'] ?? ''); ?></td>
        </tr>
        <tr>
            <td>Middle Name:</td>
            <td class="data-val"><?php echo htmlspecialchars($data['mname'] ?? ''); ?></td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td class="data-val"><?php echo htmlspecialchars($data['lname'] ?? ''); ?></td>
        </tr>
        <tr>
            <td>Age:</td>
            <td class="data-val"><?php echo htmlspecialchars($data['age'] ?? ''); ?></td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td class="data-val"><?php echo htmlspecialchars($data['gender'] ?? ''); ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td class="data-val"><?php echo htmlspecialchars($data['email'] ?? ''); ?></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td class="data-val"><?php echo htmlspecialchars($data['address'] ?? ''); ?></td>
        </tr>
        <tr>
            <td>Contact Number:</td>
            <td class="data-val"><?php echo htmlspecialchars($data['contact_number'] ?? ''); ?></td>
        </tr>
    </table>
    <br><br>
    <a href="./">Return to Main Form</a>
</body>
</html>