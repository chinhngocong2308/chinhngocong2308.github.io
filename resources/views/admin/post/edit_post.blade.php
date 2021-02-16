 @extends('admin_layout')
 @section('admin_content')

 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa bài viết
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
                        
                                <form role="form" action="{{URL::to('/update-post/'.$post->post_id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="text">Tên bài viết</label>
                                    <input type="text" name="post_title" onkeyup="ChangeToSlug();" class="form-control" id="slug" value="{{$post->post_title}}" placeholder="Tên danh mục">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="post_slug" class="form-control"  id="convert_slug" placeholder="Slug" value="{{$post->post_slug}}">
                                </div>
                                <div class="form-group">
                                    <label for="text">Tóm tắt bài viết </label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="post_desc" id="ckeditor1" placeholder="Mô tả">{{$post->post_desc}}</textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="text">Nội dung bài viết </label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="post_content" id="ckeditor2" placeholder="Mô tả" >{{$post->post_content}}</textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="text">Meta Từ Khóa </label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="post_meta_keywords" id="exampleInputPassword1" placeholder="Mô tả">{{$post->post_meta_keywords}}</textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="text">Meta Nội dung </label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="post_meta_desc" id="exampleInputPassword1" placeholder="Mô tả">{{$post->post_meta_desc}}</textarea> 
                                </div>
                                  <div class="form-group" >
                                    <label for="text">Hình ảnh bài viết</label>
                                    <input type="file" name="post_image" class="form-control" id="exampleInputEmail1" multiple  >
                                    <img src="{{URL::to('public/uploads/post/'.$post->post_image)}}" height="100" width="100">
                                </div>
                                 <div class="form-group">
                                    <label for="text">Danh mục bài viết </label>
                                        <select class="form-control input-sm m-bot15" name="cate_post_id">
                                            @foreach($category_post as $key => $cate)
                                                @if($cate->cate_post_id==$post->cate_post_id)
                                            <option selected value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
                                            @else
                                            <option value="{{$cate->cate_post_id}}">{{ $cate->cate_post_name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                </div>

                                <div class="form-group">
                                    <label for="text">Hiển thị </label>
                                        <select class="form-control input-sm m-bot15" name="post_status">
                                            <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                       
                                        </select>
                                </div>
                             
                                <button type="submit" name="add_post" class="btn btn-info">Cập nhật bài viết</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection