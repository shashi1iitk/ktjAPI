<section class="hero is-dark">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">Login Here</h1>
        </div>
    </div>
</section>

<div class="container">
<?php if(isset($message)):?>
<article class="message">
    <div class="message-header">
        <p>Message</p>
        <button class="delete" aria-label="delete"></button>
    </div>
    <div class="message-body">
        <?= $message; ?>
    </div>
</article>
<?php endif;?>
<?php
echo validation_errors();
echo form_open('login'); ?>

    <label for="email">email</label>
    <input type="email" name="email" class="input">
    <br>
    <label for="password">password</label>
    <input type="password" name="password" class="input">
    <br>
    <input type="submit" value="Login" name="submit" class="button is-primary">
</form>
<div class="section">
    <a href="<?= site_url() ?>passwordreset">Forgot Password</a>
</div>
</div>