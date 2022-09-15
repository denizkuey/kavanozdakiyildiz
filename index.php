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
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <main>
      <button id="back-to-top-btn"><i class="fas fa-arrow-up"></i></button>
      <section class="index-banner">
        <div class="vertical-center">
          <div class="wrapper">
            <h3>Latest Episode</h3>
            <?php
            include_once 'includes/dbh.inc.php';

            $sql = "SELECT * FROM podcasts ORDER BY idPodcast DESC LIMIT 1;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL statement failed.";
            } else {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              while ($row = mysqli_fetch_assoc($result)) {
                echo'<h2><a href="episodes.php" id=ep-link>'.$row["titlePodcast"].'</a></h2>
                <audio controls>
                  <source src="audio/'.$row["audioFullNamePodcast"].'" type="audio/mp3">
                </audio>';
              }
            }
            ?>
            <div class="audio-link">
              <a href="pcast://acikradyo.com.tr/i/rss/"> iTunes</a>
              <a href="http://acikradyo.com.tr/i/rss/" class="rss">RSS</a>
            </div>
          </div>
        </div>
      </section>
      <div class="wrapper">
        <section>
          <div class="index-box">
            <img src="img/topics.png">
            <h4>Topics</h4>
            <h3>In this podcast we generally talk about current  issues regarding artificial intelligence, data security, the future of technology.</h3>
          </div>
          <div class="index-box">
            <img src="img/schedule.png">
            <h4>Schedule</h4>
            <h3>A new epiosde of our podcast comes out every friday at 16:30</h3>
          </div>
          <div class="index-box">
            <img src="img/radioshow.png">
            <h4>Radio Show</h4>
            <h3>Our podcast goes live on <a href="http://acikradyo.com.tr/program/kavanozdaki-yildiz")>Açık Radyo FM</a></h3>
          </div>
          </section>
        </div>
        <div class="container">
          <form action="">
            <h1>Never Miss An Episode!</h1>
            <p>Subscribe to get a reminder email everytime a new episode comes out.</p>
            <div class="email-box">
              <i class="fas fa-envelope"></i>
              <input class="tbox" type="email" name="" value="" placeholder="Enter Your Email">
              <button class="btn" type="button" name="button">Subscribe</button>
            </div>
          </form>
        </div>
        <script src="main.js"></script>
    </main>
    <footer>
      <div class="wrapper">
        <p id="footer-website-creator">©2020</p>
      </div>
    </footer>
  </body>
</html>
