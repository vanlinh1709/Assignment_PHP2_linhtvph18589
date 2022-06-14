@extends('layout.mainProduct')                         
@section('infoProduct')                           
    <div class="welcome-hero-txt">
  
  <h2>{{$product->name}}</h2>
  <p>
    {{$product->detail}}
  </p>
  <div class="packages-price">
    <p>
      {{$product->price}}$
      <del>{{$product->promotion}}%</del>
    </p>
  </div>
  <button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
    <span class="lnr lnr-plus-circle"></span>
    add <span>to</span> cart
  </button>
  <button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
    more info
  </button>
</div>
@endsection

@section('img')
<img src="{{ BASE_URL . $product->main_image}}" width="150%" alt="slider image">
@endsection