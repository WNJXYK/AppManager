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
				<a href="#" class="brand-logo">Admin</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="/">Website</a></li>
				</ul>
			</div>
		</nav>
		
		<!-- 内容 -->
		<div class="container">
			<div class="row">
				<?
					if($_SERVER['REQUEST_METHOD'] != 'POST' && $_COOKIE["isLogin"]!=true){
						?>
						<div class="section no-pad-bot" id="index-banner">
							<div class="container">
								<br><br>
								<h1 class="header center orange-text">请输入密码登录后台！</h1>
								<form class="col s12"  method="post">
									<div class="row center">
										<div class="input-field col s12">
											<input id="password" type="password" class="validate" name="Password">
											<label for="password">Password</label>
										</div>
									</div>
									<div class="row center">
										<div class="col s3 offset-s9">
											<button class="btn waves-effect waves-light" type="submit" >登录
											<i class="material-icons right">send</i>
											</button>
										</div>	
									</div>
								</form>
								<br><br>
							</div>
						</div>
						<?
					}else if($_SERVER['REQUEST_METHOD'] == 'POST' || $_COOKIE["isLogin"]==true){
						$sql_con = getSqlCon();
						if ($_COOKIE["isLogin"]!=true) if ($_POST["Password"]==null ||!isPassword($sql_con,$_POST["Password"])) die("<h1>Access Denied : Worng Password!</h1>");
						setcookie("isLogin", true, time()+3600);
						?>
						<div class="row">
							<div class="col s12 m6">
								<div class="card   green darken-4">
									<div class="card-content white-text">
										<span class="card-title">页面信息修改</span>
											<p>包含网站Title、链接和关于等。</p>
									</div>
									<div class="card-action">
										<a href="./editInfo.php">点击直达</a>
									</div>
								</div>
							</div>
							
							<div class="col s12 m6">
								<div class="card light-blue darken-4">
									<div class="card-content white-text">
										<span class="card-title">网站内容修改</span>
											<p>包含显示的内容等。</p>
									</div>
									<div class="card-action">
										<a href="./editContent.php">点击直达</a>
									</div>
								</div>
							</div>
						</div>
						<?
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
		</div>	
			
		
			<!--Import jQuery before materialize.js-->
			<script type="text/javascript" src="./Materialize/js/materialize.min.js"></script>
		</body>
	</html>
	