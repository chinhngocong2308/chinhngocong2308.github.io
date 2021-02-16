 @extends('admin_layout')
 @section('admin_content')

 <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        Liệt kê mục bán dành cho sản phẩm
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
            <th>Tên Mục bán</th>
            <th>Thương hiệu</th>
            <th>Slug</th>
            <th>Mô tả</th>
            <th>Hiển thị</th>
            <th>Action</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_brand_product as $key => $bra_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$bra_pro->brand_name}}</td>
            <td>
              @if ($bra_pro->brand_parent==0)
              <span style="color: red">Mục bán</span>
              @else
                @foreach ($brand as $key => $brand_sub_pro)
                  @if ($brand_sub_pro->brand_id==$bra_pro->brand_parent )
                  <span style="color: green">{{$brand_sub_pro->brand_name}}</span>
                  @endif
               

                @endforeach
              
              @endif
            </td>
            <td>{{$bra_pro->brand_slug }}</td>
            <td>{{$bra_pro->brand_desc}}</td>
            <td><span class="text-ellipsis">
              <?php
              if($bra_pro->brand_status==0){
                ?>
                <a href="{{URL::to('/unactive-brand-product/'.$bra_pro->brand_id)}}"><span class="fa fa-thumbs-up"></span></a>
                <?php
              }else{
                ?>
                <a href="{{URL::to('/active-brand-product/'.$bra_pro->brand_id)}}"><span class="fa fa-thumbs-down"></span></a>
              <?php
              }
              ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-brand-product/'.$bra_pro->brand_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success"></i>
              </a>
              <a onclick="return confirm('Bạn thực sự muốn xóa thương hiệu ?')" href="{{URL::to('/delete-brand-product/'.$bra_pro->brand_id)}}" class="active" ui-toggle-class="">
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