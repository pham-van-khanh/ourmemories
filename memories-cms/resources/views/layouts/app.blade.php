<!doctype html><html lang="vi"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Our Memories</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600;700&family=Dancing+Script:wght@400;600;700&family=Cormorant+Garamond:wght@300;400;600;700&display=swap" rel="stylesheet">
<style>body{font-family:Inter,sans-serif;margin:0;background:#faf7f2;color:#2f2926} .container{max-width:1100px;margin:auto;padding:0 16px} .hero{padding:96px 0;background:linear-gradient(130deg,#e8b7ad,#f4eadf)} .grid{display:grid;gap:16px} @media(min-width:768px){.grid-3{grid-template-columns:repeat(3,1fr)}} .card{background:#fff;border-radius:20px;padding:16px;box-shadow:0 20px 60px rgba(47,41,38,.08)}</style>
</head><body>
<nav class="container" style="padding:16px 0;display:flex;justify-content:space-between"><strong>Our Memories</strong><div>Home · Memories · Blog · News</div></nav>
@yield('content')
<footer class="container" style="padding:24px 0;opacity:.8">Made with love · {{ date('Y') }}</footer>
</body></html>
