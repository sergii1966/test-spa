@section('form-prices')
    <form action="{{ route('add-prices-product-backend') }}" class="max-w-lg mx-auto mb-6">
        @csrf
        <input type="hidden" name="product_id" value="">
        <div class="mb-5 flex justify-between">
            <div>
                <label for="price_old"
                       class="mb-2 text-lg font-medium text-gray-900 dark:text-white">{{ __('Ціна') }}</label>
                <input type="text" name="price_old" id="price_old" value=""
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-center text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder=""/>
            </div>
            <div>
                <label for="price_new"
                       class=" mb-2 text-lg font-medium text-gray-900 dark:text-white">{{ __('Акційна ціна') }}</label>
                <input type="text" name="price_new" id="price_new" value=""
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-center text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder=""/>
            </div>
        </div>
        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{ __('Відправити') }}
        </button>
    </form>
@endsection
