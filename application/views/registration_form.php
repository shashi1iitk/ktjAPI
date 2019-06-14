<?php if (isset($message)) : ?>
    <div class="formgroup-error">
        ERROR : <?= $message; ?>
    </div>
</article>
<?php endif; ?>
                    <?= validation_errors('<div class="formgroup-error">', '</div>'); ?>
                    <?php
                    $attributes = array('id' => 'waterform');
                    echo form_open('register', $attributes); ?>
<div class="container">
<?= validation_errors(); ?>
<?= form_open('register'); ?>

    <label for="name">Name</label>
    <input type="text" name="name" class="input" required>
    <br>
    <label for="email">email</label>
    <input type="email" name="email" class="input" required>
    <br>
    <label for="password">password</label>
    <input type="password" name="password" class="input" required>
    <br>
    <label for="passconf">Confirm Password</label>
    <input type="password" name="passconf" class="input" required>
    <br>
    <label for="mobile">Mobile</label>
    <input type="number" name="mobile" class="input" required>
    <br>
    <label for="college">college</label>
    <input type="text" name="college" class="input" required>
    <br>
    <label for="dob">Date of Birth</label>
    <input type="date" name="dob" class="input" required>
    <br>
    <label for="city">city</label>
    <input type="text" name="city" class="input" required>
    <br>
    <label for="state">state</label>
    <input type="text" name="state" class="input" required>
    <br>
    <label for="department">department</label>
    <input type="text" name="department" class="input" required>
    <br>
    <label for="college_id">college_id</label>
    <input type="text!" name="college_id" class="input" required>
    <br><br>
    <input type="submit" value="Register" name="submit" class="button is-primary">

</form>
</div>