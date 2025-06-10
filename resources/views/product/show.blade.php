<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MPFIT тестовое</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="row m-5">
            @if ($product)
                <div class="col-4">
                    <h1>{{ $product->name }}</h1>
                    <h3>{{ $product->price }}р.</h3>
                    @if ($product->description)
                    <p class="card-text">{{ $product->description }}</p>
                    @endif
                    <p class="card-text"><b>{{ $product->category->name }}</b></p>
                    <a style="width: 18rem;" href="/" class="mb-5 btn btn-secondary">на главную</a>
                </div>
                <div class="col-6">
                    <h1>эээ тут заказывать</h1>
                    <form style="width: 18rem;" action="{{ route('order.store') }}" method="post">
                        @csrf 
                        @if ($errors->any())
                            <div class="alert alert-danger mb-2">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="text" required class="mb-2 form-control" name="fio" placeholder="ваше фио" value="{{ old('fio')}}">    
                            <input type="textarea" class="mb-2 form-control" name="comment" placeholder="ваш комментарий" value="{{ old('description') }}">    
                            <input type="text" required class="mb-2 form-control" name="quantity" placeholder="кол-во товара" value="{{ old('quantity', 1) }}">
                            <button type="submit" class="btn btn-success">купить товар</button>                  
                    </form>
                </div>
            @endif
        </div>  

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
