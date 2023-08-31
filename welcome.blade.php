{{-- <!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض المنتجات</title>
    <!-- تضمين روابط Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- تضمين مكتبة jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div id="header" class="text-center mb-4">
            <h1>قائمة المنتجات</h1>
            <div class="form-row justify-content-center">
                <div class="col-md-6">
                    <input type="text" class="form-control" id="searchInput" placeholder="ابحث عن منتج...">
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" id="minPriceInput" placeholder="اغراض اغلى من..">
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" id="maxPriceInput" placeholder="اغراض ارخص من..">
                </div>
            </div>
        </div>
        <div class="row" id="productsContainer">
            <!-- هنا سيتم عرض منتجاتك من قاعدة البيانات -->
            @foreach ($products as $product)
                <div class="col-md-4 mb-4" dir="rtl">
                    <div class="card">
                        <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="صورة المنتج">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">السعر: {{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row" id="searchResults" style="display: none;">
            <!-- هنا سيتم عرض نتائج البحث -->
        </div>
    </div>
    <div class="d-flex">
        {{ $products->links() }}
    </div>
    <!-- تضمين روابط Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput, #minPriceInput, #maxPriceInput').on('input', function() {
                var searchTerm = $('#searchInput').val();
                var minPrice = $('#minPriceInput').val();
                var maxPrice = $('#maxPriceInput').val();
                
                if (searchTerm.length > 2 || minPrice || maxPrice) {
                    showSearchResults(searchTerm, minPrice, maxPrice);
                } else {
                    showAllProducts();
                }
            });
        });

        function showAllProducts() {
            $('#productsContainer').show();
            $('#searchResults').hide();
        }

        function showSearchResults(searchTerm, minPrice, maxPrice) {
            $.ajax({
                url: '/search',
                type: 'GET',
                data: {
                    searchTerm: searchTerm,
                    minPrice: minPrice,
                    maxPrice: maxPrice
                },
                success: function(response) {
                    var results = $('#searchResults');
                    results.empty();

                    if (response.length > 0) {
                        $.each(response, function(index, product) {
                            var productHtml = `
                                <div class="col-md-4 mb-4" dir="rtl">
                                    <div class="card">
                                        <img src="{{ asset('images/') }}${product.image}" class="card-img-top" alt="صورة المنتج">
                                        <div class="card-body">
                                            <h5 class="card-title">${product.name}</h5>
                                            <p class="card-text">${product.description}</p>
                                            <p class="card-text">السعر: ${product.price}</p>
                                        </div>
                                    </div>
                                </div>
                            `;
                            results.append(productHtml);
                        });
                        $('#productsContainer').hide();
                        results.show();
                    } else {
                        results.append('<p>لا توجد نتائج</p>');
                        $('#productsContainer').hide();
                        results.show();
                    }
                }
            });
        }
    </script>
