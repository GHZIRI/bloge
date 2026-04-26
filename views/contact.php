<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Blog</title>
    <link rel="stylesheet" href="../assets/css/viewer.css">
</head>
<body>

    <nav class="navbar">
        <div class="nav-brand">Welcome to my blog</div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="articles.php">Articles</a></li>
            <li><a href="contact.php" class="active">Contact</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="contact-wrapper">
            <h1>Get in Touch</h1>
            <p class="subtitle">We'd love to hear from you. Send us a message!</p>
            
            <form action="" method="POST">
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