<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pharmacy Management System</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <header class="text-center mb-4">
                            <h1>Pharmaco</h1>
                        </header>
                        <h2 class="text-center">Login</h2>
                        
                        <?php if (isset($data['error'])): ?>
                            <div class="error-message"><?php echo htmlspecialchars($data['error']); ?></div>
                        <?php endif; ?>
                        
                        <form action="loginSubmit" method="post">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <!-- <div class="text-center">
                            <a href="/auth/register">Register</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-4">
        <p>© 2024 Pharmacy Management System</p>
    </footer>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
