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
            <div class="col-3 mb-5">
                <h1>тут добавлять товар</h1>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="post">
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
                            <input type="text" required class="mb-2 form-control" name="name" placeholder="название товара" value="{{ old('name') }}">    
                            <input type="text" class="mb-2 form-control" name="description" placeholder="описание товара" value="{{ old('description') }}">    
                            <input type="text" required class="mb-2 form-control" name="price" placeholder="цена товара" value="{{ old('price') }}">
                            @if ($categories)
                                <select name="category_id" class="form-select mb-2">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                            <button type="submit" class="btn btn-primary">добавить товар</button>                  
                        </form>
                    </div>
                </div>
            </div>
            @if ($products)
                <h1 class="col-12 mb-5">тут их смотреть</h1>
                @foreach ($products as $product)
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <h3 class="card-text">{{ $product->price }}р.</h3>
                            <p class="card-text"><b>{{ $product->category->name }}</b></p>
                            <div class="d-flex justify-content-between align-items-start">
                                <a href="/product/{{ $product->id}}" class="btn btn-primary me-auto">подробнее</a>
                                <div class="buttons-edit d-flex flex-column gap-1">
                                    <a href="/product/{{ $product->id}}/edit" class="btn btn-secondary mb-2">редактировать</a>                                
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('удалить этот товар?')">удалить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if ($orders)
                <h1 class="col-12 mb-5">тут заказы</h1>
                @foreach ($orders as $order)
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $order->product->name }}</h5>
                                <p class="card-text"><b>{{ $order->status->name }}</b></p>
                                <h3 class="card-text">{{ $order->total_price }}р.</h3>
                                <p class="card-text">{{ $order->fio }}</p>
                                <a href="/order/{{ $order->id}}" class="btn btn-primary me-auto">подробнее</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
