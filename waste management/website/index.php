<?php
include('connect.php');
$sql_query = "SELECT * FROM authImages";
$result = mysqli_query($conn, $sql_query);

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Waste Management</title>
    <link rel="stylesheet" type="text/css" href="styles.css?v=1" />
</head>

<body>
    <header>
        <div class="website-name">
            <a href="https://samriddhischool.edu.np" class="samriddhi" target="_blank">
                <img src="samriddhi.png" alt="samriddhi school" title="samriddhi school" />
            </a>
            <a href="index.html">
                <h1>Waste Management</h1>
            </a>
        </div>
        <nav>
        <div class="hamburger-menu">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <ul class="nav-links">
            <li><a href="auth_displayImages.php">Photos</a></li>
            <li><a href="#">Videos</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    </header>
    <main>
    <?php
      $rows = array();
      while ($row = mysqli_fetch_assoc($result)) {
          $rows[] = $row;
      }
      
      // Traverse the array in reverse order
      for ($i = count($rows) - 1; $i >= 0; $i--) {
          $row = $rows[$i];
      
          $username = $row['username'];
          $class = $row['class'];
          $section = $row['section'];
          $title = $row['title'];
          $description = $row['description'];
          $image_path = $row['image_path'];
          ?>
            <div class="box">
                <section class="image">
                <img src="../uploadSystem/<?php echo $image_path; ?>" alt="image">
                </section>
                <section class="title">
                    <?php echo $title; ?>
                </section>
            </div>


            <?php
        }
        ?>
    </main>
    <footer>
        <h2>About Us</h2>
        <div id="about">
            <p>
                Welcome to our website! We are Samriddhi School, and we take great
                pride in introducing you to our waste management initiative. At
                Samriddhi School, we firmly believe that the youth have the power to
                drive positive change. With Journeyr, we aim to inspire and empower
                individuals to make a difference by adopting environmentally friendly
                habits, starting right from their own homes. Through our initiative,
                we focus on two key areas: composting and the production of
                nutrient-rich compost manure. Our team of dedicated students at
                Samriddhi School works tirelessly to spread awareness about waste
                management. We organize engaging workshops, interactive campaigns, and
                community outreach programs to equip individuals with the knowledge
                and skills needed to make sustainable choices. By collaborating with
                schools, organizations, and local communities, we aim to create a
                collective movement towards a cleaner and greener future.
            </p>
        </div>
        <h2>Contact Us</h2>
        <div id="contact">
            <a href="https://samriddhischool.edu.np">
                <img src="samriddhi.png" alt="samriddhi school" title="samriddhi school" />
            </a>

            <ul>
                <li>
                    <div>
                        <h5>Location</h5>
                        <div>
                            <div>
                                <b><span class="bullet">&#8226;</span> Secondary Wing:</b><br />
                                Near Banasthali Chowk<br />
                                Banasthali, Balaju, Kathmandu, Nepal<br />
                                <b><span class="bullet">&#8226;</span> Pre-School Wing:</b><br />
                                Opposite to Bhat Bhateni Supermarket, Balaju<br />
                                Binayak Basti, Kathmandu, Nepal
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div>
                        <h5>Phone &amp; E-mail</h5>
                        <div>
                            <div>
                                <b><span class="bullet">&#8226;</span> Secondary Wing:</b><br />
                                Tel:
                                <a href="tel:014983777">01-4983777</a>,
                                <a href="tel:014984777">4984777</a><br />

                                <b><span class="bullet">&#8226;</span> Pre-School Wing:</b><br />
                                Tel:
                                <a href="tel:014970590">01-4970590</a>,
                                <a href="tel:014970591">4970591</a><br />

                                Email:
                                <a href="mailto:info@samriddhischool.edu.np">info@samriddhischool.edu.np</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div>
                        <h5>School Hours</h5>
                        <div>
                            <div>
                                <span class="bullet">&#8226;</span> Grade XI – XII: 6:30 AM – 10:45 AM<br />
                                <span class="bullet">&#8226;</span> School Section (I-X): 8:30 AM to 4:30 PM<br />
                                <span class="bullet">&#8226;</span> Pre-School Section: 9:00 AM to 3:00 PM<br />
                                <span class="bullet">&#8226;</span> Office Hours: 8:30 AM to 4:30 PM<br />
                                (Saturday Closed)
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div id="developers">
            <a href="https://kbcampus.edu.np"><img src="Kathmandu-Business-Campus.jpg"
                    alt="Kathmandu-Business-Campus"></a><span> ( Owned & Managed by Samriddhi School )</span>
            <h2>Developers <span> BCA 3rd SEM Students</span></h2>
            <ul>
                <li>Rayyan</li>
                <li>Satish</li>
                <li>Kelvin</li>
                <li>Nishan</li>
                <li>Saiyam</li>
                <li>Riyaz</li>
            </ul>
            <p>© 2021 Samriddhi School, Binayak Basti, Balaju, Kathmandu | Tel: Primary Wing - 01-4970590/ 4970591,
                Secondary Wing - 01-4983777/ 4984777</p>
        </div>
    </footer>
</body>
<script>
    const hamburgerMenu = document.querySelector('.hamburger-menu');
    const navLinks = document.querySelector('.nav-links');

    hamburgerMenu.addEventListener('click', () => {
        hamburgerMenu.classList.toggle('open');
        navLinks.classList.toggle('open');
    });
</script>
</html>