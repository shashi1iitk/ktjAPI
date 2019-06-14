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
                
                <a class="bg-transparent hover:bg-blue text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded mr-5" href="<?= base_url() ?>admin/team">
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
                <div class="font-bold text-xl">Event - <?= $eventname ?></div>
            </div>
            <div class="table-responsive" id="tablewrap">
                <table class="table text-grey-darkest" id="mytable">
                    <thead class="bg-grey-dark text-white text-normal">
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Teamid</th>
                        <th scope="col">Captain</th>
                        <th scope="col">Member1</th>
                        <th scope="col">Member2</th>
                        <th scope="col">Member3</th>
                        <th scope="col">Member4</th>
                        <th scope="col">Member5</th>
                        <!-- <th scope="col"></th> -->
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($teams as $key => $team) : ?>
                        
                            <tr>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark">
                                    <?= $key + 1; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-blue-dark">
                                    <?= $team['teamid']; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark">
                                    <?= $team['members'][0]; ?><br>
                                    <?= $team['memmail'][0]; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark">
                                    <?= $team['members'][1]; ?><br>
                                    <?= $team['memmail'][1]; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark">
                                    <?= $team['members'][2]; ?><br>
                                    <?= $team['memmail'][2]; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark">
                                    <?= $team['members'][3]; ?><br>
                                    <?= $team['memmail'][3]; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark">
                                    <?= $team['members'][4]; ?><br>
                                    <?= $team['memmail'][4]; ?>
                                </td>
                                <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark">
                                    <?= $team['members'][5]; ?><br>
                                    <?= $team['memmail'][5]; ?>
                                </td>
                                <!-- <td class="p-2 border-t border-grey-light font-mono text-xs text-purple-dark">
                                    <a href="<?= base_url() ?>admin/team/delete/<?= $team['teamid'] ?>">delete</a>
                                </td> -->

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