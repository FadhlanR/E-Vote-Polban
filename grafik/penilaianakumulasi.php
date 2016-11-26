

  <div class="col-md-12" id="container4" style = "height: 400px; margin: 0 auto"></div>

  <script type="text/javascript">
  $('#container4').highcharts({
    chart: {
                type: 'column'
            },
            title: {
                text: 'Data Akumulasi Penilaian'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                  'Administrasi',
                  'Debat Publik',
                  'Uji Publik'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                max: 40,
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
                data: [35.31, 13.42, 16.16]

            }, {
                name: 'Desy Ratnaningsih & M. Syams Ardhikohar',
                data: [28.66, 11.42, 15.99]

            }]
        });
  </script>
