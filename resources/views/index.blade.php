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

<div class="newspage-block">
    @php 
        foreach ($allposts->reverse() as $post) {
             echo '<div class="div__news">
                     <div>
                        <p class="search__text2"> <a class="search__text2" href="/post/'.$post->id.'">'.$post->newsname.'</a></p>
                        <p>'.$post->category.'</p>
                        <p class="post__text2">'.$post->content.'</p>
                     </div>
                     <!-- <p class="search__text2">'.$post->content.'</p> -->
                    <img class="news-img" src="	http://127.0.0.1:8000/posts/'.$post->img.'">
                </div>';
        }
    @endphp
</div>
</body>
</html>