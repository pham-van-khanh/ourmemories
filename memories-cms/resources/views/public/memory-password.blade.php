@extends('layouts.app')
@section('content')
<div class="container" style="padding:60px 0"><div class="card" style="max-width:420px;margin:auto"><h2>Memory riêng tư</h2><form method="post">@csrf<input type="password" name="password" placeholder="Nhập mật khẩu" style="width:100%;padding:10px"><button style="margin-top:10px">Mở khóa</button></form></div></div>
@endsection
