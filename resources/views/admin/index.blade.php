<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('商品マスター') }}
        </h2>
    </x-slot>

    <!-- メニューのコンテンツ -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-left">
                                <h2 style="font-size:1rem;">商品マスター</h2>
                            </div>
                            <div class="text-right mb-1">
                                @auth
                                <a class="btn btn-success" href="{{ route('admin.item.create') }}">新規登録</a>
                                @endauth
                            </div>
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
                            @auth('admin')<th>変更</th>@endauth
                            @auth('admin')<th>削除</th>@endauth
                        </tr>
                        @foreach ($items as $item)
                            <tr>
                                <td style="text-align:right">{{ $item->id }}</td>
                                <td><a class="" href="{{ route('admin.item.show',$item->id) }}?page={{ $page }}">{{ $item->name }}</a></td>
                                <td style="text-align:right">{{ $item->kakaku }}円</td>
                                <td style="text-align:right">{{ $item->bunrui }}</td>
                                @auth
                                    <td style="text-align:center">
                                        <a class="btn btn-primary" href="{{ route('admin.item.edit',$item->id) }}">変更</a>
                                    </td>
                                @endauth
                                @auth('admin')
                                    <td style="text-align:center">
                                        <form action="{{ route('admin.item.destroy',$item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('削除しますか？');">削除</button>
                                        </form>
                                    </td>
                                @endauth
                            </tr>
                        @endforeach
                    </table>
                    {!! $items->links('pagination::bootstrap-5') !!}
                </div>
            </div>
</x-admin-layout>