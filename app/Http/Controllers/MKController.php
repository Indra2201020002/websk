<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'mk' => "Sensor And Transduser",
        ],
        [
            'nim' => "345678",
            'jurusan' => "SK",
            'mk' => "Digital Image Processing",
        ],
        [
            'nim' => "456789",
            'jurusan' => "DGM",
            'mk' => "electronic",
        ],
    ];

    public function index()
    {
        return view('mk.index', ['data' => $this->data]);
    }

    public function create()
    {
        return view('mk.create');
    }

    public function show($id)
    {
    }
}
