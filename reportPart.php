<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="glyphicon glyphicon-check"></i>	Detailed report by Category
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/getOrderReportPart.php" method="post" id="getOrderReportForm">
				  <div class="form-group">
                                        <label for="categoryName" class="col-sm-2 control-label">Report Category</label>
                                        <div class="col-sm-8">
                                          <select type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Name Part">
                                            
                                            <?php 
                                            $sql = "SELECT brand_id, brand_name FROM brands WHERE brand_status = 1 AND brand_active = 1";
                                                                    $result = $connect->query($sql);

                                                                    while($row = $result->fetch_array()) {
                                                                            echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                                                    } // while

                                            ?>
                                          </select>
                                        </div>
                                </div> <!-- /form-group-->	
                                
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Create Report</button>
				    </div>
				  </div>
				</form>

			</div>
			<!-- /panel-body -->
		</div>
	</div>
	<!-- /col-dm-12 -->
</div>
<!-- /row -->

<script src="custom/js/report.js"></script>

<?php require_once 'includes/footer.php'; ?>