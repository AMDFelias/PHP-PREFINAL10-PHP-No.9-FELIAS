<?php include 'views/header.php'; ?>

<h1>PHP Output No. 5 - Faculty CRUD (MVC)</h1>

<?php if (isset($_GET['status'])): ?>
    <?php if ($_GET['status'] === 'created'): ?>
        <div class="alert alert-success">Faculty record added successfully!</div>
    <?php elseif ($_GET['status'] === 'updated'): ?>
        <div class="alert alert-success">Faculty record updated successfully!</div>
    <?php elseif ($_GET['status'] === 'deleted'): ?>
        <div class="alert alert-success">Faculty record deleted successfully!</div>
    <?php endif; ?>
<?php endif; ?>

<p><a href="index.php?action=add" class="btn btn-primary">+ Add New Faculty</a></p>

<fieldset>
    <legend>List of Registered Faculty</legend>
    <?php if (!empty($faculties)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($faculties as $f): ?>
                    <tr>
                        <td><?= htmlspecialchars($f['id']) ?></td>
                        <td><?= htmlspecialchars(trim($f['first_name'] . ' ' . $f['middle_name'] . ' ' . $f['last_name'])) ?></td>
                        <td><?= htmlspecialchars($f['age']) ?></td>
                        <td><?= htmlspecialchars($f['gender']) ?></td>
                        <td><?= htmlspecialchars($f['address']) ?></td>
                        <td><?= htmlspecialchars($f['position']) ?></td>
                        <td>$<?= number_format($f['salary'], 2) ?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?= $f['id'] ?>" class="btn btn-warning">Edit</a>
                            <a href="index.php?action=delete&id=<?= $f['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No faculty records found.</p>
    <?php endif; ?>
</fieldset>

</body>
</html>