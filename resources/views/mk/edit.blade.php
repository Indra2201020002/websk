@extends('layout.master')

@section('title', 'Ubah MK')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/mk') }}">Mata Kuliah</a></li>
    <li class="breadcrumb-item active">Ubah</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h4 class="card-title">Form Ubah Mata Kuliah</h4>
            </div>
        </div>
        <form action="{{ url('/mk/' . $id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div>
                    <label class="form-label">NIM</label>
                    <input class="form-control" type="text" name="nim" value="{{ $data['nim'] }}">
                </div>
                <div>
                    <label class="form-label">Jurusan</label>
                    <input class="form-control" type="text" name="jurusan" value="{{ $data['jurusan'] }}">
                </div>
                <div>
                    <label class="form-label">Mata Kuliah Yang Ingin Diambil</label>
                    <select class="form-select" name="mk">
                        <option {{ $data['jurusan'] == 'Sensor And Transduser' ? 'selected' : '' }} value="Sensor And Transduser">Sensor And Transduser</option>
                        <option {{ $data['jurusan'] == 'Digital Image Processing' ? 'selected' : '' }} value="Digital Image Processing">Digital Image Processing</option>
                        <option {{ $data['jurusan'] == 'Web Programming' ? 'selected' : '' }} value="Web Programming">Web Programming</option>
                        <option {{ $data['jurusan'] == 'Object Oriented Programming' ? 'selected' : '' }} value="Object Oriented Programming">Object Oriented Programming</option>
                        <option {{ $data['jurusan'] == 'Algorithm' ? 'selected' : '' }} value="Algorithm">Algorithm</option>
                        <option {{ $data['jurusan'] == 'Database' ? 'selected' : '' }} value="Database">Database</option>
                        <option {{ $data['jurusan'] == 'Architecture Computer' ? 'selected' : '' }} value="Architecture Computer">Architecture Computer</option>
                        <option {{ $data['jurusan'] == 'Administrasi Server' ? 'selected' : '' }} value="Administrasi Server">Administrasi Server</option>
                        <option {{ $data['jurusan'] == 'Matematika' ? 'selected' : '' }} value="Matematika">Matematika</option>

                    </select>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
