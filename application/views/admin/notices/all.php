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
                <a class="bg-transparent hover:bg-blue text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded mr-10" href="<?= base_url()?>admin/notices">
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
    <!-- Card Sextion Starts Here -->
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

        <!-- card -->

        <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
            <div class="px-6 py-2 border-b border-light-grey">
                <div class="font-bold text-xl">All Notices</div>
            </div>
            <div class="table-responsive">
                <table class="table text-grey-darkest">
                    <thead class="bg-grey-dark text-white text-normal">
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Title</th>
                        <th scope="col">Body</th>
                        <th scope="col">Date</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allnotices as $key => $notice) : ?>
                    <tr>
                        <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark whitespace-no-wrap"><?= $key + 1 ?></td>
                        <td class="p-2 border-t border-grey-light font-mono text-xs text-blue-dark whitespace-pre"><?= $notice->title ?></td>
                        <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark whitespace-no-wrap"><?= $notice->body ?></td>
                        <td class="p-2 border-t border-grey-light font-mono text-xs text-blue-dark whitespace-pre"><?= $notice->date ?></td>
                        <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark whitespace-no-wrap">
                            <a href="<?=base_url()?>admin/notices/<?= $notice->id;?>">Edit </a> 
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    </div>
</main>