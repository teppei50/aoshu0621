@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">受注入力更新画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/admin/juchus') }}">戻る</a>
        </div>
    </div>
</div>
 
<div style="text-align:left;">
<form action="{{ route('admin.juchu.update', ['juchu' => $juchu->id]) }}" method="POST">
    @method('PUT')
    @csrf
     
    <div class="row">   
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="kyakusaki_id" class="form-select">
                    <option>客先を選択してください</option>
                    @foreach ($kyakusakis as $kyakusaki)
                        <option value="{{ $kyakusaki->id }}"@if($kyakusaki->id==$juchu->kyakusaki_id) selected @endif>{{ $kyakusaki->name }}</option>
                    @endforeach
                </select>
                @error('kyakusaki_id')
                <span style="color:red;">客先を選択してください</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="item_id" class="form-select">
                    <option>商品を選択してください</option>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}"@if($item->id==$juchu->item_id) selected @endif>{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('item_id')
                <span style="color:red;">商品を選択してください</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="kosu" value="{{ $juchu->kosu }}" class="form-control" placeholder="個数">
                @error('kosu')
                <span style="color:red;">個数を1～12までの数値で入力してください</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="joutai_id" class="form-select">
                    <option>状態を選択してください</option>
                    @foreach ($joutais as $joutai)
                        <option value="{{ $joutai->id }}"@if($joutai->id==$juchu->joutai) selected @endif>{{ $joutai->name }}</option>
                    @endforeach
                </select>
                @error('joutai_id')
                <span style="color:red;">状態を選択してください</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <button type="submit" class="btn btn-primary w-100">変更</button>
        </div>
    </div>      
</form>
</div>
@endsection
