@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size:1rem;">商品マスター</h2>
            </div>
            <div class="text-right mb-1">
                @auth
                <a class="btn btn-success" href="{{ route('item.create') }}">新規登録</a>
                @endauth
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        @authログイン者：{{ $user_name }}@endauth
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
        @if ($message = Session::get('success'))
            <div class="alert a-success mt-1"><p>{{ $message }}</p></div>
        @endif
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>名前</th>
            <th>価格</th>
            <th>分類</th>
            <th></th>
            <th></th>
            
        </tr>
        @foreach ($items as $item)
        <tr>
            <td style="text-align:right">{{ $item->id }}</td>
            <td><a class="" href="{{ route('item.show',$item->id) }}?page_id={{ $page_id }}">{{ $item->name }}</a></td>
            <td style="text-align:right">{{ $item->kakaku }}円</td>
            <td style="text-align:right">{{ $item->bunrui }}</td>
            <td style="text-align:center">
            @auth<a class="btn btn-primary" href="{{ route('item.edit',$item->id) }}">変更</a>@endauth
            </td>
            <td style="text-align:center">
            @auth('admin')
                <form action="{{ route('item.destroy',$item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('削除しますか？');">削除</button>
                </form>
            @endauth
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $items->links('pagination::bootstrap-5') !!}
 
@endsection
