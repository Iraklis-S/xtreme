document.addEventListener('DOMContentLoaded', function () {
    function updateLineChart(data) {
        var ctx = document.getElementById('balanceChart').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.labels,
                datasets: [{
                    type: 'bar',
                    label: 'Balance',
                    data: data.balanceData,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        labels: {
                           
                            font: {
                                size: 10
                            }
                        }
                    }
                },
                indexAxis: 'y',
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function fetchChartData() {
        fetch('/chart-data')
            .then(response => response.json())
            .then(data => {
                updateLineChart(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    fetchChartData();

    window.addEventListener('beforeunload', fetchChartData);
    
});


document.addEventListener('DOMContentLoaded', function () {
  
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['OK', 'WARNING', 'CRITICAL', 'UNKNOWN'],
        datasets: [{
          label: '# of Tomatoes',
          data: [12, 19, 3, 5],
          backgroundColor: [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
           //cutoutPercentage: 40,
        responsive: false,
    
      }
    });
    });
