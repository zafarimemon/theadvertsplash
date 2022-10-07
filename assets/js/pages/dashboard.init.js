var options = {
        chart: {
            height: 360,
            type: "bar",
            stacked: !0,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !0
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "15%",
                endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: !1
        },
        series: [{
            name: "Series A",
            data: [44, 55, 41, 67, 22, 43, 36, 52, 24, 18, 36, 48]
        }, {
            name: "Series B",
            data: [13, 23, 20, 8, 13, 27, 18, 22, 10, 16, 24, 22]
        }, {
            name: "Series C",
            data: [11, 17, 15, 15, 21, 14, 11, 18, 17, 12, 20, 18]
        }],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        colors: ["#556ee6", "#f1b44c", "#34c38f"],
        legend: {
            position: "bottom"
        },
        fill: {
            opacity: 1
        }
    };
    if(controller == 'dashboard'){
        var chart = new ApexCharts(document.querySelector("#stacked-column-chart"), options);
        chart.render();
    }

var options = {
          series: [10, 20, 30, 40],
          chart: {
          height: 250,
          type: 'radialBar',
        },
        plotOptions: {
          radialBar: {
            dataLabels: {
              name: {
                fontSize: '13px',
              },
              value: {
                fontSize: '16px',
              },
              total: {
                show: true,
                label: 'Total',
                formatter: function (w) {
                    var sum = w.config.series.reduce(function(a, b){
                        return a + b;
                    }, 0);
                  // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                  return sum+'%';
                }
              }
            }
          }
        },
        labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
        };
        if(controller == 'dashboard'){
            var chart = new ApexCharts(document.querySelector("#radialBar-chart"), options);
            chart.render();    
        }
        