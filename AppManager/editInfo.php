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
				<a href="#" class="brand-logo">修改网页信息</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="./admin.php">Admin</a></li>
				</ul>
			</div>
		</nav>
		
		<!-- 内容 -->
		<div class="container">
			<div class="row">
			<form class="col s12"  method="post">
				<div class="row">
				<?
					if($_SERVER['REQUEST_METHOD'] != 'POST'){
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
						outputS12InputBox('WebTitle',$WebTitle,"网站标题");
						outputS12InputBox('LinkTitle',$LinkTitle,"链接标题");
						outputS6InputBox('LinkName1',$LinkName1,"链接1-文字");
						outputS6InputBox('Link1',$Link1,"链接1-网址");
						outputS6InputBox('LinkName2',$LinkName2,"链接2-文字");
						outputS6InputBox('Link2',$Link2,"链接2-网址");
						outputS6InputBox('LinkName3',$LinkName3,"链接3-文字");
						outputS6InputBox('Link3',$Link3,"链接3-网址");
						outputS12InputBox('AboutTitle',$AboutTitle,"关于标题");
						outputS6InputBox('About1',$About1,"关于1");
						outputS6InputBox('About2',$About2,"关于2");
						outputS12InputBox('Copyright',$Copyright,"Copyroght");
						outputS6InputBox('FootName',$FootName,"More-Title");
						outputS6InputBox('FootLink',$FootLink,"More-Link");
					}
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$sql_con = getSqlCon();
						if ($_COOKIE["isLogin"]!=true) if ($_POST["Password"]==null ||!isPassword($sql_con,$_POST["Password"])) die("<h1>Access Denied : Worng Password!</h1>");
						saveOpt('WebTitle');
						saveOpt('WebTitle');
						saveOpt('LinkTitle');
						saveOpt('LinkName1');
						saveOpt('Link1');
						saveOpt('LinkName2');
						saveOpt('Link2');
						saveOpt('LinkName3');
						saveOpt('Link3');
						saveOpt('AboutTitle');
						saveOpt('About1');
						saveOpt('About2');
						saveOpt('Copyright');
						saveOpt('FootName');
						saveOpt('FootLink');
						outputS12InputBoxFP('WebTitle',"网站标题");
						outputS12InputBoxFP('LinkTitle',"链接标题");
						outputS6InputBoxFP('LinkName1',"链接1-文字");
						outputS6InputBoxFP('Link1',"链接1-网址");
						outputS6InputBoxFP('LinkName2',"链接2-文字");
						outputS6InputBoxFP('Link2',"链接2-网址");
						outputS6InputBoxFP('LinkName3',"链接3-文字");
						outputS6InputBoxFP('Link3',"链接3-网址");
						outputS12InputBoxFP('AboutTitle',"关于标题");
						outputS6InputBoxFP('About1',"关于1");
						outputS6InputBoxFP('About2',"关于2");
						outputS12InputBoxFP('Copyright',"Copyroght");
						outputS6InputBoxFP('FootName',"More-Title");
						outputS6InputBoxFP('FootLink',"More-Link");
					}
				?>
				<? function outputS12InputBox($Name , $Val ,$Title){
					echo '<div class="input-field col s12">
							<input name="'.$Name.'" id="'.$Name.'"  type="text" class="validate" value="'.$Val.'">
							<label for="'.$Name.'">'.$Title.'</label>
							</div>';
					}
					
					function outputS6InputBox($Name , $Val ,$Title){
						echo '<div class="input-field col s6">
							<input name="'.$Name.'" id="'.$Name.'"  type="text" class="validate" value="'.$Val.'">
							<label for="'.$Name.'">'.$Title.'</label>
						</div>';
					}
					
					function outputS12InputBoxFP($Name  ,$Title){
						echo '<div class="input-field col s12">
							<input name="'.$Name.'" id="'.$Name.'"  type="text" class="validate" value="'.$_POST[$Name ].'">
							<label for="'.$Name.'">'.$Title.'</label>
							</div>';
					}
					
					function outputS6InputBoxFP($Name  ,$Title){
						echo '<div class="input-field col s6">
							<input name="'.$Name.'" id="'.$Name.'"  type="text" class="validate" value="'.$_POST[$Name ].'">
							<label for="'.$Name.'">'.$Title.'</label>
						</div>';
					}
				?>
				
				</div>	
				<?if ($_COOKIE["isLogin"]!=true) {?>
				<div class="input-field col s12">
					<input id="password" type="password" class="validate" name="Password">
					<label for="password">Password</label>
				</div>
				<? }else {?>
					<div class="input-field col s12">
						<input disabled value="已登录" id="disabled" type="text" class="validate">
						<label for="disabled">Password</label>
					</div>
				<? } ?>
				<div class="col s6 offset-s6">
					<button class="btn waves-effect waves-light" type="submit" >提交
						<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
        

			</div>	
		</div>	
			
		
			<!--Import jQuery before materialize.js-->
			<script type="text/javascript" src="./Materialize/js/materialize.min.js"></script>
		</body>
	</html>
	
<?
	function saveOpt($Name){
		$sql_con = getSqlCon();
		updateSingleVal($sql_con,'appmanager_info','info_name',$Name,'info_val',$_POST[$Name]);
	}
?>		