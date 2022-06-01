<?php
if (isset($_POST["submission"])) {

  $userEmail = $_POST["email"];
  $userMessage = $_POST["pesan"];
  $store_name = "message.json";
  
  if(!file_exists($store_name)) {
    fopen("message.json", "w");  
  }
  $json_store = file_get_contents($store_name);

  $data = array(
     array(
         'email' => $userEmail,
         'message' => $userMessage
     )
  );

  if(strlen($json_store) < 1) {
    $json_data = json_encode($data);
  }else {
    $json_data = json_decode($json_store);
    array_push($json_data, ["email" => $userEmail, "message" => $userMessage]);
    $json_data = json_encode($json_data);
  }
  $stored = file_put_contents('message.json', $json_data, LOCK_EX);
  if($stored) {
    echo "<script type='text/javascript'>alert('Pesan terkirim');</script>";
  }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ali Adeen's CV</title>
        <link rel="stylesheet" type="text/css" href="styles.css"/>
    </head>
    <body>
        <div id="head">
            <div class="intro">
                <h1>Ali Badr Adeen - Curriculum Vitae</h1>
                <h2>Web Developer</h2>
            </div>
            <hr>
            <div class="welcome">
                <div class="buka">
                    <h3>Selamat datang ke website Curriculum Vitae saya, berikut adalah biografi saya:</h3>
                </div>
            </div>
            <hr>
        </div>
        
        <div id="main">
            <div class="profile">
                <a href="./profile.html">
                    <button>Profile</button>
                </a>
            </div>

            <div class="skills">
                <a href="./skills.html">
                    <button>Skills</button>
                </a>
            </div>

            <div class="technical">
                <a href="./technical.html">
                    <button>Technical</button>
                </a>
            </div>

            <div class="edu">
                <a href="./education.html">
                    <button>Education</button>
                </a>
            </div>
        </div>
 
        <div id="mail">
            <button class="open-button" onclick="openForm()">Contact me</button>
            <div class="form-popup" id="myForm">
                <form action="index.php" class="form-container" method="post">
                    <h2>Message me</h2>
                    <input type="hidden" id="submission" name="submission" />
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" required />

                    <label for="pesan"><b>Message</b></label>
                    <textarea class="pesan" id="pesan" name="pesan" rows="4" cols="50" placeholder="Type here"></textarea>

                    <button type="submit" class="btn">Send</button>
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </div>
        </div>

        <div id="footer">
            <hr>
            <div class="foot">
                <p>Contact me &mdash; <a href="mailto:al.4deen@gmail.com">al.4deen@gmail.com</a> &mdash; +62 838 4828 3838</p>
            </div>
            <hr>
        </div>
    </body>
    <script src="script.js"></script>
</html>