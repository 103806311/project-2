<?php
require_once('settings.php'); // database connection or settings
?>

<?php include('inc/header.inc'); ?>

<body>
    <!-- Top nav -->
    <?php include('inc/topNav.inc'); ?>

    <!-- Main navigation bar -->
    <?php include('inc/nav.inc'); ?>

    <main>
        <header class="hero-section">
            <div class="hero-text-section">
                <h1 class="hero-phrase">We get <span style="color: #ff4c4c;">you</span> Hired</h1>
                <p class="hero-text">
                    At NIWS Recruitment, it is our top priority to connect high potential talent with the best opportunities
                    in the market. With 20 years of industry experience, we service over 5,000 positions in IT and Technology.
                </p>

                <p class="hero-text hero-text2">
                    Explore our many job opportunities!
                </p>

                <button class="more"><a href="about.php">Learn more</a></button>
            </div>
        </header>

        <!-- Main body section (why hire us) -->
        <section id="main-body">
            <section class="why-choose-us">
                <p class="choose-us-title">Why Choose Us ?</p>
                <p class="choose-us-description">We are committed to get you the best possible opportunity!</p>

                <div class="statistics-grid">
                    <div class="statistics-card pink-card">
                        <h4>20+ Years</h4>
                        <p>of Helping you find jobs.</p>
                    </div>
                    <div class="statistics-card green-card">
                        <h4>IT & Tech</h4>
                        <p>Are our fields of specialization.</p>
                    </div>
                    <div class="statistics-card blue-card">
                        <h4>5000+</h4>
                        <p>Successful applicants!</p>
                    </div>
                </div>
            </section>
        </section>
    </main>

    <!-- Footer -->
    <?php include('inc/footer.inc'); ?>
</body>
</html>
