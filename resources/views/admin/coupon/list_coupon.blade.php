 @extends('admin_layout')
 @section('admin_content')
 <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        Liệt kê mã giảm giá
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
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên mã</th>
            <th>Mã giảm giá</th>
            <th>Số lượng giảm giá</th>
            <th>Hình thức giảm giá</th>
            <th>Số giảm </th>
            <th>Thao tác</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($coupon as $key => $cou)
          <tr> 
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>         
            <td>{{$cou->coupon_name}}</td>
            <td>{{$cou->coupon_code}}</td>
            <td>{{$cou->coupon_time}}</td>
            <td><span class="text-ellipsis">
              <?php
              if($cou->coupon_condition==1){
                ?>
                Giảm theo %
                <?php
              }else{
                ?>
                Giảm theo tiền  
              <?php
              }
              ?>
            </span></td>
            <td><span class="text-ellipsis">
              <?php
              if($cou->coupon_condition==1){
                ?>
                 {{$cou->coupon_number}} %
                <?php
              }else{
                ?>
               - {{number_format($cou->coupon_number,0,',','.')}} VNĐ 
              <?php
              }
              ?>
            </span></td>
            <td>
             
              <a onclick="return confirm('Bạn muốn xóa mã giảm giá này không?')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active" ui-toggle-class="">
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
      </div>
    </footer>
  </div>
</div>
@endsection