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
                <a class="bg-transparent hover:bg-blue text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded mr-10" href="<?= base_url() ?>admin/eventdetail">
                    All Event Details
                </a>
            </div>
        </div>
        <!--/Outline Buttons -->
    </div>
    <!-- /Cards Section Ends Here -->
    <!--Underline form-->
      <div class="mb-2 md:mx-2 lg:mx-2 border-solid border-grey-light rounded border shadow-sm w-full">
          <div class="bg-grey-lighter px-2 py-3 border-solid border-grey-light border-b">
              Update <?= $eventdetail->name?>
          </div>
          <div class="p-3">
            <?= validation_errors('<div class="bg-orange-lightest border-t-4 border-orange rounded-b text-orange-darkest px-4 py-3 shadow-md">', '</div>'); ?>
              <?php $attributes = array('class' => 'w-full'); ?>
              <?= form_open('admin/eventdetail/updateevent/' . $eventdetail->id, $attributes); ?>
                  <div class="items-center border-b-2 border-blue py-4 my-4">
                        <label class="py-4 font-bold my-4" for="about"> About</label>
						<textarea name="about" id="about" cols="30" rows="10" class="hidden"><?= $eventdetail->about ?></textarea>
						<trix-editor input="about"></trix-editor>
                  </div>
                  <div class="items-center border-b-2 border-blue py-4 my-4">
                        <label class="py-4 font-bold my-4" for="rules"> Rules</label>
						<textarea name="rules" id="rules" cols="30" rows="10" class="hidden"><?= $eventdetail->rules ?></textarea>
						<trix-editor input="rules"></trix-editor>
                  </div>
                  <div class="items-center border-b-2 border-blue py-4 my-4">
                        <label class="py-4 font-bold my-4" for="ps"> PS</label>
						<textarea name="ps" id="ps" cols="30" rows="10" class="hidden"><?= $eventdetail->ps ?></textarea>
						<trix-editor input="ps"></trix-editor>
                  </div>
                  <div class="items-center border-b-2 border-blue py-4 my-4">
                        <label class="py-4 font-bold my-4" for="contact"> Contact</label>
					  	<textarea name="contact" id="contact" cols="30" rows="10" class="hidden"><?= $eventdetail->contact ?></textarea>
						<trix-editor input="contact"></trix-editor>
                  </div>
                    <br>
                  <input type="submit" value="Update <?= $eventdetail->name ?>" class="flex-no-shrink bg-teal hover:bg-teal-dark border-teal hover:border-teal-dark text-sm border-4 text-white py-1 px-2 rounded">
              </form>
          </div>
      </div>
      <!--/Underline form-->


    </div>
</main>
