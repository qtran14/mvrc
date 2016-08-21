<?php
// dd($data);
?>
<style>
	.datepicker-field-modal {
	    z-index: 1200 !important;
	}

	.modal-content .panel-body {
		height: 500px;
	    overflow-y: scroll;
	}
</style>
<div class="header-content">
    <h2><i class="glyphicon glyphicon-file"></i>Report | <?= $data['header_title']; ?></h2>
    <div class="breadcrumb-wrapper hidden-xs">
    </div>
</div>

<div class="body-content animated fadeIn">

    <div class="row">
    <?php if ( ! empty($data['all_reports']) ) { ?>
    	<input type="hidden" id="iExpenseTypeHidden" value="<?= $data['expense_type']; ?>" />

	    <?php foreach ( $data['all_reports'] as $report ) { ?>
	        <div class="col-md-12">
	        	<div class="col-md-4">
		        	<div class="panel panel-theme">
		        		<div class="panel-heading">
		                    <div class="pull-left">
		                        <h3 class="panel-title">Report Overview</h3>
		                    </div>
		                    <div class="pull-right"></div>
		                    <div class="clearfix"></div>
		                </div>
		                <div class="panel-body">
		                	<table class="table table-striped table-inverse" id="">
		                		<thead>
				                    <tr>
				                        <th>Name</th>
				                        <td><?= $report['name']; ?></td>
				                    </tr>
				                    <tr>
				                        <th>Period</th>
				                        <td><?= displayDate($report['start_period']); ?> - <?= displayDate($report['end_period']); ?></td>
			                        </tr>
			                        <tr>
				                        <th>Date</th>
				                        <td><?= displayDateTime($report['created_at']); ?></td>
			                        </tr>
			                        <tr>
			                        	<th>Full Report</th>
				                        <td colspan="2"><a data-report="<?= $report['name']; ?>" data-category="" class="btn btn-sm btn-info btn-xs btn-push cShowReprotDetailModal" href="#" data-target=".cReportDetailModal" data-keyboard="false" data-backdrop="static" data-toggle="modal">View</a></td>
				                    </tr>
				                </thead>
		                	</table>
		                </div>
	                </div>
	        	</div>

	        	<div class="col-md-8">
		        	<div class="panel panel-theme">
		        		<div class="panel-heading">
		                    <div class="pull-left">
		                        <h3 class="panel-title">Report Summary</h3>
		                    </div>
		                    <div class="pull-right"></div>
		                    <div class="clearfix"></div>
		                </div>
	                	<div class="panel-body">
		                	<table class="table table-striped table-inverse" id="">
		                		<thead>
				                    <tr>
				                        <th class="text-center border-top">Category</th>
				                        <th class="border-top">Count</th>
				                        <th class="border-top text-right">Amount</th>
				                        <th class="border-top">&nbsp;</th>
				                    </tr>
				                </thead>
				                <tbody>
					                <?php 
					                	$grand_total = 0.00;
					                	foreach ( $report['summary'] as $category_id => $category_info ) { 
					                		$amount = empty($category_info['amount']) ? '0.00' : $category_info['amount'];
					                		$grand_total += $amount;
				                	?>
		            						<tr>
		            							<td><?= $category_info['name']; ?></td>
		            							<td><?= number_format($category_info['count']) ?></td>
		            							<td class="text-right">$<?= number_format($amount, 2); ?></td>
		            							<td>
		            								<?php if ( $category_info['count'] > 0) { ?>
				            							<a data-report="<?= $report['name']; ?>" data-category="<?= $category_id ?>" class="btn btn-sm btn-info btn-xs cShowReprotDetailModal" href="#" data-target=".cReportDetailModal" data-keyboard="false" data-backdrop="static" data-toggle="modal"><i class="fa fa-eye"></i></a>
		            								<?php } else { ?>
		            									&nbsp;
		            								<?php } ?>
		            							</td>
		            						</tr>
		            				<?php } ?>
				                </tbody>
				                <tfoot>
				                	<tr>
				                		<th class="text-right" colspan="2">Total</th>
				                		<th class="text-right">$<?= number_format($grand_total, 2); ?></th>
				                		<th>&nbsp;</th>
				                	</tr>
				                </tfoot>
		                	</table>
		                </div>
		        	</div>
	        	</div>
	        </div>
		<?php } ?>
	<?php } else { ?>
		<h3 class="text-danger">No report available!</h3>
	<?php } ?>
    </div>
</div>
<!-- 
<footer class="footer-content">
    Here is the footer
</footer> -->
