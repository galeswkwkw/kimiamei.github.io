<h2>
	<center>Laporan Data Produk</center>
</h2>
<hr />
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>NO</th>
		<th>PRODUCT NAME</th>
		<th>STOCK</th>
		<th>PRICE</th>

	</tr>
	<?php
	$no = 1;
	foreach ($product as $row) :
	?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?= $row->nama_brg ?></td>
			<td><?= $row->stok ?></td>
			<td>Rp. <?= number_format($row->harga, 0, ',', '.') ?></td>
			<td>Rp. <?= number_format($row->harga, 0, ',', '.') ?></td>

		</tr>
	<?php endforeach; ?>
	
</table>