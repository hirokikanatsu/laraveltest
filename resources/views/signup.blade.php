
@extends('layouts.common')


@section('content')
<div class="wrapper">
        <h1 class="homeh1">ユーザーアカウントを作ろう</h1>
    <div>
        
        <div class="signupmenu">名前</div>
        <div style="margin: 20px 0;" class='sessionfont'><?php if(isset($_SESSION['name'])):?><?php echo $_SESSION['name'];?><?php endif;?></div>
        <div class="signupmenu">メールアドレス</div>
        <div style="margin: 20px 0;" class='sessionfont'><?php if(isset($_SESSION['email'])):?><?php echo $_SESSION['email'];?><?php endif;?></div>
        <div class="signupmenu">パスワード</div>
        <div style="margin: 20px 0;" class='sessionfont'><?php if(isset($_SESSION['password'])):?><?php echo $_SESSION['password'];?><?php endif;?></div>
        <div class="formFooter">
            <button class="btn btn-warning" style="width:350px;"><a href="login.php" style="text-decoration: none;">本当に登録しますか？</a></button>
        </div>
        
        <div class="formFooter">
            <button class="btn btn-link" style="width:350px;"><a href="signup.php" style="text-decoration: none;">入力画面に戻る</a></button>
        </div>
    </div>
</div>

@endsection