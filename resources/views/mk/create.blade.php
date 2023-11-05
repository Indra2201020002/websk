@extends('layout.master')

@section('title', 'Tabel Mata Kuliah')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/mk') }}">Mata Kuliah</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h4 class="card-title">Form Tambah Mata Kuliah</h4>
            </div>
        </div>
        <form action="{{ url('/mk') }}" method="POST">
            <div class="card-body">
                @csrf
                <div>
                    <label class="form-label">ID Mata Kuliah</label>
                    <input class="form-control" type="text" name="idmk">
                </div>
                <div>
                    <label class="form-label">Nama Mata Kuliah</label>
                    <input class="form-control" type="text" name="namamk">
                </div>
                <div>
                    <label class="form-label">Jurusan</label>
                    <select class="form-select" name="jurusan">
                        <option value="1">TI</option>
                        <option value="2">SK</option>
                        <option value="3">DGM</option>
                    </select>
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
