<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<div class="container mt-5">
    <h2>Login</h2>
    <form method="post">
        <div class="form-group">
            <label>Username or Email</label>
            <input type="text" name="identity" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Password</label>
            <div class="input-group">
                <input type="password" id="password" name="password" class="form-control" required>
                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">Show</button>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Login</button>
    </form>
</div>

<script>
    function togglePassword() {
        const passwordField = document.getElementById("password");
        const toggleButton = event.target;
        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleButton.textContent = "Hide";
        } else {
            passwordField.type = "password";
            toggleButton.textContent = "Show";
        }
    }
</script>

<?= $this->endSection() ?>