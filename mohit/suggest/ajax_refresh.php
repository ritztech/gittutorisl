<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=dryfruits', 'root', 'sudhir', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
//$keyword = '%'.$_POST['keyword'].'%';
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT `id`,upper(CONCAT(`desc`,'**MRP**', `mrp`)) AS `desc` FROM `m_master_store`  WHERE `desc` LIKE (:keyword) ORDER BY `desc` ASC LIMIT 0, 50";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();

foreach ($list as $rs) {
	// put in bold the written text
	$country_name = str_replace($_POST['keyword'], ''.$_POST['keyword'].'</b>', $rs['1']);   
		$country_id = $rs['0']; 
	?>
  

  <?php echo '<li value='.$country_id.' onclick="set_item(this,this.value)">'.$country_name.'</li>';?>
  

<?php
}
?>



	 