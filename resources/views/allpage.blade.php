
@extends('layouts.common')

@section('content')
<div class='indexwrapper'>   
    <div class="indexwrap">
        <div class="d-flex bd-highlight mb-3">
            <div class="me-auto p-2 bd-highlight"><h1 class="indexh1">全献立一覧</h1></div>
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
                    </tr>
                </thead>
                
                <tbody>
                    <?php $i=0; while($i < count($result)): ?>    
                                <tr>   
                                    <th scope="row"><?php echo $i+1; ?></th>
                                    <td><?php echo $result[$i]['name'];?></td>
                                    <td><?php echo $result[$i]['updated_at'];?></td>
                                    <td><a href="{{ route('editmymenu',['menu' => $result[$i]['id']] )}}">編集</a></td>
                                    <td><a href="{{ route('deleteend',['menu' => $result[$i]['id']] )}}" onclick="return confirm('削除してもよろしいですか？')">削除</a></td>                                
                                </tr>
                        <?php  $i++ ?>        
                    <?php endwhile; ?>
                    
                </tbody>
            </table>
                        
        </div>
        <button type="button" class="btn btn-light text-right pageback" style="font-size: 30px;  width:350px;"><a href="{{ route('mypage') }}">my献立一覧に戻る</a></button>
        <button type="button" class="btn btn-info text-right pageback" style="font-size: 30px;"><a href="{{ route('index') }}">戻る</a></button>
    </div>

@endsection