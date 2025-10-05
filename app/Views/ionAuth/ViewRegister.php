<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Register</h2>
    
    <form method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="identity" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Password</label>
            <div class="input-group">
                <input type="password" id="password" name="password" class="form-control" required>
                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">Show</button>
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-3">Register</button>
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
