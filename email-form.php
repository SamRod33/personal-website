<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Contact Submitted - Samuel Rodriguez</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8" />
<link rel="icon" type="image/x-icon" href="/src/man.svg">
<link rel="stylesheet" href="/styles/email-form-styles.css">
</head>

<body>
    <header>
        <nav class="topnav-right">
            <a href="/">Home</a>
            <a href="/about.html">About</a>
            <a href="/projects.html">Projects</a>
            <a href="/blog.html">Blog</a>
            <a href="/contact.html">Contact</a>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="heading">
                <h1>Email Submission Details</h1>
            </div>
            <div class="heading">
                <div class="content">
                    <h2>Name: &nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($_POST['name']); ?></h2>
                </div>
                <div class="content">
                    <h2>Subject: <?php echo $_POST['subject'] ?></h2>
                </div>
                <div class="content">
                    <h2>From: &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['email'] ?></h2>
                </div>
               <div class="content">
                    <h2>Message</h2>
                    <div class="message">
                        <p><?php echo $_POST['msg'] ?></p>
                    </div>
               </div>
            </div>
            
        </div>
        
    </main>
</body>
</html>





