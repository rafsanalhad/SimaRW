@extends('template.admin.main')
@section('content')
    @include('template.admin.header')

    <div class="container-fluid">
        <h1 style="font-size: 30px; font-weight: bold;">Form Ubah Password</h1>
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <form action="/admin/ubah-password" method="POST" class="form-horizontal row">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="password-baru" class="col-form-label">Masukkan Password Baru:</label>
                                <div class="col-sm-12">
                                    <input placeholder="Masukkan Password Baru Anda" type="password" class="form-control"
                                        id="password_baru" name="password_baru" value="{{ old('password_baru') }}" required>
                                    @if ($errors->has('password_baru'))
                                        @foreach ($errors->get('password_baru') as $error)
                                            <small class="form-text text-danger">{{ $error }}</small>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="konfirmasi-password" class="col-form-label">Konfirmasi Password Baru:</label>
                                <div class="col-sm-12">
                                    <input placeholder="Konfirmasi Password Anda" type="password" class="form-control"
                                        id="konfirmasi_password" name="konfirmasi_password"
                                        value="{{ old('konfirmasi_password') }}" required>
                                    @if ($errors->has('konfirmasi_password'))
                                        @foreach ($errors->get('konfirmasi_password') as $error)
                                            <small class="form-text text-danger">{{ $error }}</small>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 position-relative bottom-0 start-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
