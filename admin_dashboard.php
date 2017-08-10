<? 	include "includes/common_layout.php";

	check_if_login();
	
	ob_start();
	
	disphtml("main();");
	
	ob_end_flush();
	
	function main(){ 
	$objDB = new DB()
	?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
		  <? $Query = "select count(p.branch_id) as cnt from ".SCHEMA.".branch as p  "; //echo $Query; die();

				$objDB->setQuery($Query);
				$rsTotal = $objDB->select(); ?>
            <div class="inner">
              <h3><? echo $rsTotal[0]['cnt']; ?></h3>

              <p>Total Branches</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
		  <? $Query = "select count(p.manager_id) as cnt from ".SCHEMA.".br_manager as p  "; //echo $Query; die();

				$objDB->setQuery($Query);
				$rsTotal = $objDB->select(); ?>
            <div class="inner">
              <h3><? echo $rsTotal[0]['cnt']; ?></h3>

              <p>Manager</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
		  <? $Query = "select count(p.member_id) as cnt from ".SCHEMA.".member as p  "; //echo $Query; die();

				$objDB->setQuery($Query);
				$rsTotal = $objDB->select(); ?>
            <div class="inner">
              <h3><? echo $rsTotal[0]['cnt']; ?></h3>

              <p>Member Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="member_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
		   <? $Query = "select sum(p.amount) as tot from ".SCHEMA.".donation as p  "; //echo $Query; die();

				$objDB->setQuery($Query);
				$rsTotal = $objDB->select(); ?>
            <div class="inner">
              <h3>Rs. <? echo $rsTotal[0]['tot']; ?></h3>

              <p>Donations</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          
          <!-- /.nav-tabs-custom -->

          <!-- Chat box -->
          
          <!-- /.box (chat box) -->

          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Latest Members</h3>

              <!--<div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>-->
            </div>
            <!-- /.box-header -->
			
            <div class="box-body">
              <ul class="todo-list">
			   <? $Query  = "select * 
								from ".SCHEMA.".member as p  
								
								order by member_id desc limit 5 offset 0 ";
					
					$objDB->setQuery($Query);
					$rs = $objDB->select();
			   
			    for($i=0;$i<count($rs);$i++) {
			   
			    ?>
                <li>
                  <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  <!--<input type="checkbox" value="">-->
                  <!-- todo text -->
                  <span class="text"><?=$rs[$i]['member_name']?> &nbsp; <?=$rs[$i]['member_address']?> &nbsp; <span style="color:#990000"><?=$rs[$i]['member_phone']?></span></span>
                  <!-- Emphasis label -->
                  <small class="label label-info"><i class="fa fa-clock-o"></i> Join Date - <? 
								//echo $rs[$i]['delivery_date'];
							 ?></small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <a href="member_add.php?member_id=<?=$rs[$i]['member_id']?>"><i class="fa fa-edit"></i></a>
                    <!--<i class="fa fa-trash-o"></i>-->
                  </div>
                </li>
				<? } ?>
               
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" onClick="window.location='project_add.php'" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add Client</button>
            </div>
          </div>
          <!-- /.box -->

          <!-- quick email widget -->


          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">


          <!-- Map box -->
          
          <!-- /.box -->

          <!-- solid sales graph -->
          
          <!-- /.box -->

          <!-- Calendar -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
				  
                  <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                  </tr>
                  </thead>
                  <tbody>
				  <? $Query  = "select * 
								from ".SCHEMA.".branch as p , ".SCHEMA.".br_manager as c 
								where c.branch_id = p.branch_id
								order by manager_id desc limit 5 offset 0 ";
					
					$objDB->setQuery($Query);
					$rs = $objDB->select(); ?>
					
					<? for($i=0;$i<count($rs);$i++) { ?>
                  <tr>
                    <td><a href="manager_add.php?manager_id=<?=$rs[$i]['manager_id']?>"><? 
								echo $rs[$i]['manager_name'];
							 ?></a></td>
                    <td><? 
								echo $rs[$i]['manager_address'];
							 ?></td>
                    <td> 
							 <span class="label label-danger">
								<? echo $rs[$i]['manager_phone']; ?>
							   </span>
					
					</td>
                  </tr>
				  <? } ?>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="complain_add.php" class="btn btn-sm btn-info btn-flat pull-left">Add Manager</a>
              <a href="new_complain.php" class="btn btn-sm btn-default btn-flat pull-right">View All Manager </a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>						
<? } ?>