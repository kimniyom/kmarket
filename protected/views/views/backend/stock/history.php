<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>วันที่</th>
			<th>จำนวนนำเข้า</th>
			<th>คงเหลือ</th>
			<th>หมดอายุ</th>
			<th>ล๊อตที่</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=0;foreach($history as $rs): $i++ ?>
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $rs['date_input'] ?></td>
			<td style=" text-align: center; color: red; font-weight: bold;"><?php echo $rs['inputnumber'] ?></td>
			<td style="text-align: center; color: green; font-weight: bold;"><?php echo $rs['total'] ?></td>
			<td><?php echo $rs['date_expire'] ?></td>
			<th><?php echo $rs['lotnumber'] ?></th>
			<?php if($rs['inputnumber'] == $rs['total']) { ?>
			<td style="text-align: center;"><a href=""><i class='fa fa-trash'></i></a></td>
		<?php } else { ?>
			<td style="text-align: center;">-</td>
		<?php } ?>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>