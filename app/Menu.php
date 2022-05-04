<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Menu extends Model
{
    protected $fillable = [
        'name', 'item', 'howtomake','price','file_name','user_id','genre_id','updated_at','created_at'
    ];

    public function iinecount(){
        return $this->hasOne('App\Iinecount','id','menu_id');
    }

    public function image(){
        return $this->hasOne('App\Image','id','menu_id');
    }

    public function createmenu(Request $request){
        $menu = new Menu();
        $params = ['name','item','howtomake','price','file_name','user_id','genre_id',];

        foreach($params as $param){
            $menu->$param = $request->$param;
        }
        
        $menu->save();
    }

    public function deleteimage($menu){
        $delPath = 'public/images/'.$menu->file_name;
        if(Storage::exists($delPath)){
            Storage::delete($delPath);
        }
    }

    public function editmenu($menuid,Request $request){
        $menu = new Menu();
        $record = $menu->find($menuid);
        $params = ['name','item','howtomake','price','file_name','user_id','genre_id',];

        foreach($params as $param){
            $record->$param = $request->$param;
        }
        $record->save();
    }

    public function get6menus(){
        $result = Menu::inRandomOrder()->take(6)->get()->toArray();
        return $result;
    }
}
