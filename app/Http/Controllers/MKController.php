<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MKController extends Controller
{
    private $data = [
        [
            'nim' => "123456",
            'jurusan' => "TI",
            'mk' => "Web Programming",
        ],
        [
            'nim' => "234567",
            'jurusan' => "TI",
            'mk' => "Object Oriented Programming",
        ],
        [
            'nim' => "345678",
            'jurusan' => "SK",
            'mk' => "Sensor And Transduser",
        ],
        [
            'nim' => "456789",
            'jurusan' => "DGM",
            'mk' => "Digital Image Processing",
        ],
    ];

    public function index()
    {
        $mk = DB::table('mk')
        ->select("mk.idmk", "mk.namamk", "jurusan_id", "jurusan.nama AS jurusan_nama")
        ->join('jurusan', 'jurusan.id', '=', 'mk.jurusan_id')
        ->get();

        return view('mk.index', ['mk' => $mk] );
    }

    public function create()
    {
        return view('mk.create');
    }
    
    public function edit($id)
    {
        $mk = DB::table('mk')
        ->select("mk.idmk", "mk.namamk", "jurusan_id", "jurusan.nama AS jurusan_nama")
        ->join('jurusan', 'jurusan.id', '=', 'mk.jurusan_id')
        ->where('mk.idmk', $id)
        ->first();

        $jurusan = DB::table('jurusan')->get();

        return view('mk.edit', ['mk' => $mk, 'id' => $id, 'jurusan' => $jurusan]);
    }

    public function show($id)
    {
    }
}
