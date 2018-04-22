<?php 
$page = 'blog';
include "head.php";
?>

<body>
	<h1>TEST</h1>

	<section id="section_blog">
		<?php 

		$servername = "localhost";
		$username = "root";
		$password = "simplon";
		$dbname = "exo_php";

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "Connected successfully";
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}

		$request = $conn->query("SELECT * FROM blog");
		foreach ($request as $row) {
			echo '<div class="articles"><a href="article_blog.php?id='.$row["id"].'">';
			echo '<h2>'.strtoupper($row["titre"]).'</h2>';
			echo '<img class="deco" src="'.$row["image"].'">';
			echo '<p>'.$row["intro"].'</p>';
			echo '<p class="auteur bold">Par '.$row["auteur"].'</p>';
			echo '<p class="publication">Publié le '.$row["date"].'</p>';
			echo '</a></div>';		
		}		

		?>
	</section>
	<?php
	include "foot.php";
	?>
</body>
</html>