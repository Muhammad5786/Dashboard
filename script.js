// ini untuk sidebar
const hamburger = document.querySelector(".toggle-btn");
hamburger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
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

document.addEventListener('DOMContentLoaded', function () {
    var hapusModal = document.getElementById('modalHapusOrder');
    hapusModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');
        var input = document.getElementById('orderIdToDelete');
        input.value = id;
    });
    });

document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('modalEditStatus');
    if (!modal) {
        console.error("Modal tidak ditemukan");
        return;
    }

    modal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        if (!button) {
            console.error("Tombol trigger tidak ditemukan");
            return;
        }

        var id = button.getAttribute('data-id');
        var status = button.getAttribute('data-status');

        console.log("Opera GX debug:", { id, status }); // <--- Tambahkan debug ini

        // Isi form
        modal.querySelector('#id_detail').value = id;
        modal.querySelector('#status').value = status;
    });
});

//Bar chart
fetch('php/get_chart_data.php') // Ganti path jika perlu
  .then(response => response.json())
  .then(data => {
    const ctx = document.getElementById('bar-chart-grouped').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: data.labels,
        datasets: [{
          label: 'Jumlah Terjual',
          data: data.values,
          backgroundColor: "rgb(150, 17, 98)",
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1,
          borderRadius: 5
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 10
            }
          }
        }
      }
    });
  });