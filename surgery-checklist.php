<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Thu May 02 2024 00:28:49 GMT+0000 (Coordinated Universal Time)  -->


<?php session_start();
$con = mysqli_connect("localhost","root","","testing");

// these are all static variables that are just pulled from the database and don't change throughout the duration of the surgery
// at least to my understand (need to find a more efficient way to do this bc copy/pasting each of the queries is a pain in my a**)
$sql = "SELECT `Patient Name` FROM `patient information` WHERE 1";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row["Patient Name"];
}

$sql1 = "SELECT `DOB` FROM `patient information` WHERE 1";
$result1 = $con->query($sql1);
if ($result1->num_rows > 0) {
    $row = $result1->fetch_assoc();
    $dob = $row["DOB"];
}

$sql2 = "SELECT `MRN` FROM `patient information` WHERE 1";
$result2 = $con->query($sql2);
if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $mrn = $row["MRN"];
}

$sql3 = "SELECT `Allergies` FROM `patient information` WHERE 1";
$result3 = $con->query($sql3);
if ($result3->num_rows > 0) {
    $row = $result3->fetch_assoc();
    $allergies = $row["Allergies"];
}

$sql9 = "SELECT `Procedure Type` FROM `procedure information` WHERE 1";
$result9 = $con->query($sql9);
if ($result9->num_rows > 0) {
    $row = $result9->fetch_assoc();
    $procedure = $row["Procedure Type"];
}

//this is where the tool types will be called from

$sql10 = "SELECT `Needles Prepared` FROM `in surgery tools` WHERE 1";
$result10 = $con->query($sql10);
if ($result10->num_rows > 0) {
    $row = $result10->fetch_assoc();
    $needlePrepared = $row["Needles Prepared"];
}

$sql11 = "SELECT `Sponges Prepared` FROM `in surgery tools` WHERE 1";
$result11 = $con->query($sql11);
if ($result11->num_rows > 0) {
    $row = $result11->fetch_assoc();
    $spongePrepared = $row["Sponges Prepared"];
}

$sql12 = "SELECT `Needles In` FROM `in surgery tools` WHERE 1";
$result12 = $con->query($sql12);
if ($result12->num_rows > 0) {
    $row = $result12->fetch_assoc();
    $needleIn = $row["Needles In"];
}

$sql13 = "SELECT `Sponges In` FROM `in surgery tools` WHERE 1";
$result13 = $con->query($sql13);
if ($result13->num_rows > 0) {
    $row = $result13->fetch_assoc();
    $spongeIn = $row["Sponges In"];
}

$sql14 = "SELECT `Needles Out` FROM `in surgery tools` WHERE 1";
$result14 = $con->query($sql14);
if ($result14->num_rows > 0) {
    $row = $result14->fetch_assoc();
    $needleOut = $row["Needles Out"];
}

$sql15 = "SELECT `Sponges Out` FROM `in surgery tools` WHERE 1";
$result15 = $con->query($sql15);
if ($result15->num_rows > 0) {
    $row = $result15->fetch_assoc();
    $spongeOut = $row["Sponges Out"];
}

?>


