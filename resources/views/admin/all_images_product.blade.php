 @extends('admin_layout')
 @section('admin_content')

 <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        Thư viện ảnh sản phẩm
    </div>
   
    <div class="table-responsive">
      <?php
          $message = Session::get('message');
          if($message)
          {
          echo '<span class="text-danger">',$message,'</span>';
          Session::put('message',null);
           }
        ?>
      <table class="table table-striped b-t b-light" id="myTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Hình ảnh</th>
            <th>Sản phẩm </th>
            <th>Action</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_images_product as $key => $image)
          <tr>
            <td>{{$image->image_id}}</td>
            <td><img src="public/uploads/product/{{ $image->imagesp }}" height="100" width="100"></td>
            <td>{{$image->product_id}}</td>
            <td>
              <a href="{{URL::to('/edit-images-product/'.$image->image_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success"></i>
              </a>
              <a onclick="return confirm('Bạn thực sự muốn xóa hình ảnh ?')" href="{{URL::to('/delete-images-product/'.$image->image_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection