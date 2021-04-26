<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Order confirmation</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
	<div class="container" style="background: #222;border-radius: 12px;padding:15px;">
		<div class="col-md-12" >

			<p style="text-align: center;color: #fff">Products and Services Greenwich Dietary Supplements</p>
			<div class="row" style="background: cadetblue;padding: 15px">

				
				<div class="col-md-6" style="text-align: center;color: #fff;font-weight: bold;font-size: 30px">
					<h4 style="margin:0">Final Project Provide Supplement</h4>
				</div>

				<div class="col-md-6 logo"  style="color: #fff">
					<p>Hi <strong style="color: #000;text-decoration: underline;">{{$shipping_array['customer_name']}}</strong></p>
				</div>
				
				<div class="col-md-12">
					<p style="color:#fff;font-size: 17px;">You have registered for the service at the shop with the following information:</p>
					<h4 style="color: #000;text-transform: uppercase;">Order Information:</h4>
					<p>Code orders: <strong style="text-transform: uppercase;color:#fff">{{$code['order_code']}}</strong></p>
					<p>Coupon code applies: <strong style="text-transform: uppercase;color:#fff">{{$code['product_coupon']}}</strong></p>
					<p>Shipping fee: <strong style="text-transform: uppercase;color:#fff">{{$shipping_array['fee']}}</strong></p>
					<p>Service: <strong style="text-transform: uppercase;color:#fff">Online</strong></p>
					
					<h4 style="color: #000;text-transform: uppercase;">Receiver's information</h4>

					<p>Email: 
						@if($shipping_array['shipping_email']=='')
							<span style="color:#fff">Not available</span>
						@else
							<span style="color:#fff">{{$shipping_array['shipping_email']}}</span>
						@endif
					</p>

					<p>Name: 
						@if($shipping_array['shipping_name']=='')
							<span style="color:#fff">Not available</span>
						@else
							<span style="color:#fff">{{$shipping_array['shipping_name']}}</span>
						@endif
					</p>
					<p>Address: 
						@if($shipping_array['shipping_address']=='')
							<span style="color:#fff">Not available</span>
						@else
							<span style="color:#fff">{{$shipping_array['shipping_address']}}</span>
						@endif
					</p>	
					<p>Phone: 
						@if($shipping_array['shipping_phone']=='')
							<span style="color:#fff">Not available</span>
						@else
							<span style="color:#fff">{{$shipping_array['shipping_phone']}}</span>
						@endif
					</p>	
					<p>Notes: 
						@if($shipping_array['shipping_note']=='')
							<span style="color:#fff">Not available</span>
						@else
							<span style="color:#fff">{{$shipping_array['shipping_note']}}</span>
						@endif
					</p>	
					<p>Payment method: <strong style="text-transform: uppercase;color:#fff">
						@if($shipping_array['shipping_method'] == 0)
							ATM transfer
						@else
							Cash
						@endif
					
					</strong></p>
					<p style="color:#fff">If the consignee's information is not available, we will contact the orderer to exchange information about the order.</p>



					<h4 style="color: #000;text-transform: uppercase;">Products ordered</h4>

					<table class="table table-striped" style="border:1px">
						<thead>
							<tr>
								<th>Product</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total Price</th>

							</tr>
						</thead>

						<tbody>
							@php 
							$sub_total = 0;
							$total = 0;
							@endphp	

							@foreach($cart_array as $cart)

							@php 
							$sub_total = $cart['product_qty']*$cart['product_price'];
							$total+=$sub_total;
							@endphp	

							<tr>
								<td>{{$cart['product_name']}}</td>
								<td>{{number_format($cart['product_price'],0,',','.')}} VNĐ</td>
								<td>{{$cart['product_qty']}}</td>
								<td>{{number_format($sub_total,0,',','.')}} VNĐ</td>
							</tr>
							@endforeach
							<br>
							<tr>
								<td colspan="4" align="right">Total payment without discount code: {{number_format($total,0,',','.')}} VNĐ</td>
							</tr>

						</tbody>
					</table>

				</div>

				<p style="color:#fff">For more information, please contact the website at: <a target="_blank" href="http://quangthong1604.com/FinalProject/">Shop</a>, or contact us via hotline number: 19005689. Thank you for ordering our shop.</p>

			</div>
		</div>
	</div>
</body>

</html>