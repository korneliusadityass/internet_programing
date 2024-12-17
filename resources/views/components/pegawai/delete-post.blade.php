<script>
    //button create post event
    $('body').on('click', '#btn-delete-post', function () {
    let post_id = $(this).data('id');
    let token = $("meta[name='csrf-token']").attr("content");

    Swal.fire({
        title: 'Apakah Kamu Yakin?',
        text: "ingin menghapus data ini!",
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        cancelButtonText: 'TIDAK',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'YA, HAPUS!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/pegawai/${post_id}`,
                type: "DELETE",
                cache: false,
                data: {
                    "_token": token
                },
                success: function (response) {
                    Swal.fire({
                        type: 'success',
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 3000
                    });
                    // Remove post from table only after successful deletion
                    $(`#index_${post_id}`).remove();
                },
                error: function (error) {
                    console.error("Error deleting data:", error);
                    Swal.fire({
                        type: 'error',
                        title: 'Error!',
                        text: 'Gagal menghapus data.'
                    });
                }
            });
        }
    });
});
</script>
