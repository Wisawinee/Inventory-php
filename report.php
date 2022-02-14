<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="glyphicon glyphicon-check"></i>	Report Withdraw
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/getOrderReport.php" method="post" id="getOrderReportForm">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
                                  <div class="form-group">
                                        <label for="DepartmentName" class="col-sm-2 control-label">Department Withdraw</label>
                                        <div class="col-sm-10">
                                          <select type="text" class="form-control" id="DepartmentName" name="DepartmentName" placeholder="Name">
                                                <option value="%" >~~ All Department ~~</option>
                                                <option value="IT" >IT</option>
                                                <option value="ENGINEER" >ENGINEER</option>
                                                <option value="MAINTENANCE" >MAINTENANCE</option>
                                                <option value="แผนกอื่นๆ" >Other Department</option>
                                            </select>
                                        </div>
                                </div> <!-- /form-group-->		
                                  <div class="form-group">
                                        <label for="categoryName" class="col-sm-2 control-label">Report Part Type</label>
                                        <div class="col-sm-8">
                                          <select type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Name Part">
                                            <option value="%">~~ All Part Type ~~</option>
                                            <?php 
                                            $sql = "SELECT categories_id, categories_name, categories_active, categories_status FROM categories WHERE categories_status = 1 AND categories_active = 1";
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