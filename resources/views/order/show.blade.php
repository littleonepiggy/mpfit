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
            @if ($order)
                <div class="col-4">
                    <h1>{{ $order->product->name }}</h1>
                    <p><b>{{ $order->status->name }}</b></p>
                    <h3>{{ $order->total_price }}р.</h3>
                    <p>{{ $order->fio }}</p>
                    <p>всего: {{ $order->quantity }}</p>
                    @if ($order->comment)
                    <p class="card-text">{{ $order->comment }}</p>
                    @endif
                    <a style="width: 18rem;" href="/" class="mb-5 btn btn-secondary">на главную</a>
                </div>
                <div class="col-6">
                    <h1>изменять статус тоже тут :)</h1>
                    <form style="width: 18rem;" action="{{ route('order.update', $order->id) }}" method="post">
                        @csrf 
                        @method('PUT')
                        @if ($errors->any())
                            <div class="alert alert-danger mb-2">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <select name="status_id" class="form-select mb-2">
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success">изменить статус</button>
                </div>
            @endif
        </div>  

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
