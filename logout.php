<? 
include_once("utility/config.php");
include_once("utility/dbclass.php");
include_once("utility/functions.php");

unset($_SESSION[SE_ADMIN_SESSION_VAR]);
unset($_SESSION[SE_ADMIN_SESSION_NAME]);
unset($_SESSION[SUCCESS_MSG]);
unset($_SESSION[ERROR_MSG]);

header("location:index.php");
 ?>