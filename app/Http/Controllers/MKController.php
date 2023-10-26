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
        return view('mk.index', ['data' => $this->data]);
    }

    public function create()
    {
        return view('mk.create');
    }

    public function edit($id)
    {
        return view('mk.edit', ['data' => $this->data[$id], 'id' => $id]);
    }

    public function show($id)
    {
    }
}
