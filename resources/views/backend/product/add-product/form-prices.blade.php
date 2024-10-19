@section('form-prices')
    @if($model->id ?? null)
    <form method="POST" id="add-prices-product" action="{{ route('add-prices-product-backend') }}" class="max-w-lg mx-auto mb-6">
        @csrf
        <input type="hidden" name="product_id" value="{{ $model->id ?? null }}">
        <input type="hidden" name="id" value="{{ $model->price->id ?? null }}">
        <div class="flex justify-between">
            <div>
                <label for="price_old"
                       class="mb-2 text-lg font-medium text-gray-900 dark:text-white">{{ __('Ціна') }}</label>
                <input type="text" name="price_old" id="price_old" value="{{ old('price_old') ?? $model->price->price_old ?? null }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-center text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder=""/>
            </div>
            <div>
                <label for="price_new"
                       class=" mb-2 text-lg font-medium text-gray-900 dark:text-white">{{ __('Акційна ціна') }}</label>
                <input type="text" name="price_new" id="price_new" value="{{ old('price_new') ?? $model->price->price_new ?? null }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-center text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder=""/>
            </div>
        </div>
        @error('price_old')
        <p class="text-center text-red-700">{{ $message }}</p>
        @enderror
        @error('price_new')
        <p class="text-center text-red-700">{{ $message }}</p>
        @enderror
        <button type="submit"
                class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{ __('Відправити') }}
        </button>
    </form>
    @endif
@endsection
