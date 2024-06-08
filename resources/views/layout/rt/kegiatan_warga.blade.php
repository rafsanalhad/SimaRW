@extends('template.rt.main')
@section('content')
    @include('template.rt.header')

    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <h4>Kelola Kegiatan Warga</h4>
        <a href="#" id="test" class="btn btn-success mb-3" onclick="modalTambahKegiatan()">Tambah Baru</a>
        <div class="row">
            @foreach ($kegiatan as $kegiatan)
                <div class="col-md-4">
                    <div class="card shadow-lg" onclick="showModalKegiatan()">
                        <div class="card-body">
                            <div class="card" style="width: 18rem; height: 540px;">
                                <img class="card-img-top" style="height: 250px;" src="{{ asset('storage/' . $kegiatan->foto_kegiatan) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Nama Kegiatan : {{ $kegiatan->nama_kegiatan }}</h5>
                                    <p class="card-text ">Deskripsi Kegiatan : {{ $kegiatan->deskripsi_kegiatan }}</p>
                                    <p class="card-text ">Tempat Kegiatan : {{ $kegiatan->tempat_kegiatan }}</p>
                                    <p class="card-text">Hari/Tanggal : {{ $kegiatan->hari_kegiatan }}/{{ $kegiatan->jadwal_kegiatan }}</p>
                                    <p class="card-text">Jam : {{ $kegiatan->jam_awal }} -
                                        {{ $kegiatan->jam_akhir }}</p>
                                    <a href="#" class="btn btn-warning"
                                        onclick="modalEditKegiatan({{ $kegiatan->kegiatan_id }})">Edit</a>
                                    <a href="#" class="btn btn-danger"
                                        onclick="hapusData({{ $kegiatan->kegiatan_id }})">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal modal_tambah_kegiatan" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title"></div>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="/rt/kegiatan" id="form_edit" method="POST" class="form"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Nama Kegiatan
                                    </div>
                                    <div class="col-6">
                                        <input type="text" id="nama_kegiatan_edit" name="nama_kegiatan" class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Tempat Kegiatan
                                    </div>
                                    <div class="col-6">
                                        <input type="text" id="tempat_kegiatan_edit" name="tempat_kegiatan" class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Jadwal Kegiatan
                                    </div>
                                    <div class="col-6">
                                        <input type="date" id="jadwal_kegiatan_edit" name="jadwal_kegiatan" class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Jam Kegiatan
                                    </div>
                                    <div class="col-6 d-flex">
                                        <input type="time" id="jam_awal_edit" name="jam_awal"
                                            class="form-control">
                                        <span class="mx-2 my-2">s/d</span>
                                        <input type="time" id="jam_akhir_edit" name="jam_akhir"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Gambar Kegiatan
                                    </div>
                                    <div class="col-6">
                                        <input name="foto_kegiatan" type="file" class="form-control" accept="image/*">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Deskripsi Kegiatan
                                    </div>
                                    <div class="col-6">
                                        <textarea name="deskripsi_kegiatan" class="form-control" id="deskripsi_kegiatan_edit" cols="30" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                        onclick=hideModalTambahKegiatan()>Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showModalKegiatan() {
            $('.modal_umkm').modal('show');
        }

        function hideModalKegiatan() {
            $('.modal_umkm').modal('hide');
        }

        const modalTambahKegiatan = () => {
            $('input:not([name="_token"]), textarea, select, time').val('');

            $('#form_edit').attr('action', '/rt/kegiatan-warga');

            $('.modal-title').html('Tambah Kegiatan Warga');
            $('.modal_tambah_kegiatan').modal('show');
        }

        const modalEditKegiatan = (idKegiatan) => {
            $.ajax({
                url: '/rt/kegiatan-warga/edit/' + idKegiatan,
                type: 'GET',
                dataType: 'json',
                success(data) {
                    console.log(data)
                    $('#nama_kegiatan_edit').val(data.nama_kegiatan);
                    $('#tempat_kegiatan_edit').val(data.tempat_kegiatan);
                    $('#jadwal_kegiatan_edit').val(data.jadwal_kegiatan);
                    $('#jam_awal_edit').val(data.jam_awal);
                    $('#jam_akhir_edit').val(data.jam_akhir);
                    $('#deskripsi_kegiatan_edit').val(data.deskripsi_kegiatan);
                }
            });

            $('.modal-title').html('Edit Kegiatan Warga');

            $('#form_edit').attr('action', '/rt/kegiatan-warga/update/' + idKegiatan);

            $('.modal_tambah_kegiatan').modal('show');
        }

        const hapusData = (idKegiatan) => {
            Swal.fire({
                title: "Yakin ingin menghapus kegiatan ini?",
                text: "Anda tidak akan bisa mengembalikan kegiatan yang telah dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/rt/kegiatan-warga/delete/' + idKegiatan,
                        type: 'GET',
                        success: function() {
                            Swal.fire({
                                title: "Sudah Terhapus!!",
                                text: "Data Kegiatan Sudah Dihapus!",
                                icon: "success"
                            }).then((result) => {
                                location.reload();
                            });
                        }
                    });
                }
            });
        }
        const hideModalTambahKegiatan = () => {
            $('.modal_tambah_kegiatan').modal('hide');
        }
    </script>
@endsection
