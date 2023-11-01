<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    private $data = [
        [
            'nim' => "123456",
            'nama' => "I Putu satu",
            'jurusan' => "TI",
        ],
        [
            'nim' => "234567",
            'nama' => "I Wayan dua",
            'jurusan' => "TI",
        ],
        [
            'nim' => "345678",
            'nama' => "I Ketut tiga",
            'jurusan' => "SK",
        ],
        [
            'nim' => "456789",
            'nama' => "I Kadek empat",
            'jurusan' => "DGM",
        ],
    ];

    public function index()
    {
        $mhs = DB::table('mhs')
        ->select("mhs.id", "nim", "mhs.nama", "jurusan_id", "jurusan.nama AS jurusan_nama")
        ->join('jurusan', 'jurusan.id', '=', 'mhs.jurusan_id')
        ->get();
 
        return view('mahasiswa.index', ['data' => $mhs]);
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function edit($id)
    {
        $mhs = DB::table('mhs')
        ->select("mhs.id", "nim", "mhs.nama", "jurusan_id", "jurusan.nama AS jurusan_nama")
        ->join('jurusan', 'jurusan.id', '=', 'mhs.jurusan_id')
        ->where('mhs.id', $id)
        ->first();

        $jurusan = DB::table('jurusan')->get();

        return view('mahasiswa.edit', ['data' => $mhs, 'id' => $id, 'jurusan' => $jurusan]);
    }

    public function show($id)
    {
    }
}
