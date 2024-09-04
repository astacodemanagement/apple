@extends('back.layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $profil->nama_perusahaan }} - {{ $subtitle }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-tambah"><i
                        class="fas fa-plus-circle"></i> Tambah Data</a>

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Nama submenu</th>
                            <th>Slug</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($submenu as $p)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $p->menu->name }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->slug }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning btn-edit" data-toggle="modal"
                                        data-target="#modal-edit" data-id="{{ $p->id }}" style="color: black">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $p->id }}"
                                        style="color: white">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

{{-- Modal Tambah Data --}}
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form {{ $subtitle }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Main content -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="form-tambah" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="menu_id">Nama Menu</label>
                                        <select class="form-control" id="menu_id" name="menu_id" required>
                                            <option value="">Pilih Menu</option>
                                            @foreach ($menu as $p)
                                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Nama submenu</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Masukkan Nama submenu" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            placeholder="Masukkan slug">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="btn-save-tambah"><i
                                        class="fas fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-danger float-right" data-dismiss="modal"><span
                                        aria-hidden="true">&times;</span> Close</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

{{-- Modal Edit Data --}}
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form {{ $subtitle }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Main content -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <form id="form-edit" action="" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" id="id" name="id" />
                        <!-- Input hidden untuk menyimpan ID -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="menu_id_edit">Nama Menu</label>
                                        <select class="form-control" id="menu_id_edit" name="menu_id" required>
                                            <option value="">Pilih Menu</option>
                                            @foreach ($menu as $p)
                                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name_edit">Nama submenu</label>
                                        <input type="text" class="form-control" id="name_edit" name="name"
                                            placeholder="Masukkan Nama submenu" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="slug_edit">Slug</label>
                                        <input type="text" class="form-control" id="slug_edit" name="slug"
                                            placeholder="Masukkan slug">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="content_edit">Content</label>
                                        <textarea name="content" id="content_edit" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="btn-save-edit"><i
                                        class="fas fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-danger float-right" data-dismiss="modal"><span
                                        aria-hidden="true">&times;</span> Close</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('themplete/back') }}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        $('#content').summernote({
            height: 200
        });
    });

    $(function() {
        // Inisialisasi Summernote
        $('#content_edit').summernote({
            height: 200,
            callbacks: {
                // Fungsi setelah Summernote selesai dimuat
                onInit: function() {
                    // Set nilai pada Summernote
                    $('#content_edit').summernote('code', data.content);
                }
            }
        });
    });
</script>

{{-- PERINTAH SIMPAN DATA --}}
<script>
    $(document).ready(function() {
        $('#form-tambah').submit(function(event) {
            event.preventDefault();
            const tombolSimpan = $('#btn-save-tambah')

            // Buat objek FormData
            var formData = new FormData(this);

            $.ajax({
                url: `{{ route('submenu.store') }}`,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('form').find('.error-message').remove();
                    tombolSimpan.prop('disabled', true);
                },
                success: function(response) {
                    $('#modal-tambah').modal('hide');
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'Data berhasil disimpan',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        location.reload();
                    });
                },
                complete: function() {
                    tombolSimpan.prop('disabled', false);
                },
                error: function(xhr) {
                    if (xhr.status !== 422) {
                        $('#modal-tambah').modal('hide');
                    }
                    var errorMessages = xhr.responseJSON.errors;
                    var errorMessage = '';
                    $.each(errorMessages, function(key, value) {
                        errorMessage += value + '<br>';
                    });
                    Swal.fire({
                        title: 'Error!',
                        html: errorMessage,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>

{{-- PERINTAH EDIT DATA --}}
<script>
    $(document).ready(function() {
        $('.btn-edit').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                method: 'GET',
                url: '/submenu/' + id + '/edit',
                success: function(data) {
                    $('#id').val(data.id);
                    $('#menu_id_edit').val(data.menu_id);
                    $('#name_edit').val(data.name);
                    $('#slug_edit').val(data.slug);
                    $('#content_edit').summernote('code', data.content);
                    $('#modal-edit').modal('show');
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.statusText);
                }
            });
        });
    });
</script>

{{-- PERINTAH UPDATE DATA --}}
<script>
    $(document).ready(function() {
        $('#form-edit').submit(function(e) {
            e.preventDefault();
            const tombolUpdate = $('#btn-save-edit')
            var id = $('#id').val();

            // Buat objek FormData
            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '/submenu/' + id,
                data: formData,
                headers: {
                    'X-HTTP-Method-Override': 'PUT'
                },
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('form').find('.error-message').remove();
                    tombolUpdate.prop('disabled', true);
                },
                success: function(response) {
                    $('#modal-edit').modal('hide');
                    Swal.fire({
                        title: 'Sukses!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            location.reload();
                        }
                    });
                },
                complete: function() {
                    tombolUpdate.prop('disabled', false);
                },
                error: function(xhr) {
                    if (xhr.status !== 422) {
                        $('#modal-edit').modal('hide');
                    }
                    var errorMessages = xhr.responseJSON.errors;
                    var errorMessage = '';
                    $.each(errorMessages, function(key, value) {
                        errorMessage += value + '<br>';
                    });
                    Swal.fire({
                        title: 'Error!',
                        html: errorMessage,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>

{{-- PERINTAH HAPUS DATA --}}
<script>
    $(document).ready(function() {
        $('.btn-hapus').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '/submenu/' + id,
                        data: {
                            '_method': 'DELETE',
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            Swal.fire(
                                'Terhapus!',
                                'Data berhasil dihapus.',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed || result.isDismissed) {
                                    location.reload();
                                }
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Data gagal dihapus.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
