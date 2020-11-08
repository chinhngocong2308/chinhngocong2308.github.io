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
                                <form role="form" action="{{URL::to('/save-images-product')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{csrf_field()}}
                              
                                 <div class="form-group" >
                                    
                                    <label for="text">Hình ảnh sản phẩm</label>
                                    
                                    <input type="file" name="imagesp" class="form-control" id="exampleInputEmail1" multiple >
                                   
                                </div>
                                
                                 <div class="form-group" >
                                    <label for="text">Sản phẩm </label>
                                        <select class="form-control input-sm m-bot15" name="images_product">
                                            @foreach($images_product as $key => $imagesproduct)
                                            <option value="{{$imagesproduct->product_id}}">{{ $imagesproduct->product_name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                
                                  <button type="submit" name="add_images_product" class="btn btn-info">Lưu</button>

                                </div>
                                

                            </form>
                            </div>
                        

                        </div>

                    </section>

            </div>

@endsection
