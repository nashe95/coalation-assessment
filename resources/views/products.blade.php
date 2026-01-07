<!DOCTYPE html>
<html>
    <head>
        <title>Coalition Assessment</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="p-4">

        <div class="container">
            <h2 class="mb-4">Product Entry</h2>

            <form id="product-form" class="row g-3">
                @csrf
                <div class="col-md-4">
                    <input type="text" name="product_name" class="form-control" placeholder="Product name" required>
                </div>
                <div class="col-md-3">
                    <input type="number" name="quantity" class="form-control" placeholder="Quantity in stock" required>
                </div>
                <div class="col-md-3">
                    <input type="number" step="0.01" name="price" class="form-control" placeholder="Price per item" required>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100">Submit</button>
                </div>
            </form>


        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="{{ asset('js/products.js') }}"></script>
    </body>
</html>
