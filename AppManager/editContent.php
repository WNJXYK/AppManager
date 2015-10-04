 <!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="./Materialize/css/materialize.min.css"	media="screen,projection"/>
		<link href="./Materialize/icon/icon.css" rel="stylesheet">
		<script type="text/javascript" src="./jquery/jquery-2.1.1.min.js"></script>
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
		include('./mysql.php');
	?>
	
	<body>
		<!-- 导航栏 -->
		<nav class="cyan">
			<div class="nav-wrapper container">
				<a href="#" class="brand-logo">编辑内容</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="./admin.php">Admin</a></li>
				</ul>
			</div>
		</nav>
		
		<!-- 内容 -->
		<div class="container">
			<div class="row">
				<?
					if ($_COOKIE["isLogin"]!=true) die("<h1>Access Denied!</h1>");
					setcookie("isLogin", true, time()+3600);
					$sql_con = getSqlCon();
					if ($_COOKIE["isLogin"]!=true) die("<h1>Access Denied!</h1>");
					
					$sql_con = getSqlCon();
					$Page=1;
					if($_GET['Page']!=null) $Page=$_GET['Page'];
					$Content_Num=getMulNum($sql_con,"appmanager_content");
						
					$Content_Limit=30;
					$AllPage=(integer)($Content_Num/$Content_Limit)+($Content_Num%$Content_Limit!=0?1:0);	
				?>
					<ul class="collection with-header">
						<li class="collection-header"><h4>All contents(<? echo $Content_Num; ?>)：</h4></li>
						<li class="collection-item"><div>新建产品<a href="./editApp.php" class="secondary-content"><i class="material-icons">send</i></a></div></li>
						<?
							$result=getMulLimit($sql_con,"appmanager_content",($Page-1)*$Content_Limit,$Content_Limit);
							while($row = mysql_fetch_array($result))
							{
								echo '<li class="collection-item"><div>'.'ID='.$row['id'].'  '.$row['title'].' --- '.$row['link'].'<a href="./editApp.php?ID='.$row['id'].'" class="secondary-content"><i class="material-icons">send</i></a></div></li>';
							}
						?>
					</ul>	
					<ul class="pagination">
						<? if ($Page<=1) echo '<li class="disabled">'; else echo'<li class="waves-effect">';?>
							<a href="<?if ($Page<=1) echo "#"; else {echo "./editContent.php?Page=";echo $Page-1;}?>" ><i class="material-icons">chevron_left</i></a></li>
						<? for ($i=1;($i-1)*$Content_Limit<$Content_Num;$i++){
							if ($i==$Page) echo '<li class="active">'; else echo '<li class="waves-effect">';
							echo '<a href="./editContent.php?Page='.$i.'">'.$i.'</a></li>';
						}?>
						<? if ($Page >= $AllPage) echo '<li class="disabled">'; else echo'<li class="waves-effect">';?>
							<a href="<?if ($Page>=$AllPage) echo "#"; else {echo "./editContent.php?Page=";echo $Page+1;}?>"><i class="material-icons">chevron_right</i></a></li>
					</ul>
			</div>	
		</div>	
			
		
			<!--Import jQuery before materialize.js-->
			<script type="text/javascript" src="./Materialize/js/materialize.min.js"></script>
		</body>
	</html>
	