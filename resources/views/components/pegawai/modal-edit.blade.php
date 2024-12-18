<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="post_id">

                <div class="form-group">
                    <label for="name" class="control-label">Nama</label>
                    <input type="text" class="form-control" id="nama-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-edit"></div>
                </div>


                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" class="form-control" id="email-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-email-edit"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-alamat-edit"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Gaji</label>
                    <input type="text" class="form-control" id="gaji-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-gaji-edit"></div>
                </div>

                <div class="form-group align-items-center">
                    <label class="control-label me-2">Tanggal Lahir</label>
                    <div class="d-flex align-items-center position-relative">
                        <input type="text" class="date form-control" readonly style="background-color: white;" id="tanggal_lahir-edit">
                        <i class="fa-solid fa-calendar-days ms-2 position-absolute" style="right: 10px;"></i>
                    </div>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tanggal_lahir-edit"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">No Hp</label>
                    <input type="text" class="form-control" id="nohp-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nohp-edit"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input type="password" class="form-control" id="password-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-password"></div>
                </div>

                <div class="form-group">
                    <label for="role" class="control-label">Role</label>
                    <select class="form-control" id="role-edit">

                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-role-edit"></div>
                </div>

                <div class="form-group">
                    <label for="department" class="control-label">Department</label>
                    <select class="form-control" id="department-edit">

                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-department-edit"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="update">UPDATE</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('body').on('click', '#btn-edit-post', function () {
        let post_id = $(this).data('id');
        $('#gaji-edit').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
        console.log('ID yang akan diedit:', post_id);
        moment.updateLocale('id', {
            months: [
                    "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                ]
        });
        // Fetch detail post with ajax
        $.ajax({
            url: `/pegawai/${post_id}`,
            type: "GET",
            cache: false,
            success:function(response) {
                // Fill data to form
                $('#post_id').val(response.data.id);
                $('#nama-edit').val(response.data.nama);
                $('#email-edit').val(response.data.email);
                $('#alamat-edit').val(response.data.alamat);
                $('#gaji-edit').val(response.data.gaji);
                $('#password-edit').val(response.data.password);
                $('#tanggal_lahir-edit').val(moment(response.data.tanggal_lahir).locale('id').format('DD MMMM YYYY'));
                $('#nohp-edit').val(response.data.nohp);

                // Open modal
                $('#modal-edit').modal('show');

                // Fetch role data
                $.ajax({
                    url: '/carirole',
                    type: 'GET',
                    success: function(roleResponse) {
                        let roleDropdown = $('#role-edit');
                        roleDropdown.empty(); // Clear existing options

                        // Populate dropdown with data from response
                        roleResponse.data.forEach(function(role) {
                            let option = `<option value="${role.id}" ${role.id === response.data.id_role ? 'selected' : ''}>${role.nama}</option>`;
                            roleDropdown.append(option);
                        });
                    },
                    error: function(error) {
                        console.error('Error fetching role data', error);
                    }
                });
                $.ajax({
                    url: '/caridepartment',
                    type: 'GET',
                    success: function(departmentResponse) {
                        let departmentDropdown = $('#department-edit');
                        departmentDropdown.empty(); // Clear existing options

                        // Populate dropdown with data from response
                        departmentResponse.data.forEach(function(department) {
                            let option = `<option value="${department.id}" ${department.id === response.data.id_department ? 'selected' : ''}>${department.nama}</option>`;
                            departmentDropdown.append(option);
                        });
                    },
                    error: function(error) {
                        console.error('Error fetching department data', error);
                    }
                });
            },
            error: function(error) {
                console.error('Error fetching pegawai data', error);
            }
        });
    });
   // Month mapping for conversion
const months = {
    'Januari': 1, 'Februari': 2, 'Maret': 3, 'April': 4, 'Mei': 5, 'Juni': 6,
    'Juli': 7, 'Agustus': 8, 'September': 9, 'Oktober': 10, 'November': 11, 'Desember': 12
};

$('#update').click(function(e) {
    e.preventDefault();

    // Get the date value from the input field
    let tanggal_lahir = $('#tanggal_lahir-edit').val();

    // Split the date string into its components (day, month, year)
    let dateParts = tanggal_lahir.split(' ');

    // Ensure there are 3 parts: day, month, and year
    if (dateParts.length === 3) {
        let day = dateParts[0];  // Day (DD)
        let monthName = dateParts[1];  // Month (e.g., 'Desember')
        let year = dateParts[2];  // Year (YYYY)

        // Get the numeric month value from the month name
        let month = months[monthName];

        if (month) {
            // Construct the formatted date as 'YYYY-MM-DD'
            let formattedTanggalLahir = `${year}-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

            // Log the formatted date
            console.log("Formatted Tanggal Lahir: " + formattedTanggalLahir);

            // Check if the date is valid
            if (!moment(formattedTanggalLahir, 'YYYY-MM-DD', true).isValid()) {
                console.error('Invalid date format');
                return;  // Stop execution if the date is invalid
            }

            // Proceed with the AJAX call if the date is valid
            let post_id = $('#post_id').val(); 
            $.ajax({
                url: `/pegawai/${post_id}`,
                type: "PUT",
                cache: false,
                data: {
                    "nama": $('#nama-edit').val(),
                    "alamat": $('#alamat-edit').val(),
                    "email": $('#email-edit').val(),
                    "nohp": $('#nohp-edit').val(),
                    "tanggal_lahir": formattedTanggalLahir,
                    "gaji": $('#gaji-edit').val(),
                    "password": $('#password-edit').val(),
                    "id_role": $('#role-edit').val(),
                    "id_department": $('#department-edit').val(),
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
            success:function(response){

                //show success message
                Swal.fire({
                    type: 'success',
                    type: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                //data post
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

                //append to post data
                $(`#index_${response.data.id}`).replaceWith(post);

                //close modal
                $('#modal-edit').modal('hide');


            },
            error:function(error){
                if (error.responseJSON.nama && error.responseJSON.nama[0]) {
                    $('#alert-nama-edit').removeClass('d-none').addClass('d-block').html(error.responseJSON.nama[0]);
                }
                if (error.responseJSON.email && error.responseJSON.email[0]) {
                    $('#alert-email-edit').removeClass('d-none').addClass('d-block').html(error.responseJSON.email[0]);
                }
                if (error.responseJSON.alamat && error.responseJSON.alamat[0]) {
                    $('#alert-alamat-edit').removeClass('d-none').addClass('d-block').html(error.responseJSON.alamat[0]);
                }
                if (error.responseJSON.password && error.responseJSON.password[0]) {
                    $('#alert-password').removeClass('d-none').addClass('d-block').html(error.responseJSON.password[0]);
                }
                if (error.responseJSON.nohp && error.responseJSON.nohp[0]) {
                    $('#alert-nohp-edit').removeClass('d-none').addClass('d-block').html(error.responseJSON.nohp[0]);
                }
                if (error.responseJSON.gaji && error.responseJSON.gaji[0]) {
                    $('#alert-gaji-edit').removeClass('d-none').addClass('d-block').html(error.responseJSON.gaji[0]);
                }
                if (error.responseJSON.id_role && error.responseJSON.id_role[0]) {
                    $('#alert-role-edit').removeClass('d-none').addClass('d-block').html(error.responseJSON.id_role[0]);
                }
                if (error.responseJSON.id_department && error.responseJSON.id_department[0]) {
                    $('#alert-department-edit').removeClass('d-none').addClass('d-block').html(error.responseJSON.id_department[0]);
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
