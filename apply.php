<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="NIWS Recruitment - Apply for Job Opportunities">
    <meta name="keywords" content="Jobs, Careers, Recruitment, Application Form, NIWS Recruitment">
    <meta name="author" content="NIWS Recruitment Team">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIWS Recruitment - Apply</title>
    <link rel="stylesheet" href="styles/apply.css">


</head>

<body>

    <?php include('inc/topNav.inc'); ?>

    <header class="hero-section">
            <?php include('inc/nav.inc'); ?>

            
<!-- Hero section for apply page -->
        <div class="hero-text-section">
            <h1 class="hero-phrase">Apply <span style="color: #ff4c4c;">today</span></h1>
            <p class="hero-text hero-text2">
                Want something else? explore our many job opportunities!</p>

            <button class="more"><a href="about.html">Featured jobs</a></button>

        </div>


    </header>


    <main>
        <h3>Job Application Form</h3>
        <form action="process_eoi.php" method="POST">

            <label for="jobRef">Job Reference:</label>
            <input type="text" id="jobRef" name="jobRef" maxlength="5"
                value="<?php echo isset($_GET['jobRef']) ? $_GET['jobRef'] : ''; ?>" required>

            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" maxlength="20" required>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" maxlength="20" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <fieldset>
                <legend>Gender</legend>
                <label><input type="radio" name="gender" value="Male" required> Male</label>
                <label><input type="radio" name="gender" value="Female"> Female</label>
                <label><input type="radio" name="gender" value="Other"> Other</label>
            </fieldset>

            <label for="street">Street Address:</label>
            <input type="text" id="street" name="street" maxlength="40" required>

            <label for="suburb">Suburb/Town:</label>
            <input type="text" id="suburb" name="suburb" maxlength="40" required>

            <label for="state">State:</label>
            <select id="state" name="state" required>
                <option value="">Please Select</option>
                <option value="VIC">VIC</option>
                <option value="NSW">NSW</option>
                <option value="QLD">QLD</option>
                <option value="NT">NT</option>
                <option value="WA">WA</option>
                <option value="SA">SA</option>
                <option value="TAS">TAS</option>
                <option value="ACT">ACT</option>
            </select>

            <label for="postcode">Postcode:</label>
            <input type="text" id="postcode" name="postcode" maxlength="4" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>

            <fieldset>
                <legend>Skills</legend>
                <label><input type="checkbox" name="skills[]" value="HTML"> HTML</label>
                <label><input type="checkbox" name="skills[]" value="CSS"> CSS</label>
                <label><input type="checkbox" name="skills[]" value="JavaScript"> JavaScript</label>
                <label><input type="checkbox" name="skills[]" value="Other"> Other skills…</label>
            </fieldset>

            <label for="otherSkills">Other Skills:</label>
            <textarea id="otherSkills" name="otherSkills"></textarea>

            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="New" selected>New</option>
                <option value="Current">Current</option>
                <option value="Final">Final</option>
            </select>

            <button type="submit">Submit Application</button>
        </form>
    </main>

    <?php include('inc/footer.inc'); ?>

</body>

</html>