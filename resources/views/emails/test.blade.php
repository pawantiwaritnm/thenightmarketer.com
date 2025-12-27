<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table class="table" style="width: 80%;margin: 0 auto;">
		<thead>
			<tr>
				<th>
					<img src="{{ asset('client/images/Startup_Movers_PNG.png') }}">
				</th>
			</tr>
		</thead>
		<tbody style="display: inline-block;">
			<tr>
				<td>Hello</td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td>New lead capture on startup-movers. Here is your detail</td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td style="border-bottom: 1px solid #0048fc;padding: 10px 10px 10px 0;">Name:{{ @$data['name'] }}</td> 
			</tr> 
			<?php if(!empty(@$data['company_name'])): ?>
			<tr>
				<td style="border-bottom: 1px solid #0048fc;padding: 10px 10px 10px 0;">Company Name:{{ @$data['company_name'] }}</td> 
			</tr>
			<?php endif; ?>
			<?php if(!empty(@$data['purpose'])): ?>
			<tr>
				<td style="border-bottom: 1px solid #0048fc;padding: 10px 10px 10px 0;">Purpose:{{ @$data['purpose'] }}</td> 
			</tr>
			<?php endif; ?>
			<?php if(!empty(@$data['invoice_no'])): ?>
			<tr>
				<td style="border-bottom: 1px solid #0048fc;padding: 10px 10px 10px 0;">Invoice No:{{ @$data['invoice_no'] }}</td> 
			</tr>
			<?php endif; ?>
			<?php if(!empty(@$data['amount'])): ?>
			<tr>
				<td style="border-bottom: 1px solid #0048fc;padding: 10px 10px 10px 0;">Amount:{{ @$data['amount'] }}</td> 
			</tr>
			<?php endif; ?>
			<?php if(!empty(@$data['payment_date'])): ?>
			<tr>
				<td style="border-bottom: 1px solid #0048fc;padding: 10px 10px 10px 0;">Payment Date:{{ @$data['payment_date'] }}</td> 
			</tr>
			<?php endif; ?>
			<?php if(!empty(@$data['payment_mode'])): ?>
			<tr>
				<td style="border-bottom: 1px solid #0048fc;padding: 10px 10px 10px 0;">Payment Mode:{{ @$data['payment_mode'] }}</td> 
			</tr>
			<?php endif; ?>
			<?php if(!empty(@$data['reference_no'])): ?>
			<tr>
				<td style="border-bottom: 1px solid #0048fc;padding: 10px 10px 10px 0;">Reference No:{{ @$data['reference_no'] }}</td> 
			</tr>
			<?php endif; ?>

			<?php if(!empty(@$data['phone'])): ?>

			<tr>
				<td style="border-bottom: 1px solid #0048fc;padding: 10px 10px 10px 0;">Phone No:{{ @$data['phone'] }}</td> 
			</tr>

			<?php endif; ?>

			<?php if(!empty(@$data['email'])): ?>

			<tr>
				<td style="border-bottom: 1px solid #0048fc;padding: 10px 10px 10px 0;">Email Id:{{ @$data['email'] }}</td>
			</tr>

			<?php endif; ?>
			<?php if(!empty(@$data['current_url'])): ?>
			<tr>
				<td style="border-bottom: 1px solid #0048fc;padding: 10px 10px 10px 0;">Service:{{ @$data['current_url'] }}</td>
			</tr>
			<?php endif; ?>
			<?php if(!empty(@$data['message'])): ?>
			<tr>
				<td style="border-bottom: 1px solid #0048fc;padding: 10px 10px 10px 0;">Message:{{ @$data['message'] }}</td>
			</tr>
			<?php endif; ?>
			<?php if(!empty(@$data['designation'])): ?>
			<tr>
				<td style="border-bottom: 1px solid #0048fc;padding: 10px 10px 10px 0;">Designation:{{ @$data['designation'] }}</td>
			</tr>
			<?php endif; ?>
			<?php if(!empty(@$data['linkedin_link'])): ?>
			<tr>
				<td style="border-bottom: 1px solid #0048fc;padding: 10px 10px 10px 0;">Linkedin Link:{{ @$data['linkedin_link'] }}</td>
			</tr>
			<?php endif; ?>

			
			<tr style="height: 20px;">
				<td></td>
			</tr>
			<tr>
				<td>Thanks again</td>
			</tr>
			<tr>
				<td>Startup-movers</td>
			</tr>

		</tbody>
		<tfoot>
			<tr style="height: 20px;">
				<td></td>
			</tr>
			<tr style="background: #0048fc;">
				<td style="text-align: center;">
					<p style="color:#FFF;display: inline-block;position: relative;top: -4px;">Follow Us :</p>  
					<p style="display: inline-block;">
					<a href="https://www.facebook.com/startupmovers/" target="_blank"><img style="width: 20px;" src="{{ asset('client/images/Facebook.png') }}"></a>
					<a href="https://www.linkedin.com/company/startup-movers-pvtltd" target="_blank"><img style="width: 20px;" src="{{ asset('client/images/Linkedin.png') }}"></a>
					<a href="https://www.youtube.com/channel/UCvy0p9iMIhvk1V6mstrATmA" target="_blank"><img style="width: 20px;" src="{{ asset('client/images/Youtube.png') }}"></a>
					<a href="https://twitter.com/startupmovers" target="_blank"><img style="width: 20px;" src="{{ asset('client/images/Twitter.png') }}"></a>
					<a href="https://www.instagram.com/startup_movers/" target="_blank"><img style="width: 20px;" src="{{ asset('client/images/Instagram.png') }}"></a>
					<a href="https://www.tumblr.com/login?redirect_to=%2Fblog%2Fstartupmovers" target="_blank"><img style="width: 20px;" src="{{ asset('client/images/Tumblr.png') }}"></a>
					<a href="https://in.pinterest.com/startupmovers/" target="_blank"><img style="width: 16px;" src="{{ asset('client/images/Pinterest.png') }}"></a>
				</p>
				</td>
			</tr>
		</tfoot>
	</table>
</body>
</html>

