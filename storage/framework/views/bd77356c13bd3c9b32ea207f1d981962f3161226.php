<!-- business information here -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <title>Receipt-<?php echo e($receipt_details->invoice_no, false); ?></title>
    </head>
    <body>
        <div class="ticket">
			<h3 class="text-box centered">
				<?php echo e($receipt_details->display_name, false); ?>

			</h3>
			<h6 class="centered"><?php echo e('INV# ' .$receipt_details->invoice_no, false); ?></h6>
			
			<?php if(isset($receipt_details->shipping_custom_field_2_value)): ?>
				<h4 class="centered">*****DELIVER TO*****</h4>
				<strong><h2 class="centered"><?php echo e($receipt_details->shipping_custom_field_2_value, false); ?></h2></strong>
				<h4 class="centered"><?php echo e($receipt_details->shipping_custom_field_3_value, false); ?></h4>
				<br>
				<h4 class="centered"><?php echo e($receipt_details->shipping_address, false); ?></h4>
			<?php endif; ?>
        	
        	<div class="text-box">
            <p class="centered">
            	<!-- Header text -->
            	

				<!-- business information here -->
				
				
				

				
			</p>
			</div>
			<div class="border-top textbox-info">
				<p class="f-left"><strong>INVOICE</strong></p>
				<p class="f-right">
					<?php echo e($receipt_details->display_name, false); ?>

				</p>
			</div>
			<div class="textbox-info">
				<p class="f-left"><strong><?php echo $receipt_details->date_label; ?></strong></p>
				<p class="f-right">
					<?php echo e($receipt_details->invoice_date, false); ?>

				</p>
			</div>
			<div class="textbox-info">
				<p class="f-left"><strong><?php echo $receipt_details->customer_label; ?></strong></p>
				<p class="f-right">
					<?php if(isset($receipt_details->shipping_custom_field_2_value)): ?>
						<span><?php echo e($receipt_details->shipping_custom_field_2_value, false); ?></span>
					<?php else: ?>
						<span><?php echo $receipt_details->customer_info; ?></span>
					<?php endif; ?>
				</p>
			</div>

			

	        <!-- customer info -->
	        
			
			
			
			
			
			
            <table style="padding-top: 5px !important" class="border-bottom width-100 table-f-12 mb-10">
				<tr>
					<th>QTY</th>
					<th>Item</th>
					<th>Price</th>
				</tr>
                <tbody>
                	<?php $__empty_1 = true; $__currentLoopData = $receipt_details->lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	                    <tr class="bb-lg">
							<td><?php echo e($line['quantity'], false); ?></td>
							<td><?php echo e($line['name'], false); ?></td>
							<td><?php echo e($line['line_total'], false); ?></td>
	                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
			
            <?php if(!empty($receipt_details->total_quantity_label)): ?>
				<div class="flex-box">
					<p class="left text-left">
						<?php echo $receipt_details->total_quantity_label; ?>

					</p>
					<p class="width-50 text-right">
						<?php echo e($receipt_details->total_quantity, false); ?>

					</p>
				</div>
			<?php endif; ?>
			<?php if(!empty($receipt_details->total_items_label)): ?>
				<div class="flex-box">
					<p class="left text-left">
						<?php echo $receipt_details->total_items_label; ?>

					</p>
					<p class="width-50 text-right">
						<?php echo e($receipt_details->total_items, false); ?>

					</p>
				</div>
			<?php endif; ?>
			<?php if(empty($receipt_details->hide_price)): ?>
            <div class="flex-box">
                <p class="left text-left">
                	<strong><?php echo $receipt_details->subtotal_label; ?></strong>
                </p>
                <p class="width-50 text-right">
                	<strong><?php echo e($receipt_details->subtotal, false); ?></strong>
                </p>
            </div>

            <!-- Shipping Charges -->
			<?php if(!empty($receipt_details->shipping_charges)): ?>
				<div class="flex-box">
					<p class="left text-left">
						<?php echo $receipt_details->shipping_charges_label; ?>

					</p>
					<p class="width-50 text-right">
						<?php echo e($receipt_details->shipping_charges, false); ?>

					</p>
				</div>
			<?php endif; ?>

			<?php if(!empty($receipt_details->packing_charge)): ?>
				<div class="flex-box">
					<p class="left text-left">
						<?php echo $receipt_details->packing_charge_label; ?>

					</p>
					<p class="width-50 text-right">
						<?php echo e($receipt_details->packing_charge, false); ?>

					</p>
				</div>
			<?php endif; ?>

			<!-- Discount -->
			<?php if( !empty($receipt_details->discount) ): ?>
				<div class="flex-box">
					<p class="width-50 text-left">
						<?php echo $receipt_details->discount_label; ?>

					</p>

					<p class="width-50 text-right">
						(-) <?php echo e($receipt_details->discount, false); ?>

					</p>
				</div>
			<?php endif; ?>
			
			<?php if( !empty($receipt_details->total_line_discount) ): ?>
				<div class="flex-box">
					<p class="width-50 text-right">
						<?php echo $receipt_details->line_discount_label; ?>

					</p>

					<p class="width-50 text-right">
						(-) <?php echo e($receipt_details->total_line_discount, false); ?>

					</p>
				</div>
			<?php endif; ?>

			<?php if( !empty($receipt_details->additional_expenses) ): ?>
				<?php $__currentLoopData = $receipt_details->additional_expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="flex-box">
						<p class="width-50 text-right">
							<?php echo e($key, false); ?>:
						</p>

						<p class="width-50 text-right">
							(+) <?php echo e($val, false); ?>

						</p>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>

			<?php if(!empty($receipt_details->reward_point_label) ): ?>
				<div class="flex-box">
					<p class="width-50 text-left">
						<?php echo $receipt_details->reward_point_label; ?>

					</p>

					<p class="width-50 text-right">
						(-) <?php echo e($receipt_details->reward_point_amount, false); ?>

					</p>
				</div>
			<?php endif; ?>

			<?php if( !empty($receipt_details->tax) ): ?>
				<div class="flex-box">
					<p class="width-50 text-left">
						<?php echo $receipt_details->tax_label; ?>

					</p>
					<p class="width-50 text-right">
						(+) <?php echo e($receipt_details->tax, false); ?>

					</p>
				</div>
			<?php endif; ?>

			<?php if( $receipt_details->round_off_amount > 0): ?>
				<div class="flex-box">
					<p class="width-50 text-left">
						<?php echo $receipt_details->round_off_label; ?> 
					</p>
					<p class="width-50 text-right">
						<?php echo e($receipt_details->round_off, false); ?>

					</p>
				</div>
			<?php endif; ?>

			<div class="flex-box">
				<p class="width-50 text-left">
					<strong><?php echo $receipt_details->total_label; ?></strong>
				</p>
				<p class="width-50 text-right">
					<strong><?php echo e($receipt_details->total, false); ?></strong>
				</p>
			</div>
			<?php if(!empty($receipt_details->total_in_words)): ?>
				<p colspan="2" class="text-right mb-0">
					<small>
					(<?php echo e($receipt_details->total_in_words, false); ?>)
					</small>
				</p>
			<?php endif; ?>
			
            <!-- Total Paid-->
				

				<!-- Total Due-->
				<?php if(!empty($receipt_details->total_due) && !empty($receipt_details->total_due_label)): ?>
					<div class="flex-box">
						<p class="width-50 text-left">
							<?php echo $receipt_details->total_due_label; ?>

						</p>
						<p class="width-50 text-right">
							<?php echo e($receipt_details->total_due, false); ?>

						</p>
					</div>
				<?php endif; ?>

				<?php if(!empty($receipt_details->all_due)): ?>
					<div class="flex-box">
						<p class="width-50 text-left">
							<?php echo $receipt_details->all_bal_label; ?>

						</p>
						<p class="width-50 text-right">
							<?php echo e($receipt_details->all_due, false); ?>

						</p>
					</div>
				<?php endif; ?>
			<?php endif; ?>
            <div class="border-bottom width-100">&nbsp;</div>
            <?php if(empty($receipt_details->hide_price) && !empty($receipt_details->tax_summary_label) ): ?>
	            <!-- tax -->
	            <?php if(!empty($receipt_details->taxes)): ?>
	            	<table class="border-bottom width-100 table-f-12">
	            		<tr>
	            			<th colspan="2" class="text-center"><?php echo e($receipt_details->tax_summary_label, false); ?></th>
	            		</tr>
	            		<?php $__currentLoopData = $receipt_details->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            			<tr>
	            				<td class="left"><?php echo e($key, false); ?></td>
	            				<td class="right"><?php echo e($val, false); ?></td>
	            			</tr>
	            		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	            	</table>
	            <?php endif; ?>
            <?php endif; ?>

            <?php if(!empty($receipt_details->additional_notes)): ?>
	            <p class="centered" >
	            	<?php echo nl2br($receipt_details->additional_notes); ?>

	            </p>
            <?php endif; ?>

            
			<?php if($receipt_details->show_barcode): ?>
				<br/>
				<img class="center-block" src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true), false); ?>">
			<?php endif; ?>

			<?php if($receipt_details->show_qr_code && !empty($receipt_details->qr_code_text)): ?>
				<img class="center-block mt-5" src="data:image/png;base64,<?php echo e(DNS2D::getBarcodePNG($receipt_details->qr_code_text, 'QRCODE'), false); ?>">
			<?php endif; ?>

			<?php if(!empty($receipt_details->footer_text)): ?>
				<p class="centered">
					<?php echo $receipt_details->footer_text; ?>

				</p>
			<?php endif; ?>
        </div>
        <!-- <button id="btnPrint" class="hidden-print">Print</button>
        <script src="script.js"></script> -->
    </body>
