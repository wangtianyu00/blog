<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TY's Blog</title>
  <!--link rel="stylesheet" href="bootstrap.min.css" type="text/css" media="all"-->
  <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <!-- 头部 -->
  <nav class="navbar navbar-default" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#titlebar">
          <span class="sr-only">切换导航</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
		    <div class="title">
			    <a class="navbar-brand" href="/" alt="凌云天羽"><img src="/images/avatar2.png"></a>
		    </div>
      </div>
      <div class="collapse navbar-collapse" id="titlebar">
        <ul class="nav navbar-nav top-navbar-nav">
          @foreach($categories as $category)
                <li class=""><a href="{{$category->path}}">{{$category->name}}</a></li>
          @endforeach
          {{--<li class=""><a href="#">分类</a></li>--}}
          {{--<li class=""><a href="#">日期</a></li>--}}
          {{--<li class=""><a href="#">笔记</a></li>--}}
          {{--<li class=""><a href="#">博文</a></li>--}}
          {{--<li class=""><a href="#">随笔</a></li>--}}
        </ul>
      </div>
      {{--{{$articles->links()}}--}}
    </div><!-- container-fluid -->
  </nav><!-- navbar -->
  <!-- 内容 -->
  <div class="container">
    <!-- <div class="hidden-xs col-sm-2 col-md-2 col-lg-2">
      <div class="left">
        <ul>
          <li><a href="#">星际争霸</a></li>
          <li><a href="#">皇室战争</a></li>
          <li><a href="#">文明6</a></li>
        </ul>
      </div>
    </div> -->
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="posts">
        <ul class="list-unstyled">
          @foreach($articles as $article)
                <li><a href="/article/{{$article->id}}" class="postname">{{$article->title}}<p class="posttime">{{$article->created_at->toDateString()}}</p></a></li>
          @endforeach
        </ul>
      </div>
      <div class="pagi">
        <div style="position:absolute;left:0px;bottom:0px; width:100%;margin:0px auto;text-align:center;">
          {{$articles->links()}}
        </div>
      </div>
    </div>
  </div>
  <!-- 底部 -->
  <div id="footer" class="copyright">
  	<span><p>凌云天羽 | 蜀ICP备15021845号-1 | <a type="button" href="/admin">登陆</a></p></span>

  </div>
	  <script src="/js/ty.js"></script>
</body>
</html>
