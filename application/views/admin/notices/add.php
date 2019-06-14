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
      <div class="mb-2 md:mx-2 lg:mx-2 border-solid border-grey-light rounded border shadow-sm w-full">
          <div class="bg-grey-lighter px-2 py-3 border-solid border-grey-light border-b">
              Add Notice
          </div>
          <div class="p-3">
            <?= validation_errors('<div class="bg-orange-lightest border-t-4 border-orange rounded-b text-orange-darkest px-4 py-3 shadow-md">', '</div>'); ?>
              <?php $attributes = array('class' => 'w-full'); ?>
              <?= form_open('admin/notices/addnotice', $attributes); ?>
                  <div class="items-center border-b-2 border-teal py-4 my-4">
				  		<label class="font-bold" for="title"> Title </label>
						<input type="hidden" name="title" id="title" required>
						<trix-editor input="title"></trix-editor>
                  </div>
                  <div class="items-center border-b-2 border-teal py-4 my-4">
					  	<label class="font-bold" for="body"> body </label>
						<input type="hidden" name="body" id="body" required>
						<trix-editor input="body"></trix-editor>
                  </div>
                  <div class="items-center border-b-2 border-teal py-4 my-4">
                      <input class="appearance-none bg-transparent border-none w-full text-grey-darker mr-3 py-1 px-2 leading-tight focus:outline-none" type="date" placeholder="Date" aria-label="Full name" required name="date">
                  </div><br>
                  <input type="submit" value="Add Notice" class="flex-no-shrink bg-teal hover:bg-teal-dark border-teal hover:border-teal-dark text-sm border-4 text-white py-1 px-2 rounded">
              </form>
          </div>
      </div>
      <!--/Underline form-->


    </div>
</main>
