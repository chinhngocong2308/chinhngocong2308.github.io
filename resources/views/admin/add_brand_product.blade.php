 @extends('admin_layout')
 @section('admin_content')

 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục bán và thương hiệu
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
                                <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="text">Tên thương hiệu</label>
                                    <input type="text" name="brand_product_name"  onkeyup="ChangeToSlug();" id="slug" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="brand_slug" class="form-control" id="convert_slug" placeholder="Slug">
                                </div>
                                <div class="form-group">
                                    <label for="text">Thuộc mục bán </label>
                                        <select class="form-control input-sm m-bot15" name="brand_parent">
                                                <option value="0">Nam/Nữ</option>
                                            @foreach ($brand as $key=>$val )
                                                <option value="{{$val->brand_id}}">{{$val->brand_name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="text">Mô tả </label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="brand_product_desc" id="exampleInputPassword1" placeholder="Mô tả"></textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="text">Hiển thị </label>
                                        <select class="form-control input-sm m-bot15" name="brand_product_status">
                                            <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                       
                                        </select>
                                </div>

                                <button type="submit" name="add_brand_product" class="btn btn-info">Thêm thương hiệu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection