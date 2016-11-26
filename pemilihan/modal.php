<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Verifikasi</h4>
			</div>

			<div class="modal-body">
				Saya memilih <b>pasangan Cakabem dan Cawakabem nomor urut ke <?php echo $_GET['no']; ?></b>. Dengan kondisi :
				<ul>
					<li>Sadar dan mengerti atas pilihan saya.</li>
					<li>Tanpa paksaan atau intervensi dari siapapun.</li>
					<li>Sesuai dengan keinginan saya</li>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
				<a type="button" class="btn btn-primary" href="update.php?no=<?php echo $_GET['no']?>">Ya</a>
			</div>
