<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="styles.css">
    <!--Google icon-->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    >
    <!--Google font: Montserrat-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <!--IMask source link-->
    <script src="https://unpkg.com/imask"></script>
    <title>Scheer Drone Services</title>
  </head>
  <body>
    <!--HEADER-->
    <header>
      <!--Nav Bar-->
      <nav>
        <div class="nav-bar">
          <div class="top-bar_container">
            <div>
              <a href="index.php">
                <img
                  class="nav-logo"
                  src="images/LOGO_icon.png"
                  alt="Logo of a drone."
                  width="200"
                >
              </a>
            </div>
            <span
              onclick="displayMenu()"
              id="mobile-menu-icon"
              class="material-symbols-outlined"
              >menu</span
            >
          </div>
          <div id="nav-menu" class="nav-buttons">
            <a class="nav-link" href="index.php#services">Services</a>
            <a class="nav-link" href="videos.html">Video</a>
            <a class="nav-link" href="photos.html">Photography</a>
            <a class="nav-link" href="aboutus.html">About Us</a>
            <a class="nav-link" href="index.php#contact">Contact Us</a>
          </div>
        </div>
      </nav>
      <div class="nav-buff"></div>
    </header>
    <!--MAIN SECTION-->
    <main>
      <!--HIGHLIGHT SECTION-->
      <section>
        <div id="feature-backdrop" class="feature-backdrop">
          <video id="feature-video" width="420"
            autoplay
            muted
            loop
            disablePictureInPicture="true"
            poster="images/HIGHLIGHT_poster.jpg">
            <source src="video/HIGHLIGHT_video.mp4" type="video/mp4">
          </video>
          <div class="grab-box">
            <h3 class="gb-heading">Elevate the experience</h3>
            <br>
            <button class="gb-button" onclick="document.location='index.php#contact'">Schedule A Session</button>
          </div>
        </div>
      </section>
      <!--SERVICE SECTION-->
      <section id="services" class="main-info_section scroll-buffer">
        <h2 class="main-heading text-center">Our Services</h2>
        <!--EVENT VIDEOGRAPHY-->
        <article class="service-block">
          <!--Image-->
          <div id="event-img" class="service-img_container order2 img-right" title="Aerial view of a stage and crowd during a concert"></div>
          <!--Text-->
          <div class="service-text_container order1">
            <h3 class="article-heading heading-left inc-word-space">Event Videography</h3>
            <p class="article-text">
              Elevate your events with drone videography that turns moments into lasting memories. 
              Our cutting-edge drones capture the essence of concerts, weddings, and other special 
              occasions from stunning angles. With cinematic precision, we transform 
              your experiences into captivating visual narratives. Add a magical touch to your 
              memories and take your events to new heights!
            </p>
          </div>
        </article>
        <hr class="divider">
        <!--PROMOTIONAL VIDEO-->
        <article class="service-block">
          <!--Image-->
          <div id="promotional-img" class="service-img_container order1 img-left" title="Aerial view of a city skyscrapers"></div>
          <!--Text-->
          <div class="service-text_container order2 text-right">
            <h3 class="article-heading heading-right inc-word-space">Promotional Videos</h3>
            <p class="article-text">
              Transform your brand with dynamic visual storytelling. 
              Our drone videography services reimagine promotional videos, providing 
              a cinematic edge to your marketing content. High-resolution footage brings 
              creativity and innovation to your brand presentation. Redefine your promotional 
              efforts, delivering impactful visuals that leave a lasting impression and distinguish 
              your brand in a crowded market.
            </p>
          </div>
        </article>
        <hr class="divider">
        <!--REAL ESTATE PHOTOGRAPHY-->
        <article class="service-block">
          <!--Image-->
          <div id="realEstate-img" class="service-img_container order2 img-right" title="Aerial view of a tropical neighborhood">
          </div>
          <!--Text-->
          <div class="service-text_container order1">
            <h3 class="article-heading heading-left">Real Estate Photography</h3>
            <p class="article-text">
              Revamp your real estate listing with our drone photography services that capture 
              stunning aerial perspectives showcasing properties in unprecedented detail. Enhance 
              your listings with high-resolution images and dynamic shots, offering a unique and captivating view of any location. Display an innovative edge, creating a memorable impression that attracts potential buyers with immersive imagery.
            </p>
          </div>
        </article>
        <hr class=divider>
        <!--CINEMATOGRAPHY-->
        <article class="service-block">
          <!--Image-->
          <div id="cinematography-img" class="service-img_container order1 img-left" title="Breathtaking view of a snowy mountain range surrounding a peaceful lake at sunset"></div>
          <!--Text-->
          <div class="service-text_container order2 text-right">
            <h3 class="article-heading heading-right">Cinematography</h3>
            <p class="article-text">
              Our drone videography services offer breathtaking and unique perspectives, 
              bringing a new dimension to your cinematic storytelling. From sweeping landscapes 
              to dynamic action shots, deliver unparalleled aerial cinematography for films of all 
              scales. Take audiences to new heights and expand the possibilities by rising above 
              the ordinary like never before.
            </p>
          </div>
        </article>
        <hr class="divider">
      </section>
      <!--FORM PHP VALIDATION-->
      <?php

        // Define input variables / error messages
        $fname = $lname = $email = $phone = $company = $location = $service = $date = $message = "";
        $fnameError = $lnameError = $emailError = $phoneError = $companyError = $locationError = $serviceError = $dateError = $messageError = "";
        $formError = False;
        $formErrorMessage = "";
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

          // Validate First Name
          $fnameInput = $_POST["fname"];
          if (empty($fnameInput)) {
            $fnameError = "\t(First name is required)";
            $formError = True;
          }
          else {
            $fname = clean_input($fnameInput);
          }

          // Validate Last Name
          $lnameInput = $_POST["lname"];
          if (empty($lnameInput)) {
            $lnameError = "\t(Last name is required)";
            $formError = True;
          }
          else {
            $lname = clean_input($lnameInput);
          }

          // Validate Email
          $emailInput = $_POST["email"];
          if (empty($emailInput)) {
            $emailError = "\t(Email address is required)";
            $formError = True;
          }
          else {
            $email = clean_input($emailInput);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailError = "\t(Invalid email format)";
              $formError = True;
            }
          }

          // Validate Phone Number
          $phoneInput = $_POST["phone"];
          if (empty($phoneInput)) {
            $phoneError = "\t(Phone number is required)";
            $formError = True;
          }
          else {
            $phone = clean_input($phoneInput);
            if (!preg_match("/\([0-9]{3}\) [0-9]{3}-[0-9]{4}/", $phone)) {
              $phoneError = "\t(Invalid phone number format)";
              $formError = True;
            }
          }

          // Validate Company
          $company = clean_input($_POST["company"]);

          // Validate Location
          $location = clean_input($_POST["location"]);

          // Validate Service
          $serviceOptions = array("event", "promotional", "realEstate", "cinematography");
          $serviceInput = $_POST["service"];
          if (empty($serviceInput)) {
            $serviceError = "\t(Type of service is required)";
            $formError = True;
          }
          else if (!in_array($serviceInput, $serviceOptions)) {
            $serviceError = "\t(Invalid service entry)";
            $formError = True;
          }
          else {
            $service = clean_input($serviceInput);
          }

          // Validate Date
          $currentDate = date("Y-m-d");
          $dateInput = $_POST["date"];
          if (!empty($dateInput)) {
            if ($dateInput < $currentDate) {
              $dateError = "\t(Chosen date must be no earlier than " . date("M d, Y", strtotime($currentDate));
              $formError = True;
            } 
            else {
              $date = clean_input($dateInput);
              if (!preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}/", $dateInput)) {
                $dateError = "\t(Invalid date format)";
                $formError = True;
              }
            }
          }
          
          // Validate Message
          $messageInput = $_POST["message"];
          if (empty($messageInput)) {
            $messageError = "\t(This field is required)";
            $formError = True;
          }
          else {
            $message = clean_input($messageInput);
          }

          // Display message on missing input
          if ($formError) {
            $formErrorMessage = "Please fill out the required fields";
          }

          // Form input successful
          if (!$formError) {
            // send form data using Ajax to process_data.php
            echo "<script>
              var successMessage = 'Thank you for reaching out to Scheer Drone Services!<br>Your message has been successfully received. We appreciate your interest and will get back to you as soon as possible.';
              var xhr = new XMLHttpRequest();
              xhr.open('POST', 'process_data.php', true);
              xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
              xhr.send('fname=$fname&lname=$lname&email=$email&phone=$phone&company=$company&location=$location&service=$service&date=$date&message=$message');
              xhr.onload = function() {
                // Handle the response
                console.log(xhr.responseText);
                if (xhr.responseText == '001') {
                  document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('form-message').innerHTML = successMessage;
                    document.getElementById('form-message').classList.add('success-message');
                  });
                }
                else if (xhr.responseText == '002') {
                  document.getElementById('form-message').innerHTML = 'Form submission failed. Error Code: ' + xhr.responseText + '<br>Please try again later.';
                } 
                else {
                  document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('form-message').innerHTML = 'Form submission failed. Error Code: ' + xhr.responseText + '<br>Please try again later.';
                  });
                }
              };
            </script>";
            
            // Resets on handling error :(
            $fname = $lname = $email = $phone = $company = $location = $service = $date = $message = "";
            $fnameError = $lnameError = $emailError = $phoneError = $companyError = $locationError = $serviceError = $dateError = $messageError = "";

          }

          // Return to form on reload
          echo '<script>window.onload = function() { document.getElementById("contact").scrollIntoView({block: "start"}); }</script>';
        }

        function clean_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        // ERROR CSS
        if ($formError) {
          echo "
            <style>
              .error-box {
                box-shadow: inset 0 0 0px 1px red,
                  inset 0 1px 2px 1px #cac7c7,
                  0 0 0 0 transparent;
              }
              .error-box:focus {
                box-shadow: inset 0 0 1px 1px red,
                  inset 0 0 0 1px transparent,
                  0 0 10px 2px #b9b6b6;;
              }
            </style>
          ";
        }
      ?>
      <!--CONTACT US FORM-->
      <section id="contact" class="contact-us_section scroll-buffer">
        <h2 id="contact-head" class="main-heading text-center">Contact Us</h2>
        <p id="contact-desc" class="article-text">Learn more about our services or inquire about scheduling a session.<br>
          <span id="form-message" class=error-message><?php echo $formErrorMessage; ?></span>
        </p>
        <form id="contact-form" name="contactForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  novalidate>
          <div class="form_container">
            <!--first name-->
            <div>
              <label for="fname" class="input-heading">First Name<span class="required"> *</span><span class="error-message"><?php echo $fnameError; ?></span></label><br>
              <input type="text" id="fname" name="fname" class="input-box text-box <?php if($fnameError){echo "error-box";} ?>"
                maxlength="20"
                value="<?php echo $fname; ?>"
                oninput="countChars(this, 20, 'fname_count')"
              >
              <p class="char-count"><span id="fname_count">0</span> of 20 Max Characters</p>
            </div>
            <!--last name-->
            <div>
              <label for="lname" class="input-heading">Last Name<span class="required"> *</span><span class="error-message"><?php echo $lnameError; ?></span></label><br>
              <input type="text" id="lname" name="lname" class="input-box text-box <?php if($lnameError){echo "error-box";} ?>"
                maxlength="20"
                value="<?php echo $lname; ?>"
                oninput="countChars(this, 20, 'lname_count')"
              >
              <p class="char-count"><span id="lname_count">0</span> of 20 Max Characters</p>
            </div>
            <!--email-->
            <div>
              <label for="email" class="input-heading">Email<span class="required"> *</span><span class="error-message"><?php echo $emailError ?></span></label><br>
              <input type="email" id="email" name="email" class="input-box text-box <?php if($emailError){echo "error-box";} ?>"
                maxlength="100"
                value="<?php echo $email; ?>"
                oninput="countChars(this, 100, '')"
              >
            </div>
            <!--phone-->
            <div>
              <label for="phone" class="input-heading">Phone Number<span class="required"> *</span><span class="error-message"><?php echo $phoneError ?></span></label><br>
              <input type="text" id="phone" name="phone" class="input-box text-box <?php if($phoneError){echo "error-box";} ?>"
                placeholder="(xxx) xxx-xxxx"
                value="<?php echo $phone; ?>"
              >
            </div>
            <!--company-->
            <div>
              <label for="company" class="input-heading">Company</label><br>
              <input type="text" id="company" name="company" class="input-box text-box"
                maxlength="100"
                value="<?php echo $company ?>"
                oninput="countChars(this, 100, '')"
              >
            </div>
            <!--location(city)-->
            <div>
              <label for="location" class="input-heading">Where Will The Services Be Performed?</label><br>
              <input type="text" id="location" name="location" class="input-box text-box"
                placeholder="City, State"
                maxlength="100"
                value="<?php echo $location ?>"
                oninput="countChars(this, 100, '')"
              >
            </div>
            <!--service-->
            <div>
              <label for="service" class="input-heading">Requested Service<span class="required"> *</span><span class="error-message"><?php echo $serviceError ?></span></label><br>
              <select id="service" name="service" class="input-box select-box <?php if($serviceError){echo "error-box";} ?>">
                <option value="">- Select a Service -</option>
                <option value="event" <?php if($service == "event"){echo "selected";} ?>>Event Videography</option>
                <option value="promotional" <?php if($service == "promotional"){echo "selected";} ?>>Promotional Video</option>
                <option value="realEstate" <?php if($service == "realEstate"){echo "selected";} ?>>Real Estate Photography</option>
                <option value="cinematography" <?php if($service == "cinematography"){echo "selected";} ?>>Cinematography</option>
              </select>
            </div>
            <!--date-->
            <div>
              <label for="date" class="input-heading">Desired Date For Service<span class="error-message"><?php echo $dateError ?></span></label><br>
              <input type="date" id="date" name="date" class="input-box select-box <?php if($dateError){echo "error-box";}?>" value="<?php echo $date ?>">
            </div>
            <!--textbox-->
            <div class="span2">
              <label for="textField" class="input-heading">How can we help you?<span class="required"> *</span><span class="error-message"><?php echo $messageError ?></span></label><br>
              <textarea id="textField" name="message" class="input-box text-field <?php if($messageError){echo "error-box";} ?>"
                maxlength="1500"
                oninput="countChars(this, 1500, 'message_count')"><?php echo $message ?></textarea>
              <p class="char-count"><span id="message_count">0</span> of 1500 Max Characters</p>
            </div>
            <!--submit-->
            <input type="submit" value="Submit" class="submit-button">
          </div>
        </form>
      </section>
    </main>
    <!--FOOTER-->
    <footer>
      <hr class="gap">
      <!--contactbox-->
      <div class="contact-info-box">
        <p><span class="contact-info-label">Email:</span><br>scheerdroneservices@gmail.com</p>
        <p><span class="contact-info-label">Phone:</span><br>(913) 555-8438</p>
      </div>
      <!--socialbox-->
      <div class="socialbox">
        <h3 class="social-heading">Follow Us</h3>
        <div class="icon_container">
          <a href="https://www.facebook.com" target="_blank"><img class="social-icon" src="images/social_icons/Facebook_icon.png" alt="Facebook icon." width="50"></a>
          <a href="https://www.instagram.com" target="_blank"><img class="social-icon" src="images/social_icons/Instagram_icon.png" alt="Instagram icon." width="50"></a>
          <a href="https://www.twitter.com" target="_blank"><img class="social-icon" src="images/social_icons/X_icon.png" alt="X(Twitter) icon" width="50"></a>
          <a href="https://www.snapchat.com" target="_blank"><img class="social-icon" src="images/social_icons/Snapchat_icon.png" alt="Snapchat icon" width="50"></a>
          <a href="https://www.youtube.com" target="_blank"><img class="social-icon" id="youtube-icon" src="images/social_icons/YouTube_icon.png" alt="YouTube icon." width="50"></a>
        </div>
      </div>
      <div style="clear: both;"></div>
      <!--COPYRIGHT-->
      <p class="copyright">&copy;Scheer Drone Services 2023</p>
    </footer>
    <script src="scripts/scripts_nav.js"></script>
    <script src="scripts/scripts_index.js"></script>
  </body>
</html>
