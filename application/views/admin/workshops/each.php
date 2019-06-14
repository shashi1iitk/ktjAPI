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
                <a class="bg-transparent hover:bg-blue text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded mr-10" href="<?= base_url() ?>admin/workshops">
                    All Workshops
                </a>
            </div>
        </div>
        <!--/Outline Buttons -->
    </div>
    <!-- /Cards Section Ends Here -->
    <!--Underline form-->
      <div class="mb-2 md:mx-2 lg:mx-2 border-solid border-grey-light rounded border shadow-sm w-full">
          <div class="bg-grey-lighter px-2 py-3 border-solid border-grey-light border-b">
              Update <?= $workshop->name ?>
          </div>
          <div class="p-3">
            <?= validation_errors('<div class="bg-orange-lightest border-t-4 border-orange rounded-b text-orange-darkest px-4 py-3 shadow-md">', '</div>'); ?>
              <?php $attributes = array('class' => 'w-full'); ?>
              <?= form_open('admin/workshops/update/' . $workshop->id, $attributes); ?>
                  <div class="items-center border-b-2 border-teal py-4 my-4">
                        <label class="font-bold" for="topic"> Topic</label>
						<textarea name="topic" id="topic" cols="30" rows="10" class="hidden"><?= $workshop->topic ?></textarea>
						<trix-editor input="topic"></trix-editor>
                  </div>
                  <div class="items-center border-b-2 border-teal py-4 my-4">
                        <label class="font-bold" for="about"> about</label>
						<textarea name="about" id="about" cols="30" rows="10" class="hidden"><?= $workshop->about ?></textarea>
						<trix-editor input="about"></trix-editor>
                  </div>
                  <div class="items-center border-b-2 border-teal py-4 my-4">
                        <label class="font-bold" for="contact"> contact</label>
						<textarea name="contact" id="contact" cols="30" rows="10" class="hidden"><?= $workshop->contact ?></textarea>
						<trix-editor input="contact"></trix-editor>
                  </div>
                  <div class="items-center border-b-2 border-teal py-4 my-4">
                        <label class="font-bold" for="logo"> logo</label>
						<textarea name="logo" id="logo" cols="30" rows="10" class="hidden"><?= $workshop->logo ?></textarea>
						<trix-editor input="logo"></trix-editor>
                  </div>
                    <br>
                  <input type="submit" value="Update <?= $workshop->name ?>" class="flex-no-shrink bg-teal hover:bg-teal-dark border-teal hover:border-teal-dark text-sm border-4 text-white py-1 px-2 rounded">
              </form>
          </div>
      </div>
      <!--/Underline form-->


    </div>
</main>
