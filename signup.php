<?php include('header.php') ?>

<div class="container d-flex justify-content-center align-items-center vh-100 ">

    <form method="post" action="process_signup.php" class="p-5 border border-secondary rounded">
    <h2>SignUp </h2>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input placeholder="format 2547.." type="text" class="form-control" id="phone_number" name="phone_number" required>

        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

        <p class="mt-3">Already have an account? <a href="login.php">Login</a></p>
    </form>
</div>