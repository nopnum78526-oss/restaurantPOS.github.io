<?php
require_once 'config/db.php';
session_start();
?>
<?php include 'includes/header.php'; ?>

<div class="p-5 mb-4 bg-light rounded-3 text-center">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Welcome to Restaurant OS</h1>
        <p class="col-md-8 fs-4 mx-auto">Delicious food, delivered to your table. Experience the best dining management system.</p>

        <?php if (isset($_SESSION['user_id'])): ?>
            <?php if ($_SESSION['role'] == 'customer'): ?>
                <a href="customer/index.php" class="btn btn-primary btn-lg" type="button">Order Now</a>
            <?php elseif ($_SESSION['role'] == 'admin'): ?>
                <a href="admin/dashboard.php" class="btn btn-primary btn-lg" type="button">Go to Dashboard</a>
            <?php else: ?>
                <a href="staff/dashboard.php" class="btn btn-primary btn-lg" type="button">View Orders</a>
            <?php endif; ?>
        <?php else: ?>
            <a href="login.php" class="btn btn-primary btn-lg" type="button">Login</a>
            <a href="register.php" class="btn btn-outline-secondary btn-lg" type="button">Register</a>
        <?php endif; ?>
    </div>
</div>

<div class="row align-items-md-stretch">
    <div class="col-md-6">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
            <h2>Fresh Ingredients</h2>
            <p>We use only the freshest ingredients to ensure the best quality for our customers.</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="h-100 p-5 bg-light border rounded-3">
            <h2>Fast Service</h2>
            <p>Our staff is dedicated to providing you with the fastest and most polite service.</p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>