 @extends('admin_layout')
 @section('admin_content')

 <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        Thư viện ảnh sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
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
      <table class="table table-striped b-t b-light">
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
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
           
              {{ $all_images_product->links() }}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection