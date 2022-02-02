var xValues = ["65%", "45%", "30%", "25", "15%"];
var yValues = [65, 45, 30, 25, 15];
var barColors = [
  "#00008B",
  "#FF0000",
  "#FFE4B5",
  "#FFDAB9",
  "#1e7145"
];

new Chart("myChart3", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Consommation"
    }
  }
});