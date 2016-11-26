

  <div class="col-md-12" id="container1" style = "height: 400px; margin: 0 auto"></div>

  <script type="text/javascript">
  $('#container1').highcharts({
    chart: {
                type: 'column'
            },
            title: {
                text: 'Data Penilaian Administrasi'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    'Kelengkapan Berkas',
                    'CV',
                    'Visi Misi',
                    'Ketepatan Waktu',
                    'Paper'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                max: 5,
                title: {
                    text: 'Nilai'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.2f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Ghifaris Vasha Irhamsyah',
                data: [3.33, 5, 4.33, 1.33, 3.33]
            }, {
                name: 'Bahana Irianta',
                data: [5, 4, 4.33, 1.33, 3.33]
            }, {
                name: 'Desy Ratnaningsih',
                data: [4, 2, 3.33, 2.33, 2]
            }, {
                name: 'M. Syams Ardhikohar',
                data: [4, 3.67, 3.33, 2, 2]
            }]
        });
  </script>
