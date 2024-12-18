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

                <div class="form-group align-items-center">
                    <label class="control-label me-2">Tanggal Lahir</label>
                    <div class="d-flex align-items-center position-relative">
                        <input type="text" class="date form-control" readonly style="background-color: white;" id="tanggal_lahir">
                        <i class="fa-solid fa-calendar-days ms-2 position-absolute" style="right: 10px;"></i>
                    </div>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tanggal_lahir"></div>
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

    $('#gaji').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    // //action create post

$('#store').click(function(e) {
    e.preventDefault();

    // Define variable
    let nama   = $('#nama').val();
    let email = $('#email').val();
    let alamat = $('#alamat').val();
    let gaji = $('#gaji').val();
    let tanggal_lahir = $('#tanggal_lahir').val();
    let nohp = $('#nohp').val();
    let password = $('#password').val();
    let id_role = $('#role').val();
    let id_department = $('#department').val();
    let token   = $("meta[name='csrf-token']").attr("content");

    // Log the formatted date
    const months = {
        'Januari': 1, 'Februari': 2, 'Maret': 3, 'April': 4, 'Mei': 5, 'Juni': 6,
        'Juli': 7, 'Agustus': 8, 'September': 9, 'Oktober': 10, 'November': 11, 'Desember': 12
    };

    // Split the date by space
    let dateParts = tanggal_lahir.split(' ');

    // Check if the date format is valid (should have 3 parts: DD, MonthName, YYYY)
    if (dateParts.length === 3) {
        // Extract day, month name, and year
        let day = dateParts[0];
        let monthName = dateParts[1];
        let year = dateParts[2];

        // Get the numeric month from the month name
        let month = months[monthName];

        if (month) {
            // Construct the formatted date in 'YYYY-MM-DD' format
            let formattedTanggalLahir = `${year}-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

            // Log the formatted date
            console.log("Formatted Tanggal Lahir: " + formattedTanggalLahir);

            // Check if the date is valid before proceeding
            if (!moment(formattedTanggalLahir, 'YYYY-MM-DD', true).isValid()) {
                console.error('Invalid date format');
                return; // stop execution if the date is invalid
            }

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
                    "tanggal_lahir": formattedTanggalLahir,
                    "gaji": gaji,
                    "password": password,
                    "id_role": id_role,
                    "id_department": id_department,
                    "_token": token
                },
                success:function(response){
                    // Show success message
                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 3000
                    });
                    // Add new row to table
                    let post = `
                        <tr id="index_${response.data.id}">
                            <td>${response.data.nama}</td>
                            <td>${response.data.email}</td>
                            <td>${response.data.alamat.length > 20 ? response.data.alamat.substring(0, 20) + ' ...' : response.data.alamat}</td>
                            <td>${response.data.gaji}</td>
                            <td>${moment(response.data.tanggal_lahir).locale('id').format('DD MMMM YYYY')}</td>
                            <td>${response.data.nohp}</td>
                            <td>${response.data.role.nama}</td>
                            <td>${response.data.department.nama}</td>
                            <td class="text-center">
                                <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}" class="btn btn-sm btn-outline-warning">EDIT</a>
                                <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-sm btn-outline-danger">DELETE</a>
                            </td>
                        </tr>
                    `;

                    // Prepend new row to the table
                    $('#table-posts').prepend(post);

                    // Clear form inputs
                    $('#nama').val('');
                    $('#alamat').val('');
                    $('#email').val('');
                    $('#nohp').val('');
                    $('#tanggal_lahir').val('');
                    $('#gaji').val('');
                    $('#password').val('');
                    $('#role').val('');
                    $('#department').val('');

                    // Close the modal
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
            } else {
                console.error('Invalid month name');
            }
        } else {
            console.error('Invalid date format');
        }
    });

</script>
