@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 style="margin-bottom:20px; font-weight:bold">DAFTAR PEGAWAI</h2>
        @if(auth()->user()->id_role != 4 && auth()->user()->id_role != 5)
            <a href="javascript:void(0)" class="btn btn-outline-primary mb-2" style="margin-bottom: 20px" id="btn-create-post">
                <i class="fa-solid fa-plus"></i> TAMBAH PEGAWAI
            </a>
        @endif

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Gaji</th>
                <th>Tanggal Lahir</th>
                <th>No HP</th>
                <th>Role</th>
                <th>Department</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody id="table-posts">
                @foreach($pegawai as $pgw)
                    <tr id="index_{{ $pgw->id }}">
                        <td>{{ $pgw->nama }}</td>
                        <td>{{ $pgw->email }}</td>
                        <td>{{ Str::limit($pgw->alamat, 20, ' ...') }}</td>
                        <td>{{ $pgw->gaji }}</td>
                        <td>{{ $pgw->tanggal_lahir }}</td>
                        <td>{{ $pgw->nohp }}</td>
                        <td>{{ $pgw->role ?? '-' }}</td>
                        <td>{{ $pgw->department ?? '-' }}</td>
                        <td>
                            <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $pgw->id }}" class="btn btn-sm btn-outline-warning"
                                @if(in_array($pgw->id_role, [1, 2, 3, 5])) hidden @endif>EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $pgw->id }}" class="btn btn-sm btn-outline-danger" style="{{ in_array(Auth::user()->id_role, [1, 2]) ? '' : 'display:none;' }}">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

          </table>
        </div>
        <div class="row align-items-center d-flex justify-content-between" style="margin-top: 50px">
    <div class="col-auto">
        <div class="dataTables_info" id="order-listing_info" role="status" aria-live="polite">
            Menampilkan {{ $pegawai->firstItem() }} hingga {{ $pegawai->lastItem() }} dari {{ $pegawai->total() }} entri
        </div>
    </div>
    <div class="col-auto">
        {{ $pegawai->links('pagination::bootstrap-4') }}
    </div>
</div>
    </div>
</div>
    @include('components.pegawai.modal-create')
    @include('components.pegawai.modal-edit')
    @include('components.pegawai.delete-post')
@endsection
