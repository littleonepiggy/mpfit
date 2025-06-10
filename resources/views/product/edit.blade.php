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
                <form action="{{ route('product.update', $product->id) }}" method="post">
                    @csrf 
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    @if ($errors->any())
                        <div class="alert alert-danger mb-2">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <input type="text" required class="mb-2 form-control" name="name" placeholder="название товара" value="{{ old('name', $product->name) }}">    
                    <input type="text" class="mb-2 form-control" name="description" placeholder="описание товара" value="{{ old('description', $product->description) }}">    
                    <input type="text" required class="mb-2 form-control" name="price" placeholder="цена товара" value="{{ old('price', $product->price) }}">
                    @if ($categories)
                        <select name="category_id" class="form-select mb-2">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    @endif
                    <button style="width: 18rem;" type="submit" class="btn btn-primary">изменить товар</button>   
                    <a style="width: 18rem;" href="/" class="btn btn-secondary">на главную</a>
               
                </form>
            @endif
        </div>  

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
