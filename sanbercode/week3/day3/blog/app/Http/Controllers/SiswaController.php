<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\siswa;

class SiswaController extends Controller
{
    public function tambah()
    {
        return view('input');
    }
    public function Kirim(Request $data)
    {
        $new_item = siswa::save($data->all());
        return redirect('/siswa');
    }
    public function index()
    {
        $item = siswa::get_all();
        return view('/siswa');
    }
}
