<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Kshitij & Toppr Quiz</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="viewport" content="width=1366">
  <link rel="icon" href="<?= base_url() ?>assets/Kshitij_Log.png">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
</head>

<body>

  <header>
	<center><h2>Register for <img src="<?= base_url() ?>assets/Kshitij_Logo.png" style="width:60px"> IQ quiz</h2></center>
	<center><h1>Brainiac</h1></center>
</header>

<div class="form">
<!-- 
<div class="fish" id="fish"></div>
<div class="fish" id="fish2"></div> -->


<?= validation_errors('<div class="formgroup-error">', '</div>'); ?>
<?php
    $attributes = array('id' => 'waterform');
    echo form_open('toppr/register', $attributes); 
?>

    <div class="formgroup" id="name-form">
        <label for="name">Full name*</label>
        <input type="text" id="name" name="name" />
    </div>

    <div class="formgroup" id="class-form">
        <label for="class">Class*</label>
        <select id="class" name="classs">
            <option value="">Select an option</option>
            <option value="7">7th</option>
            <option value="8">8th</option>
            <option value="9">9th</option>
            <option value="10">10th</option>
            <option value="11">11th</option>
            <option value="12">12th</option>
        </select>
    </div>

    <div class="formgroup" id="school-form">
        <label for="school">School name*</label>
        <input type="text" id="school" name="school" />
    </div>

    <div class="formgroup" id="city-form">
        <label for="city">City*</label>
        <select id="city" name="city">
            <option value="">Select an option</option>
            <option value="Mumbai">Mumbai</option>
            <option value="Pune">Pune</option>
            <option value="Ahmedabad">Ahmedabad</option>
            <option value="Gurugram">Gurugram</option>
            <option value="Hyderabad">Hyderabad</option>
            <option value="Bangalore">Bangalore</option>
            <option value="Delhi">Delhi</option>
            <option value="Chennai">Chennai</option>
            <option value="Nagpur">Nagpur</option>
            <option value="Lucknow">Lucknow</option>
            <option value="Vadodara">Vadodara</option>
            <option value="Indore">Indore</option>
            <option value="Bhopal">Bhopal</option>
            <option value="Jaipur">Jaipur</option>
            <option value="Raipur">Raipur</option>
            <option value="Surat">Surat</option>
            <option value="Kochi">Kochi</option>
            <option value="Kolkata">Kolkata</option>
            <option value="Chandigarh">Chandigarh</option>
            <option value="Bhubaneswar">Bhubaneswar</option>
            <option value="Vizagzag">Vizag</option>
        </select>
    </div>

    <div class="formgroup" id="mobile-form">
        <label for="mobile">Mobile number*</label>
        <input type="number" id="mobile" name="mobile" />
    </div>
	<input type="submit" value="Register me!" />
</form>

<br><br>

  <div class="info">
    <span style="font-size: 1.5em">Note:</span> <br>  
    <ul>
        <li>It will be an IQ based quiz.</li>
        <li>Win exciting  cash prizes. </li>
        <li>Grab a chance to win goodies</li>
        <li>Dates to be announced later.</li>
    </ul>  
    
  </div>
  <div class="bg" style="background-image:url('<?= base_url() ?>assets/topprback.jpg')"></div>
  <!-- <img src="<?= base_url() ?>assets/topprback.jpg" alt=""> -->
</div>
  <!-- <div class="bg" style="background-image:url('<?= base_url() ?>assets/topprback.jpg')"></div> -->

  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script  src="<?= base_url() ?>assets/js/index.js"></script>

</body>

</html>
