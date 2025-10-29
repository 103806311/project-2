<?php
require_once('settings.php');

session_start(); // Start session

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not
    exit();
}


// sorting actions

if (isset($_POST['sort_results'])) {
    // Sort by chosen field
    $field = $_POST['sort_field'];
    $sql = "SELECT * FROM eoi ORDER BY $field DESC";
} elseif (isset($_POST['sort_by_reference']) && !empty($_POST['job_reference'])) {
    // Filter by job reference
    $job_ref = mysqli_real_escape_string($conn, $_POST['job_reference']);
    $sql = "SELECT * FROM eoi WHERE job_reference='$job_ref' ORDER BY eoi_number ASC";
} elseif (isset($_POST['list_all'])) {
    // Default list all
    $sql = "SELECT * FROM eoi ORDER BY eoi_number ASC";
} else {
    // Page loaded first time
    $sql = "SELECT * FROM eoi ORDER BY eoi_number ASC";
}

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Manager Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>




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
                <input type="text" name="job_reference" placeholder="Enter job reference">
                <input type="submit" name="sort_by_reference" value="sort by Reference">
                <input type="submit" name="list_all" value="List All EOIs">

                <!-- sort by field -->
                <select name="sort_field">
                    <option value="eoi_number">EOI Number</option>
                    <option value="job_reference">Job Reference</option>
                    <option value="first_name">First Name</option>
                    <option value="last_name">Last Name</option>
                    <option value="status">Status</option>
                </select>
                <!-- <input type="submit" name="sort_results" value="Sort"> -->
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
                        echo "<td>" . $row['eoi_number'] . "</td>";
                        echo "<td>" . $row['job_reference'] . "</td>";
                        echo "<td>" . $row['first_name'] . "</td>";
                        echo "<td>" . $row['last_name'] . "</td>";
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