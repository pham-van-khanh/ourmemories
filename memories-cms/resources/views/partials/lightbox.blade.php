<div x-data="{open:false,image:''}" x-show="open" @keydown.escape.window="open=false" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.85);z-index:80;padding:20px">
    <button @click="open=false" style="color:#fff">Đóng</button>
    <img :src="image" style="max-width:100%;max-height:85vh;display:block;margin:30px auto;">
</div>
