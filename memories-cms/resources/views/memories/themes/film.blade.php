@extends('layouts.app')
@section('content')
<section class="hero"><div class="container"><h1 style="font-family:Playfair Display,serif">{{ $memory->title }}</h1><p>{{ $memory->description }}</p></div></section>
<section class="container" style="padding:30px 0;display:grid;gap:14px">@foreach($memory->sections as $section) @include('partials.memory-section-renderer',['section'=>$section]) @endforeach</section>
@endsection
