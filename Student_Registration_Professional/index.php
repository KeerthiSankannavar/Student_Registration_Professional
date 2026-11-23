<?php
// Student registration form: submission is processed by process.php.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Student registration form">
    <title>Student Registration | CampusConnect</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="script.js" defer></script>
</head>
<body>
    <header class="topbar">
        <a class="brand" href="index.php" aria-label="CampusConnect home">
            <span class="brand-mark">C</span>
            <span>campus<span class="brand-light">connect</span></span>
        </a>
        <div class="topbar-note"><span class="status-dot"></span> Student registration portal</div>
    </header>

    <main class="page-shell">
        <section class="intro-panel reveal-on-load">
            <div class="eyebrow"><span class="eyebrow-line"></span> ADMISSIONS · STUDENT SERVICES</div>
            <h1>Your next chapter<br>starts <span>here.</span></h1>
            <p class="intro-copy">Complete your student details to begin your campus journey. Make sure the information you provide is accurate and up to date.</p>

            <div class="intro-art" id="visual3d" aria-hidden="true">
                <div class="art-orbit orbit-one"></div>
                <div class="art-orbit orbit-two"></div>
                <div class="art-core"><span>CC</span><i class="core-shine"></i></div><div class="art-particle particle-one"></div><div class="art-particle particle-two"></div><div class="art-particle particle-three"></div>
                <div class="art-tag tag-one"><span class="tag-icon">✦</span> Learn with purpose</div>
                <div class="art-tag tag-two"><span class="tag-icon">↗</span> Build your future</div>
            </div>

            <div class="intro-footer">
                <div class="secure-icon">✓</div>
                <div><strong>Simple. Secure. Student-first.</strong><small>Your details are displayed for confirmation after submission.</small></div>
            </div>
        </section>

        <section class="form-panel reveal-on-load" aria-labelledby="form-title">
            <div class="form-heading">
                <div>
                    <div class="step-label">REGISTRATION FORM <span>01 / 01</span></div>
                    <h2 id="form-title">Student details</h2>
                    <p>Fill in the fields below to complete your registration.</p>
                </div>
                <div class="form-badge" aria-hidden="true">✦</div>
            </div>
            <div class="completion-wrap" aria-live="polite">
                <div class="completion-meta"><span>Form completion</span><strong id="completionValue">0%</strong></div>
                <div class="completion-track"><span id="completionBar"></span></div>
            </div>

            <form action="process.php" method="POST" id="regForm">
                <div class="section-caption"><span>01</span> PERSONAL INFORMATION</div>
                <div class="form-grid">
                    <div class="field full">
                        <label for="name">Student name <em>*</em></label>
                        <input type="text" name="name" id="name" placeholder="Enter your full name" autocomplete="name" maxlength="80" required>
                    </div>
                    <div class="field">
                        <label for="usn">University seat number (USN) <em>*</em></label>
                        <input type="text" name="usn" id="usn" placeholder="e.g. 4XX22CS001" maxlength="30" required>
                    </div>
                    <div class="field">
                        <label for="dob">Date of birth <em>*</em></label>
                        <input type="date" name="dob" id="dob" required>
                    </div>
                    <div class="field full">
                        <label>Gender <em>*</em></label>
                        <div class="choice-row">
                            <label class="choice"><input type="radio" name="gender" value="Male" required><span class="choice-box">Male</span></label>
                            <label class="choice"><input type="radio" name="gender" value="Female"><span class="choice-box">Female</span></label>
                            <label class="choice"><input type="radio" name="gender" value="Prefer not to say"><span class="choice-box">Prefer not to say</span></label>
                        </div>
                    </div>
                </div>

                <div class="section-caption section-spaced"><span>02</span> CONTACT INFORMATION</div>
                <div class="form-grid">
                    <div class="field">
                        <label for="email">Email address <em>*</em></label>
                        <input type="email" name="email" id="email" placeholder="you@example.com" autocomplete="email" maxlength="120" required>
                    </div>
                    <div class="field">
                        <label for="mobile">Mobile number <em>*</em></label>
                        <input type="tel" name="mobile" id="mobile" placeholder="10-digit mobile number" inputmode="numeric" pattern="[0-9]{10}" maxlength="10" required>
                        <small class="field-hint">Enter 10 digits without spaces.</small>
                    </div>
                    <div class="field full">
                        <label for="address">Residential address <em>*</em></label>
                        <textarea name="address" id="address" rows="3" placeholder="House number, street, city, state and PIN code" maxlength="500" required></textarea>
                    </div>
                </div>

                <div class="section-caption section-spaced"><span>03</span> ACADEMIC INFORMATION</div>
                <div class="form-grid">
                    <div class="field">
                        <label for="course">Course / Department <em>*</em></label>
                        <select name="course" id="course" required>
                            <option value="">Select department</option>
                            <option value="CSE">Computer Science & Engineering (CSE)</option>
                            <option value="AIML">Artificial Intelligence & Machine Learning (AIML)</option>
                            <option value="ECE">Electronics & Communication (ECE)</option>
                            <option value="ISE">Information Science & Engineering (ISE)</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="semester">Current semester <em>*</em></label>
                        <select name="semester" id="semester" required>
                            <option value="">Select semester</option>
                            <option value="1st">1st Semester</option><option value="2nd">2nd Semester</option>
                            <option value="3rd">3rd Semester</option><option value="4th">4th Semester</option>
                            <option value="5th">5th Semester</option><option value="6th">6th Semester</option>
                            <option value="7th">7th Semester</option><option value="8th">8th Semester</option>
                        </select>
                    </div>
                </div>

                <div class="form-bottom">
                    <p><span class="required-star">*</span> Required fields</p>
                    <div class="action-row">
                        <button type="reset" class="btn btn-quiet">Clear form</button>
                        <button type="submit" class="btn btn-primary">Submit registration <span aria-hidden="true">↗</span></button>
                    </div>
                </div>
            </form>
            <p class="form-footnote"><span>🔒</span> Please review your details before submitting.</p>
        </section>
    </main>

    <footer class="site-footer">
        <span>© <?php echo date("Y"); ?> CampusConnect</span>
        <span>Student Registration Portal <i>·</i> Academic project</span>
    </footer>
</body>
</html>
