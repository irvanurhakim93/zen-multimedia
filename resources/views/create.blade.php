<!doctype html>
<html lang="en">
  <head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Input Products</title>
  </head>
  <body>
    <br>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('products.store')}}">
                  @csrf
                    <div class="form-group">
                        <label for="">Product Name</label>
                       <input type="text" name="inputproductname" id="inputproductname" class="form-control">
                       @if ($errors->has('inputproductname'))
                           <span class="invalid-feedback">{{$errors->first('inputproductname')}} </span>
                       @endif 
                    </div>
                    <div class="form-group">
                        <label for="">Variants</label>
                        <select name="inputvariants" class="form-control" id="inputvariants" >
                          <option selected disabled>Select Variants</option>
                          <option value="video">Video</option>
                          <option value="image">Images</option>
                        </select>
                        @if ($errors->has('inputvariants'))
                            <span class="invalid-feedback">{{$errors->first('inputvariants')}}</span>
                        @endif  
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Product Categories</label>
                      <select name="inputproductcategories" class="form-control" id="inputproductcategories" >
                        <option selected disabled>Select Product Categories</option>
                        <option value="video">Video</option>
                        <option value="image">Images</option>
                      </select>  
                      @if ($errors->has('inputproductcategories'))
                          <span class="invalid-feedback">{{$errors->first('inputproductcategories')}} </span>
                      @endif
                    </div>
                    <div class="form-group">
                        <label for="">Product Images</label>
                        <input type="file" class="form-control" name="inputproductimages" id="inputproductimages" >
                        @if ($errors->has('inputproductimages'))
                          <span class="invalid-feedback">{{$errors->first('inputproductimages')}} </span>                            
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
          </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>