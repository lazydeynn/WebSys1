<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIO-DATA Form</title>
    <link rel="stylesheet" href="form-style.css">
</head>

<body>
    <div class="container">
        <h2>BIO-DATA Form</h2>
        <form method="post" action="output.php" enctype="multipart/form-data">

            <div class="form-row">
                <div class="form-group">
                    <label>Upload Photo</label>
                    <input type="file" name="photo" accept="image/*" class="photo">
                </div>
            </div>

            <h3>Personal Data</h3>

            <div class="form-row">
                <div class="form-group"><label>Position Desired</label><input type="text" name="positionDesired">
                </div>
                <div class="form-group"><label>Date</label><input type="date" name="date"></div>
                <div class="form-group"><label>Name</label><input type="text" name="name"></div>
            </div>

            <div class="form-row">
                <div class="form-group"><label>Gender</label><input type="text" name="gender"></div>
                <div class="form-group"><label>City Address</label><input type="text" name="cityAddress"></div>
                <div class="form-group"><label>Provincial Address</label><input type="text" name="provincialAddress">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group"><label>Telephone</label><input type="tel" name="telephone"></div>
                <div class="form-group"><label>Cellphone</label><input type="tel" name="cellphone1"></div>
                <div class="form-group"><label>Email</label><input type="email" name="email"></div>
            </div>

            <div class="form-row">
                <div class="form-group"><label>Date of Birth</label><input type="date" name="dateOfBirth"></div>
                <div class="form-group"><label>Birth Place</label><input type="text" name="birthOfPlace"></div>
                <div class="form-group"><label>Civil Status</label><input type="text" name="civilStatus"></div>
            </div>

            <div class="form-row">
                <div class="form-group"><label>Citizenship</label><input type="text" name="citizenship"></div>
                <div class="form-group"><label>Religion</label><input type="text" name="religion"></div>
                <div class="form-group"><label>Height</label><input type="number" name="height" placeholder="in cm">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group"><label>Weight</label><input type="number" name="weight" placeholder="in kg">
                </div>
                <div class="form-group"><label>Spouse</label><input type="text" name="spouse"></div>
                <div class="form-group"><label>Spouse Occupation</label><input type="text" name="spouseOccupation">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group"><label>Name of Child</label><input type="text" name="nameOfChildren1">
                </div>
                <div class="form-group"><label>Child DOB</label><input type="date" name="children1DateofBirth">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Father's Name</label><input type="text" name="fatherName"></div>
                <div class="form-group"><label>Father's Occupation</label><input type="text" name="fatherOccupation">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Mother's Name</label><input type="text" name="motherName"></div>
                <div class="form-group"><label>Mother's Occupation</label><input type="text" name="motherOccupation">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Language or dialect spoken and written</label><input type="text"
                        name="language"></div>
                <div class="form-group"></div>
            </div>

            <div class="form-row">
                <div class="form-group"><label>Person to be contacted in case of emergency</label><input type="text"
                        name="emergencyName"></div>
                <div class="form-group"><label>His or her contact no.</label><input type="text" name="emergencyPhone">
                </div>
            </div>

            <h3>Educational Background</h3>
            <div class="form-row">
                <div class="form-group"><label>Elementary</label><input type="text" name="elementary"></div>
                <div class="form-group"><label>Year Graduated</label><input type="number" name="elementaryYear">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>High School</label><input type="text" name="highschool"></div>
                <div class="form-group"><label>Year Graduated</label><input type="number" name="highschoolYear">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>College</label><input type="text" name="college"></div>
                <div class="form-group"><label>Year Graduated</label><input type="number" name="collegeYear"></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Degree Received</label><input type="text" name="degree"></div>
                <div class="form-group"><label>Special Skills</label><input type="text" name="specialSkills"></div>
            </div>

            <h3>Employment Record</h3>
            <div class="form-row">
                <div class="form-group"><label>Company Name</label><input type="text" name="companyName1"></div>
                <div class="form-group"><label>Position</label><input type="text" name="companyPosition1"></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>From</label><input type="number" name="companyYearFrom1"></div>
                <div class="form-group"><label>To</label><input type="number" name="companyYearTo1"></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Company Name</label><input type="text" name="companyName2"></div>
                <div class="form-group"><label>Position</label><input type="text" name="companyPosition2"></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>From</label><input type="number" name="companyYearFrom2"></div>
                <div class="form-group"><label>To</label><input type="number" name="companyYearTo2"></div>
            </div>

            <h3>Character Reference</h3>
            <div class="form-row">
                <div class="form-group"><label>Name</label><input type="text" name="crName1"></div>
                <div class="form-group"><label>Company</label><input type="text" name="crCompany1"></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Position</label><input type="text" name="crPosition1"></div>
                <div class="form-group"><label>Contact No.</label><input type="tel" name="crContact1"></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Name</label><input type="text" name="crName2"></div>
                <div class="form-group"><label>Company</label><input type="text" name="crCompany2"></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Position</label><input type="text" name="crPosition2"></div>
                <div class="form-group"><label>Contact No.</label><input type="tel" name="crContact2"></div>
            </div>

            <h3>Other Information</h3>
            <div class="form-row">
                <div class="form-group"><label>Res. Cert. No.</label><input type="text" name="certNo"></div>
                <div class="form-group"><label>Issued at</label><input type="text" name="issuedAt"></div>
                <div class="form-group"><label>Issued on</label><input type="date" name="issuedOn"></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>SSS</label><input type="text" name="sss"></div>
                <div class="form-group"><label>TIN</label><input type="text" name="tin"></div>
                <div class="form-group"><label>NBI No.</label><input type="text" name="nbiNo"></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Passport No.</label><input type="text" name="passportNo"></div>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>