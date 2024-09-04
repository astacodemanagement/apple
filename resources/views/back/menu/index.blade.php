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
                            <th>Nama menu</th>
                            <th>Slug</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php $i = 1; ?>
                        @foreach ($menu as $p)
                        <tr>
                            <td>{{ $i }}</td>
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

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Nama menu</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Masukkan Nama menu" required>
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="slug">slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            placeholder="Masukkan slug">
                                    </div>
                                </div>







                            </div>
                            <div class="row">

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="header">header</label>
                                        <input type="text" class="form-control" id="header" name="header"
                                            placeholder="Masukkan slug">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- desc -->
                                <div class="col-12">
                                    <div class="form-group ">
                                        <label for="desc">Deskripsi</label>
                                        <textarea class="form-control" id="desc" name="desc" rows="3"
                                            placeholder="Masukkan Deskripsi"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- title & file & desc card one and card two -->
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title_card_one">Card 1 Title</label>
                                        <input type="text" class="form-control" id="title_card_one" name="title_card_one"
                                            placeholder="Masukkan Card 1 Title">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label for="desc_card_one">Card 1 Foto</label>
                                        <input type="file" class="form-control" id="image_card_one" name="image_card_one"
                                            placeholder="Masukkan Card 1 Foto">

                                    </div>
                                </div>
                            </div>
                            <!-- img preview -->
                            <div class="row">
                                <div class="col-6">
                                    <!-- img prevew -->
                                    <img id="img-preview-card-one" src="" alt="" style="width: 200px; height: 200px; display:none;">
                                </div>
                            </div>

                            <div class="row">
                                <!-- desc card 1 -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="desc_card_one">Card 1 Deskripsi</label>
                                        <textarea class="form-control" id="desc_card_one" name="desc_card_one" rows="3"
                                            placeholder="Masukkan Card 1 Deskripsi"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title_card_two">Card 2 Title</label>
                                        <input type="text" class="form-control" id="title_card_two" name="title_card_two"
                                            placeholder="Masukkan Card 2 Title">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="image_card_two">Card 2 Foto</label>
                                        <input type="file" class="form-control" id="image_card_two" name="image_card_two"
                                            placeholder="Masukkan Card 2 Foro">
                                    </div>
                                </div>
                        </div>
                        <!-- img preview -->
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <img id="img-preview-card-two" src="" alt="" style="width: 200px; height: 200px; display:none">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <!-- desc card 2 -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="desc_card_two">Card 2 Deskripsi</label>
                                    <textarea class="form-control" id="desc_card_two" name="desc_card_two" rows="3"
                                        placeholder="Masukkan Card 2 Deskripsi"></textarea>
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

                    <form id="form-edit" action="" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" id="id" name="id" />

                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name_edit">Nama menu</label>
                                        <input type="text" class="form-control" id="name_edit" name="name"
                                            placeholder="Masukkan Nama menu" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="slug_edit">Slug</label>
                                        <input type="text" class="form-control" id="slug_edit" name="slug"
                                            placeholder="Masukkan Slug">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="header_edit">Header</label>
                                        <input type="text" class="form-control" id="header_edit" name="header"
                                            placeholder="Masukkan Header">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="desc_edit">Deskripsi</label>
                                        <textarea class="form-control" id="desc_edit" name="desc" rows="3"
                                            placeholder="Masukkan Deskripsi"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Title & File & Desc Card One and Card Two -->
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title_card_one_edit">Card 1 Title</label>
                                        <input type="text" class="form-control" id="title_card_one_edit" name="title_card_one"
                                            placeholder="Masukkan Card 1 Title">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="image_card_one_edit">Card 1 Foto</label>
                                        <input type="file" class="form-control" id="image_card_one_edit" name="image_card_one">
                                    </div>
                                </div>
                            </div>
                            <!-- image preview -->
                            <div class="row">
                                <div class="col-6">
                                    <img id="img-preview-card-edit-one" src="" alt="" style="width: 200px; height: 200px; ">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="desc_card_one_edit">Card 1 Deskripsi</label>
                                        <textarea class="form-control" id="desc_card_one_edit" name="desc_card_one" rows="3"
                                            placeholder="Masukkan Card 1 Deskripsi"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title_card_two_edit">Card 2 Title</label>
                                        <input type="text" class="form-control" id="title_card_two_edit" name="title_card_two"
                                            placeholder="Masukkan Card 2 Title">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="image_card_two_edit">Card 2 Foto</label>
                                        <input type="file" class="form-control" id="image_card_two_edit" name="image_card_two">
                                    </div>
                                </div>
                            </div>
                            <!-- img preview -->
                            <div class="row">
                                <div class="col-6">
                                    <img id="img-preview-card-edit-two" src="" alt="" style="width: 200px; height: 200px; ">
                                </div>
                            </div>
                          

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="desc_card_two_edit">Card 2 Deskripsi</label>
                                        <textarea class="form-control" id="desc_card_two_edit" name="desc_card_two" rows="3"
                                            placeholder="Masukkan Card 2 Deskripsi"></textarea>
                                    </div>
                                </div>
                            </div>

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



