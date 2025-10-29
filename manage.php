<?php
require_once('settings.php');

session_start(); // Start session

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not
    exit();
}


// sorting actions
if (isset($_POST['sort_by_reference']) && !empty($_POST['job_reference'])) {
    // Filter by job reference
    $job_ref = mysqli_real_escape_string($conn, $_POST['job_reference']);
    $sql = "SELECT * FROM process_eoi WHERE jobRef='$job_ref' ORDER BY eoiNumber ASC";

} elseif (isset($_POST['sort_by_name'])) {
    // Filter by name
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);

    // Build query based on what was provided
    if (!empty($first_name) && !empty($last_name)) {
        // Both names provided
        $sql = "SELECT * FROM process_eoi WHERE firstName = '$first_name' AND lastName LIKE '%$last_name%' ORDER BY eoiNumber ASC";
    } elseif (!empty($first_name)) {
        // Only first name
        $sql = "SELECT * FROM process_eoi WHERE firstName = '$first_name' ORDER BY eoiNumber ASC";
    } elseif (!empty($last_name)) {
        // Only last name
        $sql = "SELECT * FROM process_eoi WHERE lastName = '$last_name' ORDER BY eoiNumber ASC";
    } else {
        // No name provided, list all
        $sql = "SELECT * FROM process_eoi ORDER BY eoiNumber ASC";
    }

} elseif (isset($_POST['list_all'])) {
    // Default list all
    $sql = "SELECT * FROM process_eoi ORDER BY eoiNumber ASC";
} else {
    // Page loaded first time
    $sql = "SELECT * FROM process_eoi ORDER BY eoiNumber ASC";
}

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Manager Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="styles/manage.css">
</head>

<body>
    <?php include('inc/topNav.inc'); ?>
    <?php include('inc/nav.inc'); ?>

    <div class="hero-text-section">
        <h1 class="hero-phrase">Manager <span style="color: #ff4c4c;">Dashboard</span></h1>
    </div>






    <main>
        <div class="login-container">
            <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
            <p>This is the HR Manager dashboard. Functionality will be added here.</p>
            <a href="logout.php">
                <p>Logout</p>
            </a>
        </div>

        <section class="sorting">
            <form method="post" action="manage.php">
                <!-- Job Reference Filter -->
                <input type="text" name="job_reference" placeholder="Enter job reference">
                <input type="submit" name="sort_by_reference" value="Sort by Reference">

                <!-- Name Filter -->
                <input type="text" name="first_name" placeholder="Enter first name">
                <input type="text" name="last_name" placeholder="Enter last name">
                <input type="submit" name="sort_by_name" value="Sort by Name">

                <!-- List All -->
                <input type="submit" name="list_all" value="List All EOIs">
            </form>
        </section>

        <table>
            <thead>
                <tr>
                    <th><em>EOI No</em></th>
                    <th><em>Job Ref</em></th>
                    <th><em>First Name</em></th>
                    <th><em>Last Name</em></th>
                    <th><em>Email</em></th>
                    <th><em>Phone</em></th>
                    <th><em>Status</em></th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['eoiNumber'] . "</td>";
                        echo "<td>" . $row['jobRef'] . "</td>";
                        echo "<td>" . $row['firstName'] . "</td>";
                        echo "<td>" . $row['lastName'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No EOIs found.</td></tr>";
                }
                ?>
            </tbody>

            </tbody>
        </table>
    </main>




</body>

</html>