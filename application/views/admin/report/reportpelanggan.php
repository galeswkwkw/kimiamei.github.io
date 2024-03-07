<h2>
	<center>Laporan Data Pelanggan</center>
</h2>
<hr />
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>NO</th>
		<th class="whitespace-nowrap">CUSTOMER NAME</th>
		<th class="whitespace-nowrap">ALAMAT</th>
		<th class="whitespace-nowrap">TELP</th>
		<th class="whitespace-nowrap">TRANSACTION TIME</th>
		<th class="whitespace-nowrap">ORDER ID</th>
		<th class="whitespace-nowrap">STATUS</th>

	</tr>
	<?php
	$no = 1;
	foreach ($invoice as $row) :
	?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?= $row->name ?></td>
			<td><?= $row->alamat ?></td>
			<td><?= $row->mobile_phone ?></td>
			<td><?= $row->transaction_time ?></td>
			<td><?= $row->order_id ?></td>
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