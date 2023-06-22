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
<form class="posts" method="POST" action="{{route('user.home.post')}}" enctype="multipart/form-data">
               @CSRF
               <div class="aboba1">
                    <input class="textpost" id="content" name="newsname" type="text" require>
                    <button class="btnpost" type="submit">
               </div> 
               <div class="aboba2">
               <textarea class="textpost" id="content" name="content" ></textarea>
                <label for="img" require>выберите файл</label>
                <input id="img" name="img" type="file" class="imginput">
                <p class="selector"><select size="1" id="category" name="category">
                   <option disabled>Выберите категорию</option>
                   <option value="Спорт">Спорт</option>
                   <option value="Путешествия">Путешествия</option>
                   <option value="Музыка">Музыка</option>
                   <option value="Кино">Кино</option>
                   <option value="IT">IT</option>
                   <option value="Политика">Политика</option>
                   <option value="Киберспорт">Киберспорт</option>
                   <option value="Искусство">Искусство</option>
                  </select></p>
               </div>
                 
   </form>
   <div class="newspage-block">
    @foreach ($allposts->reverse() as $post)
        <div class="div__news">
            <div>
                <p class="search__text2">
                    <a class="search__text2" href="/post/{{$post->id}}">{{$post->newsname}}</a>
                </p>
                <p>{{$post->category}}</p>
                <p class="post__text2">{{$post->content}}</p>
                <form action="post/delete/{{$post->id}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">Delete Post</button>
            </form> 
            </div>
                             
            <img class="news-img" src="http://127.0.0.1:8000/posts/{{$post->img}}">
        </div>
    @endforeach
</div>
</body>
</html>