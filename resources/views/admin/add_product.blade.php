<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
      .form-container {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
      .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group input::placeholder,
        .form-group select::placeholder,
        .form-group textarea::placeholder {
            color: #ccc;
        }
        .form-group input[type="date"] {
            padding: 10px;
            background: url('https://cdn-icons-png.flaticon.com/512/1004/1004879.png') no-repeat right 10px center;
            background-size: 20px 20px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
       
            <div class="form-container">
                <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" name="title" >
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" >
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="quantity" >
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" required>
                            <option>Select a category</option>
                            @foreach($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Image</label>
                        <input type="file" name="image" >
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" value="Add Product" >
                    </div>
                </form>
                
            </div>

      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>