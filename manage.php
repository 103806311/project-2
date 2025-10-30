<?php
require_once('settings.php');

session_start(); // Start session

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not
    exit();
}



// handle deleting eois
// Handle delete EOIs by job reference
if (isset($_POST['delete_eois']) && !empty($_POST['delete_job_ref'])) {
    $delete_job_ref = mysqli_real_escape_string($conn, $_POST['delete_job_ref']);

    $delete_sql = "DELETE FROM process_eoi WHERE jobRef='$delete_job_ref'";
    mysqli_query($conn, $delete_sql);

    // Optionally redirect to refresh
    header("Location: manage.php");
    exit();
}

// status php
// Handle status update
if (isset($_POST['update_status'])) {
    $eoi_number = mysqli_real_escape_string($conn, $_POST['eoi_number']);
    $new_status = mysqli_real_escape_string($conn, $_POST['new_status']);

    $update_sql = "UPDATE process_eoi SET status='$new_status' WHERE eoiNumber='$eoi_number'";
    mysqli_query($conn, $update_sql);

}

// sorting actions
if (isset($_POST['sort_by_reference']) && !empty($_POST['job_reference'])) {
    // Filter by job reference
    $job_ref = mysqli_real_escape_string($conn, $_POST['job_reference']);
    $_SESSION['active_filter'] = 'job_reference';
    $_SESSION['job_reference'] = $job_ref;
    $sql = "SELECT * FROM process_eoi WHERE jobRef='$job_ref' ORDER BY eoiNumber ASC";

} elseif (isset($_POST['sort_by_name'])) {
    // Filter by name
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);

    $_SESSION['active_filter'] = 'name';
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;

    // Build query based on what was provided
    if (!empty($first_name) && !empty($last_name)) {
        $sql = "SELECT * FROM process_eoi WHERE firstName = '$first_name' AND lastName = '$last_name' ORDER BY eoiNumber ASC";
    } elseif (!empty($first_name)) {
        $sql = "SELECT * FROM process_eoi WHERE firstName = '$first_name' ORDER BY eoiNumber ASC";
    } elseif (!empty($last_name)) {
        $sql = "SELECT * FROM process_eoi WHERE lastName = '$last_name' ORDER BY eoiNumber ASC";
    } else {
        $sql = "SELECT * FROM process_eoi ORDER BY eoiNumber ASC";
    }

} elseif (isset($_POST['list_all'])) {
    // Clear filters
    unset($_SESSION['active_filter']);
    unset($_SESSION['job_reference']);
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    $sql = "SELECT * FROM process_eoi ORDER BY eoiNumber ASC";

} elseif (isset($_POST['update_status']) && isset($_SESSION['active_filter'])) {
    // Reapply the stored filter after status update
    if ($_SESSION['active_filter'] == 'job_reference') {
        $job_ref = $_SESSION['job_reference'];
        $sql = "SELECT * FROM process_eoi WHERE jobRef='$job_ref' ORDER BY eoiNumber ASC";
    } elseif ($_SESSION['active_filter'] == 'name') {
        $first_name = $_SESSION['first_name'];
        $last_name = $_SESSION['last_name'];

        if (!empty($first_name) && !empty($last_name)) {
            $sql = "SELECT * FROM process_eoi WHERE firstName = '$first_name' AND lastName = '$last_name' ORDER BY eoiNumber ASC";
        } elseif (!empty($first_name)) {
            $sql = "SELECT * FROM process_eoi WHERE firstName = '$first_name' ORDER BY eoiNumber ASC";
        } elseif (!empty($last_name)) {
            $sql = "SELECT * FROM process_eoi WHERE lastName = '$last_name' ORDER BY eoiNumber ASC";
        }
    }
} else {
    // Page loaded first time or no filter active
    $sql = "SELECT * FROM process_eoi ORDER BY eoiNumber ASC";
}

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Manager Dashboard</title>
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
    <link rel="stylesheet" type="text/css" href="styles/manage.css">

</head>

<body>
    <?php include('topNav.inc'); ?>
    <?php include('nav.inc'); ?>

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
                    <th><em>Action</em></th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                <?php
                // here, i create a form to handle status change for every row (entry). its one of the ways to tackle the status update requirement
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
                        echo "<td>
            <form method='post' action='manage.php' style='display:inline;'>
                <input type='hidden' name='eoi_number' value='" . $row['eoiNumber'] . "'>

                <select name='new_status'>
                    <option value='New'>New</option>
                    <option value='Current'>Current</option>
                    <option value='Final'>Final</option>
                </select>
                <input type='submit' name='update_status' value='Update'>
            </form>
          </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No EOIs found.</td></tr>";
                }
                ?>
            </tbody>

            </tbody>
        </table>

        <section class="delete-section">
            <h3>Delete EOIs by Job Reference</h3>
            <form method="post" action="manage.php">
                <input type="text" name="delete_job_ref" placeholder="Enter job reference to delete" required>
                <input type="submit" name="delete_eois" value="Delete All EOIs"
                    onclick="return confirm('Are you sure you want to delete all EOIs for this job reference? This cannot be undone.');">
            </form>
        </section>
    </main>


    <?php include('footer.inc'); ?>




</body>

</html>