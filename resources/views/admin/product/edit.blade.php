@extends('admin.admin_layouts')

@section('admin_content')

  @php
    $category = DB::table('categories')->get();
    $brand = DB::table('brands')->get();
    $subcategory = DB::table('subcategories')->get();
  @endphp

<div class="sl-mainpanel">

  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Product Section</span>
  </nav>

  <div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Update Product
        <a href="{{ route('all.product') }}" class="btn btn-success btn-sm pull-right">All Product</a>
      </h6>
      <p class="mg-b-20 mg-sm-b-30">Update Product Form</p>

      <form method="POST" action="{{ url('update/product/withoutphoto/'.$product->id) }}" enctype="multipart/form-data">
        @csrf

        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" value="{{ $product->product_name }}" name="product_name" placeholder="Enter product name">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" value="{{ $product->product_code }}" name="product_code"  placeholder="Enter product code">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" value="{{ $product->product_quantity }}" name="product_quantity" placeholder="Enter product quantity">
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" value="{{ $product->discount_price }}" name="discount_price" placeholder="Enter discount price">
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose category" name="category_id">
                  <option label="Choose category"></option>
                  @foreach($category as $row)
                    <option value="{{ $row->id }}"  
                      @php
                        if ($row->id === $product->category_id) echo 'selected';
                      @endphp
                    >{{ $row->category_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">SubCategory: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose subcategory" name="subcategory_id">
                  @foreach($subcategory as $row)
                    <option value="{{ $row->id }}"  
                      @php
                        if ($row->id === $product->subcategory_id) echo 'selected';
                      @endphp
                    >{{ $row->subcategory_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose brand" name="brand_id">
                  <option label="Choose brand"></option>
                  @foreach($brand as $row)
                    <option value="{{ $row->id }}"  
                      @php
                        if ($row->id === $product->brand_id) echo 'selected';
                      @endphp
                    >{{ $row->brand_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" value="{{ $product->product_size }}" name="product_size" id="size" data-role="tagsinput">
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" value="{{ $product->product_color }}" name="product_color" id="color" data-role="tagsinput">
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" value="{{ $product->selling_price }}" name="selling_price" placeholder="selling price">
              </div>
            </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                <textarea class="form-control" id="summernote" name="product_details">
                  {{ $product->product_details }}
                </textarea>
              </div>
            </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                <input class="form-control" value={{ $product->video_link }}  name="video_link" placeholder="video link">
              </div>
            </div>

            <div class="col-lg-12">
              <br><hr><br>
              <div class="row">
                <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="main_slider" value="1" @php if($product->main_slider == 1) echo 'checked' @endphp>
                    <span>Main Slider</span>
                  </label>
                </div>
  
                <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="hot_deal" value="1" @php if($product->hot_deal == 1) echo 'checked' @endphp>
                    <span>Hot Deal</span>
                  </label>
                </div>
  
                <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="best_rated" value="1" @php if($product->best_rated == 1) echo 'checked' @endphp>
                    <span>Best Rated</span>
                  </label>
                </div>
  
                <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="trend" value="1" @php if($product->trend == 1) echo 'checked' @endphp>
                    <span>Trend Product</span>
                  </label>
                </div>
  
                <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="mid_slider" value="1" @php if($product->mid_slider == 1) echo 'checked' @endphp>
                    <span>Mid Slider</span>
                  </label>
                </div>
  
                <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="hot_new" value="1" @php if($product->hot_new == 1) echo 'checked' @endphp>
                    <span>Hot New</span>
                  </label>
                </div>
              </div>
            </div>
          </div><!-- row -->
          <div class="form-layout-footer">
            <button class="btn btn-info mg-r-5">Update Product</button>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
      </form>
    </div>
  </div>

  {{-- Form Image --}}
  <div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Update Image</h6>

      <form method="POST" action="{{ url('update/product/photo/'.$product->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-lg-6 col-sm-6">
            <div class="form-group">
              <label class="form-control-label">Image One ( Main Thumbnail): <span class="tx-danger">*</span></label>
              <br>
              <label class="custom-file">
                <input type="file" id="file" name="image_one" class="custom-file-input" onchange="readURL(this);">
                <span class="custom-file-control"></span>
                <input type="hidden" name="old_one" value="{{ $product->image_one }}" >
                <img src="#" id="one" >
              </label>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6">
            <img src="{{ URL::to($product->image_one)}}" style="width: 80px; height: 80px;" >
          </div>
        </div>
    
        <div class="row">
          <div class="col-lg-6 col-sm-6">
            <div class="form-group">
              <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
              <br>
              <label class="custom-file">
                <input type="file" id="file" name="image_two" class="custom-file-input" onchange="readURL2(this);">
                <span class="custom-file-control"></span>
                <input type="hidden" name="old_two" value="{{ $product->image_two }}" >
                <img src="#" id="two" >
              </label>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6">
            <img src="{{ URL::to($product->image_two)}}" style="width: 80px; height: 80px;" >
          </div>
        </div>
    
        <div class="row">
          <div class="col-lg-6 col-sm-6">
            <div class="form-group">
              <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
              <br>
              <label class="custom-file">
                <input type="file" id="file" name="image_three" class="custom-file-input" onchange="readURL3(this);">
                <span class="custom-file-control"></span>
                <input type="hidden" name="old_three" value="{{ $product->image_three }}" >
                <img src="#" id="three" >
              </label>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6">
            <img src="{{ URL::to($product->image_three)}}" style="width: 80px; height: 80px;" >
          </div>
        </div>

        <button class="btn btn-sm btn-warning">Update Photo</button>
      </form>
      
    </div>
  </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('select[name="category_id"]').on('change',function(){
          var category_id = $(this).val();
          if (category_id) {
            
            $.ajax({
              url: "{{ url('/get/subcategory/') }}/"+category_id,
              type:"GET",
              dataType:"json",
              success:function(data) { 
              var d =$('select[name="subcategory_id"]').empty();
              $.each(data, function(key, value){
              
              $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

              });
              },
            });

          }else{
            alert('danger');
          }

      });
  });

</script>

<script type="text/javascript">
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<script type="text/javascript">
  function readURL2(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#two')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<script type="text/javascript">
  function readURL3(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#three')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

@endsection