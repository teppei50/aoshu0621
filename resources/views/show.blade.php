@extends('app')
   
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">商品詳細画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/items') }}?page={{ $page_id }}">戻る</a>

        </div>
    </div>
</div>
 
<div style="text-align:left;">
<form action="{{ route('item.update',$item->id) }}" method="POST">
    @method('PUT')
    @csrf
     
    <div class="row">
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                {{ $item->name }}                
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                {{ $item->kakaku }}                
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                @foreach ($bunruis as $bunrui)
                    @if($bunrui->id==$item->bunrui) {{ $bunrui->str }} @endif
                @endforeach         
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            {{ $item->shosai }}                
            </div>
        </div>
    </div>
</div>
@endsection