@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size: 1rem;">商品詳細画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/admin/items') }}?page={{ $page }}">戻る</a>
        </div>
    </div>
</div>

<div style="text-align: left;">
    <table class="table table-bordered">
        <tr>
            <th>項目名</th>
            <th></th>
        </tr>
        <tr>
            <td>名前</td>
            <td>{{ $item->name }}</td>
        </tr>
        <tr>
            <td>価格</td>
            <td>{{ $item->kakaku }}</td>
        </tr>
        <tr>
            <td>分類</td>
            <td>{{ $bunruis->str }}</td>
        </tr>
        <tr>
            <td>詳細</td>
            <td>{{ $item->shosai }}</td>
        </tr>
    </table>
</div>
@endsection
