<?php
function clean_input(string $key): string {
    return trim((string)($_POST[$key] ?? ""));
}
function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

$name = clean_input("name");
$usn = clean_input("usn");
$dob = clean_input("dob");
$gender = clean_input("gender");
$email = clean_input("email");
$mobile = clean_input("mobile");
$address = clean_input("address");
$course = clean_input("course");
$semester = clean_input("semester");

$errors = [];
if ($name === "" || mb_strlen($name) > 80) $errors[] = "Please enter a valid student name (up to 80 characters).";
if ($usn === "" || mb_strlen($usn) > 30) $errors[] = "Please enter a valid USN.";
if ($dob === "" || strtotime($dob) === false || strtotime($dob) > time()) $errors[] = "Please enter a valid date of birth.";
if (!in_array($gender, ["Male", "Female", "Prefer not to say"], true)) $errors[] = "Please select a valid gender option.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Please enter a valid email address.";
if (!preg_match('/^[0-9]{10}$/', $mobile)) $errors[] = "Mobile number must contain exactly 10 digits.";
if ($address === "" || mb_strlen($address) > 500) $errors[] = "Please enter your address (up to 500 characters).";
if (!in_array($course, ["CSE", "AIML", "ECE", "ISE"], true)) $errors[] = "Please select a valid course.";
if (!in_array($semester, ["1st", "2nd", "3rd", "4th", "5th", "6th", "7th", "8th"], true)) $errors[] = "Please select a valid semester.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $errors ? "Check your details" : "Registration successful"; ?> | CampusConnect</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="result-page">
    <header class="topbar">
        <a class="brand" href="index.php"><span class="brand-mark">C</span><span>campus<span class="brand-light">connect</span></span></a>
        <div class="topbar-note"><span class="status-dot"></span> Student registration portal</div>
    </header>
    <main class="result-shell">
        <?php if ($errors): ?>
            <section class="result-card">
                <div class="result-symbol error-symbol">!</div>
                <div class="eyebrow centered">REGISTRATION NOT COMPLETED</div>
                <h1>Please check your details</h1>
                <p class="result-lead">A few fields need your attention before the form can be submitted.</p>
                <ul class="error-list">
                    <?php foreach ($errors as $error): ?><li><?php echo e($error); ?></li><?php endforeach; ?>
                </ul>
                <a class="btn btn-primary result-back" href="index.php">Return to form <span>↗</span></a>
            </section>
        <?php else: ?>
            <section class="result-card">
                <div class="result-symbol success-symbol">✓</div>
                <div class="eyebrow centered">SUBMISSION COMPLETE</div>
                <h1>Registration successful!</h1>
                <p class="result-lead">Thank you, <?php echo e($name); ?>. Your submitted details are shown below for review.</p>
                <div class="confirmation-banner"><span>✓</span><div><strong>Details received</strong><small>This demo displays the submitted information. It does not store it in a database.</small></div></div>
                <div class="details-heading"><h2>Student details</h2><span>REGISTRATION SUMMARY</span></div>
                <div class="details-grid">
                    <div class="detail-item"><small>Student name</small><strong><?php echo e($name); ?></strong></div>
                    <div class="detail-item"><small>USN</small><strong><?php echo e($usn); ?></strong></div>
                    <div class="detail-item"><small>Date of birth</small><strong><?php echo e($dob); ?></strong></div>
                    <div class="detail-item"><small>Gender</small><strong><?php echo e($gender); ?></strong></div>
                    <div class="detail-item"><small>Email address</small><strong><?php echo e($email); ?></strong></div>
                    <div class="detail-item"><small>Mobile number</small><strong><?php echo e($mobile); ?></strong></div>
                    <div class="detail-item full-detail"><small>Residential address</small><strong><?php echo nl2br(e($address)); ?></strong></div>
                    <div class="detail-item"><small>Course / Department</small><strong><?php echo e($course); ?></strong></div>
                    <div class="detail-item"><small>Current semester</small><strong><?php echo e($semester); ?> Semester</strong></div>
                </div>
                <div class="result-actions">
                    <a class="btn btn-quiet" href="index.php">Back to form</a>
                    <button class="btn btn-primary" type="button" onclick="window.print()">Print details <span>↗</span></button>
                </div>
            </section>
        <?php endif; ?>
    </main>
    <footer class="site-footer"><span>© <?php echo date("Y"); ?> CampusConnect</span><span>Student Registration Portal <i>·</i> Academic project</span></footer>
</body>
</html>
