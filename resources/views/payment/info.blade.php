@extends('layouts.template')
@section('content')
<div class="main_title">
  <h1>MEMBER INFOMATION</h1>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">現在登録しているクレジットカード</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            @if (session('success'))
              <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
            @endif

            @if (session('errors'))
              <div class="alert alert-danger" role="alert">
                {{ session('errors') }}
              </div>
            @endif

            <div class="form-group">
              @isset($defaultCard)
                <ul class="list-group">
                  <li class="list-group-item"><span>カード番号：</span><span>{{$defaultCard["number"]}}</span></li>
                  <li class="list-group-item"><span>カード有効期限（月/年)：</span><span>{{$defaultCard["exp_month"]}}/{{$defaultCard["exp_year"]}}</span></li>
                  <li class="list-group-item"><span>カード名義：</span><span>{{$defaultCard["name"]}}</span></li>
                  <li class="list-group-item"><span>カードブランド：</span><span>{{$defaultCard["brand"]}}</span></li>
                </ul>
              @else
                <p>現在登録されているクレジットカードはありません。</p>
              @endif
            </div>

            @isset($defaultCard)
              <div class="form-group">
                <a href="{{route('createPayment')}}" class="btn btn-primary">使用するクレジットカード情報を変更</a>
              </div>

              <div class="form-group">
                <form action="{{route('destroyPayment.')}}" method="POST">
                  @csrf
                    <button class="btn btn-danger">登録しているクレジットカード情報を削除</button>
                </form>
              </div>
                @else
                  <div class="form-group">
                    <a href="{{route('createPayment')}}" class="btn btn-primary">クレジットカード情報を新規登録</a>
                  </div>
                @endif
                  <p><a href="{{route('info')}}">会員情報に戻る</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection