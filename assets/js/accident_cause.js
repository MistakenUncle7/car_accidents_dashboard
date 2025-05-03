
const ctx = document.getElementById('accidentCause');

const config = {
  type: 'bar',
  data: {
    labels: ['Weather', 'Mechanical Failure', 'Distracted Driving', 'Speeding', 'Drunk Driving'],
    datasets: [{
      label: 'Accidents',
      data: [12, 19, 3, 5, 2],
      borderWidth: 1
    }]
  },
  options: {
    indexAxis: 'y',
    responsive: true,
    scales: {
      x: {
        beginAtZero: true
      }
    }
  }
};

new Chart(ctx, config);