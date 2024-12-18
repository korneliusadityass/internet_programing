<script>
$('body').on('click', '#btn-delete-post', function () {
    let id = $(this).data('id');
    let token = $("meta[name='csrf-token']").attr("content");

    Swal.fire({
    title: 'Apakah Kamu Yakin?',
    text: "Ingin menghapus data ini!",
    type: 'warning',
    showCancelButton: true,
    cancelButtonColor: '#d33',
    cancelButtonText: 'TIDAK',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'YA, HAPUS!'
}).then((result) => {

    // Ganti dari isConfirmed ke result.value
    if (result.value) {
        console.log('Tombol konfirmasi diklik');
        console.log('Memulai permintaan AJAX...');
        $.ajax({
            url: `/pegawai/${id}`,
            type: "DELETE",
            headers: {
                'X-CSRF-TOKEN': token
            },
            success: function (response) {
                console.log('Response:', response); // Debugging response
                if (response.success) {
                    Swal.fire({
                        type: 'success',
                        title: response.message || 'Data berhasil dihapus!',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $(`#index_${id}`).remove(); // Hapus elemen baris tabel
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Gagal!',
                        text: response.message || 'Data tidak dapat dihapus.',
                    });
                }
            },
            error: function (xhr, status, error) {
                console.log('AJAX error:', error); // Debugging error
                console.log('XHR:', xhr); // Periksa respons dari server
                Swal.fire({
                    type: 'error',
                    title: 'Error!',
                    text: 'Terjadi kesalahan saat menghapus data.'
                });
            }
        });
    } else {
        console.log('Tombol dibatalkan');
    }
});

});

</script>
