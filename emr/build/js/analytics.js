var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
type: 'line',
data: {
    labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
    datasets: [
        {
            label: 'Sleep Pattern',
            data: [10, 4, 3, 5, 2, 3, 8],
            backgroundColor: [
                'rgba(255, 255, 255, 0.1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 5,
        },
        {
            label: 'Eatting Pattern',
            data: [9, 8.5, 6.5, 5, 9, 8, 6],
            backgroundColor: [
                'rgba(255, 255, 255, 0.1)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 5
        },
        {
            label: 'Changes in Mood',
            data: [4, 4.5, 3.5, 5, 7, 2, 7],
            backgroundColor: [
                'rgba(255, 255, 255, 0.1)'
            ],
            borderColor: [
                'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 5
        },
        {
            label: 'Self-Esteem',
            data: [3, 2.5, 5, 7, 8, 3, 7.5],
            backgroundColor: [
                'rgba(255, 255, 255, 0.1)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 5
        },
    ]
},
options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
}
});