
    <link rel="stylesheet" type="text/css" href="./../assets/css/jquery.jqChart.css" />
    <link rel="stylesheet" type="text/css" href="./../assets/css/jquery.jqRangeSlider.css" />
    <link rel="stylesheet" type="text/css" href="./../assets/css/jquery-ui-1.8.20.css" />

    <?php
    $rs = $db->query("SELECT * FROM calon where id_nomor = $id_no AND id_keterangan = '1'")->fetch();
    $uji_publik = $db->query("SELECT * FROM penilaian_uji_public where id_calon = $rs[id_calon]")->fetch();
    ?>
    <center>
        <div id="jqChart" style="width: 290px; height: 300px;"></div>
    </center>
    <script src="../assets/js/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script src="../assets/js/jquery.jqChart.min.js" type="text/javascript"></script>
    <script src="../assets/js/jquery.jqRangeSlider.min.js" type="text/javascript"></script>

    <script lang="javascript" type="text/javascript">

            var background = {
                type: 'linearGradient',
                x0: 0,
                y0: 0,
                x1: 0,
                y1: 1,
                colorStops: [{ offset: 0, color: 'white' },
                             { offset: 1, color: 'white'}]
            };

            $('#jqChart').jqChart({
                title: { text: 'Hasil Uji Publik' },
                border: { strokeStyle: 'white' },
                background: background,
                legend: { visible: false },
                axes: [
                        {
                            type: 'categoryAngle',
                            categories: ['Kepemimpinan','Visi Misi', 'W. Eksternal', 'Pengambilan Keputusan','W. Internal','Sikap']
                        },
                        {
                            maximum: 3.75,
                            type: 'linearRadius',
                            labels: {
                                visible : false
                            },
                            renderStyle: 'polygon'
                        }
                      ],
                series: [
                            {
                                title : ' ',
                                type: 'radarArea',
                                data: [
                                  <?php echo $uji_publik['kepemimpinan'];?>,
                                  <?php echo $uji_publik['visimisi'];?>,
                                  <?php echo $uji_publik['wawasaneksternal'];?>,
                                  <?php echo $uji_publik['pengambilankeputusan'];?>,
                                  <?php echo $uji_publik['wawasaninternal'];?>,
                                  <?php echo $uji_publik['sikap'];?>],
                                fillStyle: 'rgba(65,140,240,0.75)'
                            }
                        ]
            });

    </script>
