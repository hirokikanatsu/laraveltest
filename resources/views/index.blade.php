<?php
$a = 0;
$b = 0;

?>

@extends('layouts.common')

@section('content')
<div class='indexwrapper'>   
    <div class="indexwrap">
        @if(Auth::user()->role === 1)
            <div><a href="{{ route('allpage') }}" class="allmenus">～全献立一覧はこちら～</a></div>
        @endif
            

        <div class="containerwrap">
            <div class="container" >

            <h3 class="indexh1">キーワードで検索しよう</h3>

            <div class='reseach'>
                <div class="input-group mb-3 reserchform rounded-2" >
                    <form action="{{ route('search') }}" method="POST" style="display: flex; margin:0 auto;">
                        @csrf
                        <select class="form-select col-sm-10" name='genre' style="width:300px;" aria-label="Default select example">
                            <option value="1">米</option>
                            <option value="2">サラダ</option>
                            <option value="3">汁物</option>
                            <option value="4">パスタ</option>
                            <option value="5">メインディッシュ</option>
                        </select>
                        <input type="text" name='keyword' class="form-control" aria-label="Text input with dropdown button"  placeholder="キーワードを入力してください" style="width:500px; margin-left: 50px;">
                        <input type="submit" class="fadeIn fourth search_btn" name='search' value="検索">
                    </form>
                </div>
               
                <?php if(isset($search)): ?>
                    <?php if(!empty($search)): ?>
                        <div style="width:1200px; height:600px;">        
                            <?php foreach($search as $result): ?>
                                <div style="float:left; margin:0 50px 130px 0;">
                                <a href="{{ route('detailmenu',['menu' => $result['id']]) }}" style="height: 400px;">
                                    <img src="/storage/images/<?php echo $result['file_name']; ?>" alt="画像なし"  style='width:380px; height:400px; margin:0 0px 20px 0;' >
                                    <p style="margin-bottom: 130px;"><?php echo $result['name'];?></p>
                                </a>  
                                </div>          
                            <?php endforeach; ?>
                    <?php else: ?>
                            <p style="font-weight: bold; font-size:50px;"><?php echo '検索結果がありませんでした'; ?></p>
                            
                        </div>
                    <?php endif; ?>
                <?php endif; ?>  
               
            </div>


            <h2 class="indexh1">ランキングTOP３</h2>
            
            <div class="ranking">
                <div class="container">
                    <div class="row">
                        <div style="float:left; margin:20 50px 100px 0;">
                        <?php foreach($iinemenus as $iinemenu): ?>
                                <a href="{{ route('detailmenu',['menu'=> $iinemenu[0]['id']]) }}" style="height: 400px; text-decoration: none" >
                                    <img src="/storage/images/<?php echo $iinemenu[0]['file_name']; ?>" alt="画像なし"  style='width:370px; height:400px; margin:0 45px 20px 0;' >
                                    <p style="font-size: 30px; font-weight;bold;"><?php echo  $b+1; ?>位</p>
                                    <p style="margin-bottom: 20px; font-size: 40px; font-weight;bold; width:400px;"><?php echo $iinemenu[0]['name'];?></p>
                                    <p  style="margin-bottom: 100px; font-size: 23px;">いいね数　:<?php echo $sum[$b]; ?></p>
                                </a>
                                <?php $b++; ?>
                            <?php endforeach; ?>   
                        </div>  
                    </div>
                </div>
            </div>

            <div class="me-auto p-2 bd-highlight"><h1 class="indexh1">献立一覧</h1></div>
                       
                <?php if(isset($allmenus)): ?>
                    <?php foreach($allmenus as $allmenu): ?>
                            <div id='count' style=" margin:0 50px 130px 0;" value=0>
                                <a href="{{ route('detailmenu',['menu' => $allmenu['id']]) }} " style="height: 400px; text-decoration: none ">
                                    <img src="/storage/images/<?php echo $allmenu['file_name']; ?>" alt="画像なし"  style='width:380px; height:400px; margin:0 0px 20px 0;' >
                                    <p style="float:right; margin:130px 0 0 30px; font-size: 40px;"><?php echo $allmenu['name'];?></p>
                                </a>  
                                <?php $a++; ?>
                            </div>          
                    <?php endforeach; ?>
                <?php endif; ?> 
            </div>
        </div>
    </div>

@endsection