/* Plotted graphs using Chart.js */

// Top Countries With Most Accidents Chart
const countriesGraph = document.getElementById('topCountries');

const configCountries = {
  type: 'bar',
  data: {
    labels: ['USA', 'UK', 'Canada', 'India', 'China', 'Japan', 'Russia', 'Brazil', 'Germany',
        'Australia'
    ],
    datasets: [{
      label: 'Accident Count',
      data: [12, 19, 3, 5, 2, 6, 3, 9, 6, 3],
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

new Chart(countriesGraph, configCountries);


// Most Common Accident Cause
const accidentGraph = document.getElementById('accidentCause');

const configAccident = {
  type: 'bar',
  data: {
    labels: ['Weather', 'Mechanical Failure', 'Distracted Driving', 'Speeding', 'Drunk Driving'],
    datasets: [{
      label: 'Accident Count',
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

new Chart(accidentGraph, configAccident);

// Accidents Over Time Graph
const timeGraph = document.getElementById('myChart');

const timeConfig = {
  type: 'line',
  data: {
    labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 5, 2, 3],
      fill: true,
      borderColor: '#5d88be',
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

}

new Chart(timeGraph, timeConfig);



// Cars Involved Chart
const carsGraph = document.getElementById("carsInvolved");

const carsConfig = {
    type: 'pie',
    data: {
        labels: ['1', '2', '3', '4'],
        datasets: [{
            label: '',
            data: [10, 20, 30, 10],
            backgroundColor: ['#213f5b', '#33597c', '#678aa9', '#6d89a0'],
            borderColor: ['black', 'black', 'black'],
        }]
    }
}

new Chart(carsGraph, carsConfig)