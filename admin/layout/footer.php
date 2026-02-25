<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


<script>
    $(document).ready(function () {
        $('.datatable').DataTable({
            responsive: true,
            pageLength: 5,
            lengthChange: false,
            language: {
                search: "🔍 Cari:",
                paginate: {
                    previous: "⬅️",
                    next: "➡️"
                },
                emptyTable: "Data belum tersedia"
            }
        });
    });
</script>
<script>
    function confirmDelete(url) {
        if (confirm("⚠️ Yakin ingin menghapus data ini?")) {
            window.location.href = url;
        }
    }
</script>
<script>
    $(document).ready(function () {
        $('.datatable').DataTable({
            responsive: true,
            pageLength: 5,
            lengthChange: false,
            searching: true, // 🔍 aktifkan pencarian
            ordering: true,
            info: true,
            language: {
                search: "🔍 Cari data:",
                zeroRecords: "Data tidak ditemukan",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                infoEmpty: "Data kosong",
                paginate: {
                    previous: "⬅️",
                    next: "➡️"
                }
            }
        });
    });
</script>
</div> <!-- /.wrapper -->

<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>

<script>
const toggleBtn = document.getElementById('darkToggle');
const icon = document.getElementById('darkIcon');
const body = document.body;

// cek mode tersimpan
if (localStorage.getItem('darkMode') === 'enabled') {
    body.classList.add('dark-mode');
    icon.classList.replace('bi-moon-fill', 'bi-sun-fill');
}

// toggle
toggleBtn.addEventListener('click', () => {
    body.classList.toggle('dark-mode');

    if (body.classList.contains('dark-mode')) {
        localStorage.setItem('darkMode', 'enabled');
        icon.classList.replace('bi-moon-fill', 'bi-sun-fill');
    } else {
        localStorage.setItem('darkMode', 'disabled');
        icon.classList.replace('bi-sun-fill', 'bi-moon-fill');
    }
});
</script>



</body>
</html>
