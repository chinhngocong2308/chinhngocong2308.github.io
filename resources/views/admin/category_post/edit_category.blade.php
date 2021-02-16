 @extends('admin_layout')
 @section('admin_content')

 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật danh mục bài viết
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
                                <form role="form" action="{{URL::to('/update-category-post/'.$category_post->cate_post_id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="text">Tên danh mục</label>
                                    <input type="text" name="cate_post_name" value="{{$category_post->cate_post_name}}" class="form-control" onkeyup="ChangeToSlug()" id="slug" placeholder="Tên danh mục">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="cate_post_slug" class="form-control" id="convert_slug" placeholder="Slug" value="{{$category_post->cate_post_slug}}" >
                                </div>
                                <div class="form-group">
                                    <label for="text">Mô tả </label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="cate_post_desc" id="exampleInputPassword1" placeholder="Mô tả">{{$category_post->cate_post_desc}}</textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="text">Hiển thị </label>
                                        <select class="form-control input-sm m-bot15" name="cate_post_status">
                                           @if($category_post->cate_post_status==0) 
                                            <option selected value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                            @else
                                             <option value="0">Hiển thị</option>
                                            <option selected value="1">Ẩn</option>
                                            @endif
                                       
                                        </select>
                                </div>

                                <button type="submit" name="update_post_cate" class="btn btn-info">Cập nhật danh mục bài viết</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection