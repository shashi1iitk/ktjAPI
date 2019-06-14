<div id="loginform" class="w-full flex justify-center">
    <div class="w-full max-w-xs m-10">
        <div class="bg-orange-lightest border-t-4 border-orange rounded-b text-orange-darkest px-4 py-3 shadow-md mb-5" role="alert">
            <p class="p-2 text-orange-dark font-bold px-20 mb-2">Admin Login</p>        
            <?php 
            echo validation_errors();
            if (isset($message))
                echo '<p class="p-2 text-red px-4" >'. $message .'</p>'; 
            ?>
        </div>
        <?php
        $attributes = array('class' => 'shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-grey-light');
        echo form_open('admin', $attributes); 
        ?>
        <!-- <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-grey-light"> -->
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="Email">Email</label>
                <input class="bg-grey-lightest shadow rounded appearance-none w-full py-3 px-2 text-grey-darker leading-tight" id="Email" type="text" placeholder="Email" name="email">
            </div>
            <div class="mb-6">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="password">Password</label>
                <input class="bg-grey-lightest shadow rounded appearance-none w-full py-3 px-2 text-grey-darker leading-tight" id="password" type="password" placeholder="password" name="password">
                <!-- <p class="text-red text-xs italic">Please choose a password.</p> -->
            </div>
            <div class="flex items-center justify-between">
                <input type="submit" value="Login" name="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">
            </div>
        </form>
        
    </div>
</div>

