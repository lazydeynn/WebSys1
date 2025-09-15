<?php
$name = "Lemuel Dane G. Biala";
$job_title = "Web Developer and UI/UX Designer";
$phone = "09456501057";
$email = "23ur0581@psu.edu.ph";
$linkedin = "https://www.linkedin.com/in/deynn/";
$github = "https://github.com/lazydeynn";
$address = "Jimenez, Mapandan, Pangasinan";
$dob = "January 27, 2003";
$gender = "Male";
$nationality = "Filipino";
$primary = "Jimenez Elementary School";
$highschool = "Mapandan National High School";
$college = "Pangasinan State University";
$course = "BS Information Technology";
$specialization = "Web and Mobile Development";
$skills = ["HTML", "CSS",  "JavaScript", "PHP", "Java", "Figma", "Canva", "SQL"];
$bio = "Aspiring developer and passionate about clean UI/UX and web technologies.";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Study 1</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

        <div class="header">
            <img src="pfp.png">
            <div>
                <h1><?php echo $name; ?></h1>
                <p><?php echo $job_title; ?></p><br>
                <p class="bio"><i><?php echo $bio; ?></i></p>
            </div>
        </div>

        <div class="section">
            <h2>Personal Information</h2>
            <div class="info">
                <div class="left">
                    <p><b>Phone:</b> <?php echo $phone; ?></p>
                    <p><b>Email:</b> <?php echo $email; ?></p>
                    <p><b>LinkedIn:</b> <?php echo $linkedin; ?></p>
                    <p><b>GitHub:</b> <?php echo $github; ?></p>
                </div>
                <div class="right">
                    <p><b>Address:</b> <?php echo $address; ?></p>
                    <p><b>Date of Birth:</b> <?php echo $dob; ?></p>
                    <p><b>Gender:</b> <?php echo $gender; ?></p>
                    <p><b>Nationality:</b> <?php echo $nationality; ?></p>
                </div>
            </div>
        </div>

        <div class="section">
            <h2>Education</h2>
            <p class="e_title">Tertiary: <b class="school_year">2023 - Present</b></p>
            <?php echo "$college - $course" ?>
            <p class="e_title">Secondary: <b class="school_year">2015 - 2023</b></p>
            <?php echo "$highschool" ?>
            <p class="e_title">Primary: <b class="school_year">2009 - 2015</b></p>
            <?php echo "$primary" ?>
        </div>

        <div class="section">
            <h2>Experience</h2>
            <p><b><?php echo "N/A" ?></p>
        </div>

        <div class="section">
            <h2>Skills</h2>
            <?php foreach ($skills as $skill) { ?>
                <ul class="skill">
                    <li> <?php echo $skill; ?></li>
                </ul>
            <?php } ?>
        </div>
    </div>
</body>

</html>