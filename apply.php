<?php
//our apply html page to php
?>

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
    <nav class="top-nav" style="display: flex; align-items: center;">
        <div class="icon">
            <img src="assets/earth-americas-solid-full.svg" alt="icon of globe">
        </div>
        <p class="top-nav-text australia">Australia</p>
        <span class="top-nav-text">Are you an <a href="" class="hyperlink">employer?</a></span>
        <span class="top-nav-text top-nav-text2">Perhaps a <a href="" class="hyperlink">candidate?</a><button class="apply-button"> Apply now</button></span>
        <div class="icon-tray">
            <div class="icon">
                <img src="assets/facebook-brands-solid-full.svg" alt="facebook icon">
            </div>
            <div class="icon">
                <img src="assets/linkedin-brands-solid-full.svg" alt="linkdin icon">
            </div>
            <div class="icon">
                <img src="assets/square-instagram-brands-solid-full.svg" alt="instagram icon">
            </div>
            <div class="icon">
                <img src="assets/door-open-solid-full.svg" alt="door icon">
            </div>
        </div>
    </nav>
    
    <header class="hero-section">
        <nav class="nav-bar">
            <div style="display: flex; align-items: center;">
                <div class="company-logo">
                    <img src="assets/niwslogonb.png" alt="icon of globe">
                </div>
                <p class="site-title">N I W S</p>
            </div>
            <div style="display: flex; align-items: center;">
                <ul class="nav-list">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="jobs.php">Jobs</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="apply.php">Apply</a></li>
                </ul>
                <div class="nav-menu">
                    <img src="assets/bars-solid-full.svg" alt="icon of globe">
                </div>
            </div>
        </nav>

        <div class="hero-text-section">
            <h1 class="hero-phrase">Apply <span style="color: #ff4c4c;">today</span></h1>
            <p class="hero-text hero-text2">Want something else? explore our many job opportunities!</p>
            <button class="more"><a href="jobs.php">Featured jobs</a></button>
        </div>
    </header>

    <main>
        <h3>Job Application Form</h3>
        <form action="process_eoi.php" method="POST" novalidate>
            
            <label for="jobRef">Job Reference:</label>
            <input type="text" id="jobRef" name="job_ref" maxlength="5">

           
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="first_name" maxlength="20">

           
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="last_name" maxlength="20">

           
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob">

            
            <fieldset>
                <legend>Gender</legend>
                <label><input type="radio" name="gender" value="Male"> Male</label>
                <label><input type="radio" name="gender" value="Female"> Female</label>
                <label><input type="radio" name="gender" value="Other"> Other</label>
            </fieldset>

           
            <label for="street">Street Address:</label>
            <input type="text" id="street" name="street" maxlength="40">

            <label for="suburb">Suburb/Town:</label>
            <input type="text" id="suburb" name="suburb" maxlength="40">

            <label for="state">State:</label>
            <select id="state" name="state">
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
            <input type="text" id="postcode" name="postcode" maxlength="4">

            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone">

            
            <fieldset>
                <legend>Skills</legend>
                <label><input type="checkbox" name="skills[]" value="HTML"> HTML</label>
                <label><input type="checkbox" name="skills[]" value="CSS"> CSS</label>
                <label><input type="checkbox" name="skills[]" value="JavaScript"> JavaScript</label>
                <label><input type="checkbox" name="skills[]" value="Other"> Other skills…</label>
            </fieldset>

            <label for="otherSkills">Other Skills:</label>
            <textarea id="otherSkills" name="cover_letter" placeholder="Describe other skills"></textarea>

            
            <button type="submit">Submit Application</button>
        </form>
    </main>

    <footer>
        <section class="ending-section">
            <div class="ending-container">
                <div class="ending-container-left-part">
                    <div class="company-logo">
                        <img src="assets/niwslogonb.png" alt="icon of globe">
                    </div>
                    <p class="site-title ending-title">N I W S</p>
                </div>
                <p class="repo-text">Github link: <a href="https://github.com/Emajaliwa/RecruitmentWebsite.git" class="hyperlink">click here!</a></p>
            </div>
        </section>
    </footer>
</body>
</html>
