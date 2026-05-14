@php($type = $section->type)
@if($type === 'story')
<div class="card"><h3>{{ $section->heading }}</h3><p>{{ $section->content }}</p></div>
@elseif($type === 'timeline')
<div class="card"><small>{{ $section->time_label }}</small><h3>{{ $section->heading }}</h3><p>{{ $section->content }}</p></div>
@elseif($type === 'quote')
<blockquote class="card">“{{ $section->content }}”<footer>— {{ $section->quote_author }}</footer></blockquote>
@elseif($type === 'video')
<div class="card"><h3>{{ $section->heading }}</h3><a href="{{ $section->video_url }}" target="_blank">Open video</a></div>
@else
<div class="card"><h3>{{ $section->heading }}</h3>@if($section->image)<img src="{{ asset('storage/'.$section->image) }}" alt="" style="width:100%;border-radius:12px">@endif<p>{{ $section->content }}</p></div>
@endif
