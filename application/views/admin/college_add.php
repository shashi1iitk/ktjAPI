<!-- <div id="content-wrapper" class=" min-h-screen w-full lg:static lg:max-h-full lg:overflow-visible lg:w-3/4 xl:w-5/6 ">
<div class="border-t border-grey-light overflow-hidden relative">
  <div class=" overflow-y-auto scrollbar-w-2 scrollbar-track-grey-lighter scrollbar-thumb-rounded scrollbar-thumb-grey scrolling-touch">
  <span class="px-10 mt-6">Add College</span>
    <?php if(isset($message)):?>
    <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md" role="alert">
    <div class="flex">
      <div>
        <p class="text-sm"><?= $message; ?></p>
      </div>
    </div>
  </div>
<?php endif;?>
  <?php $attributes = array('class' => 'max-w-sm ml-6 mt-6'); ?>
    <?= validation_errors('<div class="bg-orange-lightest border-t-4 border-orange rounded-b text-orange-darkest px-4 py-3 shadow-md">', '</div>'); ?>
  <?= form_open('admin/college/add', $attributes); ?>
  <div class="flex items-center border-b border-b-2 border-teal py-2">
    <input class="appearance-none bg-transparent border-none w-full text-grey-darker mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="College Names" aria-label="Full name" required name="college">
    <input type="submit" value="Add College" class="flex-no-shrink bg-teal hover:bg-teal-dark border-teal hover:border-teal-dark text-sm border-4 text-white py-1 px-2 rounded">
      
  </div>
</form>
  </div>
</div>
</div> -->


<main class="bg-white-medium flex-1 p-3 overflow-hidden">
  <div class="flex flex-col">
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <?php if (isset($message)) : ?>
        <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div>
            <p class="text-sm"><?= $message; ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>
      <!--Underline form-->
      <div class="mb-2 md:mx-2 lg:mx-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
          <div class="bg-grey-lighter px-2 py-3 border-solid border-grey-light border-b">
              Add College
          </div>
          <div class="p-3">
            <?= validation_errors('<div class="bg-orange-lightest border-t-4 border-orange rounded-b text-orange-darkest px-4 py-3 shadow-md">', '</div>'); ?>
              <?php $attributes = array('class' => 'w-full'); ?>
              <?= form_open('admin/college/add', $attributes); ?>
                  <div class="flex items-center border-b border-b-1 border-teal py-2">
                      <input class="appearance-none bg-transparent border-none w-full text-grey-darker mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="College Names" aria-label="Full name" required name="college">
                      <input type="submit" value="Add College" class="flex-no-shrink bg-teal hover:bg-teal-dark border-teal hover:border-teal-dark text-sm border-4 text-white py-1 px-2 rounded">
                  </div>
              </form>
          </div>
      </div>
      <!--/Underline form-->
  </div>
  <!-- /Cards Section Ends Here -->
  </div>
</main>