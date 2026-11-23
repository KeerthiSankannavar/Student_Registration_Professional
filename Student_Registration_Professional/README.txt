CAMPUSCONNECT — STUDENT REGISTRATION PORTAL
=============================================

Files
-----
index.php    Registration form
process.php  Server-side validation and submitted-details page
style.css    Responsive visual design
script.js    jQuery and client-side validation

How to run locally
------------------
1. Install XAMPP (or another PHP-enabled local server).
2. Copy the complete Student_Registration_Professional folder into:
   C:\xampp\htdocs\
3. Start Apache from the XAMPP Control Panel.
4. Open this URL in your browser:
   http://localhost/Student_Registration_Professional/

Important
---------
- This project processes the form and displays the submitted details.
- It does NOT save registrations to a database or send email.
- PHP validates the submitted values on the server; JavaScript/jQuery
  provides convenience checks in the browser.
- Google Fonts and jQuery are loaded from CDNs, so those features need
  an internet connection. The core form and styling work locally.
- The project retains the original fields and course/semester choices,
  with a more polished responsive interface with a warm orange accent theme.
