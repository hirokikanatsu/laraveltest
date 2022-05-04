
@extends('layouts.common')

@section('content')
<div class='indexwrapper'>   
    <div class="indexwrap">
        <div class="d-flex bd-highlight mb-3">
            <div class="me-auto p-2 bd-highlight"><h1 class="indexh1">my献立編集</h1></div>
        </div>

        <div class="containerwrap">
            <form action="{{ route('editend',['menu' =>$menu]) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @if($errors->any())
                    <div class='alert alert-danger'>
                        <ul>
                            @foreach($errors->all() as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div> 
                 @endif
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 col-form-label" style="font-size: 30px;">献立名</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" placeholder="献立名" value="<?php if(isset($menu['name'])):?><?php echo $menu['name'];?><?php endif;?>">
                    </div>
                    <label for="" class="col-sm-2 col-form-label" style="font-size: 30px;">食材</label>
                    <div class="col-sm-10">
                        <textarea style="margin-bottom: 20px;" class="form-control formarea" name="item"><?php if(isset($menu['item'])):?><?php echo $menu['item'];?><?php endif;?></textarea>
                       
                    </div>
                    <label for="" class="col-sm-2 col-form-label" style="font-size: 30px;">作り方</label>
                    <div class="col-sm-10">
                        <textarea style="margin-bottom: 20px;" class="form-control formarea" name="howtomake" ><?php if(isset($menu['howtomake'])):?><?php echo $menu['howtomake'];?><?php endif;?></textarea>

                    </div>
                    <label for="" class="col-sm-2 col-form-label" style="font-size: 30px;">価格</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="price" placeholder="価格" value="<?php if(isset($menu['price'])):?><?php echo $menu['price'];?><?php endif;?>">円
                    </div>
                    <label class="col-sm-2 col-form-label" style="font-size: 30px;">ジャンル</label>
                    <select class="form-select col-sm-10" name='genre_id' style="width:500px; margin:20px 0 0 20px;" aria-label="Default select example">
                        <option value="1">米</option>
                        <option value="2">サラダ</option>
                        <option value="3">汁物</option>
                        <option value="4">パスタ</option>
                        <option value="5">メインディッシュ</option>
                    </select>
                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label" style="font-size: 30px;">献立画像</label>
                        <input class="filecss col-sm-10" style="width:500px; margin-left:10px;" type="file" name="file_name">
                    </div>  
                </div>
                <input type="hidden" name='user_id' value={{ Auth::user()->id }}>
                
            
                <input type="submit" class=" fadeIn fourth" style="font-size: 30px;" value="編集" onclick="return confirm('編集してもよろしいですか？')">
            </form>   
        </div>
        
        <button type="button" class="btn btn-info text-right pageback" style="font-size: 30px;" ><a href="{{ route('mypage') }}">戻る</a></button>
        
        
    </div>
@endsection