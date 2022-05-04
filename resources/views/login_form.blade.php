
@extends('layouts.common')

@section('content')
<div class="wrapper">
  <div id="formContent">
    <!-- Tabs Titles -->


    <!-- Login Form -->
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="メールアドレス">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="パスワード">
      <p style="color:red;"><?php if(isset($login)):?><?php echo $login;?><?php endif;?></p>
      <input type="submit" class="fadeIn fourth" name='login' value="ログイン">
    </form>

    <!-- Remind Passowrd -->
    <div class="formFooter">
      <a class="underlineHover" href="{{ route('signup_form') }}">新規登録</a>
    </div>

    <div class="formFooter">
      <a class="underlineHover" href="{{ route('password_reset_form') }}">パスワードを忘れた方はこちらへ</a>
    </div>

  </div>
</div>
@endsection