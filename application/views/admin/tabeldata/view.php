    <div class="content">
        <h2 class="intro-y text-lg font-medium mt-10">
            Data Pelanggan
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
                <div class="flex w-full sm:w-auto">
                    <form action="<?= site_url('admin/tabeldata/search') ?>" method="post" enctype="multipart/form-data">
                        <div class="w-48 relative text-slate-500">
                            <input type="text" name="keyword" class="form-control w-48 box pr-10" placeholder="Search by Cust Name...">
                            <button type="submit" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i></button>
                        </div>

                    </form>
                </div>
                <div class="hidden xl:block mx-auto text-slate-500"></div>
                <div class="w-full xl:w-auto flex flex-wrap xl:flex-nowrap items-center gap-y-3 mt-3 xl:mt-0">
                    <a href="<?= site_url('admin/report/reportpelanggan') ?>" class="btn btn-danger shadow-md mr-2"> Cetak</a>
                </div>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>

                            <th class="whitespace-nowrap">CUSTOMER NAME</th>
                            <th class="whitespace-nowrap">ALAMAT</th>
                            <th class="whitespace-nowrap">TELP</th>
                            <th class="whitespace-nowrap">TRANSACTION TIME</th>
                            <th class="whitespace-nowrap">ORDER ID</th>
                            <th class="whitespace-nowrap">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($invoice as $row) : ?>
                            <tr class="intro-x">
                                <td class="w-40">
                                    <a href="" class="font-medium whitespace-nowrap"><?= $row->name ?></a>
                                </td>
                                <td class="w-40">
                                    <a href="" class="font-medium whitespace-nowrap"><?= $row->alamat ?></a>
                                </td>
                                <td class="w-40">
                                    <a href="" class="font-medium whitespace-nowrap"><?= $row->mobile_phone ?></a>
                                </td>
                                <td>
                                    <div class="text-slate-500 whitespace-nowrap mt-0.5"><?= $row->transaction_time ?></div>
                                </td>
                                <td class="w-40 !py-4">
                                    <a href="<?= site_url('admin/invoice/detail/' . $row->order_id) ?>" class="underline decoration-dotted whitespace-nowrap">#<?= $row->order_id ?></a>
                                </td>

                                <td>
                                    <?php if ($row->status == "0") { ?>
                                        <div class="flex items-center whitespace-nowrap text-pending"><b>PENDING</b> </div>
                                    <?php } else if ($row->status == "1") { ?>
                                        <div class="flex items-center whitespace-nowrap text-success"> <b>PAID</b> </div>
                                    <?php } ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
        </div>
        <!-- BEGIN: Delete Confirmation Modal -->
        <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-slate-500 mt-2">
                                Do you really want to delete these records?
                                <br>
                                This process cannot be undone.
                            </div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <button type="button" class="btn btn-danger w-24">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Delete Confirmation Modal -->
    </div>