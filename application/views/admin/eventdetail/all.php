<main class="bg-white-medium flex-1 p-3 overflow-hidden">
    <div class="flex flex-col">
    <!-- Card Sextion Starts Here -->
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

        <!-- card -->

        <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
            <div class="px-6 py-2 border-b border-light-grey">
                <div class="font-bold text-xl">All Event Details</div>
            </div>
            <div class="table-responsive">
                <table class="table text-grey-darkest">
                    <thead class="bg-grey-dark text-white text-normal">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">About</th>
                        <th scope="col">Rules</th>
                        <th scope="col">Contact</th>
                        <th scope="col">PS</th>
                        <th scope="col">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alleventdetails as $key => $eventdetail) : ?>
                    <tr>
                        <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark">
                        <?= $eventdetail->id  ?></td>
                        <td class="p-2 border-t border-grey-light font-mono text-xs text-blue-dark"><?= $eventdetail->name ?></td>
                        <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark">
							<?= character_limiter($eventdetail->about, 20).'...'; ?>
						</td>
                        <td class="p-2 border-t border-grey-light font-mono text-xs text-blue-dark">
							<?= character_limiter($eventdetail->rules, 20) . '...'; ?>
						</td>
                        <td class="p-2 border-t border-grey-light font-mono text-xs text-blue-dark">
							<?= character_limiter($eventdetail->contact, 20) . '...'; ?>
						</td>
                        <td class="p-2 border-t border-grey-light font-mono text-xs text-blue-dark">
							<?= character_limiter($eventdetail->ps, 20) . '...'; ?>
						</td>
                        <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark">
                            <a href="<?=base_url()?>admin/eventdetail/<?= $eventdetail->id;?>">Edit </a> 
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
