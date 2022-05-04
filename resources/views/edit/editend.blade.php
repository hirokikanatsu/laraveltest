    
@extends('layouts.common')

@section('content')   
    
    <div class='indexwrapper'>   
        <div class="endwrap">
        <h1 class='endh1'>編集しました</h1>

        <div class="d-grid gap-2 col-6 btnwrap">
            <button type="button" class="btn btn-light endbtn" style="background-color:#ecef99; font-size:30px;" ><a href="mypage.php" style="color:black">my献立一覧画面に戻る</a></button>
            <button type="button" class="btn btn-secondary btn-lg endbtn" style="font-size:30px;"><a href="index.php" style="color:black" >献立メイン画面に戻る</a></button>
            <?php if($_SESSION['user']['role'] == 1): ?>
              <button type="button" class="btn btn-secondary btn-lg endbtn" style="font-size:30px;"><a href="allpage.php" style="color:black" >全献立画面に戻る</a></button>
            <?php endif; ?>
        </div>
    </div>
@endsection