<!-- handle preview image card one and two -->
<script>
    $(document).ready(function() {
        $('#image_card_one').change(function() {
            const file = $(this)[0].files[0];
            const fileReader = new FileReader();
            fileReader.readAsDataURL(file);
            fileReader.onload = function(e) {

                $('#img-preview-card-one').css('display', 'block');
                $('#img-preview-card-one').attr('src', e.target.result);
            }
        });

        $('#image_card_two').change(function() {
            const file = $(this)[0].files[0];
            const fileReader = new FileReader();
            fileReader.readAsDataURL(file);
            fileReader.onload = function(e) {
                $('#img-preview-card-two').css('display', 'block');
                $('#img-preview-card-two').attr('src', e.target.result);
            }
        });

        // Edit
        $('#image_card_one_edit').change(function() {
            const file = $(this)[0].files[0];
            const fileReader = new FileReader();
            fileReader.readAsDataURL(file);
            fileReader.onload = function(e) {
                $('#img-preview-card-edit-one').css('display', 'block');
                $('#img-preview-card-edit-one').attr('src', e.target.result);
            }
        });

        $('#image_card_two_edit').change(function() {
            const file = $(this)[0].files[0];
            const fileReader = new FileReader();
            fileReader.readAsDataURL(file);
            fileReader.onload = function(e) {
                $('#img-preview-card-edit-two').css('display', 'block');
                $('#img-preview-card-edit-two').attr('src', e.target.result);
            }
        });
    });
</script>

{{-- PERINTAH SIMPAN DATA --}}

{{-- PERINTAH EDIT DATA --}}
<script>
    $(document).ready(function() {
        $('.btn-edit').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                method: 'GET',
                url: '/menu/' + id + '/edit',
                success: function(data) {
                    // Mengisi data pada form modal
                    $('#id').val(data.id);
                    $('#name_edit').val(data.name);
                    $('#slug_edit').val(data.slug);
                    $('#header_edit').val(data.header);
                    $('#desc_edit').val(data.desc);
                    $('#title_card_one_edit').val(data.title_card_one);
                    $('#desc_card_one_edit').val(data.desc_card_one);
                    $('#title_card_two_edit').val(data.title_card_two);
                    $('#desc_card_two_edit').val(data.desc_card_two);
                    $('#img-preview-card-edit-one').attr('src', '/upload/menu/cardone/' + data.image_card_one);
                    $('#img-preview-card-edit-two').attr('src', '/upload/menu/cardtwo/' + data.image_card_two);
                 

                    $('#modal-edit').modal('show');
                },
                error: function(xhr) {
                    // Handle error
                    alert('Error: ' + xhr.statusText);
                }
            });
        });

        // Clear image preview when modal is closed
        $('#modal-edit').on('hidden.bs.modal', function() {
            $('#image_card_one_edit').val('');
            $('#image_card_two_edit').val('');
        });
    });
</script>


{{-- PERINTAH EDIT DATA --}}



{{-- PERINTAH UPDATE DATA --}}
<script>
    $(document).ready(function() {
        $('#btn-save-edit').click(function(e) {
            e.preventDefault();
            const tombolUpdate = $('#btn-save-edit');
            var id = $('#id').val();
            var formData = new FormData($('#form-edit')[0]);

            $.ajax({
                type: 'POST', // Gunakan POST karena kita override dengan PUT
                url: '/menu/' + id,
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
{{-- PERINTAH SIMPAN DATA --}}
<script>
    $(document).ready(function() {
        $('#form-tambah').submit(function(event) {
            event.preventDefault();
            const tombolSimpan = $('#btn-save-tambah')

            // Buat objek FormData
            var formData = new FormData(this);

            $.ajax({
                url: `{{ route('menu.store') }}`,
                type: 'POST',
                data: formData,
                processData: false, // Menghindari jQuery memproses data
                contentType: false, // Menghindari jQuery mengatur Content-Type
                beforeSend: function() {
                    $('form').find('.error-message').remove()
                    tombolSimpan.prop('disabled', true)
                },
                success: function(response) {
                    $('#modal-tambah').modal('hide');
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'Data berhasil disimpan',
                        icon: 'success',
                        html: '<br>Data berhasil disimpan', // Tambahkan subjudul di sini
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

{{-- PERINTAH UPDATE DATA --}}

{{-- PERINTAH DELETE DATA --}}
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
                        url: '/menu/' + id,
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
{{-- PERINTAH DELETE DATA --}}
<script>

</script>
@endpush