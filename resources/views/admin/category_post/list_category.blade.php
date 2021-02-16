 @extends('admin_layout')
 @section('admin_content')
 <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        Liệt kê danh mục bài viết
    </div>
   
    <div class="table-responsive">
      <table class="table table-striped b-t b-light" id="myTable">
      <?php
          $message = Session::get('message');
          if($message)
          {
          echo '<span class="text-danger">',$message,'</span>';
          Session::put('message',null);
           }
        ?>
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>ID</th>
            <th>Tên danh mục bài viết</th>
            <th>Slug</th>
            <th>Mô tả</th>
            <th>Action</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($category_post as $key => $cate_post)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
             <td>{{$cate_post->cate_post_id}}</td>
            <td>{{$cate_post->cate_post_name}}</td>
            <td>{{$cate_post->cate_post_slug }}</td>
            <td>{{$cate_post->cate_post_desc}}</td>
            <td>
              @if($cate_post->cate_post_status==0)
                Hiển thị
              @else
                Ẩn
              @endif
            </td>
            <td>
              <a href="{{URL::to('/edit-category-post/'.$cate_post->cate_post_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success"></i>
              </a>
              <a onclick="return confirm('Bạn thực sự muốn xóa danh mục bài viết ?')" href="{{URL::to('/delete-category-post/'.$cate_post->cate_post_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
   
    </footer>
  </div>
</div>

@endsection