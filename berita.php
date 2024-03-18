<!DOCTYPE html>
<html lang="en">
<head>
<title>PoltekDG | Berita Terkini</title>
<?php require_once('templates/css.php');?>
<?php require_once('templates/css_content.php');?>

</head>
<body>
	
<div class="super_container">
		<?php require_once('templates/header.php');?>
		<!-- Menu -->
		<div class="menu_container menu_mm">
			
			<!-- Menu Close Button -->
			<div class="menu_close_container">
				<div class="menu_close"></div>
			</div>
			
			
	<?php require_once('templates/menu.php');?>
		
<!-- Home -->

<div class="home">
<div class="home_background_container prlx_parent">
	<div class="home_background prlx" style="background-image:url(templates/vendor/images/sub_bg.jpg)"></div>
</div>
<div class="home_content">
	<h1>Berita</h1>
</div>
</div>

<!-- News -->
<?php
require_once('program/function.php');
$news = new Berita();
$berita = $news->tampilDetailBerita();
$beritaAll = $news->tampilAllBerita();
?>
<div class="news">
<div class="container">
	<div class="row">
		
		<!-- News Post Column -->

		<div class="col-lg-8">
			
			<div class="news_post_container">
				<!-- News Post -->
				<div class="news_post">
					<div class="news_post_image">
					<?php 
						if($berita):
						while( $data =  $berita->fetch_assoc()):
						?>
						<img src="templates/vendor/images/news/<?= $data['file_upload'];?>" alt="<?= $data['file_upload'];?>">
						
					</div>
					<div class="news_post_top d-flex flex-column flex-sm-row">
						<div class="news_post_date_container">
							<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
								<div></div>
							</div>
						</div>
						<input type="hidden" value="<?= $data['id_berita']; ?>">
						<div class="news_post_title_container">
							<div class="news_post_title">
								<a href="berita_lengkap.php"><?= $data['judul']; ?></a>
							</div>
							<div class="news_post_meta">
								<span class="news_post_author">Post</span>
								<span>|</span>
								<span class="news_post_comments"><span><?= date('d F Y', strtotime($data['tanggal_publikasi'])); ?></span>
								<span>|</span>
								<span class="news_post_comments">Lihat: <a class="text-info" href="<?= $data['link']; ?>"><?= $data['judul_link']; ?></a></span>
							</div>
						</div>
					</div>
					<div class="news_post_text">
						<p class="text-justify"><?= $data['isi']; ?></p>
					</div>
				</div>
				<?php
				endwhile;
				endif; ?>

			</div>
		</div>
		<?php require_once('templates/news.php');?>
	</div>
	<div class="col-lg-12">
	<div class="popular page_section">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="section_title text-center">
					<h1>Berita Terkini</h1>
				</div>
			</div>
		</div>
		
		<div class="row course_boxes">
		<?php 
		if($beritaAll->num_rows > 0):
			while($data = $beritaAll->fetch_assoc()):
		?>
			<!-- Popular Course Item -->
			<div class="col-lg-3 course_box">
				<div class="card">
					<img class="card-img-top" height="200px" src="templates/vendor/images/news/<?= $data['file_upload']; ?>" alt="<?= $data['file_upload']; ?>">
					<div class="card-body text-center" >
						<div class="card-title" ><a style="font-size: medium;" href="berita.php?id_berita=<?= $data['id_berita']; ?>"><?= $data['judul']; ?></a></div>
						<div class="card-text text-justify" >
						</div>
					</div>
					
				</div>
			</div>
			
			<?php 
			endwhile;
			endif;
			?>
		</div>
	</div>		
</div>
</div>

</div>
</div>

<!-- Footer -->
<?php require_once('templates/footer.php');?>
</div>
<?php require_once('templates/js.php');?>
</body>
</html>