<html data-wf-page="6631e2330e5e4024a667f0f3" data-wf-site="6629b58137d7c761e37bacd0">
<head>
  <meta charset="utf-8">
  <title>Surgery Checklist</title>
  <meta content="Surgery Checklist" property="og:title">
  <meta content="Surgery Checklist" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/medtrack-main-gui.webflow.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic"]  }});</script>
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>
<body class="body-6">
  <div class="navbar-no-shadow-3">
    <div data-animation="default" data-collapse="none" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar-no-shadow-container-3 w-nav">
      <div class="container-regular">
        <div class="navbar-wrapper">
          <a href="#" class="navbar-brand w-nav-brand">
            <h1 class="heading-27">Surgery Tool Tracking</h1>
          </a>
          <div class="w-layout-blockcontainer container-11 w-container">
            <h1 class="heading-26">SURGERY</h1>
          </div>
          <nav role="navigation" class="nav-menu-wrapper w-nav-menu">
            <ul role="list" class="nav-menu w-list-unstyled">
              <li><svg class="dashboard" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewbox="0 0 24 24" fill="none" app="ikonik">
                  <defs app="ikonik">
                    <clippath app="ikonik">
                      <rect class="rect-48iy9j" width="24" height="24" fill="currentColor" app="ikonik"></rect>
                    </clippath>
                  </defs>
                  <g clip-path="url(#clip0_6_12259)" app="ikonik">
                    <path class="path-743sq" d="M3 13H11V3H3V13ZM3 21H11V15H3V21ZM13 21H21V11H13V21ZM13 3V9H21V3H13Z" fill="currentColor" app="ikonik"></path>
                  </g>
                </svg></li>
              <li class="list-item"><svg class="chart" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" width="35" height="35" fill="currentColor" app="ikonik">
                  <path d="M20 2C20.5523 2 21 2.44772 21 3V21C21 21.5523 20.5523 22 20 22H6C5.44772 22 5 21.5523 5 21V19H3V17H5V15H3V13H5V11H3V9H5V7H3V5H5V3C5 2.44772 5.44772 2 6 2H20ZM14 8H12V11H9V13H11.999L12 16H14L13.999 13H17V11H14V8Z" app="ikonik"></path>
                </svg></li>
              <li class="list-item"><svg class="notifications" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewbox="0 0 24 24" fill="none" app="ikonik">
                  <path class="path-h7pkx" fill-rule="evenodd" clip-rule="evenodd" d="M13 3C13 2.44772 12.5523 2 12 2C11.4477 2 11 2.44772 11 3V3.75H10.4426C8.21751 3.75 6.37591 5.48001 6.23702 7.70074L6.01601 11.2342C5.93175 12.5814 5.47946 13.8797 4.7084 14.9876C4.01172 15.9886 4.63194 17.3712 5.84287 17.5165L9.25 17.9254V19C9.25 20.5188 10.4812 21.75 12 21.75C13.5188 21.75 14.75 20.5188 14.75 19V17.9254L18.1571 17.5165C19.3681 17.3712 19.9883 15.9886 19.2916 14.9876C18.5205 13.8797 18.0682 12.5814 17.984 11.2342L17.763 7.70074C17.6241 5.48001 15.7825 3.75 13.5574 3.75H13V3ZM10.75 19C10.75 19.6904 11.3096 20.25 12 20.25C12.6904 20.25 13.25 19.6904 13.25 19V18.25H10.75V19Z" fill="currentColor" app="ikonik"></path>
                </svg></li>
              <li class="list-item"><svg class="settings" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewbox="0 0 1024 1024" app="ikonik">
                  <path class="path-y6hhh" fill="currentColor" d="M512.5 390.6c-29.9 0-57.9 11.6-79.1 32.8-21.1 21.2-32.8 49.2-32.8 79.1 0 29.9 11.7 57.9 32.8 79.1 21.2 21.1 49.2 32.8 79.1 32.8 29.9 0 57.9-11.7 79.1-32.8 21.1-21.2 32.8-49.2 32.8-79.1 0-29.9-11.7-57.9-32.8-79.1a110.96 110.96 0 0 0-79.1-32.8zm412.3 235.5l-65.4-55.9c3.1-19 4.7-38.4 4.7-57.7s-1.6-38.8-4.7-57.7l65.4-55.9a32.03 32.03 0 0 0 9.3-35.2l-.9-2.6a442.5 442.5 0 0 0-79.6-137.7l-1.8-2.1a32.12 32.12 0 0 0-35.1-9.5l-81.2 28.9c-30-24.6-63.4-44-99.6-57.5l-15.7-84.9a32.05 32.05 0 0 0-25.8-25.7l-2.7-.5c-52-9.4-106.8-9.4-158.8 0l-2.7.5a32.05 32.05 0 0 0-25.8 25.7l-15.8 85.3a353.44 353.44 0 0 0-98.9 57.3l-81.8-29.1a32 32 0 0 0-35.1 9.5l-1.8 2.1a445.93 445.93 0 0 0-79.6 137.7l-.9 2.6c-4.5 12.5-.8 26.5 9.3 35.2l66.2 56.5c-3.1 18.8-4.6 38-4.6 57 0 19.2 1.5 38.4 4.6 57l-66 56.5a32.03 32.03 0 0 0-9.3 35.2l.9 2.6c18.1 50.3 44.8 96.8 79.6 137.7l1.8 2.1a32.12 32.12 0 0 0 35.1 9.5l81.8-29.1c29.8 24.5 63 43.9 98.9 57.3l15.8 85.3a32.05 32.05 0 0 0 25.8 25.7l2.7.5a448.27 448.27 0 0 0 158.8 0l2.7-.5a32.05 32.05 0 0 0 25.8-25.7l15.7-84.9c36.2-13.6 69.6-32.9 99.6-57.5l81.2 28.9a32 32 0 0 0 35.1-9.5l1.8-2.1c34.8-41.1 61.5-87.4 79.6-137.7l.9-2.6c4.3-12.4.6-26.3-9.5-35zm-412.3 52.2c-97.1 0-175.8-78.7-175.8-175.8s78.7-175.8 175.8-175.8 175.8 78.7 175.8 175.8-78.7 175.8-175.8 175.8z" app="ikonik"></path>
                </svg></li>
              <li class="mobile-margin-top-11">
                <div class="nav-button-wrapper"><svg class="profile" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewbox="0 0 24 24" fill="none" app="ikonik">
                    <path class="path-gqeuc" fill-rule="evenodd" clip-rule="evenodd" d="M12 4C7.58172 4 4 7.58172 4 12C4 13.4369 4.37801 14.7832 5.0399 15.9474C5.95387 14.7632 7.38713 14 8.99998 14H15C16.6128 14 18.0461 14.7632 18.9601 15.9475C19.622 14.7833 20 13.4369 20 12C20 7.58172 16.4183 4 12 4ZM19.9429 18.0761C20.0682 17.9125 20.1886 17.745 20.3038 17.5737C21.3749 15.9807 22 14.0618 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 14.0618 2.62509 15.9807 3.69625 17.5737C3.81141 17.745 3.93174 17.9125 4.05702 18.076L4.05179 18.0936L4.4068 18.5074C6.23929 20.6439 8.9618 22 12 22C12 22 12 22 12 22C12.2163 22 12.431 21.9931 12.6438 21.9796C14.5055 21.8613 16.2285 21.2333 17.6751 20.2346C18.3869 19.7431 19.0318 19.1619 19.5932 18.5074L19.9482 18.0936L19.9429 18.0761ZM12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6Z" fill="currentColor" app="ikonik"></path>
                  </svg></div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="w-layout-hflex flex-block-9">
    <div class="w-layout-blockcontainer container-25 w-container">
      <h1 class="heading-30">Prepared</h1>
      <div class="w-row">
        <div class="w-col w-col-6">
          <h1 class="heading-29">Tool Type</h1>
        </div>
        <div class="w-col w-col-6">
          <h1 class="heading-28">Count</h1>
        </div>
      </div>

      <form method="POST" action = "in-surgery-helper.php">
      <div class="w-layout-hflex flex-block-10">
        <div class="text-block-26">NEEDLE</div>
        <div class="text-block-25"><?php echo $needlePrepared ?></div>
        <button type="submit" class="button-6 w-button" name = "prepNeedle_in" >&gt;</a>
      </div>
      </form>

      <form method="POST" action = "in-surgery-helper.php">
      <div class="w-layout-hflex flex-block-2-copy">
        <div class="text-block-26">SPONGE</div>
        <div class="text-block-25"><?php echo $spongePrepared ?></div>
        <button type="submit" class="button-6 w-button" name = "prepSponge_in">&gt;</a>
      </div>
      </form>          

    </div>
    <div class="w-layout-blockcontainer container-10 w-container">
      <h1 class="heading-30">In Patient</h1>
      <div class="w-row">
        <div class="w-col w-col-6">
          <h1 class="heading-29">Tool Type</h1>
        </div>
        <div class="w-col w-col-6">
          <h1 class="heading-28">Count</h1>
        </div>
      </div>

      <form method="POST" action = "in-surgery-helper.php">
      <div class="w-layout-hflex flex-block-10">
        <div class="text-block-26">NEEDLE</div>
        <div class="text-block-25"><?php echo $needleIn ?></div>
        <button type="submit" class="button-6 w-button" name = "inNeedle_Out">&gt;</a>
      </div>
      </form>

      <form method="POST" action = "in-surgery-helper.php">
      <div class="w-layout-hflex flex-block-2-copy">
        <div class="text-block-26">SPONGE</div>
        <div class="text-block-25"><?php echo $spongeIn ?></div>
        <button type="submit" class="button-6 w-button" name = "inSponge_Out">&gt;</a>
      </div>
      </form>

    </div>
    <div class="w-layout-blockcontainer container-8-copy-copy w-container">
      <h1 class="heading-30">Out of Patient</h1>
      <div class="w-row">
        <div class="w-col w-col-6">
          <h1 class="heading-29">Tool Type</h1>
        </div>
        <div class="w-col w-col-6">
          <h1 class="heading-28">Count</h1>
        </div>
      </div>

      <div class="w-layout-hflex flex-block-10">
        <div class="text-block-26">NEEDLE</div>
        <div class="text-block-25"><?php echo $needleOut ?></div>
      </div>

      <div class="w-layout-hflex flex-block-2-copy">
        <div class="text-block-26">SPONGE</div>
        <div class="text-block-25"><?php echo $spongeOut ?></div>
      </div>
      
    </div>
  </div>
  <div class="w-layout-hflex">
    <div class="w-layout-blockcontainer container-6 w-container">
      <div class="w-layout-hflex">
        <h1 class="heading-32">Patient Information</h1><img src="images/patient-picture-placeholder.png" loading="lazy" sizes="100px" srcset="images/patient-picture-placeholder-p-500.png 500w, images/patient-picture-placeholder.png 626w" alt="" class="image-9">
      </div>
      <div class="w-row">
        <div class="column-12 w-col w-col-6">
          <div class="text-block-27">Name: <?php echo $name ?> </div>
          <div class="text-block-28">DOB: <?php echo $dob ?> </div>
        </div>
        <div class="column-11 w-col w-col-6">
          <div class="text-block-30">MRN: <?php echo $mrn ?> </div>
        </div>
      </div>
      <div class="text-block-29">Allergies: <?php echo $allergies ?> </div>
    </div>
    <div class="w-layout-blockcontainer container-20 w-container">
      <h1 class="heading-31">Procedure</h1>
      <p class="paragraph-2"> <?php echo $procedure ?> </p>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6629b58137d7c761e37bacd0" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
</body>
</html>