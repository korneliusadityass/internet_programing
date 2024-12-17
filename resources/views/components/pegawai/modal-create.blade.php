<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="control-label">Nama</label>
                    <input type="text" class="form-control" id="nama">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
                </div>


                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" class="form-control" id="email">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-email"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-alamat"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Tanggal Lahir</label>
                    <input type="text" class="form-control" id="tanggal Lahir">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tanggal Lahir"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">No Hp</label>
                    <input type="text" class="form-control" id="nohp">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nohp"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Gaji</label>
                    <input type="text" class="form-control" id="gaji">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-gaji"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Status</label>
                </div><div class="col status-swith">
                    <label class="form-control switch">
                        <input id="status" name="status" type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>


                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input type="password" class="form-control" id="password">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-password"></div>
                </div>

                <div class="form-group">
                    <label for="role" class="control-label">Role</label>
                    <select class="form-control" id="role">

                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-role"></div>
                </div>

                <div class="form-group">
                    <label for="department" class="control-label">Department</label>
                    <select class="form-control" id="department">

                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-department"></div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-create-post', function () {
    $('#modal-create').modal('show');

    $.ajax({
        url: '/carirole', // Menggunakan route yang telah didefinisikan
        type: 'GET',
        success: function(response) {
            let roleDropdown = $('#role');
            roleDropdown.empty(); // Clear existing options

            // Populate dropdown with data from response
            response.data.forEach(function(role) {
                let option = `<option value="${role.id}">${role.nama} </option>`;
                roleDropdown.append(option);
            });
        },
        error: function(error) {
            console.error('Error fetching role data', error);
        }
    });

    $.ajax({
        url: '/caridepartment', // Menggunakan route yang telah didefinisikan
        type: 'GET',
        success: function(response) {
            let departmentDropdown = $('#department');
            departmentDropdown.empty(); // Clear existing options

            // Populate dropdown with data from response
            response.data.forEach(function(department) {
                let option = `<option value="${department.id}">${department.nama} </option>`;
                departmentDropdown.append(option);
            });
        },
        error: function(error) {
            console.error('Error fetching department data', error);
        }
    });
});


    //action create post
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let nama   = $('#nama').val();
        let email = $('#email').val();
        let alamat = $('#alamat').val();
        let tanggal_lahir = $('#tanggal_lahir').val();
        let nohp = $('#nohp').val();
        let gaji = $('#gaji').val();
        let status = $('#status').val();
        let password = $('#password').val();
        let id_role = $('#role').val();
        let id_department = $('#department').val();
        let token   = $("meta[name='csrf-token']").attr("content");

        //ajax
        $.ajax({

            url: `/pegawai`,
            type: "POST",
            cache: false,
            data: {
                "nama": nama,
                "alamat": alamat,
                "email": email,
                "nohp": nohp,
                "tanggal_lahir": tanggal_lahir,
                "gaji": gaji,
                "nohp": nohp,
                "status": status,
                "password": password,
                "id_role": id_role,
                "id_department": id_department,
                "_token": token
            },
            success:function(response){

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,

                });

                //data post
                let post = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.nama}</td>
                        <td>${response.data.email}</td>
                        <td>${response.data.alamat}</td>
                        <td>${response.data.nohp}</td>
                        <td>${response.data.gaji}</td>
                        <td>${response.data.tanggal_lahir}</td>
                        <td>${response.data.password}</td>
                        <td>${response.data.status}</td>
                        <td>${response.data.role.nama}</td>
                        <td>${response.data.department.nama}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;

                //append to table
                $('#table-posts').prepend(post);

                //clear form
                $('#nama').val('');
                $('#alamat').val('');
                $('#email').val('');
                $('#nohp').val('');
                $('#tanggal_lahir').val('');
                $('#gaji').val('');
                $('#status').val('');
                $('#password').val('');
                $('#role').val('');
                $('#department').val('');

                //close modal
                $('#modal-create').modal('hide');


            },
            error:function(error){

                if(error.responseJSON.nama[0]) {

                    //show alert
                    $('#alert-nama').removeClass('d-none');
                    $('#alert-nama').addClass('d-block');

                    //add message to alert
                    $('#alert-nama').html(error.responseJSON.nama[0]);
                }

                if(error.responseJSON.alamat[0]) {

                    //show alert
                    $('#alert-alamat').removeClass('d-none');
                    $('#alert-alamat').addClass('d-block');

                    //add message to alert
                    $('#alert-alamat').html(error.responseJSON.alamat[0]);
                }

                if(error.responseJSON.email[0]) {

                    //show alert
                    $('#alert-email').removeClass('d-none');
                    $('#alert-email').addClass('d-block');

                    //add message to alert
                    $('#alert-email').html(error.responseJSON.email[0]);
                }
                if(error.responseJSON.password[0]) {

                    //show alert
                    $('#alert-password').removeClass('d-none');
                    $('#alert-password').addClass('d-block');

                    //add message to alert
                    $('#alert-password').html(error.responseJSON.email[0]);
                }
                if(error.responseJSON.nohp[0]) {

                    //show alert
                    $('#alert-nohp').removeClass('d-none');
                    $('#alert-nohp').addClass('d-block');

                    //add message to alert
                    $('#alert-nohp').html(error.responseJSON.email[0]);
                }
                if(error.responseJSON.gaji[0]) {

                    //show alert
                    $('#alert-gaji').removeClass('d-none');
                    $('#alert-gaji').addClass('d-block');

                    //add message to alert
                    $('#alert-gaji').html(error.responseJSON.email[0]);
                }
                if(error.responseJSON.status[0]) {

                    //show alert
                    $('#alert-status').removeClass('d-none');
                    $('#alert-status').addClass('d-block');

                    //add message to alert
                    $('#alert-status').html(error.responseJSON.email[0]);
                }

                if(error.responseJSON.id_role[0]) {

                    //show alert
                    $('#alert-role').removeClass('d-none');
                    $('#alert-role').addClass('d-block');

                    //add message to alert
                    $('#alert-role').html(error.responseJSON.id_role[0]);
                }
                if(error.responseJSON.id_department[0]) {

                    //show alert
                    $('#alert-deparid_department').removeClass('d-none');
                    $('#alert-deparid_department').addClass('d-block');

                    //add message to alert
                    $('#alert-deparid_department').html(error.responseJSON.id_role[0]);
                }

            }

        });

    });

</script>
