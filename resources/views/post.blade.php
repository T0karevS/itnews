@include('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset("css/index.css")}}'>
    <link rel="stylesheet" href='{{ asset("css/style.css")}}'>
    <title>Document</title>
</head>
<body>
    <section>
        <div class="newspage__block">
                         <P>{{  $allinfo->first()->newsname; }}</P>
                    
                         <p>{{ $allinfo->first()->category; }}</p>
                   
                   
                         {!! html_entity_decode($allinfo->first()->content) !!}
                   
                     <img class="news__picture" src="/posts/{{ $allinfo->first()->img; }}" alt="">
        <form class="posts" method="POST" action="{{route('user.news.comments')}}" enctype="multipart/form-data">
               @CSRF
               <div class="aboba1">
                    <input class="textpost"  name="text" type="text" placeholder="Напишите комментарий">
                    <button class="btnpost" type="submit">Оставить комментарий</button>
                    <input type="hidden" name="post_id" value="{{ $allinfo->first()->id }}">
               </div> 
        </form>
        <h2>Комментарии</h2>
        @php
        foreach ($allcomms->reverse() as $comment) {
            $user_id = $comment->user_id;
            $allusers = DB::table('users')->where('id', $user_id)->get();
            echo '<div class="div__comms">
                     <img class="pfp__comms" src="' . sprintf('/avatars/%s', $allusers->first()->avatar) . '" alt="">
                     <div class="profile__small">
                        <p class="search__text2"> <a class="search__text2" href="/user/'.$comment->user_id.'">'.$allusers->first()->name.'</a></p>
                        <p class="comment__text">'.$comment->text.'</p> 
                    </div> 
                    
                     
                </div>';
            }
        @endphp
    </section>
</body>
</html>