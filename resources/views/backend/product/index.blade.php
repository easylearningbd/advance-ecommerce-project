<html>
<head>
    <title>Laravel Spatie Medialibrary Example - NiceSnippets.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style type="text/css" media="screen">
        body {
            background-color: #f7fcff;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <h4>Laravel Spatie Medialibrary Example</h4>
                        </div>
                        <div class="col-md-1 text-center">
                            <a href="{{ route('product.create') }}" class="btn btn-success"><i class="fa fa-plus py-1"
                                                                                               aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th width="25%">Image</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $product)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <img src="{{$product->getFirstMediaUrl('images', 'thumb')}}" width="100%">
                                    <video src="{{$product->getFirstMediaUrl('images')}}"
                                           class="w-100"
                                           controls>
                                    </video>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
