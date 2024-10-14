@section('form-name-description')
    <form action="{{ route('add-name-description-product-backend') }}" method="POST" class="max-w-lg mx-auto mb-6">
        @csrf
        <input type="hidden" name="id" value="{{ $model->id ?? null }}">
        <div class="mb-1">
            <label for="name" class="block text-lg font-medium text-gray-900 dark:text-white">{{ __('Назва') }}</label>
            <input type="text" id="name" value=""
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder=""/>
        </div>
        <div class="mb-1">
        <label for="description" class="block text-lg font-medium text-gray-900 dark:text-white">{{ __('Опис') }}</label>
        <textarea id="description" name="description" rows="4"
                  class="block p-2.5 w-full text-lg text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder=""></textarea>
        </div>
        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{ __('Відправити') }}
        </button>
    </form>
@endsection
