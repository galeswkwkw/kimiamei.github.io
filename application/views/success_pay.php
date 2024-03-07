<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Payment Notification
        </h2>
    </div>

    <!-- BEGIN: Profile Info -->

    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="<?= base_url('asset') ?>/pay.gif">
                </div>
                <div class="ml-8">
                    <div class="text-slate-500 font-medium text-lg text-dark">Congratulations, your order has been placed!</div>
                    <a class="btn btn-sm btn-primary mt-4" href="<?= site_url('bill') ?>">Review Invoice</a>
                </div>
                
            </div>
        </div>
    </div>
    <div class="box p-5 mt-5">
        <div class="flex mt-4">
            <div class="mr-auto">Shipping cost fee</div>
            <div><?php 
                $totalBiayaPengirimanPertama = 0;
                foreach ($success_pay->rajaongkir->results[0]->costs as $biaya) {
                    // Menambahkan biaya pengiriman pertama ke totalBiayaPengirimanPertama
                    $totalBiayaPengirimanPertama += $biaya->cost[0]->value;
                    // Hanya menampilkan biaya pengiriman pertama
                    echo  "Rp. " . number_format($biaya->cost[0]->value) ;
                    break;
                }
            ?></div>
        </div>

        <div class="flex mt-4">
            <div class="mr-auto">Subtotal</div>
            <div class="font-medium">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></div>
        </div>

        <div class="flex mt-4 pt-4 border-t border-slate-200/60 dark:border-darkmode-400">
            <div class="mr-auto font-medium text-base">Total Charge</div>
            <div class="font-medium text-base"><strong>Rp. <?= number_format($totalBiayaPengirimanPertama + $this->cart->total(), 0, ',', '.') ?>,-</strong></div>
        </div>
        <br><br>
        <h2 class="text-lg font-medium mr-auto">
        Select and note down the account number below for making the payment!
        </h2>
        <div class="mr-auto"></div>

                        <div class="box p-2 mt-5">
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-darkmode-600 hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md">
                        <div class="max-w-[50%] truncate mr-1">
                            <img class="mt-2" src="<?= site_url('asset') ?>/bca.png" width="60">
                        </div>
                        <div class="text-slate-500"></div>
                        <div class="ml-auto font-medium">6750527090 / Kimia 52 Shop</div>
                    </a>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-darkmode-600 hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md">
                        <div class="max-w-[50%] truncate mr-1">
                            <img class="mt-2" src="<?= site_url('asset') ?>/mandiri.png" width="80">
                        </div>
                        <div class="text-slate-500"></div>
                        <div class="ml-auto font-medium">1918009817 / Kimia 52 Shop</div>
                    </a>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-darkmode-600 hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md">
                        <div class="max-w-[50%] truncate mr-1">
                            <img class="mt-2" src="<?= site_url('asset') ?>/bni.png" width="60">
                        </div>
                        <div class="text-slate-500"></div>
                        <div class="ml-auto font-medium">6721598021 / Kimia 52 Shop</div>
                    </a>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-darkmode-600 hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md">
                        <div class="max-w-[50%] truncate mr-1">
                            <img class="mt-2" src="<?= site_url('asset') ?>/bri.png" width="50">
                        </div>
                        <div class="text-slate-500"></div>
                        <div class="ml-auto font-medium">6750527090 / Kimia 52 Shop</div>
                    </a>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-darkmode-600 hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md">
                        <div class="max-w-[50%] truncate mr-1">
                            <img class="mt-2" src="<?= site_url('asset') ?>/btpn.png" width="50">
                        </div>
                        <div class="text-slate-500"></div>
                        <div class="ml-auto font-medium">6750527090 / Kimia 52 Shop</div>
                    </a>
                </div>