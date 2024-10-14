@section('form-add-image')
    <form action="{{ route('add-image-product-backend') }}" class="max-w-lg mx-auto mb-6">
        @csrf
        <input type="hidden" name="product_id" value="">
        <label class="block mb-2 text-lg font-medium text-gray-900 dark:text-white" for="image-product">{{ __('Додати зображення') }}</label>
        <input
            class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="image_help" id="image-product" type="file">
        <div class="mt-1 mb-3 text-sm text-gray-500 dark:text-gray-300" id="image_help">A profile picture is useful to
            confirm your are logged into your account
        </div>
        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full sm:w-auto mb-2 px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{ __('Відправити') }}
        </button>
    </form>
@endsection
