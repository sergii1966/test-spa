@section('edit-image-product')
    @if($model ?? null && $model->images->isNotEmpty())
        <div class="mt-6 p-1 items-center max-w-screen-xl mx-auto">
            @foreach($model->images as $index => $item)
                <div class="mb-2 grid grid-cols-1 lg:grid-cols-12 gap-2">
                    <div class="col-span-2 border">
                        <img class="img-fluid" style="max-height: 200px;"
                             src="{!! $item->url_sm !!}" alt="">
                    </div>
                    <div class="col-span-5 flex flex-col justify-center text-center border">
                        <p class="my-3 p-0">{{ $item->url_sm }}</p>
                        <p class="my-3 p-0">{{ $item->url_lg }}</p>
                    </div>
                    <div class="col-span-1 flex flex-col justify-center text-center border">
                        <p class="my-1 p-0">{{ $item->width_sm }} x {{$item->height_sm}}</p>
                        <p class="my-1 p-0">{{ $item->width_lg }} x {{$item->height_lg}}</p>
                    </div>
                    <div class="col-span-2 flex flex-col justify-center text-center border">
                        <form id="edit-image-product-{{ $index }}" method="POST"
                              action="{{ route('edit-image-product-backend') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $model->id ?? null }}"/>
                            <input type="hidden" name="id" value="{{ $item->id ?? null }}"/>

                            <div class="flex justify-around mb-2">
                                <div class="flex items-center">
                                    <input @if(!$item->status) checked @endif id="status-image-1-{{ $index }}"
                                           type="radio" value="0" name="status"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="status-image-1-{{ $index }}"
                                           class="ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Ні</label>
                                </div>
                                <div class="flex items-center">
                                    <input @if($item->status == 1) checked @endif id="status-image-2-{{ $index }}"
                                           type="radio" value="1" name="status"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="status-image-2-{{ $index }}"
                                           class="ms-2 text-lg font-medium text-gray-900 dark:text-gray-300">Активне</label>
                                </div>
                            </div>
                            <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                {{ __('Зберегти') }}
                            </button>
                        </form>
                    </div>
                    <div class="col-span-2 flex flex-col justify-center text-center border">
                        <form id="del-image-product-{{ $index }}" method="POST"
                              action="{{ route('del-image-product-backend') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $model->id ?? null }}"/>
                            <input type="hidden" name="id" value="{{ $item->id ?? null }}"/>
                            <input type="hidden" name="path_lg" value="{{ $item->path_lg ?? null }}"/>
                            <input type="hidden" name="path_sm" value="{{ $item->path_sm ?? null }}"/>
                            <button type="submit"
                                    class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                {{ __('Видапити') }}
                            </button>
                            @error('product_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </form>
                    </div>
                </div>
            @endforeach
        </div>>
    @else
{{--        <div class="my-6 p-1 items-center max-w-screen-xl mx-auto">--}}
{{--            <p class="text-red-700 text-2xl text-center">{{ __('Пусто') }}</p>--}}
{{--        </div>--}}
    @endif
@endsection
