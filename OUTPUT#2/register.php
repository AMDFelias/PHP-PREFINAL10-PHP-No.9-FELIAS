<?php require_once 'includes/header.php'; ?>

<div class="card">
    <h2>Create an Account</h2>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn">Register</button>
    </form>
    <div class="form-footer">
        Already have an account? <a href="login.php">Login here</a>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>