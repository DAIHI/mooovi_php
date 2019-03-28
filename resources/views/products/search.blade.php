@extends('review_site')

@section('content')
<div id="main_cnt_wrapper">
  <div id="yjContentsBody">
    <div class="yjContainer">
      <span class="yjGuid"><a id="yjContentsStart" name="yjContentsStart"></a><img alt="ここから本文です" height="1" src="http://i.yimg.jp/yui/jp/tmpl/1.1.0/audionav.gif" width="1"></span>
      <div id="yjMain">
        <article class="section">
          <div class="container">
            <header class="header header--section">
              <h2 class="text-middle">
                <i class="fa fa-film color-gray-light"></i>投稿する作品を検索
              </h2>
            </header>
            <form action='/products/search' accept_sharset="UTF-8" method="get">
              <input class="search__query" name="keyword" placeholder="作品名で検索" type="text" value=""><button class="btn-search" title="検索" type="submit"><i class="fa fa-search"></i></button>
            </form>
            <form accept-charset="utf-8" action="/" class="js-search-submit" method="get">
            </form>
          </div>
        </article>
        <article class="section">
          <div class="container">
            <header class="header header--section">
              <h2 class="text-middle">
                <i class="fa fa-film color-gray-light"></i>検索結果
              </h2>
            </header>
            <ul class="listview js-lazy-load-images">
              @foreach ($products as $product)
              <li>
                <a class="listview__element--right-icon" href="/products/{{ $product->id }}/reviews/create" title="{{ $product->title }}">
                  <div class="position-right p1em">
                    <i class="fa fa-angle-double-right icon-chevron-right color-sub"></i>
                  </div>
                  <div class="row no-space-bottom">
                    <div class="col2">
                      <div class="thumbnail thumbnail--movies">
                        <div class="thumbnail__figure" style="background-image: url({{ $product->image_url }});" title="{{ $product->title }}"></div>
                      </div>
                    </div>
                    <div class="col6 push6">
                      <h3 class="text-middle text-break">
                        <span class="color-sub">{{ $product->title }}</span>
                      </h3>
                    </div>
                  </div>
                </a>
              </li>
              @endforeach
            </ul>
          </div>
        </article>
      </div>
      <div id="yjSub">
@endsection
