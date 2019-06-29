window.workspaceScript = new function () {
  _this = this;

  Chart.helpers.merge(Chart.defaults.global.plugins.datalabels, {
    color: '#fff',
    anchor: 'end',
    clamp: true,
    align: 'start'
  });

  window.randomScalingFactor = function () {
    return Math.round(Samples.utils.rand(0, 200));
  };

  window.randomScalingFactorNeg = function () {
    return Math.round(Samples.utils.rand(-200, 0));
  };

  var YEARS = ["2015", "2016", "2017", "2018"];
  var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  var MONTHS_Short = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
  var MONTHS_Short = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
  var MONTHS_Short_Year = [['Jan \'18'], ['Feb \'18'], ['Mar \'18'], ['Apr \'18'], ['May \'18'], ['Jun \'18'], ['Jul \'18'], ['Aug \'18'], ['Sep \'18'], ['Oct \'18'], ['Nov \'18'], ['Dec \'18']];
  var Colors = ["#017DC5", "#04104A", "#54ACBA", "#EA4436", "#FCB124", "#F03337", "#9158ff"];
  //var ColorsTrans = ["#8BAAD155", "#0099e655", "#8CBC4F55", "#01b53055", "#ff606055", "#e2003155", "#2a3aff55"];

  var makeTrans = function (color) {
    return color + "88";
  }


  var makeTransRGB = function (color) {
    console.log("rgba" + color.substr(3, name.length - 1) + ",0.5)");
    return "rgba" + color.substr(3, name.length - 1) + ",0.5)";
  }

  var makeTrans1 = function (color) {
    return color + "33";
  }

  //var color = Chart.helpers.color;

  var MrrData = {
    labels: MONTHS_Short_Year.slice(0, 4),
    datasets: [     
      {
        type: 'bar',
        label: 'TITLE 1',
        backgroundColor: Colors[1],
        borderColor: Colors[1],
        pointHoverBackgroundColor: Colors[1],
        borderWidth: 0,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ]
      }, {
        type: 'bar',
        label: 'TITLE 2',
        backgroundColor: Colors[3],
        borderColor: Colors[3],

        borderWidth: 0,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ]
      },
      {
        type: 'bar',
        label: 'TITLE 3',
        backgroundColor: Colors[4],
        borderColor: Colors[4],
        borderWidth: 0,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ]
      },
      {
        type: 'bar',
        label: 'TITLE 4',
        backgroundColor: Colors[0],
        borderColor: Colors[0],

        borderWidth: 0,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ]
      }
    ]
  };

  var AttrData = {
    labels: MONTHS_Short_Year.slice(0, 4),
    datasets: [      
      {
        type: 'line',
        label: 'TITLE 1',
        backgroundColor: 'transparent',
        borderColor: Colors[1],
        pointHoverBackgroundColor: Colors[1],
        borderWidth: 2,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ]
      }, {
        type: 'line',
        label: 'TITLE 2',
        backgroundColor: 'transparent',
        borderColor: Colors[3],

        borderWidth: 2,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ]
      },
      {
        type: 'line',
        label: 'TITLE 3',
        backgroundColor: 'transparent',
        borderColor: Colors[4],
        borderWidth: 2,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ]
      },
      {
        type: 'line',
        label: 'TITLE 4',
        backgroundColor: 'transparent',
        borderColor: Colors[0],
        borderWidth: 2,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ]
      }
    ]
  };

  var ArrData = {
    labels: ["TITLE 1", "TITLE 2", "TITLE 3", "TITLE 4"],
    datasets: [{
      data: [
        randomScalingFactor(),
        randomScalingFactor(),
        randomScalingFactor(),
        randomScalingFactor(),
      ],
      backgroundColor: [
        Colors[1],
        Colors[3],
        Colors[4],
        Colors[0],
      ],
      label: 'Dataset 1'
    }
    ]
  };

  var AttData = {
    labels: ["expired", "expiring < 30 days", "expiring 31 - 60 days", "not dude for renewal", "open ended"],
    datasets: [{
      data: [
        randomScalingFactor(),
        randomScalingFactor(),
        randomScalingFactor(),
        randomScalingFactor(),
        randomScalingFactor()
      ],
      backgroundColor: [
        Colors[0],
        Colors[1],
        Colors[2],
        Colors[3],
        Colors[4]
      ],
      label: 'Dataset 1'
    }
    ]
  };

  _this.chartMRR = function () {
    var ctx = document.getElementById('cnvMRR').getContext('2d');
    window.chartMRR = new Chart(ctx, {
      type: 'bar',
      data: MrrData,
      options: {
        maintainAspectRatio: false,
        elements: {
          line: {
            tension: 0.000001
          }
        },
        title: {
          display: false,
          text: ''
        },
        legend: {
          display: true,
          position: "bottom"
        },
        tooltips: {
          mode: 'index',
          intersect: true
        },
        responsive: true,
        scales: {
          xAxes: [{

            stacked: false,
            gridLines: {
              display: false,
              drawBorder: false
            }
          }],
          yAxes: [
            {
              /*
            ticks: {
              callback: function (label, index, labels) {
                return "$ " + label + 'K';
              }
            }
            ,*/
              stacked: false

            }]
        }
      }

    });
  }

  _this.chartATTR = function () {
    var ctx = document.getElementById('cnvATTR').getContext('2d');
    window.chartATTR = new Chart(ctx, {
      type: 'line',
      data: AttrData,
      options: {
        plugins: {
          // Change options for ALL labels of THIS CHART
          datalabels: {
            color: '#04104A',
            align: 'top'
          }
        },
        title: {
          display: false,
          text: ''
        },
        legend: {
          display: true,
          position: "bottom"
        },
        tooltips: {
          mode: 'index',
          intersect: true
        },
        responsive: true,
        maintainAspectRatio: false
      }
    });
  }

  _this.chartARR = function () {
    var ctx = document.getElementById('cnvARR').getContext('2d');
    window.chartARR = new Chart(ctx, {
      type: 'pie',
      data: ArrData,
      options: {
        title: {
          display: false,
          text: 'ARR Summary'
        },
        legend: {
          display: true,
          position: "bottom"
        },
        tooltips: {
          mode: 'index',
          intersect: false
        },
        responsive: true,
        maintainAspectRatio: false
      }
    });
  }

  _this.chartATT = function () {
    var ctx = document.getElementById('cnvATT').getContext('2d');
    window.chartARR = new Chart(ctx, {
      type: 'pie',
      data: AttData,
      options: {
        title: {
          display: false,
          text: 'ARR Summary'
        },
        legend: {
          display: true,
          position: "bottom"
        },
        tooltips: {
          mode: 'index',
          intersect: false
        },
        responsive: true,
        maintainAspectRatio: false
      }
    });
  }

  _this.chartAging = function () {
    var ctx = document.getElementById('cnvAging').getContext('2d');
    window.chartAging = new Chart(ctx, {
      type: 'horizontalBar',
      data: {
        labels: [
          "0-30 days",
          "31-60 days",
          "61-90 days",
          "91-120 days",
          "Above 120 days"
        ],
        datasets: [
          {
            label: 'Aging',
            backgroundColor: [
              Colors[0],
              Colors[1],
              Colors[2],
              Colors[3],
              Colors[4]
            ],
            data: [
              randomScalingFactor(),
              randomScalingFactor(),
              randomScalingFactor(),
              randomScalingFactor(),
              randomScalingFactor(),
              randomScalingFactor(),
              randomScalingFactor()
            ]
          }
        ]
      },
      options: {
        responsive: false,
        maintainAspectRatio: false,
        legend: {
          position: 'right',
          display: false
        }
      }
    });
  }

  _this.chartReveue = function () {
    var ctx = document.getElementById('cnvRevenue').getContext('2d');
    window.chartRevenue = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Chennai", "Mumbai", "Pune", "Delhi", "Chennai", "Mumbai", "Pune", "Delhi", "Chennai", "Mumbai", "Pune", "Delhi"],
        datasets: [{
          label: '',
          borderColor: Colors[2],
          backgroundColor: Colors[2],
          data: [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
          ]
        }]
      },
      options: {
        legend: {
          display: false,
          position: "bottom"
        },
        elements: {
          line: {
            tension: 0.000001
          }
        },
        maintainAspectRatio: false,
        responsive: true,
        title: {
          display: false,
          text: 'Revenue'
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: false,
              labelString: 'Month'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },

          }],
          yAxes: [{

            display: true,
            scaleLabel: {
              display: false,
              labelString: 'Value'
            },

          }]
        }
      }
    });
  }

  _this.onLoad = function () {
    _this.chartMRR();
    _this.chartATTR();
    _this.chartARR();

    //_this.chartATT();
    //_this.chartAging();
    //_this.chartReveue();
  };
}