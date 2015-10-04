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
				<a href="#" class="brand-logo">编辑产品</a>
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
						if ($_COOKIE["isLogin"]!=true) die("<h1>Access Denied!</h1>");
						setcookie("isLogin", true, time()+3600);
						$sql_con = getSqlCon();
						if ($_GET['ID']==null){
							outputS12ReadInputBox("ID","","新建产品信息（无须填写）");
							outputDisSwitch();
							outputS12InputBox("Title","","产品名称");
							outputS12TextArea("Intro","","产品介绍");
							outputS12InputBox("Link","","产品链接");
							outputS12InputBox("Image","","产品图片");
						}else{
							$result = getRowWithInt($sql_con,"appmanager_content",'id',$_GET['ID']);
							$row = mysql_fetch_array($result);
							outputS12ReadInputBox("ID",$_GET['ID'],"修改产品ID（无须修改）");
							outputSwitch();
							outputS12InputBox("Title",$row['title'],"产品名称");
							outputS12TextArea("Intro",$row['intro'],"产品介绍");
							outputS12InputBox("Link",$row['link'],"产品链接");
							outputS12InputBox("Image",$row['image'],"产品图片");
						}
					}
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$sql_con = getSqlCon();
						if ($_COOKIE["isLogin"]!=true) if ($_POST["Password"]==null ||!isPassword($sql_con,$_POST["Password"])) die("<h1>Access Denied : Worng Password!</h1>");
						if ($_POST['ID']==null){
							newRow();
						}else{
							if ($_POST['del']=="on"){
								delRow();
								die ('<h1>删除完毕</h1>');
							}else{
								updateRow();
							}
						}
						echo '<h1>更新完毕</h1>';
						outputS12DisInputBox("Title",$_POST['Title'],"产品名称");
						outputS12DisTextArea("Intro",$_POST['Intro'],"产品介绍");
						outputS12DisInputBox("Link",$_POST['Link'],"产品链接");
						outputS12DisInputBox("Image",$_POST['Image'],"产品图片");
					}
				?>
				<?
					function outputS12InputBox($Name,$Val ,$Title){
						echo '<div class="input-field col s12">
								<input name="'.$Name.'" id="'.$Name.'"  type="text" class="validate" value="'.$Val.'">
								<label for="'.$Name.'">'.$Title.'</label>
								</div>';
					}
					
					function outputS12TextArea ($Name,$Val ,$Title){
						echo '<div class="input-field col s12">
								<textarea name="'.$Name.'" id="'.$Name.'" class="materialize-textarea" length="200">'.$Val.'</textarea>
								<label for="textarea1">'.$Title.'</label>
							</div>';
					}
					
					function outputS12ReadInputBox($Name,$Val ,$Title){
						echo '<div class="input-field col s12">
								<input name="'.$Name.'" id="'.$Name.'" readonly="true" type="text" class="validate" value="'.$Val.'">
								<label for="'.$Name.'">'.$Title.'</label>
								</div>';
					}
					
					function outputS12DisInputBox($Name,$Val ,$Title){
						echo '<div class="input-field col s12">
								<input disabled  name="'.$Name.'" id="'.$Name.'"  type="text" class="validate" value="'.$Val.'">
								<label for="'.$Name.'">'.$Title.'</label>
								</div>';
					}
					
					function outputS12DisTextArea ($Name,$Val ,$Title){
						echo '<div class="input-field col s12">
								<textarea disabled  name="'.$Name.'" id="'.$Name.'" class="materialize-textarea" length="200">'.$Val.'</textarea>
								<label for="textarea1">'.$Title.'</label>
							</div>';
					}
					
					function outputSwitch(){
						echo '<div class="col s3">
								<label>
								修改方式
								</label>
								</div>	';
						echo '<div class="col s6">
							<div class="switch">
								<label>
								修改
								<input name="del" type="checkbox">
								<span class="lever"></span>
								删除
								</label>
							</div>	
						</div>	';
					}
					
					function outputDisSwitch(){
						echo '<div class="col s3">
								<label>
								修改方式
								</label>
								</div>	';
						echo '<div class="col s6">
							<div class="switch">
								<label>
								修改
								<input disabled  name="del" type="checkbox">
								<span class="lever"></span>
								删除
								</label>
							</div>	
						</div>	';
					}
					
				?>
				
				  

			  
				</div>	
				<? if($_SERVER['REQUEST_METHOD'] != 'POST'){ ?>
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
				
				
				
				<div class="col s3 offset-s9 ">
					<button class="btn waves-effect waves-light" type="submit" >提交
						<i class="material-icons right">send</i>
					</button>
				</div>
				<?}?>
			</form>
			</div>	
		</div>	
			
		
			<!--Import jQuery before materialize.js-->
			<script type="text/javascript" src="./Materialize/js/materialize.min.js"></script>
		</body>
	</html>
	
<?
	function newRow(){
		$sql_con = getSqlCon();
	$sql = "INSERT INTO `appmanager_content`(`id`, `title`, `intro`, `link`, `image`) VALUES (null,\"{$_POST['Title']}\",\"{$_POST['Intro']}\",\"{$_POST['Link']}\",\"{$_POST['Image']}\")";
		runSql($sql_con,$sql);
	}
	
	function updateRow(){
		$sql_con = getSqlCon();
		$sql = "UPDATE `appmanager_content` SET `title`=\"{$_POST['Title']}\",`intro`=\"{$_POST['Intro']}\",`link`=\"{$_POST['Link']}\",`image`=\"{$_POST['Image']}\" WHERE `id` = {$_POST['ID']}";
		runSql($sql_con,$sql);
	}
	
	function delRow(){
		$sql_con = getSqlCon();
		$sql = "DELETE FROM `appmanager_content` WHERE `id` = {$_POST['ID']}";
		runSql($sql_con,$sql);
	}
	
?>		