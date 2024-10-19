@section('list-products')
    <div class="mt-6 p-1 items-center max-w-screen-xl mx-auto">
        @foreach($items as $item)
            <div class="mb-2 grid grid-cols-1 lg:grid-cols-12 gap-2">
                <div class="text-center col-span-1 border">
                    <p class="text-lg">{{ $item->id }}</p>
                </div>
                <div class="text-center col-span-9 border">
                    <p class="text-lg">{{ $item->name }}</p>
                </div>
                <div class="text-center col-span-2 border">
                    <a href="{{ route('edit-product-backend', ['id' => $item->id]) }}" class="text-lg text-blue-500">{{ __('Редагувати') }}</a>
                </div>
            </div>
        @endforeach
            <div class="mt-6 p-1 flex flex-col justify-center items-center max-w-screen-xl mx-auto">
            {{ $items->links('pagination::tailwind') }}
            </div>
    </div>
@endsection
