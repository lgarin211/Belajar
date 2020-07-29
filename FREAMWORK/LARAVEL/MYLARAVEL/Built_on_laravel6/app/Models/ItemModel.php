<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ItemModel
{
    public static function get_all()
    {
        $item = DB::table('items')->get();
        return $item;
    }
    public static function save($data)
    {
        // unset($data["_token"]);
        $new_item = DB::table('items')->insert($data);
        return $new_item;
    }
    public static function find_by_id($id)
    {
        // unset($data["_token"]);
        $item = DB::table('items')->where('id', $id)->first();
        return $item;
    }
    public static function update($id, $request)
    {
        $item = DB::table('items')
            ->where('id', $id)
            ->update([
                'name' => $request['name'],
                'desct' => $request['desct'],
                'stock' => $request['stock'],
                'price' => $request['price'],
            ]);
        return $item;
    }
    public static function destroy($id)
    {
        $delet = DB::table('items')->where('id', $id)->delete();
    }
}
