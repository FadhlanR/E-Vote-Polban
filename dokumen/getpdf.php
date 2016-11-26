<?php if(isset($_GET['id']) && $_GET['id'] != 0 ): ?>
	<?php
		include("./../php/credentials.php");
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
	?>
		<ul class="nav nav-pills">
					<?php	$getdoc = $db->query('SELECT * FROM dokumen WHERE kategori_id = ' .$_GET['id'])->fetchALL();
						$i=1;
						foreach ($getdoc as $key => $value):?>
								<li class ="<?php if($i==1){ echo "active";} ?>"><a href="#doc<?php echo $i ?>" data-toggle="tab"><h4><?php echo $value['judul'] ?></h4></a></li>
						<?php $i=$i+1; endforeach ?>
		</ul>

		<div class="tab-content">
				<?php
				$i=1;
				foreach ($getdoc as $key => $value):?>
					<div class="container tab-pane fade <?php if($i==1){ echo "active in"; } ?>" id="doc<?php echo $i ?>">
						<object data="<?php echo $value['doc_file']?>#zoom=100" type="application/pdf" width="100%" height="700px">
						   <p>This browser does not support PDFs. Please download the PDF to view it: <a href="<?php echo $value['doc_file']?>">Download PDF</a>.</p>
						</object>
					</div>
				<?php $i=$i+1; endforeach;?>
		</div>



<?php else: ?>
	<ul class="nav nav-pills">
				<?php	$getdoc = $db->query('SELECT * FROM dokumen WHERE kategori_id = 1')->fetchALL();
					$i=1;
					foreach ($getdoc as $key => $value):?>
							<li class ="<?php if($i==1){ echo "active";} ?>"><a href="#doc<?php echo $i ?>" data-toggle="tab"><h4><?php echo $value['judul'] ?></h4></a></li>
					<?php $i=$i+1; endforeach ?>
	</ul>

	<div class="tab-content">
			<?php
			$i=1;
			foreach ($getdoc as $key => $value):?>
				<div class="container tab-pane fade <?php if($i==1){ echo "active in"; } ?>" id="doc<?php echo $i ?>">
					<object data="<?php echo $value['doc_file']?>#zoom=100" type="application/pdf" width="100%" height="700px">
						 <p>This browser does not support PDFs. Please download the PDF to view it: <a href="<?php echo $value['doc_file']?>">Download PDF</a>.</p>
					</object>
				</div>
			<?php $i=$i+1; endforeach;?>
	</div>
		<?php endif?>
