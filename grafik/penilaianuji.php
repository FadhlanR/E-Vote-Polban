

  <div class="col-md-12" id="container3" style = "height: 400px; margin: 0 auto"></div>

  <script type="text/javascript">
  $('#container3').highcharts({
    chart: {
                type: 'column'
            },
            title: {
                text: 'Data Penilaian Uji Publik'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                  'Visi Misi',
                  'Wawasan Internal',
                  'Wawasan Eksternal',
                  'Kepemimpinan',
                  'Pengambilan Keputusan',
                  'Sikap'
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
                data: [3.08, 2.46, 3.15, 2.77, 2.38, 2.69]

            }, {
                name: 'Bahana Irianta',
                data: [2.92, 2.54, 2.85, 2.54, 2.31, 2.62]

            }, {
                name: 'Desy Ratnaningsih',
                data: [3.08, 2.77, 3.62, 2.69, 2.85, 3.38]

            }, {
                name: 'M. Syams Ardhikohar',
                data: [2.62, 2.42, 1.92, 1.92, 2.08, 2.62]

            }]
        });
  </script>
