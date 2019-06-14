
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
                
                <a class="bg-transparent hover:bg-blue text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded mr-5" href="<?= base_url() ?>admin/gamefest">
                    Back
                </a>
                <button class="bg-transparent hover:bg-green text-green-dark font-semibold hover:text-white py-2 px-4 border border-green hover:border-transparent rounded mr-10">
                    Save as xslx
                </button>
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
                <div class="font-bold text-xl">Event - <?= $eventname?></div>
            </div>
            <div class="table-responsive" id="tablewrap">
                <table class="table text-grey-darkest" id="mytable">
                    <thead class="bg-grey-dark text-white text-normal">
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Member_id</th>
                        <th scope="col">Transaction_id</th>
                        <th scope="col">Steam Id</th>
                        <th scope="col">Player Id</th>
                        <th scope="col">College</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $key => $user) : ?>
                        
                            <tr>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark">
                                    <?= $key + 1; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-blue-dark">
                                    <?= $user->name; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark">
                                    <?= $user->email; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-blue-dark">
                                    <?= $user->mobile; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark">
                                    <?= $user->gender; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-blue-dark">
                                    <?= $user->member_id; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-blue-dark">
                                    <?= $user->transaction_id; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-blue-dark">
                                    <?= $user->steam_id; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-blue-dark">
                                    <?= $user->player_id; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark">
                                    <?= $user->college; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-blue-dark">
                                    <?= $user->city; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark">
                                    <?= $user->state; ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.1/xlsx.full.min.js"></script>
<script src="https://fastcdn.org/FileSaver.js/1.1.20151003/FileSaver.min.js"></script>

<script>
    var wb = XLSX.utils.table_to_book(document.getElementById('mytable'), {sheet:"Sheet JS"});
    var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});
    function s2ab(s) {
        var buf = new ArrayBuffer(s.length);
        var view = new Uint8Array(buf);
        for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
        return buf;
    }
    document.querySelector('button').addEventListener('click', function () {
        saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'test.xlsx');
    });
</script>
