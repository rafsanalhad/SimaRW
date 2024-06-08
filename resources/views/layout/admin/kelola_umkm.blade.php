@extends('template.admin.main')
@section('content')
    @include('template.admin.header')

    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h4>Kelola UMKM</h4>
        <a href="#" id="test" class="btn btn-success mb-3" onclick="modalTambahUmkm()">Tambah Baru</a>
        <div class="row">
            @foreach ($umkm as $umkm)
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-body">
                        <div class="card" style="width: 18rem; height: 540px;">

                            <div class="card" style="width: 18rem; height: 540px;">
                                <img class="card-img-top" src="{{ asset('storage/' . $umkm->gambar_umkm) }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $umkm->nama_umkm }}</h5>
                                    <p class="card-text ">{{ $umkm->deskripsi_umkm }}</p>
                                    <p class="card-text">Pemilik: {{ $umkm->user->nama_user }}</p>
                                    <p class="card-text">Jam Buka: {{ $umkm->jam_operasional_awal }} -
                                        {{ $umkm->jam_operasional_akhir }}</p>
                                    <a href="#" class="btn btn-primary"
                                        onclick="showModalUmkm({{ $umkm->umkm_id }})">Detail</a>
                                    <a href="#" class="btn btn-warning"
                                        onclick="modalEditUmkm({{ $umkm->umkm_id }})">Edit</a>
                                    <a href="#" class="btn btn-danger"
                                        onclick="hapusData({{ $umkm->umkm_id }})">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="modal modal_tambah_umkm" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">Tambah UMKM</div>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('createUmkm') }}" id="form_edit" method="POST" class="form"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Pemilik UMKM
                                    </div>
                                    <div class="col-6">
                                        <select class="form-control" id="pemilik_umkm_edit" name="pemilik_umkm"
                                            id="">
                                            <option value="">-- Pilih Warga --</option>
                                            @foreach ($warga as $warga)
                                                <option value="{{ $warga->user_id }}">{{ $warga->nama_user }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Nama Umkm
                                    </div>
                                    <div class="col-6">
                                        <input type="text" id="nama_umkm_edit" name="nama_umkm" class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Alamat
                                    </div>
                                    <div class="col-6">
                                        <input type="text" id="alamat_umkm_edit" name="alamat_umkm" class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Kontak
                                    </div>
                                    <div class="col-6">
                                        <input type="text" id="kontak_umkm_edit" name="kontak_umkm" class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Jam Operasional
                                    </div>
                                    <div class="col-6 d-flex">
                                        <input type="time" id="jam_operasional_awal_edit" name="jam_operasional_awal"
                                            class="form-control">
                                        <span class="mx-2 my-2">s/d</span>
                                        <input type="time" id="jam_operasional_akhir_edit" name="jam_operasional_akhir"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Gambar UMKM
                                    </div>
                                    <div class="col-6">
                                        <input name="foto_umkm" type="file" class="form-control" accept="image/*">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Deskripsi UMKM
                                    </div>
                                    <div class="col-6">
                                        <textarea name="deskripsi_umkm" class="form-control" id="deskripsi_umkm_edit" cols="30" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                        onclick=hideModalTambahUmkm()>Tutup</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal_umkm" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="gambar_umkm_detail" src="" alt="" class="img_umkm">
                    <h3 id="nama_umkm_detail"></h3>
                    <p id="deskripsi_umkm_detail"></p>
                    <div class="row">
                        <div class="col-6">
                            <h3 class="fs-4">Jam Operasi:</h3>
                            <p id="jam_buka_detail"></p>
                        </div>
                        <div class="col-6">
                            <h3 class="fs-4">Kontak:</h3>
                            <p id="kontak_umkm_detail"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick=hideModalUmkm()>Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showModalUmkm(idUmkm) {
            $.ajax({
                url: '/admin/kelola-umkm/detail/' + idUmkm,
                type: 'GET',
                dataType: 'json',
                success(data) {
                    $('#nama_umkm_detail').text(data.nama_umkm);
                    $('#kontak_umkm_detail').text(data.kontak_umkm);
                    $('#gambar_umkm_detail').attr('src', '/storage/' + data.gambar_umkm);
                    $('#jam_buka_detail').text(data.jam_operasional_awal + ' - ' + data.jam_operasional_akhir);
                    $('#deskripsi_umkm_detail').text(data.deskripsi_umkm);
                }
            })

            $('.modal_umkm').modal('show');
        }

        function hideModalUmkm() {
            $('.modal_umkm').modal('hide');
        }

        const modalTambahUmkm = () => {
            $('input:not([name="_token"]), textarea, select, time').val('');

            $('#form_edit').attr('action', '/admin/kelola-umkm');

            $('.modal-title').html('Tambah UMKM');
            $('.modal_tambah_umkm').modal('show');
        }

        const modalEditUmkm = (idUmkm) => {
            $.ajax({
                url: '/admin/kelola-umkm/edit/' + idUmkm,
                type: 'GET',
                dataType: 'json',
                success(data) {
                    console.log(data)
                    $('#pemilik_umkm_edit').val(data.user_id);
                    $('#nama_umkm_edit').val(data.nama_umkm);
                    $('#alamat_umkm_edit').val(data.alamat_umkm);
                    $('#kontak_umkm_edit').val(data.kontak_umkm);
                    $('#jam_operasional_awal_edit').val(data.jam_operasional_awal);
                    $('#jam_operasional_akhir_edit').val(data.jam_operasional_akhir);
                    $('#deskripsi_umkm_edit').val(data.deskripsi_umkm);
                }
            });

            $('.modal-title').html('Edit UMKM');
            $('#form_edit').attr('action', '/admin/kelola-umkm/update/' + idUmkm);

            $('.modal_tambah_umkm').modal('show');
        }

        const hapusData = (idUmkm) => {
            Swal.fire({
                title: "Apakah Anda Yakin Menghapus Data ini?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/kelola-umkm/delete/' + idUmkm,
                        type: 'GET',
                        success: function() {
                            Swal.fire({
                                title: "Sudah Dihapus!",
                                text: "Data UMKM Sudah Terhapus",
                                icon: "success"
                            }).then((result) => {
                                location.reload();
                            });
                        }
                    });
                }
            });
        }

        const hideModalTambahUmkm = () => {
            $('.modal_tambah_umkm').modal('hide');
        }
    </script>
@endsection
