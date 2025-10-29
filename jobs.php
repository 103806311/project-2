<?php
require_once("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("<p>Database connection failure: " . mysqli_connect_error() . "</p>");
}

$sql = "SELECT * FROM jobs";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="NIWS Recruitment - Explore job opportunities in IT and Technology">
    <meta name="keywords" content="Jobs, Careers, Recruitment, Hiring, IT, Technology, NIWS Recruitment">
    <meta name="author" content="NIWS Recruitment Team">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NIWS Recruitment - Jobs</title>
    <link rel="stylesheet" href="./styles/jobs.css?v=1">
    <link rel="stylesheet" href="./styles/common.css">
    <style>
        aside.compliance{width:25%;float:right;border:2px solid #7c3aed;padding:12px;margin:12px 16px;background:#efe9ff;border-radius:8px}
        .salary-chip{background:#e2d6ff;padding:2px 6px;border-radius:6px;font-weight:600}
    </style>
</head>
<body>

<?php include("header.inc"); ?>
<?php include("nav.inc"); ?>

<main class="main-content">

    <section class="page-intro" aria-labelledby="intro-title">
        <h2 id="intro-title">Featured IT Roles</h2>
    </section>

    <section class="featured" aria-label="Featured roles">
        <?php
       
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<article class='job-card' aria-labelledby='ref-{$row['job_ref']}'>";
                echo "<header class='job-card__head'>";
                echo "<h3 id='ref-{$row['job_ref']}'>Ref: {$row['job_ref']} — {$row['title']}</h3>";
                echo "<p class='company'>Company: {$row['company']}</p>";
                echo "</header>";
                echo "<p><strong>Short description:</strong> {$row['short_desc']}</p>";
                echo "<p><strong>Salary:</strong> <span class='salary-chip'>{$row['salary']}</span></p>";
                echo "<p><strong>Reports to:</strong> {$row['reports_to']}</p>";

                echo "<section aria-labelledby='resp-{$row['job_ref']}'>";
                echo "<h4 id='resp-{$row['job_ref']}'>Key responsibilities</h4>";
                echo "<p>{$row['responsibilities']}</p>";
                echo "</section>";

                echo "<section aria-labelledby='req-{$row['job_ref']}'>";
                echo "<h4 id='req-{$row['job_ref']}'>Requirements</h4>";
                echo "<p>{$row['requirements']}</p>";
                echo "</section>";

                echo "</article>";
            }
        } else {
            echo "<p>No job listings found.</p>";
        }
        ?>
    </section>

    <aside class="compliance" aria-label="Why Work With NIWS">
        <h3>Why Work With NIWS?</h3>
        <ul>
            <li>20+ years in IT & technology recruitment</li>
            <li>Resume and interview coaching</li>
            <li>Coverage from startups to government</li>
            <li>Personal career consultation sessions</li>
        </ul>
    </aside>
</main>

<?php include("footer.inc"); ?>

</body>
</html>

<?php

mysqli_close($conn);
?>
