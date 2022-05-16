<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Receipt</title>
</head>
<style>
	table{
		width: 100%;
		border-collapse: collapse;
	}
	body *{
		font-size: 12px;
	}
	p{
		margin:unset; 
	}
	.text-right{
		text-align: right;
	}
	.text-left{
		text-align: left;
	}
	hr{
		border-top:unset ;
		border-width: 2px;
	    border-color: black;
	    border-bottom-style: dashed;
	}
</style>
<?php 
	$order = $this->db->query("SELECT * FROM orders where order_id = $id")->row();
    $total = $this->db->query("SELECT sum(total) as total  FROM orders where order_id = $id")->row();
    $sales = $this->db->query("SELECT * FROM sales where order_id = $id")->row();
?>
<body>
    <center><div> <img src="<?=base_url('assets/images/logo.png')?>" alt="logo" width="" heigth =""></div></center>
	<p>Order ID: <?php echo $order->order_id ?></p>
	<hr>
	<table>
		<thead>
			<tr>
				<th class="text-left">QTY</th>
				<th class="text-left">Order</th>
				<th class="text-right">Amount</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			    $items = $this->db->query("SELECT p.pname,o.qty,o.price,o.total FROM orders as o inner join product as p on o.pid = p.id WHERE o.order_id = $id");
				foreach($items->result_array() as $row):
			?>
			<tr>
				<td><?php echo number_format($row['qty']) ?></td>
				<td><?php echo ($row['pname']).($row['qty'] > 1 ? " <small>@(".(number_format($row['price'])).')</small>' : '') ?></td>
				<td class="text-right"><?php echo number_format($row['total'],2) ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="2" class="text-left">Total Amount</th>
				<th class="text-right"><?php echo number_format($total->total,2) ?></th>
			</tr>
			<tr>
				<th colspan="2" class="text-left">Tendered Amount</th>
				<th class="text-right"><?php echo number_format($sales->amount_tendered,2) ?></th>
			</tr>
			<tr>
				<th colspan="2" class="text-left">Change</th>
				<th class="text-right"><?php echo number_format($sales->amount_tendered - $sales->total_amount,2) ?></th>
			</tr>
		</tfoot>
	</table>
	<hr>
	<p><center>This receipt is UNOFFICIAL.</center></p>
</body>
</html>