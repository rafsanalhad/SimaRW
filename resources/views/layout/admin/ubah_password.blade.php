@extends('template.admin.main')
@section('content')
    @include('template.admin.header')

    <div class="container-fluid">
        <h1 style="font-size: 30px; font-weight: bold;">Form Ubah Password</h1>
        <div class="card shadow-lg">
            <div class="card-body">
                <form action="/admin/ubah-password" method="POST" class="form-horizontal row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="password-baru" class="col-form-label">Masukkan Password Baru:</label>
                            <div class="col-sm-12">
                                <input placeholder="Masukkan password baru" type="password" class="form-control"
                                    id="password-baru" name="password-baru" value="{{ old('password-baru') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="konfirmasi-password" class="col-form-label">Konfirmasi Password Baru:</label>
                            <div class="col-sm-12">
                                <input placeholder="Masukkan password baru" type="password" class="form-control"
                                    id="konfirmasi-password" name="konfirmasi-password"
                                    value="{{ old('konfirmasi-password') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="mt-3 position-relative bottom-0 start-2">
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
                </iv>
            </div>
        </div>
    </div>
    </div>
@endsection
