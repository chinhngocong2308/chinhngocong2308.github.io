 @extends('admin_layout')
 @section('admin_content')

 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm hình ảnh chi tiết sản phẩm
                        </header>
                        <div class="panel-body" >
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
                                @foreach($edit_images_product as $key =>$pro)
                                <form role="form" action="{{URL::to('/update-images-product/'.$pro->image_id)}}" method="POST" enctype="multipart/form-data">
                                    
                                    {{csrf_field()}}
                              
                                 <div class="form-group" >
                                    
                                    <label for="text">Hình ảnh sản phẩm</label>
                                    
                                    <input type="file" name="imagesp" class="form-control" id="exampleInputEmail1" multiple >
                                    <img src="{{URL::to('public/uploads/product/'.$pro->imagesp)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                          <label for="text">Sản phẩm </label> 
                                         <select class="form-control input-sm m-bot15" name="images_product">
                                             @foreach($images_product as $key => $product)
                                             @if($pro->product_id==$product->product_id)
                                            <option selected value="{{$product->product_id}}">{{ $product->product_name }}</option>
                                             @else
                                              <option value="{{$product->product_id}}">{{ $product->product_name}}</option>
                                             @endif
                                            @endforeach
                                        </select>

                                </div>
                                @endforeach
                                
                                
                                  <button type="submit" name="update_images_product" class="btn btn-info">Lưu</button>

                                </div>
                                

                            </form>
                            </div>
                        

                        </div>

                    </section>

            </div>

@endsection
