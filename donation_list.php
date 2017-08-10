<? 	include "includes/common_layout.php";

	check_if_login();
	
	ob_start();
	
	if(isset($_REQUEST['mode']) && $_REQUEST['mode']=="delete")  payment_delete();
	
	
	else if(isset($_REQUEST['select_delete']) && $_REQUEST['select_delete']=="delete_all")  payment_deleteALL();
	
	else disphtml("main();");
	
	ob_end_flush();
	
	
		function payment_delete() {
		 $objDB = new DB();
	
		$auto_id	 	= loadVariable('auto_id','');
		//$movie_or_serial_type  = loadVariable('movie_or_serial_type','movie');
				
		$Query  = "DELETE FROM ".SCHEMA.".donation WHERE auto_id = ".$auto_id;
		$objDB->setQuery($Query);
		$rs = $objDB->execute();
	
		$_SESSION[SUCCESS_MSG] = "Payment info deleted successfully...";
		header("location: donation_list.php");
		exit();
	}
	
	function payment_deleteALL() {
		 $objDB = new DB();
	
		$v_id_arr	 	= loadVariable('chk','');
		$ids = implode(",",$v_id_arr);
		//$movie_or_serial_type  = loadVariable('movie_or_serial_type','movie');
		// Get data from database
		 
		
		
		$Query  = "DELETE FROM ".SCHEMA.".donation WHERE auto_id IN (".$ids.")";
		$objDB->setQuery($Query);
		$rs = $objDB->execute();
	
		$_SESSION[SUCCESS_MSG] = "Selected payment info deleted successfully...";
		header("location: donation_list.php");
		exit();
	}
	
	function main(){ 
		$objDB = new DB();
	?>
<script type="text/javascript">


function fun_submit() {
 document.frmSearch.submit();
}

function fun_delete(delete_url) {
	if(confirm('Payment info will be deleted.\nAre you sure ? ') === true)
			{
				window.location.href = delete_url;
				return true;
			}
	else {
		return false;
	}		
}

function toggleALL(source) {
	checkboxes = document.getElementsByName('chk[]');
	  for(var i=0, n=checkboxes.length;i<n;i++) {
		checkboxes[i].checked = source.checked;
	  }
}

function fun_deleteALL(val) {
 if(val == "delete_all"){
	if(confirm('All selected payment will be deleted.\nAre you sure ? ') === true)
			{
				document.frmALL.submit() ;
				return true;
			}
	else {
		return false;
	}
  }	
}
</script>
<?php		
		//========= Search Fields =============
$member_name	= strtolower(loadVariable('member_name',''));
$manager_name	= strtolower(loadVariable('manager_name',''));
//$area_name		 	= strtolower(loadVariable('area_name',''));
//$category	 	= loadVariable('category','');

	   //=========== Sort field ============
$sortField 		= loadVariable('sf','auto_id');
$sortType 		= loadVariable('st','DESC');

$dataPerPage 	= loadVariable('dpp',25);

$extraParam = "";

// Search String concatination

	//$where = " where m.area_id = v.area_id  ";

$where = " where d.member_id = m.member_id and m.manager_id = b.manager_id ";
$and = " and ";

if($member_name <> "")
{
	$where .= $and."  (lower(m.member_name) like '%".pg_escape_string($member_name)."%') ";
	$extraParam = "&member_name=".$member_name;
	$and = "AND";
}

/*if($area_name <> "")
{
	$where .= $and."  (lower(p.area_name) like '%".pg_escape_string($area_name)."%') ";
	$extraParam = "&area_name=".$area_name;
	$and = "AND";
}*/

if($manager_name <> "")
{
		$where .= $and."  (lower(b.manager_name) like '%".pg_escape_string($manager_name)."%') ";
		
	$extraParam = "&manager_name=".$manager_name;
		$and = "AND";
}



/*if($genre <> "")
{
	$where .= $and."  (lower(m.movie_genre) like '%".pg_escape_string($genre)."%') ";
	$extraParam = "&genre=".$genre;
	$and = "AND";
}*/

// sorting of the data records

$OrderBY = " ";

if($sortField <> "" && $sortType <> "")
{
	$OrderBY .= " ORDER BY ".$sortField." ".$sortType;
	$extraParam .= "&sf=".$sortField."&st=".$sortType;
} 

// Query

//========================== Total Records Count =============================
//$Query = "select count(v.auto_id) as cnt from ".SCHEMA.".projects as v , ".SCHEMA.".movies as m".$where; //echo $Query; die();


		$Query = "select count(d.auto_id) as cnt from ".SCHEMA.".donation as d , ".SCHEMA.".member as m , ".SCHEMA.".br_manager as b  ".$where; //echo $Query; die();

$objDB->setQuery($Query);
$rsTotal = $objDB->select(); 
$displayTotal=$rsTotal[0]['cnt'];
//$extraParam = "&p=".$p;

$dpp = true;
$totalRecordCount = $rsTotal[0]['cnt'];
$dataPerPage = 10;
$pageSegmentSize = 15;
include_once("utility/pagination.php");

//========================== Limited Records Selected for pagination =============================
			
/*$Query  = "select * 
			from ".SCHEMA.".projects as v , ".SCHEMA.".movies as m
			".$where.$OrderBY.$Limit;*/

		$Query  = "select * 
			from ".SCHEMA.".donation as d , ".SCHEMA.".member as m , ".SCHEMA.".br_manager as b 
			".$where.$OrderBY.$Limit;

$objDB->setQuery($Query);
$rs = $objDB->select();
//print_r($rs);
$pageRecordCount = count($rs);



//========================= Displaying the Records after selction =================================
//$_SESSION[SUCCESS_MSG] = "movie deleted successfully...";
	?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Donations
        <small>List of all donations</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Payment Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
       <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <!--<h3 class="box-title">Movies</h3>-->
				<div>
					
						Sort : 
		     			<!--<a class="<? if($sortField=="contact_name") echo "active"; ?>" href="donation_list.php?sf=contact_name&st=asc">Contact Name</a> |-->
		     			<a class="<? if($sortField=="auto_id" && $sortType == "desc") echo "active"; ?>" href="donation_list.php?sf=auto_id&st=desc">Newest First</a> |
		     			<a class="<? if($sortField=="auto_id" && $sortType == "asc") echo "active"; ?>" href="donation_list.php?sf=auto_id&st=asc">Oldest First</a> 
		     			
		     </div>
			<div class="clearfix"></div>
			<a href="#"><h4>Total Records - <span><?=$totalRecordCount?></span> </h4></a>
			<? showMessage() ?>
			<div class="pull-right">
			<button type="button" onClick="window.location='donation_add.php'" class="btn btn-primary">Add Payment Info</button>
				</div>
				<div class="clearfix"></div>
              <div class="pull-left">
			  <form class="form-inline" action="donation_list.php" method="post"> 
                <div class="has-feedback">
				<!--<strong>Area </strong> <input name="area_name" type="text" class="form-control input-sm" > &nbsp; &nbsp; -->
                  <strong>Member Name </strong> <input name="member_name" type="text" class="form-control input-sm" > &nbsp; &nbsp; 
				  <label for="starcast">Manager Name</label> <input name="manager_name" type="text" class="form-control input-sm" id="manager_name" placeholder="">  &nbsp; &nbsp; &nbsp;
									<button type="submit" class="btn btn-primary">Search</button>
									<button type="button" onClick="window.location='donation_list.php'" class="btn btn-success">Refresh</button>
                 <!-- <span class="glyphicon glyphicon-search form-control-feedback"></span>-->
                </div>
				</form>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
             <!-- <div class="mailbox-controls">-->
                
                
                <!-- /.pull-right -->
              <!--</div>-->
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
					<thead>
					<tr class="thead" style="background:#EEEEEE;">
						<th align="center">No.</th>
						<th align="center">Member Name</th>
						
						<th align="center">Manager</th>
						<th class="center">Contact No.</th>
						<th class="center">Membership Plan</th>
						<th class="center">Payment date</th>
						<th class="center">Amount Paid</th>
						<!--<th class="center">Payment Status</th>-->
						<th class="center" >Actions</th>
					</tr>
                  <tbody>
				<? for($i=0;$i<count($rs);$i++) {
								
				if($i%2 == 0) {
				$class = "tdcls2";
				} else {
				$class = "tdcls";
				}
				
				
				 ?>
					<tr class="<?=$class?>">
						<!--<td style="width: 4%; text-align:center;"><input type="checkbox" value="<?=$rs[$i]['movie_id']?>" name="chk[]" /></td>-->
						<td class="center"><?=($i+$start+1)?></td>
						<td align="left">
							<!--<img src="<?=$backIMG?>" width="100" height="150" alt="photo" /><br>-->
							<?=$rs[$i]['member_name']?><br />
						</td>
						<td >
							<? 
								echo $rs[$i]['manager_name'];
							 ?>
						</td>
						<td >
							<? 
								echo $rs[$i]['member_phone'];
							 ?>
						</td>
						<td >
							<? 
								echo $rs[$i]['mem_plan'];
							 ?>
						</td>
						<td >
							<? 
								echo date("M j,Y",strtotime($rs[$i]['date_of_payment']));
							 ?>
						</td>
						<td >
							<i class="fa fa-inr"></i> &nbsp;<? 
								echo $rs[$i]['amount'];
							 ?>
						</td>
						
						<td align="center">
						    
							<a href="donation_add.php?auto_id=<?=$rs[$i]['auto_id']?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
							<a onclick="return fun_delete('donation_list.php?<?="mode=delete&auto_id=".$rs[$i]['auto_id']?>')" href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
						</td>
					</tr>
				<? } ?>	
					
				</tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              
                
                <div class="box-footer ">
              <? include_once("utility/pagination_display.php");?>
            </div>
                <!-- /.pull-right -->
              
            </div>
          </div>
          <!-- /. box -->
        </div> 
       
      </div>
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>		
						
<? } ?>