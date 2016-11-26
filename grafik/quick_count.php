
<title>Rekapitulasi Suara</title>
<script type="text/javascript" src="grafik/jquery.min.js"></script>
<script type="text/javascript" src="grafik/highcharts.js"></script>
		<link href="./assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="./assets/css/style.css" rel="stylesheet">

<body>
	<div class="container">
	<div class="col-md-offset-1 col-md-10" >
	<?php

		$categories = array('Calon KaBEM dan W.KaBEM');

		// data series
		$row = $db->query('SELECT COUNT(*) AS result FROM pemilih where id_nomor IS NULL')->fetch();
		$belum = $row['result'];

		$row = $db->query('SELECT COUNT(*) AS result FROM pemilih where id_nomor IS NOT NULL')->fetch();
		$sudah = $row['result'];

		$all  = $db->query("SELECT COUNT(a.nim) as count FROM pemilih a, kelas b, prodi c WHERE a.id_kelas = b.id_kelas AND b.id_prodi = c.id_prodi GROUP BY c.id_jurusan")->fetchAll();
		$null = $db->query("SELECT COUNT(a.nim) as count FROM pemilih a, kelas b, prodi c WHERE a.id_kelas = b.id_kelas AND b.id_prodi = c.id_prodi AND a.id_nomor IS NULL GROUP BY c.id_jurusan")->fetchAll();

	?>
	<div id="container" style="height: 450px; margin: 0 auto"></div>
	</div>
	</div>

	<script type="text/javascript">

	    var colors = Highcharts.getOptions().colors,
	        categories = ['Sudah Memilih', 'Belum Memilih'],
	        data = [{
	            y: <?php echo $sudah;?>,
	            color: colors[0],
	            drilldown: {
	                name: 'Sudah Memilih',
	                categories: ['T. Sipil', 'T. Mesin', 'T. Elektro', 'T. Kimia', 'T. Komputer dan Informatika', 'T. Refrigasi dan Tata Udara', 'T. Konversi Energi', 'Akutansi', 'Administrasi Niaga','Bahasa Inggris'],
	                data:
									[
										<?php echo $all[0]['count']-$null[0]['count']?>,
										<?php echo $all[1]['count']-$null[1]['count']?>,
										<?php echo $all[2]['count']-$null[2]['count']?>,
										<?php echo $all[3]['count']-$null[3]['count']?>,
										<?php echo $all[4]['count']-$null[4]['count']?>,
										<?php echo $all[5]['count']-$null[5]['count']?>,
										<?php echo $all[6]['count']-$null[6]['count']?>,
										<?php echo $all[7]['count']-$null[7]['count']?>,
										<?php echo $all[8]['count']-$null[8]['count']?>,
										<?php echo $all[9]['count']-$null[9]['count']?>
									]
	            }
	        }, {
	            y: <?php echo $belum ?>,
	            color: colors[8],
	            drilldown: {
	                name: 'Belum Memilih',
	                categories: ['T. Sipil', 'T. Mesin', 'T. Elektro', 'T. Kimia', 'T. Komputer dan Informatika', 'T. Refrigasi dan Tata Udara', 'T. Konversi Energi', 'Akutansi', 'Administrasi Niaga','Bahasa Inggris'],
	                data:
									[
										<?php echo $null[0]['count']?>,
										<?php echo $null[1]['count']?>,
										<?php echo $null[2]['count']?>,
										<?php echo $null[3]['count']?>,
										<?php echo $null[4]['count']?>,
										<?php echo $null[5]['count']?>,
										<?php echo $null[6]['count']?>,
										<?php echo $null[7]['count']?>,
										<?php echo $null[8]['count']?>,
										<?php echo $null[9]['count']?>
									]
	            }
	        }],
	        browserData = [],
	        versionsData = [],
	        i,
	        j,
	        dataLen = data.length,
	        drillDataLen,
	        brightness;


	    // Build the data arrays
	    for (i = 0; i < dataLen; i += 1) {

	        // add browser data
	        browserData.push({
	            name: categories[i],
	            y: data[i].y,
	            color: data[i].color
	        });

	        // add version data
	        drillDataLen = data[i].drilldown.data.length;
	        for (j = 0; j < drillDataLen; j += 1) {
	            brightness = 0.2 - (j / drillDataLen) / 5;
	            versionsData.push({
	                name: data[i].drilldown.categories[j],
	                y: data[i].drilldown.data[j],
	                color: Highcharts.Color(data[i].color).brighten(brightness).get()
	            });
	        }
	    }

	    // Create the chart
	    $('#container').highcharts({
	        chart: {
	            type: 'pie'
	        },
	        title: {
	            text: 'Persentase Pemilihan Suara'
	        },
					subtitle: {
            text: 'Pemilu Raya Politeknik Negeri Bandung 2016'
        	},
	        plotOptions: {
	            pie: {
	                shadow: false,
	                center: ['50%', '50%']
	            }
	        },
	        tooltip: {
	            valueSuffix: ''
	        },
	        series: [{
	            name: 'Siswa',
	            data: browserData,
	            size: '60%',
	            dataLabels: {
	                formatter: function () {
	                    return this.y > 5 ? this.point.name : null;
	                },
	                color: '#ffffff',
	                distance: -30
	            }
	        }, {
	            name: 'Siswa',
	            data: versionsData,
	            size: '80%',
	            innerSize: '60%',
	            dataLabels: {
	                formatter: function () {
	                    // display only if larger than 1
	                    return this.y > 1 ? '<b>' + this.point.name + ':</b> ' + this.y + ' siswa' : null;
	                }
	            }
	        }]
	    });
	</script>

	<center>
	<p>
	<h5>Total Mahasiswa : <?php echo $sudah+$belum; ?> - Sudah memilih : <?php echo $sudah; ?> - Belum memilih : <?php echo $belum;?><h5></p></center>

		<!--countdown javascript-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="./../assets/js/jquery-2.1.4.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="./../assets/js/bootstrap.min.js"></script>

</body>