</body>
</html> --}}
{{-- <!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض المنتجات</title>
    <!-- تضمين روابط Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- تضمين مكتبة jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div id="header" class="text-center mb-4">
            <h1>قائمة المنتجات</h1>
            <div class="form-row justify-content-center">
                <div class="col-md-4">
                    <input type="text" class="form-control" id="searchInput" placeholder="ابحث عن منتج...">
                </div>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="minPriceInput" placeholder="اغراض اغلى من..">
                </div>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="maxPriceInput" placeholder="اغراض ارخص من..">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="brandInput" placeholder="العلامة التجارية">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="categoryInput" placeholder="الفئة">
                </div>
            </div>
        </div>
        <div class="row" id="productsContainer">
            <!-- هنا سيتم عرض منتجاتك من قاعدة البيانات -->
            @foreach ($products as $product)
                <div class="col-md-4 mb-4" dir="rtl">
                    <div class="card">
                        <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="صورة المنتج">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><i class="fas fa-dollar-sign"></i> Price: {{ $product->price }}</p>
                            <p class="card-text"><i class="fas fa-tag"></i> Brand: {{ $product->brand }}</p>
                            <p class="card-text"><i class="fas fa-folder"></i> Category: {{ $product->category }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row" id="searchResults" style="display: none;">
            <!-- هنا سيتم عرض نتائج البحث -->
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $products->links() }}
    </div>
    <!-- تضمين روابط Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput, #minPriceInput, #maxPriceInput, #brandInput, #categoryInput').on('input', function() {
                var searchTerm = $('#searchInput').val();
                var minPrice = $('#minPriceInput').val();
                var maxPrice = $('#maxPriceInput').val();
                var brand = $('#brandInput').val();
                var category = $('#categoryInput').val();
                
                if (searchTerm.length > 2 || minPrice || maxPrice || brand || category) {
                    showSearchResults(searchTerm, minPrice, maxPrice, brand, category);
                } else {
                    showAllProducts();
                }
            });
        });

        function showAllProducts() {
            $('#productsContainer').show();
            $('#searchResults').hide();
        }

        function showSearchResults(searchTerm, minPrice, maxPrice, brand, category) {
            $.ajax({
                url: '/search',
                type: 'GET',
                data: {
                    searchTerm: searchTerm,
                    minPrice: minPrice,
                    maxPrice: maxPrice,
                    brand: brand,
                    category: category
                },
                success: function(response) {
                    var results = $('#searchResults');
                    results.empty();

                    if (response.length > 0) {
                        $.each(response, function(index, product) {
                            var productHtml = `
                                <div class="col-md-4 mb-4" dir="rtl">
                                    <div class="card">
                                        <img src="{{ asset('images/') }}${product.image}" class="card-img-top" alt="صورة المنتج">
                                        <div class="card-body">
                                            <h5 class="card-title">${product.name}</h5>
                                            <p class="card-text">${product.description}</p>
                                            <p class="card-text">السعر: ${product.price}</p>
                                        </div>
                                    </div>
                                </div>
                            `;
                            results.append(productHtml);
                        });
                        $('#productsContainer').hide();
                        results.show();
                    } else {
                        results.append('<p>لا توجد نتائج</p>');
                        $('#productsContainer').hide();
                        results.show();
                    }
                }
            });
        }
    </script>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض المنتجات</title>
    <!-- تضمين روابط Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- تضمين مكتبة FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- تضمين مكتبة jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div id="header" class="text-center mb-4">
            <h1>قائمة المنتجات</h1>
            <div class="form-row justify-content-center">
                <div class="col-md-4">
                    <input type="text" class="form-control" id="searchInput" placeholder="ابحث عن منتج...">
                </div>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="minPriceInput" placeholder="اغراض اغلى من..">
                </div>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="maxPriceInput" placeholder="اغراض ارخص من..">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="brandInput" placeholder="العلامة التجارية">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="categoryInput" placeholder="الفئة">
                </div>
            </div>
        </div>
        <div class="row" id="productsContainer">
            <!-- هنا سيتم عرض منتجاتك من قاعدة البيانات -->
            @foreach ($products as $product)
                <div class="col-md-4 mb-4" dir="rtl">
                    <div class="card">
                        <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="صورة المنتج">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><i class="fas fa-dollar-sign"></i> Price: {{ $product->price }}</p>
                            <p class="card-text"><i class="fas fa-tag"></i> Brand: {{ $product->brand }}</p>
                            <p class="card-text"><i class="fas fa-folder"></i> Category: {{ $product->category }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row" id="searchResults" style="display: none;">
            <!-- هنا سيتم عرض نتائج البحث -->
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $products->links() }}
    </div>
    <!-- تضمين روابط Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput, #minPriceInput, #maxPriceInput, #brandInput, #categoryInput').on('input', function() {
                var searchTerm = $('#searchInput').val();
                var minPrice = $('#minPriceInput').val();
                var maxPrice = $('#maxPriceInput').val();
                var brand = $('#brandInput').val();
                var category = $('#categoryInput').val();
                
                if (searchTerm.length > 2 || minPrice || maxPrice || brand || category) {
                    showSearchResults(searchTerm, minPrice, maxPrice, brand, category);
                } else {
                    showAllProducts();
                }
            });
        });

        function showAllProducts() {
            $('#productsContainer').show();
            $('#searchResults').hide();
        }

        function showSearchResults(searchTerm, minPrice, maxPrice, brand, category) {
            $.ajax({
                url: '/search',
                type: 'GET',
                data: {
                    searchTerm: searchTerm,
                    minPrice: minPrice,
                    maxPrice: maxPrice,
                    brand: brand,
                    category: category
                },
                success: function(response) {
                    var results = $('#searchResults');
                    results.empty();

                    if (response.length > 0) {
                        $.each(response, function(index, product) {
                            var productHtml = `
                                <div class="col-md-4 mb-4" dir="rtl">
                                    <div class="card">
                                        <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="صورة المنتج">

                                        <div class="card-body">
                                            <h5 class="card-title">${product.name}</h5>
                                            <p class="card-text">${product.description}</p>
                                            <p class="card-text">السعر: ${product.price}</p>
                                            <p class="card-text">brand: ${product.brand}</p>
                                            <p class="card-text">category: ${product.category}</p>
                                        </div>
                                    </div>
                                </div>
                            `;
                            results.append(productHtml);
                        });
                        $('#productsContainer').hide();
                        results.show();
                    } else {
                        results.append('<p>لا توجد نتائج</p>');
                        $('#productsContainer').hide();
                        results.show();
                    }
                }
            });
        }
    </script>
</body>
</html>

