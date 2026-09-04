<?php require_once 'includes/header.php'; ?>

<div class="card">
    <h2>Account Login</h2>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
    <div class="form-footer">
        <p><a href="forgot-password.php">Forgot Password?</a></p>
        <p style="margin-top: 5px;">Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>