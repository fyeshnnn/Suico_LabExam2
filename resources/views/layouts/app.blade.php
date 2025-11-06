<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Suico Laboratory Exam 2 - @yield('title')</title>
  <!-- Simple soft purple styles -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap">
  <style>
    :root{
      --bg:#f6f4fb;
      --card:#efeaf9;
      --accent:#9b7fe1; /* main purple */
      --accent-soft:#cfc3f6;
      --muted:#6b6b7a;
      --white:#ffffff;
    }
    *{box-sizing:border-box;font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,"Helvetica Neue",Arial;}
    body{margin:0;background:var(--bg);color:#2b2b33;padding:24px;}
    .container{max-width:980px;margin:0 auto;}
    .card{background:var(--card);padding:20px;border-radius:12px;box-shadow:0 4px 18px rgba(80,60,120,0.06);margin-bottom:16px}
    header{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px}
    h1{margin:0;font-size:1.6rem;color:var(--accent)}
    a.btn{background:linear-gradient(135deg,var(--accent),#7f63d8);color:var(--white);padding:8px 12px;border-radius:10px;text-decoration:none;font-weight:600}
    .muted{color:var(--muted);font-size:0.95rem}
    form input, form textarea, form select{
      width:100%;padding:10px;border-radius:8px;border:1px solid rgba(0,0,0,0.06);background:transparent;margin-top:8px;
    }
    .todo-row{display:flex;align-items:center;justify-content:space-between;padding:12px;border-radius:10px;background:var(--white);margin-bottom:10px}
    .todo-left{display:flex;gap:12px;align-items:center}
    .badge{padding:6px 9px;border-radius:999px;font-size:0.85rem}
    .badge.pending{background:var(--accent-soft);color:var(--accent)}
    .badge.done{background:#e9f5ee;color:#167a3a}
    .small{font-size:0.85rem;color:var(--muted)}
    .actions a, .actions form{display:inline-block}
    .actions button{background:transparent;border:none;color:var(--accent);cursor:pointer;padding:6px 8px;border-radius:6px}
    .flash{padding:10px;border-radius:8px;margin-bottom:10px;background:#eef8ff;color:#065a9e}
  </style>
</head>
<body>
  <div class="container">
    <header>
      <div>
        <h1>To Do List</h1>
      </div>
      <div>
      </div>
    </header>

    @if(session('success'))
      <div class="flash">{{ session('success') }}</div>
    @endif

    @yield('content')

    <footer style="margin-top:22px;text-align:center;color:var(--muted);font-size:0.9rem">
      Built with Laravel ♥
    </footer>
  </div>
</body>
</html>
