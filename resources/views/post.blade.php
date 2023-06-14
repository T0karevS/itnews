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
        <div class="punkt">
                         <p>Имя:</p>
                         <P>{{  $allinfo->first()->content; }}</P>
                     </div>
                     <DIV class="punkt">
                         <p>email:</p>
                         <p>{{ $allinfo->first()->category; }}</p>
                     </DIV> 
                     <img class="pfp" src="/posts/{{ $allinfo->first()->img; }}" alt="">
    </section>
</body>
</html>