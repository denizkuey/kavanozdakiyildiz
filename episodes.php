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
            <li><a href="episodes.php" class="red-title">Episodes</a></li>
            <li><a href="about-us.html">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="upload.html"><i class="fas fa-sign-in-alt"></i></a></li>
          </ul>
        </div>
        </ul>
      </nav>
    </header>
    <main>
      <button id="back-to-top-btn"><i class="fas fa-arrow-up"></i></button>
      <script src="main.js"></script>
      <section class="episodes-banner">
        <div class="vertical-center">
          <h2>Episodes</h2>
        </div>
      </section>
      <div class="wrapper">

            <?php
            include_once 'includes/dbh.inc.php';

            $sql = "SELECT * FROM podcasts ORDER BY idPodcast DESC;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL statement failed.";
            } else {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              while ($row = mysqli_fetch_assoc($result)) {
                echo' <div class="ep">
                <h2>'.$row["titlePodcast"].'</h2>
                <p>'.$row["descPodcast"].'</p>
                <audio controls>
                  <source src="audio/'.$row["audioFullNamePodcast"].'" type="audio/mp3">
                </audio>
                </div>';
              }
            }
            ?>

        </div>
    </main>
    <footer>
      <div class="wrapper">
        <p id="footer-website-creator">©2020</p>
      </div>
    </footer>
  </body>
</html>
