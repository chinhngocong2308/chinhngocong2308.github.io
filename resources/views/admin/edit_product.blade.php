 @extends('admin_layout')
 @section('admin_content')

 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                 <?php
                                $message = Session::get('message');
                                if($message)
                                {
                                    echo '<span class="text-danger">',$message,'</span>';
                                    Session::put('message',null);
                                }
                                 ?>
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $errors)
                                            <li>{{$errors}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @foreach($edit_product as $key => $pro)
                                <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="text">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro->product_name}}">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="product_slug" class="form-control" id="exampleInputEmail1" value="{{$pro->product_slug}}">
                                </div>
                                 <div class="form-group">
                                    <label for="text">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" multiple >
                                    <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="100" width="100">
                                </div>
                                <div class="form-group" style="width: 30%">
                                    <label for="text">Giá sản phẩm</label>
                                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pro->product_price}}">
                                </div>
                                <div class="form-group" style="width: 15%">
                                    <label for="text">Giảm giá</label>
                                    <input type="number" name="product_sale" class="form-control" id="exampleInputEmail1" value="{{$pro->product_sale}}">
                                </div>
                                <div class="form-group">
                                    <label for="text">Mô tả </label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="product_desc" id="exampleInputPassword1" >{{$pro->product_desc}}</textarea> 
                                </div>
                                 <div class="form-group">
                                    <label for="text">Nội dung sản phẩm </label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="product_content" id="exampleInputPassword1" 
                                    >{{$pro->product_content}}</textarea> 
                                <div class="form-group">
                                    <label for="text">Danh mục sản phẩm </label>
                                        <select class="form-control input-sm m-bot15" name="product_cate">
                                            @foreach($cate_product as $key => $cate)
                                                @if($cate->category_id==$pro->category_id)
                                            <option selected value="{{$cate->category_id}}">{{ $cate->category_name }}</option>
                                            @else
                                            <option value="{{$cate->category_id}}">{{ $cate->category_name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                </div>
                                 <div class="form-group">
                                    <label for="text">Dành cho </label>
                                        <select class="form-control input-sm m-bot15" name="product_brand">
                                            @foreach($brand_product as $key => $brand)
                                            @if ($brand->brand_parent==0)
                                                @if($brand->brand_id==$pro->brand_id )
                                            <option selected value="{{$brand->brand_id}}">{{ $brand->brand_name }}</option>
                                            @else
                                            <option value="{{$brand->brand_id}}">{{ $brand->brand_name }}</option>
                                            @endif
                                            @endif
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="text">Thương hiệu </label>
                                        <select class="form-control input-sm m-bot15" name="product_parent_id">
                                                <option value="0">--Thương hiệu--</option>
                                            @foreach ($brand_product as $key=>$val )
                                            @if ($val->brand_parent!=0)
                                            @if($val->brand_id==$pro->brand_parent_id )
                                            <option selected value="{{$val->brand_id}}">{{ $val->brand_name }}</option>
                                            @else
                                                <option value="{{$val->brand_id}}">{{$val->brand_name}}</option>
                                            @endif
                                            @endif
                                            @endforeach
                                        </select>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="text">Hiển thị </label>
                                        <select class="form-control input-sm m-bot15" name="product_status">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>
                                       
                                        </select>
                                </div>

                                <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                                 @endforeach
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
