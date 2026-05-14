@extends('layouts.admin')
@section('content')
<h1>Dashboard</h1>
<div style="display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:12px">@foreach($stats as $k=>$v)<div class="card"><div>{{ $k }}</div><strong>{{ $v }}</strong></div>@endforeach</div>
@endsection
