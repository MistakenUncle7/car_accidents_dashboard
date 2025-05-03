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
      label: 'Accident num',
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
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 5, 2, 3],
      fill: true,
      borderColor: 'rgb(75, 192, 192)',
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



// Weather Conditions Chart
const carsGraph = document.getElementById("carsInvolved");

const carsConfig = {
    type: 'pie',
    data: {
        labels: ['Red', 'Blue', 'Yellow'], // Labels for each segment
        datasets: [{
            label: 'My Pie Chart', // Title of the dataset
            data: [10, 20, 30], // Values for each segment
            backgroundColor: ['red', 'blue', 'yellow'], // Colors for each segment
            borderColor: ['black', 'black', 'black'], // Border color for each segment
        }]
    }
}

new Chart(carsGraph, carsConfig)