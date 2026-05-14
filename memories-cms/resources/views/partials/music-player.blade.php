@if(!empty($memory->background_music))
<div style="position:fixed;right:16px;bottom:16px;background:#fff;padding:10px 14px;border-radius:999px;box-shadow:0 10px 30px rgba(0,0,0,.15)">
  <audio controls src="{{ asset('storage/'.$memory->background_music) }}"></audio>
</div>
@endif
