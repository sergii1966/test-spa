@section('form-status')
    @if($model->id ?? null)
    <form action="{{ route('add-status-product-backend') }}" method="POST" class="max-w-lg mx-auto mb-6">
        @csrf
        <input type="hidden" name="product_id" value="{{ $model->id ?? null }}">
        <div class="flex justify-around mb-2">
            <div class="flex items-center">
                <input  @if(!$model->is_active) checked  @endif id="default-radio-1" type="radio" value="0" name="is_active" class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-1" class="ms-2 text-2xl font-medium text-gray-900 dark:text-gray-300">Ні</label>
            </div>
            <div class="flex items-center">
                <input @if($model->is_active) checked  @endif id="default-radio-2" type="radio" value="1" name="is_active" class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-2" class="ms-2 text-2xl font-medium text-gray-900 dark:text-gray-300">Активне</label>
            </div>
        </div>
        @error('is_active')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{ __('Відправити') }}
        </button>
    </form>
    @endif
    <script>

    </script>
@endsection
