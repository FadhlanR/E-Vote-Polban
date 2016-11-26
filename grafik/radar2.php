
    <link rel="stylesheet" type="text/css" href="./../assets/css/jquery.jqChart.css" />
    <link rel="stylesheet" type="text/css" href="./../assets/css/jquery.jqRangeSlider.css" />
    <link rel="stylesheet" type="text/css" href="./../assets/css/jquery-ui-1.8.20.css" />

    <?php
    $rs2 = $db->query("SELECT * FROM calon where id_nomor = $id_no AND id_keterangan = '2'")->fetch();
    $uji_publik2 = $db->query("SELECT * FROM penilaian_uji_public where id_calon ='$rs2[id_calon]'")->fetch();
    ?>

        <center>
            <div id="jqChart2" style="width: 290px; height: 300px;"></div>
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

            $('#jqChart2').jqChart({
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
                                    <?php echo $uji_publik2['kepemimpinan'];?>,
                                    <?php echo $uji_publik2['visimisi'];?>,
                                    <?php echo $uji_publik2['wawasaneksternal'];?>,
                                    <?php echo $uji_publik2['pengambilankeputusan'];?>,
                                    <?php echo $uji_publik2['wawasaninternal'];?>,
                                    <?php echo $uji_publik2['sikap'];?>],
                                fillStyle: 'rgba(65,140,240,0.75)'
                            }
                        ]
            });

    </script>
