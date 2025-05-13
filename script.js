const hamburger = document.querySelector(".toggle-btn");

hamburger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
});


new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
      labels: ["1900", "1950", "1999", "2050"],
      datasets: [
        {
          label: "Donat",
          backgroundColor: "#D77FA1",
          data: [133,221,783,2478]
        }, {
          label: "Kue",
          backgroundColor: "#D6E5FA",
          data: [408,547,675,734]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Population growth (millions)'
      }
    }
});