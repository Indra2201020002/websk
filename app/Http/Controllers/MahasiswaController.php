<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\mahasiswa;
use App\Models\jurusan;

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
      
        $mhs= mahasiswa::with('jurusan')->get();

        return view('mahasiswa.index', ['data' => $mhs]);
    }

    public function create()
    {
        //$jurusan = DB::table('jurusan')create;
        $jurusan = jurusan::all();
        return view('mahasiswa.create',['jurusan'=>$jurusan]);
    }

    public function edit(mahasiswa $mhs)
    {
        
        $jurusan = jurusan::all();

        return view('mahasiswa.edit', ['data' => $mhs, 'id' => $mhs->id, 'jurusan' => $jurusan]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => ['required', 'min:8', 'max:10'],
            'nama' => 'required',
            'jurusan_id' => 'required', 'exists:jurusan,id',
        ]);

        $mhs = mahasiswa::create([
            'nim' => $validated['nim'],
            'nama' => $validated['nama'],
            'jurusan_id' => $validated['jurusan'],
        ]);
        return redirect(url('/mahasiswa'));
    }

    public function update(Request $request, mahasiswa $mhs)
    {
        
        $mhs->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jurusan_id' => $request->jurusan,
        ]);
        return redirect(url('/mahasiswa'));
    }

    public function destroy(mahasiswa $mhs)
    {

        $mhs->delete();

        return redirect(url('/mahasiswa'));
    }

    public function show($id)
    {
        $mhs = DB::table('mhs')
        ->select("mhs.id", "nim", "mhs.nama", "jurusan_id", "jurusan.nama AS jurusan_nama")
        ->join('jurusan', 'jurusan.id', '=', 'mhs.jurusan_id')
        ->where('mhs.id', $id)
        ->first();

        return view('mahasiswa.show', ['data' => $mhs]);
    }
}
