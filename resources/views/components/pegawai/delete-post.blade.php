<script>
$('body').on('click', '#btn-delete-post', function () {
    let id = $(this).data('id');
    console.log('ID yang akan dihapus:', id);  // Pastikan id terambil dengan benar
    let token = $("meta[name='csrf-token']").attr("content");

    Swal.fire({
    title: 'Apakah Kamu Yakin?',
    text: "Ingin menghapus data ini!",
    icon: 'warning',
    showCancelButton: true,
    cancelButtonColor: '#d33',
    cancelButtonText: 'TIDAK',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'YA, HAPUS!'
}).then((result) => {
    console.log('Hasil dari SweetAlert:', result); // Debugging hasil SweetAlert
    console.log('result.value:', result.value); // Memeriksa apakah value ada

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
                        icon: 'success',
                        title: response.message || 'Data berhasil dihapus!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $(`#index_${id}`).remove(); // Hapus elemen baris tabel
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: response.message || 'Data tidak dapat dihapus.',
                    });
                }
            },
            error: function (xhr, status, error) {
                console.log('AJAX error:', error); // Debugging error
                console.log('XHR:', xhr); // Periksa respons dari server
                Swal.fire({
                    icon: 'error',
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
