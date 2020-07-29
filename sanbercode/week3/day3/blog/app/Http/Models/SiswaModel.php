<?php

namespace app\Http\Models;

use Illuminate\Support\Facades\DB;

class siswa
{
    public function get_all()
    {
        $item = DB::tabel('siswa')->get();
        return $item;
    }
    public function save($data)
    {
        $new_data = DB::table('siswa')->insert($data);
        return $new_data;
    }
}
