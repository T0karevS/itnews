@include('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href='{{ asset("css/index.css")}}'>
    <link rel="stylesheet" href='{{ asset("css/style.css")}}'>
    <title>Document</title>
</head>
<body>
 <form id="posts" class="posts" method="POST" action="{{route('user.home.post')}}" enctype="multipart/form-data">
               @CSRF
               <div class="aboba1">
                    <input class="textpost" id="newsname" name="newsname" type="text" require>
                    <button onclick="myFunction()" class="btnpost" type="submit">Опубликовать новость</button>
               </div> 
               <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
            <!-- Create the editor container -->
            <div id="editor"></div>

            <!-- Include the Quill library -->
            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

            <!-- Initialize Quill editor -->
            <input type="hidden" name="content" id="quill-content" >
            <div class="aboba2">
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
               <script>
        var quill = new Quill('#editor', {
        theme: 'snow'
        });
        $('form').submit(function() {
            document.getElementById('quill-content').value = quill.root.innerHTML; 
            console.log(quill.root.innerHTML);
        });
    </script>
   </form> 

   <div class="newspage-block">
    @foreach ($allposts->reverse() as $post)
        <div class="div__news">
                <p class="search__text2">
                    <a class="search__text2" href="/post/{{$post->id}}">{{$post->newsname}}</a>
                </p>
            <div class="div__news__info">
                <div class="div__news__photo"> 
                    <img class="news-img" src="http://127.0.0.1:8000/posts/{{$post->img}}">   
                </div> 
                <div >
                     <!-- <p>{{$post->category}}</p> -->
                    {!! html_entity_decode($post->content) !!}
                    <form action="post/delete/{{$post->id}}" method="post">
                    @csrf
                        <input type="hidden" name="_method"  value="DELETE">
                        <button class="btnpost" type="submit">Delete Post</button>
                    </form> 
                </div>     
            </div>               
        </div>
    @endforeach
</div>
    
</body>
</html>