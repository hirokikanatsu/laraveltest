

@extends('layouts.common')

@section('content')
<div class='indexwrapper'>   
    <div class="indexwrap">
        <div class="d-flex bd-highlight mb-3">
            <div class="me-auto p-2 bd-highlight"><h1 class="indexh1">my献立一覧</h1></div>
            <div class="p-2 bd-highlight">
                <div><a href="{{ route('createmenu') }}" class="text-right allmenus">my献立新規作成</a></div>
            </div>
        </div>

        <div class="containerwrap">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">献立名</th>
                    <th scope="col">更新日</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                
                <tbody>

                    @if($menus)
                        <?php $i=0; while($i < count($menus)): ?>    
                                <tr>   
                                    <th scope="row"><?php echo $i+1; ?></th>
                                    <td><?php echo $menus[$i]['name']; ?></td>
                                    <td><?php echo $menus[$i]['updated_at']; ?></td>
                                    <td><a href="{{ route('detailmenu',['menu'=>$menus[$i]['id']])}}">詳細</a></td>
                                    <td><a href="{{ route('editmymenu',['menu' =>$menus[$i]['id']]) }}">編集</a></td>
                                    <td><a href="{{ route('deleteend',['menu' =>$menus[$i]['id']]) }}" onclick="return confirm('削除してもよろしいですか？')">削除</a></td>                                
                                </tr>
                            <?php  $i++ ?>        
                        <?php endwhile; ?>
                    @endif
                    
                    
                   
                    
                </tbody>
            </table>
                        
        </div>
        <button type="button" class="btn btn-light text-right pageback" style="font-size: 30px; width:350px;"><a href="{{ route('myiine') }}">myいいねページへ</a></button>
        <button type="button" class="btn btn-info text-right pageback" style="font-size: 30px; width:200px;"><a href="{{ route('index') }}">トップに戻る</a></button>
        
    </div>
@endsection