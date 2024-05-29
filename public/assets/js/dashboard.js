$(function () {

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  // =====================================
  // Profit
  // =====================================

  $.ajax({
      url: '/dashboard/getBarChart',
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        var chart = {
          series: [
            { name: "Pemasukan bulan ini:", data: response.pemasukan },
            { name: "Pengeluaran bulan ini:", data: response.pengeluaran },
          ],
      
          chart: {
            type: "bar",
            height: 345,
            offsetX: -15,
            toolbar: { show: true },
            foreColor: "#adb0bb",
            fontFamily: 'inherit',
            sparkline: { enabled: false },
          },
      
      
          colors: ["#5D87FF", "#49BEFF"],
      
      
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: "35%",
              borderRadius: [6],
              borderRadiusApplication: 'end',
              borderRadiusWhenStacked: 'all'
            },
          },
          markers: { size: 0 },
      
          dataLabels: {
            enabled: false,
          },
      
      
          legend: {
            show: false,
          },
      
      
          grid: {
            borderColor: "rgba(0,0,0,0.1)",
            strokeDashArray: 3,
            xaxis: {
              lines: {
                show: false,
              },
            },
          },
      
          xaxis: {
            type: "category",
            categories: response.bulan,
            labels: {
              style: { cssClass: "grey--text lighten-2--text fill-color" },
            },
          },
      
      
          yaxis: {
            show: true,
            min: 0,
            max: 1600000,
            tickAmount: 5,
            labels: {
              style: {
                cssClass: "grey--text lighten-2--text fill-color",
              },
            },
          },
          stroke: {
            show: true,
            width: 3,
            lineCap: "butt",
            colors: ["transparent"],
          },
      
      
          tooltip: { theme: "light" },
      
          responsive: [
            {
              breakpoint: 600,
              options: {
                plotOptions: {
                  bar: {
                    borderRadius: 3,
                  }
                },
              }
            }
          ]
      
      
        };
      
        var chart = new ApexCharts(document.querySelector("#chart"), chart);
        chart.render();
      
      
        
      },
      error: function() {
        console.log('gagal ambil data');  
        // alert('Gagal mengambil data pengguna dan postingan');
      }
  });


  $.ajax({
    url: '/dashboard/getPieChart',
    type: 'GET',
    dataType: 'json',
    success: function(data) {
        // =====================================
        // Breakup
        // =====================================
        var a = data.iuran[0];
        var b = parseInt(data.iuran[1]);

        var breakup = {
          color: "#adb5bd",
          series: [a, b],
          labels: data.category,
          chart: {
            width: 180,
            type: "donut",
            fontFamily: "Plus Jakarta Sans', sans-serif",
            foreColor: "#adb0bb",
          },
          plotOptions: {
            pie: {
              startAngle: 0,
              endAngle: 360,
              donut: {
                size: '75%',
              },
            },
          },
          stroke: {
            show: false,
          },
      
          dataLabels: {
            enabled: false,
          },
      
          legend: {
            show: false,
          },
          colors: ["#5D87FF", "#ecf2ff", "#F9F9FD"],
      
          responsive: [
            {
              breakpoint: 991,
              options: {
                chart: {
                  width: 150,
                },
              },
            },
          ],
          tooltip: {
            theme: "dark",
            fillSeriesColor: false,
          },
        };
      
        var chart = new ApexCharts(document.querySelector("#breakup"), breakup);
        chart.render();

        // =====================================
        // Earning
        // =====================================
        var earning = {
          chart: {
            id: "sparkline3",
            type: "area",
            height: 60,
            sparkline: {
              enabled: true,
            },
            group: "sparklines",
            fontFamily: "Plus Jakarta Sans', sans-serif",
            foreColor: "#adb0bb",
          },
          series: [
            {
              name: "Earnings",
              color: "#49BEFF",
              data: [25, 66, 20, 40, 12, 58, 20],
            },
          ],
          stroke: {
            curve: "smooth",
            width: 2,
          },
          fill: {
            colors: ["#f3feff"],
            type: "solid",
            opacity: 0.05,
          },

          markers: {
            size: 0,
          },
          tooltip: {
            theme: "dark",
            fixed: {
              enabled: true,
              position: "right",
            },
            x: {
              show: false,
            },
          },
        };
        new ApexCharts(document.querySelector("#earning"), earning).render();
    },
    error: function() {
      console.log('gagal ambil data pie chart');  
      // alert('Gagal mengambil data pengguna dan postingan');
    }
  });
})