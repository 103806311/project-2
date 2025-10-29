<!DOCTYPE html>
<html lang="en">

<!-- Head section is unique for each page (links to separate style css, and has separate titles), hence only partially addedas inc-->
<head>
    <?php include('header.inc'); ?>
    <title>NIWS Recruitment - Home</title>
    <link rel="stylesheet" href="styles/index.css">
</head>


<body>
    <?php include('topNav.inc'); ?>


  <!-- Hero section (different content here for each page) -->
    <header class="hero-section">
        <?php include('nav.inc'); ?>


        <div class="hero-text-section">
            <h1 class="hero-phrase">We get <span style="color: #ff4c4c;">you</span> Hired</h1>
            <p class="hero-text">At NIWS Recruitment, it is our top priority to connect high potential talent with the
                best opportunities
                in the market. With 20 years of industry experience, we service over 5,000 positions in IT and
                Technology.</p>

            <p class="hero-text hero-text2">
                Explore our many job opportunities!</p>

            <button class="more"> <a href="about.php">Learn more</a></button>

        </div>


    </header>

    <main>
        <!-- Main body section (why hire us) -->
        <section id="main-body">

            <section class="why-choose-us">
                <p class="choose-us-title">Why Choose Us ?</p>
                <p class="choose-us-description">We are commited to get you the best possible opportuinity!</p>

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

    <?php include('footer.inc'); ?>

  
</body>

</html>