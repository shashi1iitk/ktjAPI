<?php 
if (isset($this->session->userdata['logged_in'])) {
    $email = $this->session->userdata['logged_in']['email'];
} else {
    header('location: login');
}
?>
 <div id="content-wrapper" class=" min-h-screen w-full lg:static lg:max-h-full lg:overflow-visible lg:w-3/4 xl:w-5/6 ">
 <?php if (isset($userinfo)) : ?>
    <?php echo $userinfo->email; ?><br>
<?php endif; ?>
 </div>