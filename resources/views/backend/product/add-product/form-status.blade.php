@section('form-status')
    <form action="{{ route('add-status-product-backend') }}" class="max-w-lg mx-auto mb-6">
        @csrf
        <input type="hidden" name="product_id" value="">
        <div class="flex justify-center">
        <label class="flex items-center mb-5 cursor-pointer">
            <span class="me-3 text-lg font-medium text-gray-900 dark:text-gray-300">{{__('Off')}}</span>
            <input type="checkbox" name="status" value="" class="sr-only peer">
            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
            <span class="ms-3 text-lg font-medium text-gray-900 dark:text-gray-300">{{__('On')}}</span>
        </label>
        </div>
        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full sm:w-auto mb-2 px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{ __('Відправити') }}
        </button>
    </form>
    <script>

    </script>
@endsection
