
const ctx = document.getElementById('accidentCause');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Weather', 'Mechanical Failure', 'Distracted Driving', 'Speeding', 'Drunk Driving'],
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 5, 2, 3],
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


const config = {
  type: 'bar',
  data,
  options: {
    indexAxis: 'y',
  }
};