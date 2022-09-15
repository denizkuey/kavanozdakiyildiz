<!DOCTYPE html>
<html>
  <head>
    <meta charset= "utf-8">
    <title> Kavanozdaki Yıldız </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  </head>
  <body>
    <header>
      <div class="wrapper">
        <a href="index.php" class="header-brand">Kavanozdaki Yıldız</a>
      </div>
      <nav>
        <div class="wrapper">
          <ul>
            <li><a href="episodes.php">Episodes</a></li>
            <li><a href="about-us.html">About Us</a></li>
            <li><a href="contact.php" class="red-title">Contact</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <main>
      <p id=contact-p>Contact Us</p>
      <form class="contact-form" method="post">
        <input type="text" name="name" placeholder="Full name">
        <input type="text" name="mail" placeholder="Your e-mail">
        <input type="text" name="subject" placeholder="Subject">
        <textarea name="message" placeholder="Message"></textarea>
        <button type="submit" name="submit">Send</button>
      </form>
    </main>
    <footer>
      <div class="wrapper">
        <p id="footer-website-creator">©2020</p>
      </div>
    </footer>
  </body>
</html>
