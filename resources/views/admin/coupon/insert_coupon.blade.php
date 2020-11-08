 @extends('admin_layout')
 @section('admin_content')

 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm mã giảm giá
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
                                <form role="form" action="{{URL::to('/insert-coupon-code')}}" method="post">
                                    @csrf
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="text">Tên mã giảm giá</label>
                                    <input type="text" name="coupon_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                 <div class="form-group">
                                    <label for="text">Mã giảm giá</label>
                                    <input type="text" name="coupon_code" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="text">Số lượng giảm giá</label>
                                    <input type="text" name="coupon_time" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="text">Tính năng mã</label>
                                        <select class="form-control input-sm m-bot15" name="coupon_condition">
                                             <option value="0">--Chọn--</option>
                                            <option value="1">Giảm theo %</option>
                                            <option value="2">Giảm theo tiền</option>
                                       
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="text">Nhập số % hoặc tiền giảm </label>
                                   <input type="text" name="coupon_number" class="form-control" id="exampleInputEmail1">
                                </div>
                                

                                <button type="submit" name="add_coupon" class="btn btn-info">Thêm mã</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection