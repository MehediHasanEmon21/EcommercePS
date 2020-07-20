<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Order Print</title>
	<style type="text/css">
		table tr td {
		padding: 15px; 
	   }
	</style>
</head>
<body>

	<center>
		
		<table border="1" width="100%" class="text-center">

							<tr style="text-align: center;">
								<td width="30%">
									<img src="{{ URL::to('public/assets/frontend/images/logo/logo.png') }}" alt="IMG-LOGO">
								</td>
								<td width="40%">
									<h3>Furnish Furniture</h3>
									<span><strong>Mobile : </strong>01565454348</span><br>
									<span><strong>Email : </strong>fur@gmail.com</span><br>
									<span><strong>Address : </strong>Dhaka, Bangladesh</span><
								</td>
								<td width="30%">
									<h3> Order No#{{$order->order_no}}</h3>
								</td>
							</tr>

							<tr style="text-align: center;">
								<td>Billing Info : </td>
								<td colspan="2">
									<span><strong>Name: </strong>{{ $order->shipping->name }}</span>&nbsp;&nbsp;&nbsp;
									<span><strong>Email: </strong>{{ $order->shipping->email }}</span><br>
									<span><strong>Mobile: </strong>{{ $order->shipping->mobile }}</span>&nbsp;&nbsp;&nbsp;
									<span><strong>Address: </strong>{{ $order->shipping->address }}</span><br>
									<span><strong>Payment: </strong>{{ $order->payment->payment_method }}</span>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<h3 style="text-align: center;">Order Detail</h3>
								</td>
								
							</tr>

							<tr style="text-align: center;">
								<td width="40%">Product Image & Name</td>
								<td width="30%">Color & Size</td>
								<td>Quantity & Price</td>
							</tr>
							
							@foreach($order->order_details as $detail)
							<tr style="text-align: center;">
								<td>
									<img src="{{ URL::to($detail->product->image) }}" style="width: 50px; height: 50px">
									<span>{{ $detail->product->name }}</span>
								</td>
								<td>
									{{ $detail->color->name }} & {{ $detail->size->name }}
								</td>
								<td>
									{{ $detail->quantity }} x {{ $detail->product->price }} = {{ $detail->quantity *  $detail->product->price}}
								</td>
							</tr>
							@endforeach

							<tr>
								<td colspan="2" style="text-align: right;">Grand Total</td>
								<td>{{ $order->order_total }}</td>
							</tr>
							
						</table>

	</center>
	
</body>
</html>