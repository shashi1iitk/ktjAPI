<main class="bg-white-medium flex-1 p-3 overflow-hidden">
    <div class="flex flex-col">
    <!-- Card Sextion Starts Here -->
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

        <!-- card -->

        <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
            <div class="px-6 py-2 border-b border-light-grey">
                <div class="font-bold text-xl">All Events</div>
            </div>
            <div class="table-responsive">
                <table class="table text-grey-darkest">
                    <thead class="bg-grey-dark text-white text-normal">
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Name</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Team Size</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $key => $event) : ?>
                        
                            <tr>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark whitespace-no-wrap">
                                    <?= $key + 1; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-blue-dark">
                                    <a href="<?= base_url(); ?>admin/team/<?= $event->id; ?>"><?= $event->name; ?></a>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark whitespace-no-wrap">
                                    <?= $event->genre; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-blue-dark">
                                    <?= $event->team_size; ?>
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