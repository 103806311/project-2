<?php
require_once 'settings.php';

// Block direct access
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['jobRef'])) {
    header('Location: apply.php');
    exit();
}

// Sanitize input
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$jobRef = clean_input($_POST['jobRef']);
$firstName = clean_input($_POST['firstName']);
$lastName = clean_input($_POST['lastName']);
$dob = clean_input($_POST['dob']);
$gender = clean_input($_POST['gender']);
$street = clean_input($_POST['street']);
$suburb = clean_input($_POST['suburb']);
$state = clean_input($_POST['state']);
$postcode = clean_input($_POST['postcode']);
$email = clean_input($_POST['email']);
$phone = clean_input($_POST['phone']);
$skills = !empty($_POST['skills']) ? implode(', ', $_POST['skills']) : '';
$otherSkills = clean_input($_POST['otherSkills']);
$status = clean_input($_POST['status']); // new field

// Ensure table exists
$conn->query("
CREATE TABLE IF NOT EXISTS process_eoi (
    eoiNumber INT AUTO_INCREMENT PRIMARY KEY,
    jobRef VARCHAR(5) NOT NULL,
    firstName VARCHAR(20) NOT NULL,
    lastName VARCHAR(20) NOT NULL,
    dob DATE NOT NULL,
    gender VARCHAR(10),
    street VARCHAR(40),
    suburb VARCHAR(40),
    state VARCHAR(3),
    postcode VARCHAR(4),
    email VARCHAR(50),
    phone VARCHAR(12),
    skills VARCHAR(100),
    otherSkills TEXT,
    status VARCHAR(10) DEFAULT 'New'
)
");

// Insert data
$stmt = $conn->prepare("INSERT INTO process_eoi 
(jobRef, firstName, lastName, dob, gender, street, suburb, state, postcode, email, phone, skills, otherSkills, status)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param(
    "ssssssssssssss",
    $jobRef, $firstName, $lastName, $dob, $gender, $street, $suburb, $state, $postcode, $email, $phone, $skills, $otherSkills, $status
);

if ($stmt->execute()) {
    $eoiNumber = $stmt->insert_id;
    echo "<h2>Thank you, $firstName!</h2>";
    echo "<p>Your application has been submitted successfully.</p>";
    echo "<p>Your EOInumber is <strong>$eoiNumber</strong>.</p>";
    echo '<p><a href="index.php">Return to Home</a></p>';
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
