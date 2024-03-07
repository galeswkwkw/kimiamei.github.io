<h2><center>Invoice</center></h2>
<hr/>
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>No</th>
		<th>Nama Barang</th>
		<th>Harga</th>
		<th>Qty</th>
		<th>Sub Total</th>
	</tr>
	<?php 
	$no=1; 
	$total = 0;
	foreach ($pesanan as $row) :
		$subtotal = $row->jumlah * $row->harga; 
		$total += $subtotal; 
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?= $row->nama_brg?></td>
			<td>Rp. <?= number_format($row->harga, 0, ',', '.') ?></td>
			<td><?= number_format($row->jumlah, 0, ',', '.') ?></td>
			<td>Rp. <?= number_format($subtotal, 0, ',', '.') ?></td>
			
		</tr>
	<?php endforeach; ?>
	<tr>
	<td colspan="4"><b>Total</b></td>
			<td><b>Rp. <?= number_format($total, 0, ',', '.') ?></b></td>
			</tr>
</table>