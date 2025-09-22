<?php
$photoPath = "";
if (!empty($_FILES["photo"]["name"])) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $photoPath = $targetDir . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $photoPath);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIO-DATA</title>
    <link rel="stylesheet" href="output-style.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>BIO-DATA</h1>
            <?php if ($photoPath): ?>
                <img src="<?= htmlspecialchars($photoPath) ?>" alt="Photo">
            <?php else: ?>
                <img src="uploads/noimage.jpg" alt="Photo">
            <?php endif; ?>
        </div>

        <div class="section">
            <h3>PERSONAL DATA</h3>
            <div class="data-body">
                <div class="form-row">
                    <label>Position Desired</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['positionDesired'] ?? "N/A") ?>" readonly>
                    <label>Date</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['date'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Name</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['name'] ?? "N/A") ?>" readonly>
                    <label>Gender</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['gender'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>City Address</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['cityAddress'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Provincial Address</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['provincialAddress'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Telephone</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['telephone'] ?? "N/A") ?>" readonly>
                    <label>Cellphone</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['cellphone1'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>E-mail Address</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['email'] ?? "N/A") ?>" readonly>
                    <label></label>
                    <input type="text" value="<?= htmlspecialchars($_POST['cellphone2'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Date of Birth</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['dateOfBirth'] ?? "N/A") ?>" readonly>
                    <label>Birth of Place</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['birthOfPlace'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Civil Status</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['civilStatus'] ?? "N/A") ?>" readonly>
                    <label>Citizenship</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['citizenship'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Height</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['height'] ?? "N/A") ?>" readonly>
                    <label>Weight</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['weight'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Religion</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['religion'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Spouse</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['spouse'] ?? "N/A") ?>" readonly>
                    <label>Occupation</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['spouseOccupation'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Name of Children</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['nameOfChildren1'] ?? "N/A") ?>" readonly>
                    <label>Date of Birth</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['children1DateofBirth'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Father's Name</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['fatherName'] ?? "N/A") ?>" readonly>
                    <label>Occupation</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['fatherOccupation'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Mother's Name</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['motherName'] ?? "N/A") ?>" readonly>
                    <label>Occupation</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['motherOccupation'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label class="personalDataLabel">Language or dialect spoken and written</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['language'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label class="personalDataLabel">Person to be contacted in case of emergency</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['emergencyName'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label class="personalDataLabel">His or her address and telephone</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['emergencyPhone'] ?? "N/A") ?>" readonly>
                </div>
            </div>
        </div>

        <div class="section">
            <h3>EDUCATIONAL BACKGROUND</h3>
            <div class="data-body">
                <div class="form-row">
                    <label>Elementary</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['elementary'] ?? "N/A") ?>" readonly>
                    <label>Year Graduated</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['elementaryYear'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>High School</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['highschool'] ?? "N/A") ?>" readonly>
                    <label>Year Graduated</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['highschoolYear'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>College</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['college'] ?? "N/A") ?>" readonly>
                    <label>Year Graduated</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['collegeYear'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Degree Received</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['degree'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Special Skills</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['specialSkills'] ?? "N/A") ?>" readonly>
                </div>
            </div>
        </div>

        <div class="section">
            <h3>EMPLOYMENT RECORD</h3>
            <div class="data-body">
                <div class="form-row">
                    <label>Company Name</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['companyName1'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Position</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['companyPosition1'] ?? "N/A") ?>" readonly>
                    <label class="companyLabel">From</label><span class="spanPosition">:</span>
                    <input type="text" class="companyYear" value="<?= htmlspecialchars($_POST['companyYearFrom1'] ?? "N/A") ?>" readonly>
                    <label class="companyLabel">To</label><span class="spanPosition">:</span>
                    <input type="text" class="companyYear" value="<?= htmlspecialchars($_POST['companyYearTo1'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Company Name</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['companyName2'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Position</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['companyPosition2'] ?? "N/A") ?>" readonly>
                    <label class="companyLabel">From</label><span class="spanPosition">:</span>
                    <input type="text" class="companyYear" value="<?= htmlspecialchars($_POST['companyYearFrom2'] ?? "N/A") ?>" readonly>
                    <label class="companyLabel">To</label><span class="spanPosition">:</span>
                    <input type="text" class="companyYear" value="<?= htmlspecialchars($_POST['companyYearTo2'] ?? "N/A") ?>" readonly>
                </div>
            </div>
        </div>

        <div class="section">
            <h3>CHARACTER REFERENCE</h3>
            <div class="data-body">
                <div class="form-row">
                    <label>Name</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['crName1'] ?? "N/A") ?>" readonly>
                    <label>Company</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['crCompany1'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Position</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['crPosition1'] ?? "N/A") ?>" readonly>
                    <label>Contact No.</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['crContact1'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Name</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['crName2'] ?? "N/A") ?>" readonly>
                    <label>Company</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['crCompany2'] ?? "N/A") ?>" readonly>
                </div>
                <div class="form-row">
                    <label>Position</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['crPosition2'] ?? "N/A") ?>" readonly>
                    <label>Contact No.</label><span>:</span>
                    <input type="text" value="<?= htmlspecialchars($_POST['crContact2'] ?? "N/A") ?>" readonly>
                </div>
            </div>
        </div>

        <div class="section footer">
            <div class="footer-container">
                <div class="footer-body">
                    <div class="form-row"><label>Res. Cert. No.</label><span>:</span><input type="text" value="<?= htmlspecialchars($_POST['certNo'] ?? "N/A") ?>" readonly></div>
                    <div class="form-row"><label>Issued at</label><span>:</span><input type="text" value="<?= htmlspecialchars($_POST['issuedAt'] ?? "N/A") ?>" readonly></div>
                    <div class="form-row"><label>Issued on</label><span>:</span><input type="text" value="<?= htmlspecialchars($_POST['issuedOn'] ?? "N/A") ?>" readonly></div>
                    <div class="form-row"><label>SSS</label><span>:</span><input type="text" value="<?= htmlspecialchars($_POST['sss'] ?? "N/A") ?>" readonly></div>
                    <div class="form-row"><label>TIN</label><span>:</span><input type="text" value="<?= htmlspecialchars($_POST['tin'] ?? "N/A") ?>" readonly></div>
                    <div class="form-row"><label>NBI No.</label><span>:</span><input type="text" value="<?= htmlspecialchars($_POST['nbiNo'] ?? "N/A") ?>" readonly></div>
                    <div class="form-row"><label>Passport No.</label><span>:</span><input type="text" value="<?= htmlspecialchars($_POST['passportNo'] ?? "N/A") ?>" readonly></div>
                </div>
                <div class="footer-text">
                    <p>I hereby certify that the above information is true and correct to the best of my knowledge
                        and belief. I also understand that any misrepresentation will be considered reason for
                        withdrawal of an offer or dismissal if employed.</p>
                    <div class="signature">
                        <div class="line"></div>
                        Applicant’s Signature
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>