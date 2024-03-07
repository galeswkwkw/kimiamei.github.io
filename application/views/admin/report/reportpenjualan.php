<h2>
	<center>Laporan Data Penjualan</center>
</h2>
<hr />
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>NO</th>
		<th>ORDER ID</th>
		<th>CUSTOMER NAME</th>
		<th>TRANSACTION TIME</th>
		<th>PROOF OF PAYMENT</th>
		<th>STATUS</th>

	</tr>
	<?php
	$no = 1;
	foreach ($invoice as $row) :
	?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?= $row->order_id ?></td>
			<td><?= $row->name ?></td>
			<td><?= $row->transaction_time ?></td>
			<td><?php if (empty($row->gambar)) { ?>
					<div class="flex items-center whitespace-nowrap text-danger"> <i data-lucide="alert-circle" class="w-4 h-4 mr-2"></i>Belum upload bukti </div>
				<?php } else { ?>
					<a href="">
						<div class="flex items-center whitespace-nowrap text-primary"> <i data-lucide="link" class="w-4 h-4 mr-2"></i><a href="<?= base_url() . '/uploads/' . $row->gambar ?>">Lihat Bukti </a></div>
					</a>
				<?php } ?>
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

</table>