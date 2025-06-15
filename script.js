// ini untuk sidebar
const hamburger = document.querySelector(".toggle-btn");
hamburger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
});

// ini tabel dari chart.js
new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
      labels: ["Januari", "Februari", "Maret", "April"],
      datasets: [
        {
          label: "Donat",
          backgroundColor: "#D77FA1",
          data: [133,221,783,2478]
        }, {
          label: "Kue",
          backgroundColor: "rgb(150, 17, 98)",
          data: [408,547,675,734]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Donut & Cake Sales Report'
      }
    }
});

//JavaScript untuk database
document.addEventListener('DOMContentLoaded', function () {
var hapusModal = document.getElementById('modalHapusCustomer');
hapusModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    var id = button.getAttribute('data-id');
    var input = document.getElementById('idToDelete');
    input.value = id;
});
});