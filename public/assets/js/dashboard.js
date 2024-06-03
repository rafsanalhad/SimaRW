$(function () {

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  // =====================================
  // Profit
  // =====================================
  const selectElement = document.getElementById('filterTahun');  // elemen yang akan diambil
  let tahun = document.getElementById('filterTahun').value; // mengambil value dari elemen dengan id filterTahun
  // console.log(selectElement);
  // console.log(tahun);

  $.ajax({
      url: '/dashboard/getBarChart/' + tahun,
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        console.log(tahun);
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
            categories: response.bulan, // integrated bulan
            labels: {
              style: { cssClass: "grey--text lighten-2--text fill-color" },
            },
          },
      
      
          yaxis: {
            show: true,
            min: 0,
            max: response.batasAtas,
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
      
        selectElement.addEventListener('change', (event) => {
          // mengambil value dari elemen yang memiliki event on change 
          const selectedValue = event.target.value;
          // Menyimpan value yang dipilih ke dalam variabel JavaScript
          let tahun = selectedValue;
          // alert(tahun);
          // console.log(tahun);
    
          $.ajax({
            url: '/dashboard/getBarChart/' + tahun,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // method untuk update data yang akan divisualisasikan pada chart
                chart.updateSeries([
                  { name: "Pemasukan bulan ini:", data: response.pemasukan },
                  { name: "Pengeluaran bulan ini:", data: response.pengeluaran }
                ], true)
                // method untuk update konfigurasi chart
                chart.updateOptions({
                  xaxis: {
                    type: "category",
                    categories: response.bulan,
                    labels: {
                      style: { cssClass: "grey--text lighten-2--text fill-color" },
                    },
                  },
              
                  yaxis: {
                    max: response.batasAtas,
                    tickAmount: 5,
                    labels: {
                      style: {
                        cssClass: "grey--text lighten-2--text fill-color",
                      },
                    },
                  },
                }, false, true, true)
            },
            error: function() {
              console.log('gagal ambil data');  
              // alert('Gagal mengambil data pengguna dan postingan');
              }
            });
          });
      
        
      },
      error: function() {
        console.log('gagal ambil data');  
        // alert('Gagal mengambil data pengguna dan postingan');
      }
  });


  $.ajax({
    url: '/dashboard/getPieChart/' + tahun,
    type: 'GET',
    dataType: 'json',
    success: function(data) {
        // =====================================
        // Breakup
        // =====================================
        var a = data.iuran[0];
        var b = parseInt(data.iuran[1]);

        // set value percen
        if (data.percentage < 0) {
          document.getElementById("percen").innerText = data.percentage + "%";
        } else {
          document.getElementById("percen").innerText = "+" + data.percentage + "%";
        }

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

        selectElement.addEventListener('change', (event) => {
          // mengambil value dari elemen yang memiliki event on change 
          const selectedValue = event.target.value;
          // Menyimpan value yang dipilih ke dalam variabel JavaScript
          let tahun = selectedValue;
          // alert(tahun);
    
          $.ajax({
            url: '/dashboard/getPieChart/' + tahun,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var a = response.iuran[0];
                var b = parseInt(response.iuran[1]);
                console.log(b);
                // set value percen
                if (response.percentage < 0) {
                  document.getElementById("percen").innerText = response.percentage + "%";
                } else {
                  document.getElementById("percen").innerText = "+" + response.percentage + "%";
                }

                // method untuk update data yang akan divisualisasikan pada chart
                chart.updateSeries([
                  a, b
                ], true)
            },
            error: function() {
              console.log('gagal ambil data');  
              // alert('Gagal mengambil data pengguna dan postingan');
              }
            });
        });

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