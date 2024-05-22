@extends('template.admin.main')
@section('content')
@include('template.admin.header')

    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <h4>Kelola UMKM</h4>
        <a href="#" id="test" class="btn btn-success mb-3" onclick="modalTambahUmkm()">Tambah Baru</a>
        <div class="row">
            @foreach ($umkm as $umkm)
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="card" style="width: 18rem; height: 400px;">
                                <img class="card-img-top" src="{{ asset('storage/' . $umkm->gambar_umkm) }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $umkm->nama_umkm }}</h5>
                                    <p class="card-text ">{{ $umkm->deskripsi_umkm }}</p>
                                    <p class="card-text">Pemilik: {{ $umkm->user->nama_user }}</p>
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
        <div class="modal-dialog modal-lg" role="document">
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
                                        <input type="text" id="alamat_umkm_edit" name="alamat_umkm"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Kontak
                                    </div>
                                    <div class="col-6">
                                        <input type="text" id="kontak_umkm_edit" name="kontak_umkm"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Latitude
                                    </div>
                                    <div class="col-6">
                                        <input type="text" id="latitude_umkm_edit" name="latitude_umkm"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Longitude
                                    </div>
                                    <div class="col-6">
                                        <input type="text" id="longitude_umkm_edit" name="longitude_umkm"
                                            class="form-control">
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
                                        <input type="time" id="jam_operasional_akhir_edit"
                                            name="jam_operasional_akhir" class="form-control">
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
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                        onclick=hideModalTambahUmkm()>Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
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
                    $('#latitude_umkm_edit').val(data.lokasi.latitude_umkm);
                    $('#longitude_umkm_edit').val(data.lokasi.longitude_umkm);
                    $('#jam_operasional_awal_edit').val(data.jam_operasional_awal);
                    $('#jam_operasional_akhir_edit').val(data.jam_operasional_akhir);
                    $('#deskripsi_umkm_edit').val(data.deskripsi_umkm);
                }
            });

            $('#form_edit').attr('action', '/admin/kelola-umkm/update/' + idUmkm);

            $('.modal_tambah_umkm').modal('show');
        }

        const hapusData = (idUmkm) => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/kelola-umkm/delete/' + idUmkm,
                        type: 'GET',
                        success: function() {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
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
