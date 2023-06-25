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
<div class="newspage-block">
    @php 
        foreach ($allposts->reverse() as $post) {
            echo '<div class="div__news">
                    <div class="div__news__info">
                        <p class="search__text2"> <a class="search__text2" href="/post/'.$post->id.'">'.$post->newsname.'</a></p>
                        <p class="search__text3">'.$post->category.'</p>
                        <p>'.$post->content.'</p>
                    </div>
                    <div class="div__news__photo">
                        <img class="news-img" src="	http://127.0.0.1:8000/posts/'.$post->img.'">
                    </div>
                    
                </div>';
        }
    @endphp
</div>
</body>
</html>