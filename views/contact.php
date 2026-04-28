<?php
session_start();
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../assets/css/contact.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-brand">Welcome to my blog</div>
        <ul class="nav-links">
            <li><a href="index.php" class="<?php echo $currentPage === 'index.php' ? 'active' : ''; ?>">Home</a></li>
            <li><a href="articles.php" class="<?php echo $currentPage === 'articles.php' ? 'active' : ''; ?>">Articles</a></li>
            <li><a href="contact.php" class="<?php echo $currentPage === 'contact.php' ? 'active' : ''; ?>">Contact</a></li>
        </ul>
        <?php if (isset($_SESSION['user_name'])): ?>
            <div class="nav-user">
                <span class="user-icon">&#128100;</span>
                <span class="user-name"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                <a href="../logout.php" class="logout-link">Logout</a>
            </div>
        <?php endif; ?>
    </nav>

    <div class="container">
        <div class="contact-wrapper">
            <h1>Get in Touch</h1>
            <p class="subtitle">We'd love to hear from you. Send us a message!</p>
            
            <form action="https://api.web3forms.com/submit" method="POST">
                <input type="hidden" name="access_key" value="aca30324-4dbe-480d-bd32-11cb418fb742">
                
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="John Doe" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="john@example.com" required>
                </div>
                
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" class="form-control" placeholder="How can we help you?" required></textarea>
                </div>
                
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
    </div>
</body>
</html>