
@extends('layouts.common')

@section('content')
<div class="wrapper">
        <h1 class="homeh1">ユーザーアカウントを作ろう</h1>

        <div id="formContent">
            <form action="{{ route('signup') }}" method="POST">
                @csrf
                <input type="text" id="name" class="fadeIn second" name="name" placeholder="ユーザー名" value="<?php if(isset($_SESSION['name'])):?><?php echo $_SESSION['name'];?><?php endif;?>">
                  <p style="color:red;"><?php if(isset($_SESSION['err']['name'])):?><?php echo $_SESSION['err']['name'];?><?php endif;?></p>
                <input type="text" id="email" class="fadeIn second" name="email" placeholder="メールアドレス" value="<?php if(isset($_SESSION['email'])):?><?php echo $_SESSION['email'];?><?php endif;?>">
                  <p style="color:red;"><?php if(isset($_SESSION['err']['email'])):?><?php echo $_SESSION['err']['email'];?><?php endif;?></p>
                <input type="text" id="password" class="fadeIn third" name="password" placeholder="パスワード" value="<?php if(isset($_SESSION['password'])):?><?php echo $_SESSION['password'];?><?php endif;?>">
                  <p style="color:red;"><?php if(isset($_SESSION['err']['password'])):?><?php echo $_SESSION['err']['password'];?><?php endif;?></p>
                <input type="submit" class="fadeIn fourth" style="font-size: 20px;" name='confirm' value="確認へ">
            </form>

            <div id="formFooter">
                <a class="underlineHover" href="{{ route('home') }}">戻る</a>
            </div>
        </div>
    </div>
@endsection