<?php include 'views/header.php'; ?>

<h1>Add New Faculty Record</h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-error">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<fieldset>
    <legend>Faculty Details</legend>
    <form action="index.php?action=add" method="POST">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="<?= $_POST['first_name'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label for="middle_name">Middle Name</label>
            <input type="text" id="middle_name" name="middle_name" value="<?= $_POST['middle_name'] ?? '' ?>">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="<?= $_POST['last_name'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" id="age" name="age" min="18" max="100" value="<?= $_POST['age'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label>Gender</label>
            <input type="radio" id="male" name="gender" value="Male" <?= (($_POST['gender'] ?? '') === 'Male') ? 'checked' : '' ?> required>
            <label for="male" style="width:auto; font-weight:normal;">Male</label>
            <input type="radio" id="female" name="gender" value="Female" <?= (($_POST['gender'] ?? '') === 'Female') ? 'checked' : '' ?>>
            <label for="female" style="width:auto; font-weight:normal;">Female</label>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="<?= $_POST['address'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" id="position" name="position" value="<?= $_POST['position'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" id="salary" name="salary" step="0.01" min="0" value="<?= $_POST['salary'] ?? '' ?>" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Save Faculty</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</fieldset>

</body>
</html>