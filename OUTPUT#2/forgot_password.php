<?php require_once 'includes/header.php'; ?>

<div class="card">
    <h2>Reset Password</h2>
    <p style="margin-bottom: 15px; font-size: 14px; color: #666;">Enter your email address to receive password reset instructions.</p>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter registered email" required>
        </div>
        <button type="submit" class="btn">Send Reset Link</button>
    </form>
    <div class="form-footer">
        <a href="login.php">Back to Login</a>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>