<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="Kshitij_Logo.png">

    <!-- Title Page-->
    <title>Kshitij</title>

    <!-- Main CSS-->
      <link href='https://fonts.googleapis.com/css?family=Raleway:200,400,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/css/demo.css'>    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/main.css" rel="stylesheet" media="all">
</head>

<body>
<div id="large-header" class="large-header" style="overflow-x: hidden;">
	<canvas id="demo-canvas"></canvas>
	<div class="passreset">
		<h1 style="text-align: center">Password Reset</h1>
		<hr style="border: 1px solid #232323;">
		<?= validation_errors(); ?>
		<?= form_open('sendtoken'); ?>

			<label for="email">Enter your registered email</label><br>
			<input type="email" name="email" class="input" required>
			<br>

			<input type="submit" value="Send Token" name="submit" class="button is-primary">
		</form>
	</div>
</div>

<style>
.passreset {
    position: absolute;
    top: 15%;
    left: 10%;
    /* transform: translate(-15%,0); */
    width: 80%;
    background: #ffffff;
    padding:0rem 5rem 0rem 5rem; 
	height:40%;
}
.button.is-primary {
    width: 20%;
    margin: 2em 0px 0 0px;
    padding: 10px 0px;
    background: #608ae1;
    box-shadow: 2px 2px 10px 1px #0003;
    font-weight: 600;
	cursor:pointer;
}
@media screen and (max-width:760px) {
  .passreset {
      left: 5%;
      width: 90%;
      background: #fff;
      padding: 0rem 1rem 0rem 1rem;
      height: 50%;
  }
  input, select {
    width: 90%;
  }
  .button.is-primary {
    width: 50%;
  }
}
</style>
