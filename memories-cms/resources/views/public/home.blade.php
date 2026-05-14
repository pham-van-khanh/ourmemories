@extends('layouts.app')
@section('content')
<section class="hero"><div class="container"><h1 style="font-family:Playfair Display,serif;font-size:44px">Nơi lưu giữ những kỷ niệm của chúng ta</h1><p>Beautiful, emotional, mobile-first memory landing pages.</p></div></section>
<section class="container" style="padding:36px 0"><h2>Featured Memories</h2><div class="grid grid-3">@forelse($memories as $m)<article class="card"><h3>{{ $m->title }}</h3><p>{{ $m->location }}</p></article>@empty <div class="card">Chưa có memory nào.</div>@endforelse</div></section>
@endsection
