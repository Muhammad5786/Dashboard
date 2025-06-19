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

    const modalHapus = document.getElementById('modalHapusStock');

    modalHapus.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const idStok = button.getAttribute('data-id');

        const inputHidden = modalHapus.querySelector('#hapus-id-stok');
        inputHidden.value = idStok;
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

const modal = document.getElementById('modalEditCustomer');
modal.addEventListener('show.bs.modal', function (event) {
  const button = event.relatedTarget;

  // Ambil data dari tombol
  const id = button.getAttribute('data-id');
  const nama = button.getAttribute('data-nama');
  const noHp = button.getAttribute('data-no_hp');
  const deskripsi = button.getAttribute('data-deskripsi');
  const alamat = button.getAttribute('data-alamat');

  // Set data ke form modal
  modal.querySelector('#id_pelanggan').value = id;
  modal.querySelector('#nama').value = nama;
  modal.querySelector('#no_hp').value = noHp;
  modal.querySelector('#deskripsi').value = deskripsi;
  modal.querySelector('#alamat').value = alamat;
});

document.addEventListener('DOMContentLoaded', function () {
    const modalEditStok = document.getElementById('modalEditStok');

    modalEditStok.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;

      // Ambil data dari atribut
      const idStok = button.getAttribute('data-id_stok') || '';
      const nama = button.getAttribute('data-nama') || '';
      const jumlah = button.getAttribute('data-jumlah') || '';
      const harga = button.getAttribute('data-harga') || '';
      const satuanBeli = button.getAttribute('data-satuan_beli') || '';

      // Set ke input
      modalEditStok.querySelector('#id_stok').value = idStok;
      modalEditStok.querySelector('#nama_stok').value = nama;
      modalEditStok.querySelector('#jumlah_stok').value = jumlah;
      modalEditStok.querySelector('#harga_stok').value = harga;
      modalEditStok.querySelector('#satuan_beli_stok').value = satuanBeli;
    });
  });