<main class="bg-white-medium flex-1 p-3 overflow-hidden">
    <div class="flex flex-col">
    <!-- Card Sextion Starts Here -->
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <!--Outline Buttons form-->
        <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
            <div class="bg-grey-lighter px-2 py-3 border-solid border-grey-light border-b">
                Links
            </div>
            <div class="p-3">
                <a class="bg-transparent hover:bg-blue text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded mr-10" href="<?= base_url() ?>admin/notices">
                    All Notices
                </a>
                <a class="bg-transparent hover:bg-blue text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded mr-5" href="<?= base_url() ?>admin/notices/add">
                    Add Notice
                </a>
            </div>
        </div>
        <!--/Outline Buttons -->
    </div>
    <!-- /Cards Section Ends Here -->
    <!--Underline form-->
      <div class="mb-2 md:mx-2 lg:mx-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
          <div class="bg-grey-lighter px-2 py-3 border-solid border-grey-light border-b">
              Update Notice
          </div>
          <div class="p-3">
            <?= validation_errors('<div class="bg-orange-lightest border-t-4 border-orange rounded-b text-orange-darkest px-4 py-3 shadow-md">', '</div>'); ?>
              <?php $attributes = array('class' => 'w-full'); ?>
              <?= form_open('admin/notices/updatenotice/'.$notice->id, $attributes); ?>
                  <div class="flex items-center border-b border-b-1 border-teal py-2">
                      <input class="appearance-none bg-transparent border-none w-full text-grey-darker mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Title" aria-label="Full name" required name="title" value="<?= $notice->title?>">
                  </div>
                  <div class="flex items-center border-b border-b-1 border-teal py-2">
                      <input class="appearance-none bg-transparent border-none w-full text-grey-darker mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Body" aria-label="Full name" required name="body" value="<?= $notice->body ?>">
                  </div><br>
                  <input type="submit" value="Update Notice" class="flex-no-shrink bg-teal hover:bg-teal-dark border-teal hover:border-teal-dark text-sm border-4 text-white py-1 px-2 rounded">
              </form>
          </div>
      </div>
      <!--/Underline form-->


    </div>
</main>