</html>

<style type="text/css">
.f-8 {
	font-size: 8px !important;
}
body {
	color: #000000;
}
@media  print {
	* {
    	font-size: 12px;
    	font-family: 'Times New Roman';
    	word-break: break-all;
	}
	.f-8 {
		font-size: 8px !important;
	}

.headings{
	font-size: 16px;
	font-weight: 700;
	text-transform: uppercase;
}

.sub-headings{
	font-size: 15px;
	font-weight: 700;
}

.border-top{
    border-top: 1px solid #242424;
}
.border-bottom{
	border-bottom: 1px solid #242424;
}

.border-bottom-dotted{
	border-bottom: 1px dotted darkgray;
}

td.serial_number, th.serial_number{
	width: 5%;
    max-width: 5%;
}

td.description,
th.description {
    width: 35%;
    max-width: 35%;
}

td.quantity,
th.quantity {
    width: 15%;
    max-width: 15%;
    word-break: break-all;
}
td.unit_price, th.unit_price{
	width: 25%;
    max-width: 25%;
    word-break: break-all;
}

td.price,
th.price {
    width: 20%;
    max-width: 20%;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 100%;
    max-width: 100%;
}

img {
    max-width: inherit;
    width: auto;
}

    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
.table-info {
	width: 100%;
}
.table-info tr:first-child td, .table-info tr:first-child th {
	padding-top: 8px;
}
.table-info th {
	text-align: left;
}
.table-info td {
	text-align: right;
}
.logo {
	float: left;
	width:35%;
	padding: 10px;
}

.text-with-image {
	float: left;
	width:65%;
}
.text-box {
	width: 100%;
	height: auto;
}
.m-0 {
	margin:0;
}
.textbox-info {
	clear: both;
}
.textbox-info p {
	margin-bottom: 0px
}
.flex-box {
	display: flex;
	width: 100%;
}
.flex-box p {
	width: 50%;
	margin-bottom: 0px;
	white-space: nowrap;
}

.table-f-12 th, .table-f-12 td {
	font-size: 12px;
	word-break: break-word;
}

.bw {
	word-break: break-word;
}
.bb-lg {
	border-bottom: 1px solid lightgray;
}
</style><?php /**PATH /Users/mohan/projects/mohan/laravel/cocoa/resources/views/sale_pos/receipts/slim2.blade.php ENDPATH**/ ?>