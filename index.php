<!DOCTYPE html>
<?php
/**引入全局文件**/
require "global.php";
$insLockfile = dirname(__FILE__).'';
// 安装检测
if(!file_exists($insLockfile)){
    header("location:/install/index.php");
}
$rst=$db->get_one("select * from find_skin");
?>
<?php ob_start(”ob_gzhandler”);?>

<html>
<head>
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
<meta name="mianfei" content="findworlds77">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta http-equiv=Content-Type content="text/html;charset=utf-8">
<meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1"><meta content=always name=referrer>
<title><?php echo $config["name"];?></title>
<link type="text/css" rel="stylesheet" href="img/home.css">

</head>
<body>

<div class="nav">
     <div class="nav_left">
     <ul>
        <li><a href="#">网页</a></li>
     </ul>   
     </div>
     <div class="nav_right">
     <ul>
        <li><a href="#">账号密码：findworlds</a></li>
        <li><a href="./admin/">后台登陆</a></li>
     </ul>   
     </div>
</div>
<div class="s_body" >
     <div class="logo"></div>


<script type="text/javascript">
function subck(){
	var wd = document.getElementById("wd").value;
	if(wd=='' || q=='请输入关键字搜索网页'){return false;}else{return true;}
}/*mian7.7*/
function toptab(obj,id){
	$(".hothead a").removeClass("current");
	$("#tab"+id).addClass("current");
    $(".hotsearch ul").hide();
	$("#toplist"+id).show();
}
$(document).ready(function() {
	var WinH = $(window).height();
    var offset = $('#footer').offset(); 
	if(WinH>offset.top+$('#footer').height()){
		var MH = WinH-offset.top-$('#footer').height()+19;
		$('#footer').css("margin-top",MH.toString()+"px");
	
	}
    $('#footer').css("visibility","visible");
    
});
</script>

     <form method="get" id="Searchword" name="f" action="s"  class="form" accept-charset="utf-8" >
       <input  placeholder="用眼睛发现世界，用手打开世界..." type="text"  name="wd" value="" class="s_s">
       <input type="submit" name="" value="" class="s_buttom">
     </form>
     

</div>


<div class="rec">
    <div class="rec_t">
      <span style="color:#FFFFFF">热门搜索：</span>




  <?php
    $runtime= new runtime;
	$runtime->start();
	//$sql="select * from find_recommend where is_show>0 and enddatetime>'$time'";
    $sql="select * from find_recommend";
    $result=$db->query($sql." order by oid desc");	

	
   while ($rs=$db->fetch_array($result))
  { 

  ?>
  
<td>
<?php
    
    if($rs['is_show']<1 or $rs['enddatetime']<date(time())){
		echo "";
	}
    else{
    echo "<a target=\"_blank\" href=\"".$site["keywords"]."./s/?wd=".$rs["keywords"]."\" title=\"查看".$rs["keywords"]."\">".$rs["keywords"]."";
	
	
?>
</a>&nbsp;&nbsp;
</td>
  
  <?php
	}
  }
  ?>




        
 
    </div>

</div>

<div class="c">
     <div class="c_l">
        <div class="c_r_top">
           图片区：唯一官方网站：<a href="http://findworlds.com">findworlds.com</a>  QQ:1539808356
        </div>
        <div class="c_r_hr"></div>
        <img src="img/20120814204816.jpg" width="528px" height="300px">

        
     </div>
<div class="nav_btm" >
<div style="margin:0 auto;">
     <span class="btm_txt"><?php echo $config["copyright"];?> &nbsp;&nbsp;<a href="http://www.miitbeian.gov.cn/" target="_blank"><?php echo $config["icp"];?></a></span>
     <ul class="btm_l">
        <li><a href="#"><?php index_foothtml();?></a></li>

      </ul> 

</div></div>
</body>

</html>


