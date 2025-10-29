<?php
require_once('settings.php');
?>


<!-- Head section is unique for each page (links to separate style css, and has separate titles), hence not added as an inc-->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.inc'); ?>
    <link rel="stylesheet" href="styles/about.css">
    <title>About page</title>
</head>



<body>
    <!-- top nav bar -->
    <?php include('inc/topNav.inc'); ?>

    <!--Main Navigation bar-->
    <header class="hero-section">
        <?php include('nav.inc'); ?>

        <div class="hero-text-section">
            <h1 class="hero-phrase">About <span style="color: #ff4c4c;">Us</span></h1>

            <figure class="group-photo">
                <img src="images/IMG_8348.webp">
                <figcaption>Our great team!</figcaption>
            </figure>

        </div>

    </header>



    <main>
        <section class="about-us">
            <!-- team name and group details -->
            <h2 class="about-us-title">Our Team Details</h2>
            <h3 class="about-us-title2">Group Information</h3>
            <ul class="about-us-details">
                <li><strong>Group Name:</strong> Group 4</li>
                <li><strong>Class Day/Time:</strong> Thursday 2:30 pm</li>
            </ul>

            <h3 class="about-us-title2">Member Contributions</h3>
            <dl>
                <?php

                // Fetch all members from the about table
                $query = "SELECT member_name, contribution_part1, contribution_part2 FROM about";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $row['member_name'];
                        $part1 = $row['contribution_part1'];
                        $part2 = $row['contribution_part2'];
                        echo "<dt><strong>$name</strong></dt>";
                        echo "<dd>Part 1 contribution: $part1</dd>";
                        echo "<dd>Part 2 contribution: $part2</dd>";
                        echo "<dd><em>\"\"</em></dd>"; // 
                    }
                } else {
                    echo "<dd>No member contributions found.</dd>";
                }
                ?>
            </dl>

            <!-- Fun facts table -->
            <h2 class="about-us-title fun-facts">Fun Facts</h2>

            <table>
                <thead>
                    <tr>
                        <th><em>Name</em></th>
                        <th><em>Dream Job</em></th>
                        <th><em>Coding Snack</em></th>
                        <th><em>Hometown</em></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Elias</td>
                        <td>Indefinite Vacation</td>
                        <td>Red Frogs</td>
                        <td>Uvira, Congo</td>
                    </tr>
                    <tr>
                        <td>Mahin</td>
                        <td>Data Analyst</td>
                        <td>Popcorn</td>
                        <td>Melbourne</td>
                    </tr>
                    <tr>
                        <td>Mohammad Maruf Haider</td>
                        <td>Mechatronics Engineer</td>
                        <td>Mineral water</td>
                        <td>Narayanganj, Bangladesh</td>
                    </tr>
                </tbody>
            </table>


        </section>
        <!-- aside student ids -->
        <aside class="student-ids">
            <h3 class="about-us-title">Student IDs</h3>
            <p><strong>Elias:</strong> 106283742</p>
            <p><strong>Mahin:</strong> 105913569</p>
            <p><strong>Haider:</strong> 103806311</p>
        </aside>




    </main>



    <?php include('footer.inc'); ?>



</body>


</html>