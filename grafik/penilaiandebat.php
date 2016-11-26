

  <div class="col-md-12" id="container2" style = "height: 400px; margin: 0 auto"></div>

  <script type="text/javascript">
  $('#container2').highcharts({
    chart: {
                type: 'column'
            },
            title: {
                text: 'Data Penilaian Debat Publik'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                  'Argumen',
                  'Cara Bicara',
                  'Sikap',
                  'Time Management'
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
                name: 'Ghifaris Vasha Irhamsyah & Bahana Irianta',
                data: [3.25, 3.5, 3.42, 3.25]

            }, {
                name: 'Desy Ratnaningsih & M. Syams Ardhikohar',
                data: [3, 2.08, 2.92, 3.42]

            }]
        });
  </script>
