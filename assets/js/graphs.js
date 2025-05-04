/* Plotted graphs using Chart.js */

// Top Countries With Most Accidents Chart
const configCountries = {
  type: 'bar',
  data: {
    labels: ['Australia', 'Brazil', 'Canada', 'China', 'Germany', 'India', 'Japan', 'Russia', 'UK', 'USA'
    ],
    datasets: [{
      label: '# Of Accidents',
      data: [],
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


// Most Common Accident Cause
const configAccident = {
  type: 'bar',
  data: {
    labels: [],
    datasets: [{
      label: '# Of Accidents',
      data: [],
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

// Accidents Over Time Graph

const timeConfig = {
  type: 'line',
  data: {
    labels: [],
    datasets: [{
      label: '# Of Accidents',
      data: [],
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


// Cars Involved Chart
const carsConfig = {
  type: 'pie',
  data: {
    labels: [],
    datasets: [{
      label: '# Of Accidents',
      data: [],
      backgroundColor: ['#213f5b', '#33597c', '#678aa9', '#6d89a0'],
      borderColor: ['black', 'black', 'black'],
    }]
  },
  options: {
    plugins: {
      datalabels: {
        formatter: (value, context) => {
          const dataset = context.chart.data.datasets[0].data.map(Number);
          const total = dataset.reduce((acc, val) => acc + val, 0);
          const percentage = ((value / total) * 100).toFixed(1);
          return `${percentage}%`;
        },
        color: '#ededeb',
        font: {
          weight: 'bold',
          size: 30
        }
      }
    }
  },
  plugins: [ChartDataLabels]
}

// Charts initialization
const countriesGraph = new Chart(document.getElementById('topCountries'), configCountries);
const accidentGraph = new Chart(document.getElementById('accidentCause'), configAccident);
const carsGraph = new Chart(document.getElementById("carsInvolved"),carsConfig);
const timeGraph = new Chart(document.getElementById('myChart'), timeConfig);

/* Functions to update the charts */
function updateCountriesGraph(countryAccident) {
  countriesGraph.data.datasets[0].data = countryAccident.count
  countriesGraph.update();
}

function updateAccidentCauseGraph(accidentType) {
  accidentGraph.data.labels = accidentType.accidentCause;
  accidentGraph.data.datasets[0].data = accidentType.count;
  accidentGraph.update();
}

function updateCarsGraph(involvedCars) {
  carsGraph.data.labels = involvedCars.involvedCars;
  carsGraph.data.datasets[0].data = involvedCars.count;
  carsGraph.update();
}

function updateTimeGraph(crashDay) {
  timeGraph.data.labels = crashDay.crashDay;
  timeGraph.data.datasets[0].data = crashDay.count;
  timeGraph.update();
}