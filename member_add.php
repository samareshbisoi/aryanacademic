<? 	include "includes/common_layout.php";

	check_if_login();
	
	ob_start();
 if(isset($_REQUEST['mode']) && $_REQUEST['mode']=="edit")  member_edit();
	
	else if(isset($_REQUEST['mode']) && $_REQUEST['mode']=="add")  member_add();
	
	else disphtml("main();");
	
	ob_end_flush();
	
		function member_add() {
	
			$objDB = new DB();
			
			//$movie_id 		= loadVariable('movie_id',0);
			
			$member_address  = loadVariable('member_address','');
			$member_phone = loadVariable('member_phone','');
			$date_of_joining	    = loadVariable('date_of_joining','');
			$gender 	= loadVariable('gender','');
			$member_name 	= loadVariable('member_name','');
			$mem_plan 	= loadVariable('mem_plan','');
			$manager_id 	= loadVariable('manager_id',0);
			
			$member_email = loadVariable('member_email','');
			$age = loadVariable('age','');
			
			$date_of_joining = date("Y-m-d",strtotime($date_of_joining));
			
			 
			
			if($member_name == "" || $mem_plan == "") {
				$_SESSION[SUCCESS_MSG] = "Please enter Mandatory Fields";
				header("location: member_add.php");
				exit();
			}
			
			
			
				$Query  = " INSERT INTO ".SCHEMA.".member (mem_plan,gender, member_address, date_of_joining,member_name,member_phone,member_email, age ,creation_date,manager_id) VALUES('".$mem_plan."', '".$gender."', '".$member_address."', '".$date_of_joining."', '".$member_name."', '".$member_phone."','".$member_email."','".$age."',current_date ,".$manager_id.")";
			
			//echo $Query;
			$objDB->setQuery($Query);
			$objDB->insert();
			//exit();
			$_SESSION[SUCCESS_MSG] = "Member Added successfully...";
			header("location: member_list.php");
			exit();
	
	}
	
	function member_edit() {
	
	$objDB = new DB();
	
	$member_id 		= loadVariable('member_id','0');
	$member_email  = loadVariable('member_email','');
	$member_address  = loadVariable('member_address','');
	$member_phone = loadVariable('member_phone','');
	$date_of_joining	    = loadVariable('date_of_joining','');
	$gender 	= loadVariable('gender','');
	$age 	= loadVariable('age','');
	$member_name 	= loadVariable('member_name','');
	$mem_plan 	= loadVariable('mem_plan','');
	$manager_id 	= loadVariable('manager_id',0);
	
	$date_of_joining = date("Y-m-d",strtotime($date_of_joining));
	
	if($member_name == "" || $mem_plan == '') {
		$_SESSION[SUCCESS_MSG] = "Please enter Mandatory Fields";
		header("location: member_add.php");
		exit();
	}
	
	 
	
	$Query  = " UPDATE ".SCHEMA.".member SET ";
	
	$Query .= " age		 						= '".$age."',";
	$Query .= " mem_plan						= '".$mem_plan."',";
	$Query .= " manager_id						= ".$manager_id.",";
	$Query .= " gender							= '".$gender."' , ";
	$Query .= " member_address					= '".$member_address."',";
	$Query .= " date_of_joining					= '".$date_of_joining."',";
	$Query .= " member_name						= '".$member_name."',";
	$Query .= " member_phone					= '".$member_phone."',";
	$Query .= " member_email					= '".$member_email."' ";
	/*$Query .= " show_in_front_page			= '".$show_in_front_page."',";
	$Query .= " is_trailor 					= '".$is_trailor."' ";*/
	
	
	$Query .= " where member_id = ".$member_id."";
	
	//echo $Query; 

	$objDB->setQuery($Query);
	$rs = $objDB->update();
	
	$_SESSION[SUCCESS_MSG] = "Member Modified successfully...";
	header("location: member_list.php");
	exit();
	}
	
	function main(){ 
		$objDB = new DB();
		$member_id 		= loadVariable('member_id','0');
		

		
		if($member_id > 0) {
		 // Edit module
		 $PageHeading = "Edit";
		 $SubHeading = "Please fill up the form to modify the member details";
		 $mode = "edit";
		 
		 // Get data from database
		 $Query  = "select m.* 
					from ".SCHEMA.".member as m
					WHERE member_id = ".$member_id."";
		
		 
					
		$objDB->setQuery($Query);
		$rs = $objDB->select();
		
		$rs[0]['date_of_joining'] = date("m/d/Y",strtotime($rs[0]['date_of_joining']));
		//pr($rs);
		
		} else {
		 //Add module
		  $PageHeading = "Add";
		  $SubHeading = "Please fill up the form to upload Member Info";
		  $mode = "add";
		  
			$rs[0]['member_id'] = 0;
			$rs[0]['member_address']  = "";
			$rs[0]['member_phone'] = "";
			$rs[0]['date_of_joining'] = "";
			$rs[0]['gender'] = "";
			$rs[0]['member_name'] = "";
			$rs[0]['mem_plan'] = "";
			$rs[0]['manager_id'] = "";
			$rs[0]['member_email'] = "";
			$rs[0]['age'] = "";
		}
		
?>	
<script type="text/javascript">
function show_ele(id,id2) {
document.getElementById(id).style.display="block";
document.getElementById(id2).style.display="none";
}
</script>	
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small><?=$PageHeading?> Member</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="member_list.php"><i class="fa fa-files-o"></i> Members</a></li>
		 <li class="active"><?=$PageHeading?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	  <form action="member_add.php" enctype="multipart/form-data" method="post" name="frmmovie">
      <div class="row">
       <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$SubHeading?></h3>
            </div>
			<? showMessage() ?>
            <!-- /.box-header -->
            <!-- form start -->
            <!--<form role="form">-->
			<div class="box-body" style="height:530px;">
			<div class="form-group">
						<label for="member_name">Name <span style="color:#FF0000;">*</span></label> 
						 <input type="text" class="form-control" id="member_name" required="" value="<?=$rs[0]['member_name']?>" name="member_name">
						
							
                </div>
				<div class="form-group">
						<label for="b_movie_id">Membership Plan <span style="color:#FF0000;">*</span></label> 
						
						<select name="mem_plan" id="mem_plan" class="form-control" required="">
							<option value="">--Select--</option>
							<option <? if($rs[0]['mem_plan'] == "yearly") echo "selected"; ?> value="yearly">Yearly</option>
							<option <? if($rs[0]['mem_plan'] == "monthly") echo "selected"; ?> value="monthly">Monthly</option>
						</select>
							
                </div>			
              
                <div class="form-group">
                  <label for="photo_title">Address </label>
                  <textarea name="member_address" id="member_address" cols="30" tabindex="4" style="height:80px;" rows="4" class="form-control"><?=$rs[0]['member_address']?></textarea>
                </div>
				<div class="form-group">
                  <label for="photo_title">Contact No. <span style="color:#FF0000;">*</span></label>
                  <input type="text" class="form-control" id="member_phone" required="" value="<?=$rs[0]['member_phone']?>" name="member_phone">
                </div>
				<!--<div class="form-group">
                  <label for="photo_title">Delivery date <span style="color:#FF0000;">*</span></label>
                  <input type="text" class="form-control" required="" value="<?=$rs[0]['date_of_joining']?>" name="date_of_joining">
                </div>-->
				
				
				
              </div>
              <!-- /.box-body -->

              <!--<div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>-->
            <!--</form>-->
          </div>
          <!-- /. box -->
        </div> 
       <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><button type="submit" class="btn btn-primary">Save</button></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--<form role="form">-->
              <div class="box-body" style="height:480px;">
                <div class="form-group">
						<label for="b_movie_id">Manager <span style="color:#FF0000;">*</span></label> 
						<? $QueryM  = "select m.* 
										from ".SCHEMA.".br_manager as m ";
							$objDB->setQuery($QueryM);
							$rsM = $objDB->select(); ?>
						<select name="manager_id" id="manager_id" class="form-control" required="">
						<option value="">--Select Manager--</option>
										<?  for($i=0;$i<count($rsM);$i++) { ?>
												<option <? if($rs[0]['manager_id'] == $rsM[$i]['manager_id']) echo "selected"; ?> value="<?=$rsM[$i]['manager_id']?>"><?=$rsM[$i]['manager_name']?></option>
										<? } ?>		
											</select>
							
                </div>
				<div class="form-group">
						<label for="member_name">Email </label> 
						 <input type="text" class="form-control" id="member_email" value="<?=$rs[0]['member_email']?>" name="member_email">
						
							
                </div>
				<div class="form-group">
						<label for="member_name">Age </label> 
						 <input type="text" class="form-control" id="age" value="<?=$rs[0]['age']?>" name="age">
						
							
                </div>
				<div class="form-group">
                <label>Joining date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" value="<?=$rs[0]['date_of_joining']?>" name="date_of_joining" required="" />
                </div>
                <!-- /.input group -->
              </div>
				<div class="form-group">
						<label for="gender">Gender </label> 
						<select name="gender" id="gender" class="form-control">
						<option value="">--Select--</option>
												<option <? if($rs[0]['gender'] == "male") echo "selected"; ?> value="male">Male</option>
												<option <? if($rs[0]['gender'] == "female") echo "selected"; ?> value="female">Female</option>
											</select>
							
                </div>
					
				<!--<div class="form-group">
					<label>
						Address </label>  <textarea name="address" id="address" cols="30" tabindex="4" style="height:80px;" rows="4" class="form-control"><?=$rs[0]['address']?></textarea>
					
				</div>-->
				
				
                <!--<div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>-->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            <!--</form>-->
          </div>
          <!-- /. box -->
        </div>
      </div>
	   <input type="hidden" id="mode" name="mode" value="<?=$mode?>"> <input type="hidden" autofocus="" value="<?=$rs[0]['member_id']?>" name="member_id"> 
	  </form>
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>	
<? 	}
?>	