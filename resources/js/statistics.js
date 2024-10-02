const statistics = function () {
    const statisticsModule = document.querySelector('.statistics-module');
    if (!statisticsModule) return;
    
    function generateBarChart() {

        const chartContainer = document.querySelector('.chart-container');
        const data = JSON.parse(chartContainer.dataset.chart);

        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data['genders']['labels'],
                datasets: [{
                    label: 'Miembros por género',
                    data: data['genders']['data'],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function generateDoughnutChart() {


        const chartContainer2 = document.querySelector('.chart-container2');
        const data = JSON.parse(chartContainer2.dataset.chart);

        var ctx = document.getElementById('doughnutChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data : {
                labels: data['ages']['labels'],
                datasets: [{
                    label: 'Miembros por edades',
                    data: data['ages']['data'],
                  backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)'
                  ],
                  hoverOffset: 4
                }]
              }
        });
    }

    generateBarChart();
    generateDoughnutChart();

}

export default statistics;