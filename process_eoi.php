<?php
// our eoi php 


require_once 'settings.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['jobRef'])) {
    header('Location: apply.php');
    exit();
}


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

$stmt = $conn->prepare("INSERT INTO eoi (jobRef, firstName, lastName, dob, gender, street, suburb, state, postcode, email, phone, skills, otherSkills) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param(
    "sssssssssssss",
    $jobRef, $firstName, $lastName, $dob, $gender, $street, $suburb, $state, $postcode, $email, $phone, $skills, $otherSkills
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
