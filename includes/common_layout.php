<? session_start();
header('Cache-Control: private');
include_once("utility/config.php");
include_once("utility/dbclass.php");
include_once("utility/functions.php");
include_once("includes/other_functions.php");

$objDB = new DB();

date_default_timezone_set('Asia/Kolkata');

function disphtml($what) {
$page = basename($_SERVER['PHP_SELF']);
$ar = explode(".",$page);
$title = ucwords(str_replace("_"," ",$ar[0]));
$title = str_replace("-"," ",$title);
$GLOBALS['page_name'] = $ar[0];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LIGHT 4 LIFE MISSION  INTRA | Control Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>4LM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>INTRA</b>LIGHT 4 LIFE MISSION </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>-->
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$_SESSION[SE_ADMIN_SESSION_NAME]?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?=$_SESSION[SE_ADMIN_SESSION_NAME]?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!--<li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                
              </li>-->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="change_password.php" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--<li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>-->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION[SE_ADMIN_SESSION_NAME]?></p>
         <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
      </div>
      <!-- search form -->
      <!--<form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
             ÄŒ ph]@&Ö €”^@Bc JÇ_@ÔW 8U`@äá "b@VÍ e_b@nc sÂe@®Ñ çf@²ç "wf@2“ o‘g@‚ž /nh@ÒÒ É.i@,ñ Qßi@fÄ ©3j@fØ tFj@Vê ivj@­ ¡§k@:‘ 52l@ìÄ x[l@tŒ °kl@dj z¡l@DQ ÙÛl@äW Â8n@ì H˜n@Pù Ún@Âç ¬o@( æÌo@Ó &%p@ ´ xŠp@V’ Èñp@r¦ d(q@ìÛ û§q@
Î .r@Ôº öDr@è\ ÏJr@^Y ”qr@n¬ ¡s@>Q ‹…s@ì` GŸs@„ó Êmt@bç Öt@øÌ ZRv@ÜÛ r†v@t˜ ’†v@"‰ ³w@L (Aw@bò (Aw@¾³ pw@R³ §ˆw@ÌW ‘¡w@´² Âvx@&„ $¥x@ÒW ¯y@–Œ æy@¬Í üy@ŠÂ ­>|@ºƒ “|@R ª=}@þ³ u~@h ‚/~@6¦ «G~@ÈY <˜~@„ µ‰@rÄ ý@2´ I=€@\ ±Ð€@žX <O@>v l@jÝ ÐŠ@¬¡ â¼@z¦ ê‚@\l 'ò‚@Lž ““ƒ@ê\ ÄÆƒ@Fd *ýƒ@„¶ ñH„@ÀÓ `´…@ˆÝ Éã…@V’ D`†@Ðï úR‡@ IWˆ@Æð Ùˆ@Øß ëãˆ@z‰ }æ‰@Š Š@Êh r-‹@.Å "2‹@^l %ð‹@Î© I%Œ@&‘ 2Œ@æ† 3yŒ@Üp =@âŸ _•@èÛ °@ÜR Ô„@Œé ´‚‘@b ýÏ‘@à[ ý‘@v‹ ´n’@0W œä’@JÛ ¯“@Jˆ ’“@ÔW Öû“@x’ C(”@ÒW qv”@€Ð 7Ï•@L÷ 7Ï•@Ö fê•@ªX ·ë•@îW Cs–@Zl )¸–@¸W Š—@”x ….—@ºç é~˜@ÄX òâ˜@ô¡ ½Èš@¶Ø ­K›@¸â ^k›@dÓ …‘›@b„ Ç™œ@’ û
@Q ©ÅŸ@nê ´ @vÜ D @B¿ Ç @~Õ 0— @”Å 3˜ @6ð £  @ð G® @îì ÄB¢@Hç À²¢@xä ƒë¢@’ ô¢@
Þ }m£@À¦ ª£@Ê[ ÑZ¥@˜W r¦@2b  ˆ¦@¦Ü (ª¦@ÚY Êî¦@
h ÿÎ©@ôô õÃª@˜h â«@v³ ,Á¬@ž§ uc­@ðW âÃ­@ °ß­@ê\ _=®@LÀ Ä[®@LÜ vF¯@†ã –p°@Àz Þ•°@¡ /U±@äÝ g²@€¿ }²@*Þ `«²@Ä ô¤³@ž dö³@ÖW #}´@&‘ |5µ@Ø &®¶@Ü­ ”·@¼o 3·@ÚÚ L·@ºW ô ¸@jÑ /«¹@^³ ÿ¸¹@¸‹ üÐº@Y Íã»@í C¼@¬X ¡Å¼@Šß 6‰½@Àa Ã¨½@Bd Ýv¾@‚½ ¤À@àz ÇÌÀ@ñ òMÁ@BÝ EOÁ@–ö ÇÁ@Ø– “ÌÁ@ní ÿÂ@× ™Â@ˆW áÃ@ØW £<Ä@ö\ RýÄ@FÈ cÅ@äŸ VÁÅ@¤l œüÅ@°U £%Æ@¸³ ¶¾Æ@º þÌÆ@Àn (Ç@ºê ¶tÈ@Œ“ J6É@öÞ [ŒÉ@r ê£É@bð ÌÉ@Ê¾ ûÊ@Þ« ½îÊ@”Å œ=Ë@¶W §^Ë@ÆO £Ë@˜‰ Œ«Ë@’ ÀØË@p‡ VGÌ@¤l Œ¼Ì@ÐW fÜÌ@ôÒ .;Í@â¶ 5‘Í@ÐÑ .Ï@Tl üøÏ@nÄ jbÒ@6¦ ã­Ò@€” áRÓ@ž– `ûÓ@€ò `ûÓ@~~ ¹YÔ@Xc À˜Ô@ ø ;öÖ@R Ê×@
È —Ø@¶º \¢Ø@o Š5Ù@| vCÙ@zÄ K¨Ù@ÈŒ ¤±Ù@®Ð ÔÚ@Ò± €Ú@Ää €Ú@ÂW JÛ@’ råÛ@T« Š=Ü@,« ÙÞ@®X £†ß@ ¦ I¸à@4Ç yá@œX d â@Å <¥â@°Í ð%ã@â gSã@$š &¥ã@:a ¥²ä@6¢ j“å@,¬ ýÍå@¢‰ ×å@„Þ Çüå@æ\ ¢Næ@@¦ ÒÉæ@Pc 9Üæ@>Q ˜ëæ@¦è ºÜç@"f È'è@úP a÷è@`ô ²yé@ö] 'ªé@¦ñ 'ªé@FQ ˆÐé@Ò¡ Sê@2ˆ Œ¸ë@¨È §Sì@:ð ^¼ì@ªó {Ôì@ÒÜ dí@ÂW ™%î@\õ ,î@ªÓ Häî@4ö 7°ð@ö x±ð@ž{  Öð@˜h $Øð@®Ý Æñ@ÌÞ Œò@4Q Øò@^l "	ô@b Ö§ô@6Q ¿Áô@è½ Šõ@§ ^Hõ@ž ÉOõ@XR Aæõ@øÛ ?Ÿö@šµ +÷@b Û;÷@^Y Âp÷@’‰ Ž’÷@†£ Õ¨÷@¬X ÎÁ÷@Zl &ø@¼š 
pø@”Î 5–ø@ê\ ×Êø@B… ¡\ù@®X Ã´ù@(¬ ¦Ÿú@˜W žíú@¦¬ ‹²û@bÓ iFý@ i ¶Hý@`_ Æ€þ@ÀV Üèþ@²Þ í¸ÿ@ñ H A&W Mš AÊh õÓ AäW ¿Aô  Ú"A’Ê Ý;AäW 4JA^» Æ AÖq abA<ð ëqA,’ ©ARË HbA
‹ Q~Aß ¹AHß –A<ð xwAx’ ­õAŒ ¨ÏAD‰ QAÀ¡ œAÑ ‰öApŒ ­-	Aš¯ O	A4f ›u	Að— ·	A´Ÿ …¡	A°a ëè	AÅ <H
AòÇ Ž\
Aü[ ^AH© ñ•AÊŒ ù©AºÜ âAœß <cAê ƒ}Aè‹ PäA:ð KÇAÜ üAŽß ``Aá uvA2b ‰‹A‹ ñ¥AÚø Aj *A~_ u+Ax û&A´l z;Aì ¢VAbç UmA"ê èíAXð PAÂh ÖµAb ÿÈAàÖ ïAÖW â”A¨‚ ~ÀAºW øÝA c sVAÒ’ ´dAb I'AÐî ,=AØó ¢SAJr ·“A \ °òAlÜ TSAÐ ÊvA„| ™EA.ò ™EA’W h”AÒW AÈŒ í˜ A0Î O¦ AÀö ”!A$È ñf!A6W 3}!Aè  f"Aä† ìr"A°_ 3©"ANÀ (Ä#A.b f?$A˜X Þ%A°Ò =K&A„Ÿ §e&Aôå §e&AšÔ Xµ&AR² ¸Í&A0ñ —	'AÐé å$'Aìå *'A(‰ § 'Atc ö(Ax© Œð(A°© øv)A’W 	ª)A0… ì)A\Q ôW*AŽ¾ @b*A<ð ^+Aü\ ô¯+AW !¾+Ab º-A:‘ #0-A0y ‚Æ-AªX ›.A(â Zœ.AªX ­/AJË Þ©/AFc S	1AàÚ I1A~° Lb1AÈŒ d«1AœÍ _2APÚ ¢o2AY ’Å2A~Ä ¦Ü2A¦ —“3A2W š4Aè\ „-4ARß ÅX4A˜h M¹4AFc ´¼4Aj^ eP5Axø X6AZ Î7A®¯ Y´8A0’ 'Ë9APY hë9Abl R$:AÖ y”:AÌë  :AÔš šµ:Aºº Y#;Aë Y#;A°X iÉ;Ap³ \;<AÆW ˜O=A
À  ¬=A0ç  ¬=AÒˆ Hd>AÜÞ S0?AÞ¹ 4h?A®˜ ª^@Aß ©MAAœW ©BAˆÊ ñBA¢W =¹BAZl ,‘CAÆW mùCA2½ QEAè® #sEAŠ¬ $ºEADd UFAè© ×‘FA®Þ pÿFAÎ ¿oGAë î¿HAºW øIA0ˆ :IAæÄ ªÊIA ƒEJAü— êgJA¢W ÛJAvá Ê6LA¾W 2BMA°X ¿TMATY ºOAæ  ÝPA¸Ð  PAˆR qXPAÂY µ®PA˜À xÛPAŽW 4ôPAÌŒ QQAr« [QAœX ˆ1QA(¨ BiQA>ö ËARAFø ÏSAþ` ÐèSA4Q —…TA€_ s-UA
Ù Î@UAì‘ ñ¡UA”Š ¢¶UAÂà ŸÑVA6è ŸÑVAºê nÒVA|Ü O8WA  ¬WAÎ£ 1¿WA
h ñþWAŒ´ ’ZXA°Ü MaXA¶Ž ]XAÜè îóXAB¹ Ñ@YAœW òˆYAB® ÒmZAêæ y³ZAÈè ÃZAœX ËA[A¦Ç ¢_[A4Ç Rp[Añ ÄÅ[AJY ÄÝ[A8ð \Aüä ‰É\A:‰ “Ô\AàÀ ó]AÔì ó]Aà‡ ²^AÐW ‘^A,Q t_AN‘ ‹_ADÛ Î_AºT ÷
`Aèª Û-`A0W äý`AÊ† ºaAÊ ZìaA>Ž ‹ÁbAäÜ ¨WcA,Þ IOdAV’ ¬ eARŒ "<eAÊ’ ÒfAê\ i/gA¤l [agAV ?hAÔ ÅÙhA è ©æhAŒõ ëZiAöÍ !¨iA€è ©jA<d Ó=jAþÒ n`jAò vkAœX •ÃkA*z hlAZl ðÖlAöŽ "`mAê– HjnAª ÂnAv· ”oA¨‰ zªoAŽ¦ ÍpA^l ¼qA°É L~qA|a üæqAÔ¨ J7rAf™ žjrA$¨ ¶¤rAî[ ÅsAôé (¬sAÌW ŒÑvAšX ¢JwAvÌ ‘ÍwAšX ÕxA@ð ³PxA i ˜_xA†‡ +ÞxArÊ “àxA4m °yA:ð ),yA`Ê ,;yA¶h /wyADÐ <¤zA@ð Ä}{A~ø ËÂ{AZð P|A´Œ %Z|A„ì ¸l|Azô ¸l|AÀÓ 
}AŒ¸ yO}AVÑ ¹ë}AØW àï}A¶® à€A0’ ZAt„ üAAFc íJA.µ ì A˜‰ cùAúè M‚Añ ,™‚A(| ¸œ‚Aº¨ 'ƒA\l ÕêƒAZl Wg„AÎŒ O‡„A<ð ,ý„Aè\ »…AÄl 9†A†~ ãA†A¨Ä z†A4r -§†Az® ×†AÆW ù0‰AÀê ˜ŠAèÇ ZØŠAâ´ ÕÌ‹Apé ŸŒAðW ¼HŒAÂ I¤ŒAnÞ ¸¯ŒAf ·zŽAú‘ UüŽAf£ ÍAÔÚ ¬PA<Ì ï_AÇ sbA†~ §¾Aæ\ >ÛAf ø7‘Ar‰ Ëì‘A*Þ ì“A.‰ ¢“ANY ™“AVñ ÍÂ“A<Œ ÕÖ“A¯ àv”A2“ ­–”AT© ÀD•AÄ [¨•A²l ÆÞ•AÈW þè–AH¥ ç˜˜Aæç ç˜˜A¨„ ©šAnS ïÆšAè\ ×_›AW ×Ü›AV… ùHœAã ¾WŸA¶b ]cŸAÒu ãŸAÒu èŸAÔW Þê AÄŒ j‘¢AäÙ Ùâ¢AÈŒ #û¢ARç ®£A ÷ ÿ~£AH_ s¤A¤f cÌ¤Aú‘ 
¥A–€ NR§A6ç ö§A2s ¼–¨AÎW ‚ë¨Ax’ ~žªA8ß x±ªA`ß ÿªA¬ ¯«Ag «A@ð +H«A†~ üÂ«A0’ pÛ«AFÌ ­_­AÐ 5Š°Aú‡ '±A¶¦ ‹±AÎõ ±À±AâÙ Ù²Aš– !W²A0ž ZŒ²AÔÁ ƒ#³AÞã ƒ#³AÀW ¹Æ³A ´ |7´A¬X p[´AîP 5ž´AÀÓ ±üµAŠW j’¶A.µ ~8·A\ àÈ·AšŒ ã¸A>X 4i¸A¨T ¹¹AÑ OŠ¹AnŒ P¸¹Aì\ ˆ+»AÅ ’t»AÊh €£»AR¦ Ã»AÒW ý¼Ašõ ë6½A€ }ˆ½Aª¥ mŠ½A ö ¼„¾AÎW C	¿A&‘ ‘j¿AÊ_ ¾Ë¿A¸Ü æmÂA${ EÿÃAÚÛ ýÄAP\ ›ÅAøÆ JÅAÌW é ÅAÐô ›ÆA6Q //ÇAf YÏÇA¶W gÈAîW â¿ÈAœï ÏgÉA© ƒÔÉA W ù3ËA”­  `ËARY –ÛËAØÍ ­ÌAàÈ ©°ÌA.¤ Ø‹ÍA‚ï õÝÍAØä Ÿ+ÎAºÈ ðÏAÈñ j±ÏAx Þ‹ÐAªŠ ¯ÑÑA:‘ ³ÒA>ø ÓA° 7?ÓAl‰ keÔAè\ >GÕAJª »ÕA’W Í`ÖA úáÖA^l c"×AÞ œ5×A,Î ®Õ×AžX A(ØARÙ º\ØA8 RFÙA‚¦ ²ÚA@— Ë–ÛA,ë 0:ÜAÂÍ NÜAD’ ^ÂÝA¸ë ÞAÀW [#ßAæì ZßAF¾ K_àADd KŽàAÈµ ”àA:ð ·áA0Ü tŠáAîW ÓPâAªX LYâA"Â FÎâA(ù „9ãA|Ð ËzãAÀé ÂŒãAÄ 4¬ãA’f ÀžäA­ åŸäAÒu AåAÐ ÃJåAJ‹ uåAÖé ãÌåAÊ’ /æA" k5æA"W ×læA˜ß ¾üæA¸Þ S0çAÂÍ è‹èAXc _›èAÈÓ ãïèA ŠéA^l ÊºéAîì yþéA€Œ µ•ëA:å  áëAÛ Š˜ìAÛ ‰æìAÆW ÆÿìAFô ë>íAÔ’ CîíAF½ µ^îA ¿ ©]ðAÞÑ `nðA
ù ¼vðA–X XñAÈ´ ;lñAšX *ŠñAô\ 8óA­ TóA”Q ù¨óA,¢ ûtõA&c v\öAÖÍ ‰R÷AÌŒ jh÷Ap® ÞŸ÷A„„ ×à÷AÄ” Üò÷Aú «TøApZ >ÖùAˆÄ PJúA†’ €YúA o ˜|úA:Q Ö úAð„ …KûA>ò …KûAÈŒ ayûAX£ v‘ûAÄ† ÇÌûA~ MñûA¢Ý ¥üA¢W "üANç ç´ýAlç ªµýA h DæýAlž _ûýAÐ ÿA|ê ŽaÿAò\ †Ð BÎ© !ú BŠ¾ œÅBðW C
Bà[ +¡BîÃ *°B‚Ô ‘ðB¾W 1IBî\ «àBÊ Ã\B¡ \ÍBXc ÔBÖW ›2B ä IsB¦¾ “BN— #ŸB ™’
B”‚ §0BÒu  —B|¬ ÛBj£ ZñBÀ´ ›¥BªX x5B†ø Ø¾B¤l ‚ëBh ¢þBª lBñ øB
W ›B¾¡ ¦dBŽ” ò¥Bvò ò¥Btð "!BÖ Ó;B¾Œ ÇBê\ ‘Bb sýB2Ó ¤rB–i òåB0’ ™^BØW ÀB–å ¤úB˜ß *€BÒW óŸB^l ï¼Bž HvBšé æ„BÖÒ Ô«BÜŒ vBÖ ê‚B
h y†B œ Y˜BÙ êÈBŒà êÈB8Ö BõBÒõ BõBT³ ~5Bè© ,êBß ¼ÆB*Ý ‡ª!BN‹ ¯!B€ ¶"BÄd ¢~$B¶¦ Ñ%B˜W ½1%B†S ØL%B<¢ |D&BîÃ ½y&B› eÎ&BŽ‰ å&B¢W ;'BRl .P(Bú‘ ®f(BØÈ Œ(BÊ• µË(BTð ÕÉ)Büé Ñ¢*Bšç y+Bàç ¿+BÖW eö+B¶W 3},B° Œ-BšÂ ².BV’ ¤'/B@ï UU/B<ð ë|/Bº ]&0BÞ] DÖ0B–i }2BÖÞ 2B¬Ì 1¥2B:ø OÃ3BÈŒ â(4B’W ¬/4B´Š vW4BDQ §|4Bní é|4BÂŒ F¸4BÜï Jÿ4B¨Â g 5BZl f05BzÄ @|6B<‹ —6B¼W  U8Bæ† ˜9B„” °Å9BÎ© ,L:B.‰ 4;B–‰ vG;B˜X â;BÚ½ Qï;Bà[ ©6<BZÜ Br<B é D”<BTÓ ™û<B~Ç §À=Bvæ ÎÏ>BPY [A?BÒW N?BDÉ ®Ì?Bê ®Ì?B´_ ôÔ?B°X Îï?B:¯ ]¸@Bf K÷@Bhî Èü@B¾W ¦ËAB Ö ÐBB‚ž CBBìŒ áªBB–i i&DB¤l 'DBhœ ®EBô\ ípEBz OÞEB<¦ ÙXFBÂ­ œ~FBæ† z„FBvð -†FBÔW g†FBÞÄ c$GB`l k)IBÆW ‹ùJB] >@NB˜ß iQNB&c µRNB²ç IZNBè L…NB l è$OBÐW ®&OB^s ÌiPB:ˆ QBÄT Ô/RBòï ‡ZRBÍ vaTBÎW Æ­TBxä ö)VBìÓ `’VBØ CšWB¢W ´XBV’ tÜXB
h ­tYBg $ŠYBžW À+ZBF³ ¸nZBüæ ÌÀZB¨[ ½[[BVÎ  H\B8ñ èZ\B:‘ À\BòÇ TY^BŽW p^B˜‹ |ý_B¸Œ £C`BNÊ ZÃ`BÐ ›aBê\ ƒöaBT¦ ®bB:· ‡fcBÐW Ó
dBhÄ QdB’  	]dBR J§dB"ñ LÝdB<ð 
eB,Õ X¢eB:© |ºeBú‘  EfBòÊ àÙfB6í ‡gB°“ Ê†hB6õ œâhB Ù uiB… RIjB^Y T¬jB ¥ËjBÔ ¸kBö\ .akBy ´oB2‰ Ø7oB"á ç­oBÐ K‚pBY °»qB¤l Þ½qBîì ÏqBÀÃ ¯áqB0… ÞùqBæì õÌrBpö =«sB ø ÷²sB(Š ártBÂh / uBtW  XvB6¦ a°vB\Q  ôvB^c uwBê %wB*ò ¿…wBg h¶xBf ”÷yBê\ %^zBzÝ ü‚zBFã vˆzBÊW x¶zB@ð øÅzB<W êëzBöy 3|BxÝ ‘m|Bøy - }B²‚ Z4}BÞ’ XH}Bt¦ ¯÷}BÆ« pZ~BÒW H÷~BÜ¨ º‘€B„¶ ê–€BV©  B.| âBx‹ YøBì¾ ÖýBQ c‚BdŒ a!‚Bx¦ Ü·ƒB¤± eúƒBf šn„Bî© °¸„B© ^³…BÌÍ •†BÊŒ ¬X†BŽÈ hx†B\l mæ†B_ .C‡B@d ÚD‰Bx’ p‰Bú‘ _"ŠB$ nŠBÒW øJ‹Bîì ß¢‹B†~ UŒB|Ä ®ŒBjµ  BØW ,¥BÖ{ °\Bñ ‘B’ 5’Bô¾ b‹’BvØ “’”B&‘ ~ò”BˆÒ qó”Bbl f•B2–  o•BÀW ju•B”Ñ {•Bn® ËA–B†’ vø˜BÊ– ¼t™Bžn ™™BBd $É™B¸Í »ï™BšX ¢šBR— W÷šBJi #‡›Bà» "Ó›BöŠ S,œBHê kœBž ÃuœBæ† ä}œBÀW *ÆœBšX ®Bˆé ª-BØÞ 7ûBH³  žB¤Ý ÞDžBêx AKŸBò\ \£ŸBQ * B_ ì& BÐ‰ J:¡BË ˆ¡B,ë &¥B\ šv¥Bó è¥BºW Cô¥B4c Òk¦B— ä¦Bú` ‰Ý§BDÞ ý$¨BXQ ´¼¨B"Ý ²ä¨B¤ž èªBXc yÇªB>X ó«B’ !N«B¬Ê =î«BvÓ û&­B>‹ ‘€®BŽ ¶½®Bø Ñæ®B†É ±7¯Bè\ *é¯Bª» \°°BÆñ F±Bh¨ ”‹±BPQ ·ë±B\j 7²B¢¾ ¯²BLæ 	³B’W ôd³BÐn ¹µBòm ^@µBÊW á4·BjÊ ©	¸BúÄ ¯L¸B¶o q¾¸BŠW 7kºBØ HpºB„Ø ºBJ´ Î»Bøæ ±4»B
º ¥w»BPQ €¼BÐW ©¿Bú† P¿B–Ï ±EÀBñ &¢ÀBPç ·9ÁBd² 4vÁBÌˆ »wÁBìP á@ÂBÊŸ \ÄB~Ä €.ÄBÐu \ÄB´V 0ªÄBú‘ àÄBž 8UÅB`V ´ÅB|Ä èÅBv_ Ù/ÆB<d ¶|ÇBNÊ )•ÇB:¿ Z©ÇBê\ ¹ÇBèp d'ÉBÊ APÉBY tÊBœX 5PÊBlø ½eÊBæ\ ñ“ÊB"Â ‘«ÊB@d zÌBˆ[ s|ÌB–i lûÌBR ‹ÍBªX céÍB(b ÎB<ƒ 5ÎBò\ ÖÏBò\ ÞÐB@Ë Í¬ÐB¾W (VÒBBð <ÔBbl 3BÔBši ºsÔB@¦ ÌÕBbÔ s_ÕB¸³ xÖBé ü„ÖB:Q ¡æÖB<œ êX×Bú\ »×Bz¦ E¾×BžX ÎØBTc újØB’W RáØBµ oÚBJù /qÚBÊÌ +èÚBtc -‰ÜBæ\ €$ÝBh¾ ¹'ÞB~ž Õ:ßBß ‰'àB$ç ùàBz¦ fœáB‚¿ ¾yâB@ð •øâB2c æ.ãBVê rLãB ñ HïãBú° ™6äBø† Q³äBœW Ó3åB"b ·>åBêÛ N¬æBþÓ XtçB¤’ CTèBZo žžèBªâ RéBn« »'éBní O-éBžW ÅÖéBDŠ '	êB”Â >3êBÈ +ÜêBÎÞ ¶"íBÂh W_íBÐŠ éãíB¸Ü VÚîBfn Q´ïBF .SðB2b »vðBŽã ³—òBa ™¼òBê\ šÀòBz¦ óòBff n¬óBŠW ý|ôB¿ «õB4 pföBŽ dÔöBf ÊßöB´^ x‚÷B  •—øBf oùB²‰ ùBDä š"ùB0ƒ ø+úBb‰ >/úB–Œ ÛyúB€ã ûBŽW KµüB:» ÀìüB,b òrýBZl ¢‘ýB ­ :“ýBRY S¬ýBø ÓþB²Ì ›MÿBŽn $QÿBÖW ©Š CÄ èº CîÃ …‰C8c n£CÊh ˆúC@ð ‚ˆCÄ¦ Ç»CJa æíCÊŒ bCÆÚ E’CŽW HÑCjÄ #¢Cò\ ºìC® ¹*	CŠ 14
CÎî PA
C¶Ì ²¡
CHÑ rÅ
C|Å ZtCjà S˜C Þ ¼½C¹ _ÉCbY ráCÒu Ì3C˜W ?C¬^ ý@C È ìzCRí ìzC.Ô Æ¿CÖó Æ¿CæÜ TWCò† _ÉCh¨ ÙÿCöæ %=CØ¾ táCÒÂ {äC> êžC ´CVé pÃCŠR Ÿ‡CŒ‹ œCR Ä²C8ð æC^å ‹–C Ü •¯Cæ  ,Cìí  ,Cšé ,WC`Ð Ú{CÌŒ ÂCLu æCPc ÌµCÌŒ @C^Y ‡6C¢W †XC’ „C¾¡ àÁCz¼ ùgCæÔ )dC¦ô ˆ! CDQ ¯ C2“ =v!C8ß ú}!C$ç ¯•!CÒ‹ Q©!Cæ\ ð"CVc ["CÆø ›"CœÞ dï"CÄ¾ ÷#C&W û+#CÂh ÏT#CnÄ 6ß#CfÄ ©[$C–i b%Cz rh%C6Ý ò¿%CN¨ ¯n&CT ãs&CØ¯ ½é&CœX m‹'C>÷ {F(C¬Ý N(C¶¦ õœ(C^l BU)CÒu Ñ¸)C lñ)C„V 3Í*CžX Uå*CtÕ Ë¾+C¼€ Ò
,CšÎ `è,C°h kö,C„ö ´-CQ ÒP-C2× H.C¶¨ Þ³/ChÄ On1CÄø "3CÑ R24C
x šZ4C ] ¢5C~’ ÖA7Câ  4÷7CTð Œü7C¤È s8CÆµ ÊP8C\ã 0Š8C|› Å¼8CÄµ Â8CŠì Îa9C ‘ Òˆ9CžX Ï9Câ° ‡Ã:CŽÄ ðõ:C\n <M;CÆð ?&=C¤l ô9=CæÏ 1=CÔ¨ íÈ=CbÝ Ãí>CÎÒ ^ý>CìÄ G_?C¤Œ ´"@C–ð cj@Cè\ `v@Cðó µ@CÀ[ Ýè@Cæ\ LÈAC6Œ óDCjÑ R{DCNÒ ‡DC"b ÉDC†~ ¾°ECvð Ú	FC¥ ±pFCˆž QFCîì ¸‰FCJi !¤FC Å –×FCtg #@GC¨ß ”¡GCT— Ö=IC¬» ëIC¬_ ÷JC_ ‰JC6Q ý1KCÌë “4LCàm Ä0MCB… å‹MCÆ† ŒÿNCþì [OC4— ‰‡PCˆÄ ]PCŽW xÄPCÄç ½‘QCŒ æ´SC í ¨ÅSCîW |TCT Û–TCJY åÎTC~Ä hUCè` |WVC|Ô òÄVCžŠ #XCªX Å,YC"Ý vTYCÆÒ @ŠYCXX 8ZChÞ Ý<ZC2b PõZC<y å¬\C¬S »p]C¨Ü ‘ß^CøÆ Éú^CŒé ]´_CðÒ éÑ_C ‡ ÅW`Cò\ zŸ`CÜ Š|bCP… "ÏbCÀp XÖeC@ð BEfCþP JfC€Ý fCô` ~„fCÞZ #•fC2W ñ—fCf ÜÅfCH‰ @ñfC:ð ]9gCþ\ üFgCà¬ ê’gCÊh =¡gC\¹ "ÐgCŽò °ÛgCœW ‘ögCfŒ DYhC¾ç ¡hC$Ò ÉìhCÈŒ HiC¬X (qiC`p ÁuiCÌz —©iCtð ÙiCnc ÷‘kCHç ØlCT ¹ lC®h ê¦lCÅ p\mC€è wmCl^ ênCìP :3nC&Ú Ç5pCêô ¥XpC`Ù >ÇpCèÒ äpCVY â.qC´} ø±qC¨ì ™µqCNí ~rCüæ ¸IsCž `ŒtC–i –ZuCLƒ ¬ÅuCÍ zÙvC¶ åiwCÖ… _°wC´o ¤ÔwCT¦ hêwC Q SAxCÒ’ ¾FxCHá - zCÔ‹  yzCpÂ ÷ºzCÞ ª½{CDê ˆˆ|C¼ În}CZÌ Z<~Cô½ ËU~CDp :X~C‹ E¥~Cœ´ å÷~CTY Ý‰C¸° RöC°X o€C
{ ‡r€CTð Éï€Có RC„¦ w=Cð úDCô[ rRC®X ekC"f +sC´³ ê¥CRÛ ).ƒCF£ ÚMƒCFd È·ƒCxe Û5„Cš– f;…C<á J…CøÆ Èx…CÖÍ ²•…CÖö 8†Cê\ $G†C é òI‡Cä† ¼è‡Cx« É'ˆCFß ¨¨ˆCä» ªj‰CÖè ªj‰C0o ¸Á‰Câ Bè‰C*° VŠCÊh KBŠCÀV [¾ŠCÎ ŒCD³  YŒCúé ÓoŒCè† opCúÀ Ã2ŽCÊh ‚ŽC,b ‘èC–Í ÕöCžX U‘CBd ‡Ý‘Cè À[’C4f id’Cç Ê¾’C*b "N“Cxé Ùp“Càë Ž
”CÚ` @€”C°¬ ·s•C´¦ )U–CÄŒ ‡q–CR “–CŒÈ X,—CNò b<—C"à Aj—C¨­ -˜C¾R :j˜C"e 1™C†Ë – ™C^l YšC t­šC» [›C¶W q·›Cà[ (‹œCæ\ €ÅC|Ä üŽžC4z ôÍžCj^ l‰ C¢Š Ã¡Ctð Qy¢Cj¾ câ¤CÌ± –ï¤C¶` D¥CÜô ŒÊ¥C2Í [Ó¥C<Ò ¦C>Þ cU¦C„½ ¥{¦CFc ZÛ§CÀØ ¨C c .²¨CÖ¾ •tªC2õ }—ªCÔà –«CŒ »«C@ð #õ«C|Ê ·ú«C˜í jÿ«CÚï ‰–¬C2b uA­C¬X ­­CšX ï­Cˆï œ®CZÛ °(®C8Ú ·ë®CRY .þ®Cõ ­¯CD­ ¯CÔW è'¯C’ê ñ°CR Æx±CVÍ »±C\ ð±CŒí Ö²CÊÍ - ³Cô· j³Cf® ´C®Ü ¾>´CF© ‹«´CšX ¼¬´Còé çÒ´CPY HÔµCÂW ŒÜµC$² Ö¶C’Â ¥D¶C"b ¬¶Cîk <·¶C´Š ·Ù¶CºW ·C¬Æ Ä0·Cøç Ä0·C› ¹B·C0® jL¸CÐï Ýº¸C°_ mUºCÄŒ {»C–i 8(»CÔW æ—»Cï â'¼CÔ÷ ³u¼C>n W‚¼C–Ö ö¡¼Cº‰ {ä¼C<³ À½C’÷ &ª½Ctð Í¾Cb b¾CÖÓ 4@¾C:‘ ‰N¾Cî‹ @P¾C^Ý Óz¾C0Š %Ç¾C,± <¿C\° Bt¿C¤l ÿü¿C„ LEÀCx’ ÔéÀCÊW ¯²ÁC\ê èÃC°â `ÃC*ë ¶mÃCªX ðÃC:ð ~cÄC l ÕÄCXø D¬ÄC² ÉàÄC8_ ~‰ÅCTß DŒÅCtð Ý–ÅCŠ ™ºÅCÞ’ `ÆC2b bÙÆCà[ v;ÇCß RøÈC¦Ì 6ÉCºW _“ÊCœç ðæÊCd ÐëËC¤l ‡ÿÌCú˜ yÍCŠÐ »xÍCrÄ rÎCø "=ÎC˜W ã<ÏCŠ ŠõÏCfè “_ÐCnÄ ‰]ÑCºW 1sÑCÌµ W6ÓCîm êÓCøÆ ÉˆÓC‚Õ ãÆÓCÅ WÓÓCH‹ Ë¯ÔCtÍ UÖC>õ [×C ² ¼]×C*“ ËÙCnÓ SXÚC–X ÛxÚCÔo :ÛCtÀ :]ÛCr‹ ÏêÛCŒ ÕÜCöï ³šÝCî¾ 9ñÞCtè ‹+ßC
Y ßCÈŒ ó³ßCõ 1UáC^l EŸáCNc CâCîW ÄkâCÖî CÏâCÌö CÏâCÌŒ ÌcãCÐ ŸäCFd Ú˜äCô\  ¹äCŸ 7ôäC_ EÒåCÀñ EÒåC<Ñ ùåæCþP àçC¤` O)çCÔó wvçC^Ï þïçC`¯ …ñçC‘ JèCè ¿èCà© @)èCŽW FèC¦v RQèCöy žãèC€Ñ @ZéCÖW d éC6ä ƒüéCšP ÖêC8X %ãêC(¹ ÔFëC&c OëCRÎ RYëCŽ þoëC\l —wëCØè !{ëCÔW ›™ìCvð îžìCW \ÝìC0² 1íC¢Å 6\íCäW ‰ìíCð\ ÉüíCªÛ ß¦îC:Ò lïCÚ‹ mðCÆï  íðCúŠ þ#òCú‘ óC¶Ó ”ÎóCò‘ ¥"ôC¤± B‡ôCˆã sOõCÌÃ Ñ öC†Ù ~ÿöCÀW ¼÷C,b  Ö÷C¬¿ :WøC:Ë ŠcøC&W EÆøCÔ¿ -~ûCÌW “ÏûCÆ’ ô
üCpY #€ýCÚ 
þC¸Ì ¯ƒþCí È˜ÿCòn TÈÿCšç E" DžX u– DÌç ƒ#DªX ’DDDŠ ¨°D6‰ šÇDæ† +Dà[ ÁÀDÖ{ ñàDè —DªX ÛD6Q V¢DnŒ ¬^Dz¦ 1D€Ó ›‰DrÑ ÓúDàO sùDhñ sùD’X ç™D|¹ sœDvð ƒÁDˆW ÂDrÄ iDXÞ µ+	D°_ À,
DäW Ï
DFˆ õ&Dô[ yaD|Ä iDÂW ÓLD(ß sD… î!D”¦ vVD6ñ f^Dø ;¢D6´ 8D¦ §5DB òvD”Ø gëD*f JDZl 7¤Dð D¾Œ 3UD
` h^DÄï ZD® ¨ßD–³ ~ Dtñ £5D\å ÆSDÈµ Ï]D:ð ç—D] H¤D@ð iD¢X GDàï E
DXó f&Dœ¾ ¯kD<ð ñDÌW ULDþ€ :‘D6· 
lDzf {åD&] xƒD8} œñD¦á C&D®Ï ÖŠD2× -¥Dñ ÒmD–X ­ D&‘ ¹h D^Y þŽ Dšh ûœ!DÖ VŸ"Dx¦ ž½"Dò‹ |?#D†~ Ì #DœX v$D› D°%DØë D°%D¨Ú Ý!&D"f vé&DÌW Ž«'DÄŒ ,Õ'D®Ã áî'D¢Ü ¥)D˜W ‘%*Dˆf <Ø*D2µ Æœ+D^l Ç+DÒW }î+D¢W tˆ,D˜Q õÊ,D¤ ƒo-DšX ¥-.DîW þž.D8ç H /Dþø ”N0DJ† H1DF Çƒ1Dè\ Pª2Dîj “Â2DÊ† V 4D’W Å4DÀâ Àv5Dp¤ ‡6DxÄ $66DŽW ãj6D¦ž Y«6D¬ð 3i7DÖ^ úú8DÂÅ P¤:DüQ ƒÏ:DŠW üv;D(Š ¥÷;D4Q é <DRY Í=D¢l GÝ=DÆò SN>Db‘ Ë?Dj¸ ¿ ?DÖë ;?Dðï ´½?Dög 1@Dxß ¦E@DÄŒ ³“@DdÓ ‰¼@D6¦ Ó@DÄX ¨è@Dì] Xî@DžÉ ÿ£AD¸w ’iBDöñ ’iBDVê %…BDÄŒ fîBDò¶ @CDœ rACDŠW (nCDV’ [òCDRZ ñDD¬X ôyED*è )FDDè ®äFD¶W tGDT ûµGD6W $œHDÆf T HDn ´-LD0’ ÝÚLDê\ Í`MDX» ;lMDÂc }wMD~Q xóMDîW xNDÖ± wMNDÕ ínNDÔW  `OD¬X üµODl– £PD
h èËPD´¡ ¡SD¶W 3ÏSDbY [ TDœ® £ITD,Ï /ÎTD^Õ «êTDç bXWDø\ ¨WDÈÝ s(YD^l 8žYDRY 6'ZDj^ ÓÖZD<‰ ð‘]D’X T£]DÄœ Ì]DÔk œ+^DNà Ñc^Dà« ‡^DnÄ nŸ_DøÆ à`DPY „`aD2ß ˜$bDô\ F