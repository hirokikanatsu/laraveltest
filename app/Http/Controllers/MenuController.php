<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Image;
use App\Iinecount;
use App\Http\Requests\MenuRequest;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{

    public function __construct()
    {
        $this->menu = new Menu;
        $this->iinecount = new Iinecount();
    }

    public function home(){
        return view('home');
    }

    public function index(){
        //いいね数top3取得
        $results = $this->iinecount->selectRaw('COUNT(menu_id) as countMenu ,menu_id')->groupBy('menu_id')->orderBy('countMenu','DESC')->take(3)->get()->toArray();
        
        //いいね数と対応したメニュー情報をviewに渡して表示してみる************
        foreach($results as $result){
            $menuid[] = $result['menu_id'];
            $sumiine[] = $this->iinecount->sumiine($result['menu_id']);
            $iinemenu[] = Menu::where('id',$result['menu_id'])->get()->toArray();
        }

        foreach($menuid as $id){
            $menus[] = Menu::where('id',$id)->get()->toArray();
        }

        //ランダムに6件取得
        $allmenus = $this->menu->get6menus();
        
        return view('index',[
            'menus' => $menus,
            'sum' => $sumiine,
            'allmenus' => $allmenus, 
            'results' => $results,
            'iinemenus' =>$iinemenu,
        ]);
    }

    public function mypage(){
        $result = Menu::all()->where('user_id', Auth::user()->id);
        return view('mypage',[
            'menus' => $result,
        ]);
    }

    //献立：新規登録機能
    public function createmenu(){
        return view('create.createmenu');
    }

    public function createend(MenuRequest $request){

        $path = $request->file_name->store('public/images');
        $filename = basename($path);
        $request->file_name = $filename;

        $this->menu->createmenu($request);

        return redirect()->route('index');
    }

    //献立詳細表示
    public function detailmenu(Menu $menu){
        $result = $this->iinecount->getcount($menu['id']);
        $sum = $this->iinecount->sumiine($menu['id']);
        
        return view('detailmenu',[
            'menu' => $menu,
            'result' => $result,
            'sum' => $sum,
        ]);
    }

    public function detailmenuAjax(Request $request){
        
        $result = $this->iinecount->getcount($request->postId);
        
        if(!$result){
            $this->iinecount->insertiinecount($request->postId);    
        }else{
            $this->iinecount->deleteiinecount($request);
        }

        $sumrealtime = $this->iinecount->sumiine($request->postId); 
        $json =  $sumrealtime. 'いいね';

        return $json;
    }

    //献立編集
    public function editmymenu(Menu $menu){

        return view('edit.editmenu',[
            'menu' => $menu,
        ]);
    }

    public function editend(Menu $menu,MenuRequest $request){

        $menuinstance = new Menu;
        $menuid = $menu->id;

        if($request->hasFile('file_name')){
            // 現在の画像ファイルの削除
            $menuinstance->deleteimage($menu);

            $path = $request->file_name->store('public/images');
            $filename = basename($path);
            $request->file_name = $filename;
            $this->menu->editmenu($menuid,$request);
        }

        return redirect()->route('mypage');
    }

    //献立削除
    public function deleteend(Menu $menu){
        $menu->delete();
        return redirect()->route('mypage');
    }

    //いいね献立一覧
    public function myiine(){
        $iinecount = new Iinecount();
        $result = $iinecount->iinemenu(Auth::user()->id);
        return view('myiine',[
            'result' => $result,
        ]);
    }

    //全献立表示
    public function allpage(){
        $result = Menu::all()->toArray();
        
        return view('allpage',[
            'result' => $result,
        ]);
    }

    //検索にヒットした献立の表示
    public function search(Request $request){
        $keyword = '%'.$request->keyword.'%';
        $results = $this->iinecount->orderBy('id','DESC')->take(3)->get()->toArray();

        foreach($results as $result){
            $menuid[] = $result['menu_id'];
            $sumiine[] = $this->iinecount->sumiine($result['menu_id']);
        }
        foreach($menuid as $id){
            $menus[] = Menu::where('id',$id)->get()->toArray();
        }

        $result = Menu::where('genre_id',$request->genre)->where('item','like',$keyword)->get()->toArray();

        return view('index',[
            'search' => $result, 
            'menus' => $menus,
            'sum' => $sumiine,
        ]);
    }
}
