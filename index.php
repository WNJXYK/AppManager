 <!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="./AppManager/Materialize/css/materialize.min.css"	media="screen,projection"/>
		<link href="./AppManager/Materialize/icon/icon.css" rel="stylesheet">
		<script type="text/javascript" src="./AppManager/jquery/jquery-2.1.1.min.js"></script>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<style>
		 body {
			display: flex;
			min-height: 100vh;
			flex-direction: column;
		}

		main {
			flex: 1 0 auto;
		}
		</style>
	</head>

	<?
		//SQL
		include('./AppManager/mysql.php');
		$sql_con = getSqlCon();
		//网站信息
		$WebTitle = getSingleVal($sql_con,'appmanager_info','info_name','WebTitle','info_val');
		$LinkTitle = getSingleVal($sql_con,'appmanager_info','info_name','LinkTitle','info_val');
		$LinkName1 = getSingleVal($sql_con,'appmanager_info','info_name','LinkName1','info_val');
		$LinkName2 = getSingleVal($sql_con,'appmanager_info','info_name','LinkName2','info_val');
		$LinkName3 = getSingleVal($sql_con,'appmanager_info','info_name','LinkName3','info_val');
		$Link1 = getSingleVal($sql_con,'appmanager_info','info_name','Link1','info_val');
		$Link2 = getSingleVal($sql_con,'appmanager_info','info_name','Link2','info_val');
		$Link3 = getSingleVal($sql_con,'appmanager_info','info_name','Link3','info_val');
		$AboutTitle = getSingleVal($sql_con,'appmanager_info','info_name','AboutTitle','info_val');
		$About1 = getSingleVal($sql_con,'appmanager_info','info_name','About1','info_val');
		$About2 = getSingleVal($sql_con,'appmanager_info','info_name','About2','info_val');
		$Copyright = getSingleVal($sql_con,'appmanager_info','info_name','Copyright','info_val');
		$FootLink = getSingleVal($sql_con,'appmanager_info','info_name','FootLink','info_val');
		$FootName = getSingleVal($sql_con,'appmanager_info','info_name','FootName','info_val');
	?>
	<body>
		<!-- 导航栏 -->
		<nav class="cyan">
		<div class="nav-wrapper container">
		 
				 <a href="#" class="brand-logo"><? echo $WebTitle; ?></a>
						<ul class="right hide-on-med-and-down">
							<li><a href="<? echo $FootLink; ?>"><? echo $FootName; ?></a></li>
					</ul>
			 </div>
			</nav>
		
		<!-- 内容 -->
		
		<?
			$sql_con = getSqlCon();
			$Page=1;
			if($_GET['Page']!=null) $Page=$_GET['Page'];
			$Content_Num=getMulNum($sql_con,"appmanager_content");
					
			$Content_Limit=5;
			$AllPage=(integer)($Content_Num/$Content_Limit)+($Content_Num%$Content_Limit!=0?1:0);	
		?>
		
		<div class="container">
			<div class="row">
				<?
					$result=getMulLimit($sql_con,"appmanager_content",($Page-1)*$Content_Limit,$Content_Limit);
					while($row = mysql_fetch_array($result))
					{
						 echo '<div class="card"><div class="card-image waves-effect waves-block waves-light"><img class="activator" src="'.$row['image'].'"></div>
<div class="card-content"><span class="card-title activator grey-text text-darken-4">'.$row['title'].'<i class="material-icons right">more_vert</i></span>
<p><a href="'.$row['link'].'">点击直达</a></p>
</div><div class="card-reveal">
<span class="card-title grey-text text-darken-4">'.$row['title'].'<i class="material-icons right">close</i></span>
<p>'.$row['intro'].'</p>
</div></div>';
					}
				?>
				
			</div>	
			
			<ul class="pagination">
				<? if ($Page<=1) echo '<li class="disabled">'; else echo'<li class="waves-effect">';?>
				<a href="<?if ($Page<=1) echo "#"; else {echo "./index.php?Page=";echo $Page-1;}?>" ><i class="material-icons">chevron_left</i></a></li>
				<? for ($i=1;($i-1)*$Content_Limit<$Content_Num;$i++){
				if ($i==$Page) echo '<li class="active">'; else echo '<li class="waves-effect">';
				echo '<a href="./index.php?Page='.$i.'">'.$i.'</a></li>';
				}?>
				<? if ($Page >= $AllPage) echo '<li class="disabled">'; else echo'<li class="waves-effect">';?>
				<a href="<?if ($Page>=$AllPage) echo "#"; else {echo "./index.php?Page=";echo $Page+1;}?>"><i class="material-icons">chevron_right</i></a></li>
			</ul>
		
		</div>
		<!-- 页尾 -->
		<footer class="page-footer cyan">
				<div class="container">
					<div class="row">
						<div class="col l6 s12">
							<h5 class="white-text"><? echo $AboutTitle; ?></h5>
				<p class="grey-text text-lighten-4"><? echo $About1; ?></p>
				<p class="grey-text text-lighten-4"><? echo $About2; ?></p>
						</div>
						<div class="col l4 offset-l2 s12">
							<h5 class="white-text"><? echo $LinkTitle; ?></h5>
							<ul>
		 			<li><a class="grey-text text-lighten-3" href="<? echo $Link1; ?>"><? echo $LinkName1; ?></a></li>
						<li><a class="grey-text text-lighten-3" href="<? echo $Link2; ?>"><? echo $LinkName2; ?></a></li>
					<li><a class="grey-text text-lighten-3" href="<? echo $Link3; ?>"><? echo $LinkName3; ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			 <div class="footer-copyright">
				 <div class="container">
				 <? echo $Copyright; ?>
				 <a class="grey-text text-lighten-4 right" href="./AppManager/admin.php">Admin</a>
				 </div>
			 </div>
			</footer>
						
			<!--Import jQuery before materialize.js-->
			<script type="text/javascript" src="./AppManager/Materialize/js/materialize.min.js"></script>
		</body>
	</html>
				