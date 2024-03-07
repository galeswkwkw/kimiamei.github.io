<div class="content">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Checkout Form
        </h2>
    </div>
    <div class=" pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Content -->
        <?php $grand_total = 0;
        if ($keranjang = $this->cart->contents()) {
            foreach ($keranjang as $item) {
                $grand_total = $grand_total + $item['subtotal'];
            }
        } ?>
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="alert alert-primary show mb-2" role="alert">Jumlah Transaksi Yang Harus Dibayar : <b>Rp. <?= number_format($grand_total, 0, ',', '.') ?>,-</b></div>
            <div class="post intro-y overflow-hidden box mt-5">
                <ul class="post__tabs nav nav-tabs flex-col sm:flex-row bg-slate-200 dark:bg-darkmode-800" role="tablist">
                    <li class="nav-item">
                        <button title="Fill in the article content" data-tw-toggle="tab" data-tw-target="#content" class="nav-link tooltip w-full sm:w-200 py-4 active" id="content-tab" role="tab" aria-controls="content" aria-selected="true"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Shipping Details </button>
                    </li>
                </ul>
                <div class="post__content tab-content">
                    <form id="payment-form" action="<?= site_url('dashboard/checkout_proccess') ?>" method="post">
                        <div id="content" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Customer Information </div>
                                <div class="mt-5">
                                    <div class="mb-5">
                                        <label for="post-form-7" class="form-label">Customer Name <small class="text-danger">*</small></label>
                                        <input type="hidden" id="order_id" name="order_id" value="INV-<?= mt_rand(000000000, 111111111) ?>" maxlength="8" autocomplete="off" required>
                                        <input type="hidden" id="tracking_id" name="tracking_id" value="<?= mt_rand(0000000000000, 1111111111111) ?>" maxlength="12" autocomplete="off" required>
                                        <input type="hidden" name="payment_method" value="Direct Bank Transfer">
                                        <input type="hidden" name="id_user" id="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
                                        <input type="hidden" name="status" id="status" value="0">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $this->session->userdata('nama_user') ?>" autocomplete="off" readonly>
                                    </div>

                                    <div class="mb-5">
                                        <label for="post-form-7" class="form-label">Username <small class="text-danger">*</small></label>
                                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $this->session->userdata('email') ?>" autocomplete="off" readonly>
                                    </div>

                                    <div class="mb-5">
                                        <label for="post-form-7" class="form-label">Recipient name <small class="text-danger">*</small></label>
                                        <input type="text" id="name_p" name="name_p" class="form-control" placeholder="Insert Recipient Name" autocomplete="off" required title="Please fill in the recipient's name!">
                                    </div>

                                    
                                    <div class="mb-5">
                                        <label for="post-form-7" class="form-label">Recipient Phone Number <small class="text-danger">*</small></label>
                                        <input type="number" id="mobile_phone" name="mobile_phone" class="form-control" placeholder="Insert mobile phone" autocomplete="off" required pattern="[0-9]*">
                                    </div>

                                </div>
                            </div>
                            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                                <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Address Information </div>
                                <div class="mt-5">
                                    <div class="mb-5">
                                        <label for="post-form-7" class="form-label">Address <small class="text-danger">*</small></label>
                                        <textarea id="alamat" name="alamat" class="form-control" placeholder="" autocomplete="off" required></textarea>
                                        <div class="form-help text-right">Note: Please input the complete address in the following format: street name, district, regency/city, province.</div>
                                    </div>

                                    <div class="mb-5">
                                        <label for="post-form-7" class="form-label">Postal Code <small class="text-danger">*</small></label>
                                        <input type="number" class="form-control" id="kode_pos" name="kode_pos" placeholder="Insert your post code" autocomplete="off" required>
                                    </div>
                                    <div class="mb-5">
                                        <label for="post-form-7" class="form-label">Select delivery service <small class="text-danger">*</small></label>
                                        <select class="form-control" id="kode_pos" name="ekspedisi" placeholder="Insert your post code" autocomplete="off" required>
                                            <option value="jne">JNE</option>
                                            <option value="tiki">TIKI</option>
                                            <option value="pos">POS Indonesia</option>
                                        </select>
                                    </div>
                                    <div class="mb-5">
                                        <label for="post-form-7" class="form-label">The weight of the item in grams. <small class="text-danger">*</small></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control"  name="berat" autocomplete="off" required>
                                            
                                                <span class="input-group-text">grams</span>
                                            
                                        </div>
                                    </div>


                                    
                                    
                                    <div class="mb-5">
                                        <label for="post-form-7" class="form-label">Shipped from the city <small class="text-danger" required>*</small></label>
                                        <select name="asal" id="" class="form-control"disabled>

                                        <option value="">Select City</option>
                                            <?php if ($kota): ?>
                                                <?php foreach ($kota->rajaongkir->results as $kt): ?>
                                                    <?php $selected = ($kt->city_id == 399) ? 'selected' : ''; ?>
                                                    <option value="<?php echo $kt->city_id ?>" <?php echo $selected ?> <?php echo ($kt->city_id == 399) ? "disabled" : ""; ?>><?php echo $kt->city_name ?></option>

                                                <?php endforeach ?>
                                            <?php endif ?>

                                        </select>
                                    </div>

                                    <div class="mb-5">
                                        <label for="post-form-7" class="form-label">Shipped to the city <small class="text-danger" required>*</small></label>
                                        <select name="tujuan"  class="form-control">

                                        <option value="">Select City</option>
                                            <?php if ($kota): ?>
                                                <?php foreach ($kota->rajaongkir->results as $kt): ?>
                                                    <option value="<?php echo $kt->city_id ?>"><?php echo $kt->city_name ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>


                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex mt-5">
                                <a href="<?= site_url('dashboard/detail_cart') ?>" class="btn w-32 border-slate-300 dark:border-darkmode-400 text-slate-500">My Cart</a>
                                <button type="submit" class="btn btn-primary w-32 shadow-md ml-auto">Verify total payment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END: Post Content -->
        <!-- BEGIN: Post Info -->
        

    
        <!-- END: Post Info -->
    </div>
</div>