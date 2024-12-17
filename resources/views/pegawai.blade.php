@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 style="margin-bottom:20px; font-weight:bold">DAFTAR PEGAWAI</h2>
        <a href="javascript:void(0)" class="btn btn-outline-primary mb-2" style="margin-bottom: 20px" id="btn-create-post"><i class="fa-solid fa-plus"></i> TAMBAH PEGAWAI</a>
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
                <th>Status</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
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
                            @if($pgw->status == 1)
                                <label class="badge badge-success">Aktif</label>
                            @else
                                <label class="badge badge-danger">Nonaktif</label>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-outline-warning">Edit</button>
                            <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $pgw->id }}" class="btn btn-sm btn-outline-danger">DELETE</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

          </table>
        </div>
        <div class="row align-items-center d-flex justify-content-between" style="margin-top: 50px">
            <div class="col-auto">
                <div class="dataTables_info" id="order-listing_info" role="status" aria-live="polite">
                    Showing 1 to 5 of 10 entries
                </div>
            </div>
            <div class="col-auto">
                <div class="dataTables_paginate paging_simple_numbers" id="order-listing_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="order-listing_previous">
                            <a href="#" aria-controls="order-listing" data-dt-idx="0" tabindex="0" class="page-link">
                                Previous
                            </a>
                        </li>
                        <li class="paginate_button page-item active">
                            <a href="#" aria-controls="order-listing" data-dt-idx="1" tabindex="0" class="page-link">
                                1
                            </a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="order-listing" data-dt-idx="2" tabindex="0" class="page-link">
                                2
                            </a>
                        </li>
                        <li class="paginate_button page-item next" id="order-listing_next">
                            <a href="#" aria-controls="order-listing" data-dt-idx="3" tabindex="0" class="page-link">
                                Next
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    @include('components.pegawai.modal-create')
    {{-- @include('components.pegawai.modal-edit') --}}
    @include('components.pegawai.delete-post')
@endsection
