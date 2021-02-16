@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê Comment
    </div>
    <div id="notify_comment"></div>
  
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light" id="myTable">
        <thead>
          <tr>
            <th>Duyệt</th>
            <th>Người gửi</th>
            <th>Bình luận</th>
            <th>Thời gian gửi</th>
            <th>Sản phẩm </th>
            <th>Quản lý</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($comment as $key => $comm)
          <tr>
            <td>
              @if($comm->comment_status==1)
              <form>
                @csrf
                <input type="button" data-comment_status="0" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="btn btn-primary btn-xs comment_duyet_btn" value="Duyệt">
                </form>
              @else
              <form>
                @csrf
                <input type="button"data-comment_status="1"data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}"class="btn btn-danger btn-xs comment_duyet_btn" value=" Ẩn">
                </form>
              @endif
            </td>
            <td>{{ $comm->comment_name }}</td>
            <td>{{ $comm->comment }}
              <style type="text/css">
                ul.list_rep li{
                  list-style-type:decimal;
                  color: red;
                  margin-left: 30px;
                }
              </style>
              <ul class="list_rep">
                @foreach($comment_rep as $key =>$comm_reply)
                @if($comm_reply->comment_parent_comment==$comm->comment_id)
                <li>{{$comm_reply->comment}}</li>
                @endif
                @endforeach
              </ul>
                @if($comm->comment_status==0)
                <form>
                  @csrf
                 <br><textarea class="reply_comment_{{$comm->comment_id}}" rows="3"></textarea>
                  <br><button class="btn btn-xs btn-primary btn-reply-comment" data-comment_id="{{$comm->comment_id}}" data-product_id="{{$comm->comment_product_id}}">Trả lời</button>
                  </form>
              @endif
            </td>
            <td>{{ $comm->created_at }}</td>
            <td><a href="{{url('/chi-tiet-san-pham/'.$comm->product->product_id)}}">{{ $comm->product->product_name}}</a></td>
            <td>
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa bình luận này ko?')" href="{{URL::to('/delete-comment/')}}" class="active styling-edit" ui-toggle-class="">
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