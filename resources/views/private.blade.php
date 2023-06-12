@include('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ asset("css/index.css")}}'>
    <link rel="stylesheet" href='{{ asset("css/style.css")}}'>
    <title>Document</title>
</head>
<body>
<form class="posts" method="POST" action="{{route('user.home.post')}}" enctype="multipart/form-data">
               @CSRF
               <div class="aboba1">
                    <input class="textpost" id="content" name="content" type="text" >
                    <button class="btnpost" type="submit">
               </div> 
               <div class="aboba2">
                <label for="img">выберите файл</label>
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
<!-- <header>
    <div class="header">
        <div class="logo_div">
            <a class="image__a" href="index.php">
                <img src="img/svg/logo.svg" class="logo">
            </a>
        </div>
        <form method="get" class="menu">
            <input type="hidden" name="category" value="Web">
            <input type="submit" value="Категории">
        </form>
        <form method="get" class="menu" >
            <input type="hidden" name="category" value="Tech">
            <input type="submit" value="Недавние">
        </form>
        <form method="get" class="menu" >
            <input type="hidden" name="category" value="Design">
            <input type="submit" value="О нас">
        </form>
        <form method="get" class="search">
            <input type="text" name="search" class="header__search">
            <button type="submit" class="header__btn"></button>
            
            
            <div class="header__reg">
                <a href="../login"><img src="img/svg/user.svg" class="user_pic"></a>
                <p><a href="../login">войти</a></p>
            </div>
    </div>
</header> -->
@php 
    foreach ($allposts->reverse() as $post) {
             echo '<div class="postcard">
                     <p class="posttext">'.$post->category.'</p>
                     <p class="posttext">'.$post->content.'</p>
                    <img class="postpic" src="	http://127.0.0.1:8000/posts/'.$post->img.'">
                </div>';
         }
@endphp
<div class="newspage-block">
        <div class="div__news" >
                    <img class="news-img" src="img\png\62ba3a26249b8.jpg" >
                    <div class="news__stuff">
                    <h2 class="search__text">Lorem ipsum</h2>   
                    <p class="search__text2" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae excepturi officia mollitia explicabo accusamus facere repudiandae, magnam libero totam iste modi, est ab doloribus veritatis nostrum tempora autem, quaerat quod!</p>
                    <div>
                        <p class="post__author" >author</p>
                        <p class="post__time">time</p>
                    </div>
                </div>
               
        </div>
        <div class="div__news">
                    <img class="news-img" src="img\png\62ba3a26249b8.jpg" >
                    <div class="news__stuff">
                    <h2 class="search__text">Lorem ipsum</h2>   
                    <p class="search__text2" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae excepturi officia mollitia explicabo accusamus facere repudiandae, magnam libero totam iste modi, est ab doloribus veritatis nostrum tempora autem, quaerat quod!</p>
                    <div>
                        <p class="post__author" >author</p>
                        <p class="post__time">time</p>
                    </div>
                </div>
               
        </div>
</div>
</body>
</html>