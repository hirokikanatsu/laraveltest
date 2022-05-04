<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Iinecount extends Model
{
    protected $table = "iinecounts";

    protected $fillable = [
        'user_id', 'menu_id'
    ];

    public function getcount($menu_id=0){
        $result = false;

        $iinecount = new Iinecount();
        $count = $iinecount->where('user_id',Auth::user()->id)->where('menu_id',$menu_id)->get();

        if(count($count) !== 0){
            $result = true;
        }
        return $result;
    }

    public function insertiinecount($menu_id=0){
        $iinecount = new Iinecount();
        $iinecount->user_id = Auth::user()->id;
        $iinecount->menu_id = $menu_id;

        $iinecount->save();
    }

    public function deleteiinecount(Request $request){
        $iinecount = new Iinecount();
        $iinecount->where('user_id',$request->user_id)->where('menu_id',$request->postId)->delete();
    }

    public function sumiine($id){
        $iinecount = new Iinecount();
        $sum = count($iinecount->where('menu_id',$id)->get());
        return $sum;
    }

    public function iinemenu($id){
        $iinemenus = Iinecount::where('user_id',$id)->get()->toArray();

        foreach($iinemenus as $iinemenu){
            if(!empty(Menu::where('id',$iinemenu['menu_id'])->get()->toArray())){
                $result[] = Menu::where('id',$iinemenu['menu_id'])->get()->toArray();
            }
        }

        return $result;
    }
}
