
@extends('layouts.common')

@section('content')
    <div class="wrapper">
        <h1 class="homeh1">パスワード変更</h1>

        <div id="formContent">
            <form action= "{{ route('password_reset') }}" method="POST">
                @csrf
                <input type="text" id="email" class="fadeIn second" name="email" placeholder="メールアドレス">
                  <p><?php if(isset($_SESSION['sendmail'])):?><?php echo $_SESSION['sendmail'];?><?php endif;?></p>
                  <p style="color:red;"><?php if(isset($_SESSION['error'])):?><?php echo $_SESSION['error'];?><?php endif;?></p>
                <input type="submit" class="fadeIn fourth" style="font-size: 20px;" name='confirm' value="確認へ">
            </form>

            <div id="formFooter">
                <a class="underlineHover" href="login.php">戻る</a>
            </div>
        </div>
    </div>
@endsection