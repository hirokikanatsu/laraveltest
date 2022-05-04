
@extends('layouts.common')

@section('content')
<div class='indexwrapper'>   
    <div class="indexwrap">
        <div class="d-flex bd-highlight mb-3" >
            <div class="me-auto p-2 bd-highlight"><h1 class="indexh1">献立詳細</h1></div>
            @if(!empty($menu['file_name']))
                <div class="p-2 bd-highlight">
                    <div class="text-right" ><img src="/storage/images/<?php echo $menu['file_name']; ?>" alt='画像なし' style="width:400px; height:400px;"></div>
                </div>
            @else
                <div class="p-2 bd-highlight">
                    <div class="text-right" ><img src="#" alt='画像なし' style="width:400px; height:400px;"></div>
                </div>
            @endif
        </div>

        <div class="containerwrap"  style="margin-top:100px;">
            <form action="#" method="POST">
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 col-form-label" style="font-size: 30px; font-weight:bold;">献立名</label>
                    <div class="col-sm-10">
                        <p class="info" style="font-weight: bold;"><?php echo $menu['name']; ?></p>
                    </div>
                    <label for="" class="col-sm-2 col-form-label" style="font-size: 30px;">食材</label>
                    <div class="col-sm-10">
                        <p class="info" id="textspace" style="white-space:pre-wrap;"><?php echo $menu['item']; ?></p>
                    </div>
                    <label for="" class="col-sm-2 col-form-label" style="font-size: 30px;">作り方</label>
                    <div class="col-sm-10">
                        <p class="info" id="textspace" style="white-space:pre-wrap;"><?php echo $menu['howtomake']; ?></p>
                    </div>
                    <label for="" class="col-sm-2 col-form-label" style="font-size: 30px;">価格</label>
                    <div class="col-sm-10">
                        <p class="info"><?php echo $menu['price']; ?>円</p>
                    </div>
                </div>
            </form>   
        </div>
        
        <section class="post"  data-postid="<?php echo $menu['id'] ?>">
                <button type="button" class="btn btn-danger text-right pageback btn_good"   style="background-color: #f6f7de;">
                    <i class="<?php if($result){
                        echo 'active' ;}?>" style="font-size: 60px; line-height:50px;">&hearts;</i>
                </button>
            </section>
            <p style="font-size: 30px;" class='iinesum'><?php if(isset($sumrealtime)){echo $sumrealtime;}else{ echo $sum; } ?>いいね</p>
            

        
        <button type="button" class="btn btn-info text-right pageback" style="font-size: 30px; width:250px;" ><a href="{{ route('index') }}">トップへ戻る</a></button>
        <button type="button" class="btn btn-warning text-right pageback" style="font-size: 30px; width:250px;" ><a href="{{ route('mypage') }}">my献立へ戻る</a></button>
    </div>
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
        $(function(){
            var $good = $('.btn_good'),goodPostId;
            $good.on('click',function(e){
                e.preventDefault();
                var $this = $(this);

                goodPostId = <?php echo $menu['id']; ?>;
                user_id = <?php echo Auth::user()->id; ?>;


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                $.ajax({
                    type:'POST',
                    url:'/detailmenu',
                    dataType:'text',
                    data:{ postId:goodPostId,
                            user_id:user_id}
                }).done(function(data){
                    $this.children('i').toggleClass('off');
                    $this.children('i').toggleClass('active');
                    var iinedata = data;
                    $('.iinesum').html(iinedata);
                }).fail(function(msg){
                    alert('失敗しました');
                })
            })
        })

        
    </script>
  </body>
</html>