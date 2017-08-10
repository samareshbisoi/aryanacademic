<? 	include "includes/login_layout.php";
	
	ob_start();
	
	main();
	
	ob_end_flush();
	
	function main(){
		if(return_login_status()==1) {
			header("location:admin_dasboard.php");
		} else {
			header("location:login.php");
		}
	}
?>
