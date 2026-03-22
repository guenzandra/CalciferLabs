<?php
// signup.php — Calcifer Labs Registration Page
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account — Calcifer Labs</title>
  <meta name="description" content="Create your Calcifer Labs account.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300&family=DM+Mono:wght@300;400;500&display=swap" rel="stylesheet">

  <style>
    /* ── RESET ── */
    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
    html { height:100%; scroll-behavior:smooth; }

    /* ── TOKENS — exact match with login.php ── */
    :root {
      --fire-orange:   #FF5C1A;
      --fire-amber:    #FF9500;
      --fire-yellow:   #FFD60A;
      --deep-dark:     #060402;
      --border:        rgba(255,255,255,.08);
      --border-fire:   rgba(255,92,26,.25);
      --text-primary:  #F5F3EF;
      --text-muted:    rgba(245,243,239,.5);
      --text-dim:      rgba(245,243,239,.25);
      --gradient-fire: linear-gradient(135deg,#FF5C1A,#FF9500,#FFD60A);
      --success:       #22C55E;
      --error-col:     #EF4444;
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--deep-dark);
      color: var(--text-primary);
      min-height: 100vh;
      overflow-x: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* ══ LOADER — identical to login.php ══ */
    #loader {
      position: fixed; inset:0; z-index:1000;
      background: #060402;
      display: flex; flex-direction:column;
      align-items:center; justify-content:center;
      gap: 32px;
      transition: opacity .6s ease, visibility .6s ease;
    }
    #loader.hide { opacity:0; visibility:hidden; pointer-events:none; }

    .loader-flame-wrap { position:relative; width:90px; height:120px; }

    .lflame {
      position:absolute; bottom:0; left:50%;
      transform-origin:center bottom;
      border-radius:50% 50% 20% 20%;
      animation:flicker-up var(--dur,1.4s) ease-in-out infinite alternate;
    }
    .lflame:nth-child(1) {
      width:54px; height:90px; margin-left:-27px;
      background:radial-gradient(ellipse at 50% 100%,#ff2200 0%,#ff6600 40%,transparent 75%);
      --dur:1.2s;
    }
    .lflame:nth-child(2) {
      width:40px; height:72px; margin-left:-20px;
      background:radial-gradient(ellipse at 50% 100%,#ff8800 0%,#ffbb00 50%,transparent 80%);
      --dur:1.5s; animation-delay:-.2s;
    }
    .lflame:nth-child(3) {
      width:26px; height:52px; margin-left:-13px;
      background:radial-gradient(ellipse at 50% 100%,#ffe040 0%,#fff4a0 60%,transparent 85%);
      --dur:1.0s; animation-delay:-.4s;
    }
    .lflame:nth-child(4) {
      width:14px; height:14px; border-radius:50%;
      margin-left:-7px; bottom:6px;
      background:radial-gradient(circle,#fff 0%,#ffe86e 55%,transparent 100%);
      box-shadow:0 0 18px 6px rgba(255,220,40,.6),0 0 40px 12px rgba(255,120,10,.3);
      animation:pulse-core 1.3s ease-in-out infinite alternate;
    }
    @keyframes flicker-up {
      0%   { transform:scaleX(1)   scaleY(1)    rotate(-2deg); opacity:.9;  }
      40%  { transform:scaleX(.88) scaleY(1.07) rotate(2deg);  opacity:1;   }
      100% { transform:scaleX(.94) scaleY(.95)  rotate(-1deg); opacity:.85; }
    }
    @keyframes pulse-core {
      from { transform:scale(1);   opacity:.9; }
      to   { transform:scale(1.3); opacity:1;  }
    }

    .loader-glow {
      position:absolute; bottom:-18px; left:50%;
      transform:translateX(-50%);
      width:90px; height:20px; border-radius:50%;
      background:radial-gradient(ellipse,rgba(255,100,10,.55) 0%,transparent 75%);
      animation:glow-pulse 1.4s ease-in-out infinite alternate;
    }
    @keyframes glow-pulse {
      from { opacity:.6; transform:translateX(-50%) scaleX(1);    }
      to   { opacity:1;  transform:translateX(-50%) scaleX(1.18); }
    }

    .spark {
      position:absolute; width:var(--sz,4px); height:var(--sz,4px);
      border-radius:50%; background:var(--col,#ffcc40);
      box-shadow:0 0 6px var(--col,#ffcc40);
      bottom:10px; left:50%;
      animation:spark-fly var(--dur,1.8s) ease-out infinite;
      animation-delay:var(--delay,0s); opacity:0;
    }
    @keyframes spark-fly {
      0%   { opacity:0; transform:translate(-50%,0) scale(1); }
      15%  { opacity:1; }
      100% { opacity:0; transform:translate(calc(-50% + var(--tx,0px)),var(--ty,-90px)) scale(0); }
    }

    .loader-brand {
      display:flex; flex-direction:column; align-items:center; gap:6px;
      animation:fade-in .8s .3s ease both;
    }
    .loader-brand-name {
      font-family:'Syne',sans-serif; font-size:28px; font-weight:800;
      background:var(--gradient-fire);
      -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
      letter-spacing:-.01em;
    }
    .loader-brand-sub {
      font-size:10px; font-weight:600; letter-spacing:.32em;
      text-transform:uppercase; color:var(--text-dim);
    }

    .loader-bar-wrap {
      width:160px; height:2px;
      background:rgba(255,255,255,.07); border-radius:2px; overflow:hidden;
    }
    .loader-bar {
      height:100%; width:0%; background:var(--gradient-fire); border-radius:2px;
      animation:load-bar 1.8s cubic-bezier(.4,0,.2,1) forwards;
      box-shadow:0 0 8px rgba(255,92,26,.6);
    }
    @keyframes load-bar { 0%{width:0%} 60%{width:75%} 85%{width:90%} 100%{width:100%} }
    @keyframes fade-in  { from{opacity:0;transform:translateY(8px)} to{opacity:1;transform:translateY(0)} }

    /* ── BG CANVAS + NOISE ── */
    #bg-canvas { position:fixed; inset:0; z-index:0; pointer-events:none; }
    body::after {
      content:''; position:fixed; inset:0; pointer-events:none; z-index:1; opacity:.022;
      background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
      background-size:180px;
    }

    /* ── PAGE ── */
    .page-wrap {
      position:relative; z-index:2;
      width:100%; min-height:100vh;
      display:flex; align-items:center; justify-content:center;
      padding:40px 20px;
      opacity:0; animation:page-reveal .8s .1s ease forwards;
    }
    @keyframes page-reveal {
      from{opacity:0;transform:translateY(16px)} to{opacity:1;transform:translateY(0)}
    }

    /* ── CARD — identical glass style to login.php ── */
    .signup-card {
      width:100%; max-width:460px;
      background:rgba(255,255,255,.032);
      border:1px solid rgba(255,255,255,.07);
      border-radius:28px;
      padding:44px 40px 40px;
      backdrop-filter:blur(28px);
      box-shadow:
        0 32px 80px rgba(0,0,0,.55),
        0 0 0 1px rgba(255,92,26,.06),
        inset 0 1px 0 rgba(255,255,255,.06);
      position:relative; overflow:hidden;
    }
    /* Fire glow behind card */
    .signup-card::before {
      content:''; position:absolute;
      bottom:-60px; left:50%; transform:translateX(-50%);
      width:320px; height:200px;
      background:radial-gradient(ellipse,rgba(255,92,26,.12) 0%,transparent 70%);
      pointer-events:none; z-index:0;
    }
    /* Amber shimmer top line */
    .signup-card::after {
      content:''; position:absolute;
      top:0; left:10%; right:10%; height:1px;
      background:linear-gradient(90deg,transparent,rgba(255,149,0,.4),transparent);
      border-radius:1px;
    }
    .card-inner { position:relative; z-index:1; }

    /* ── HEADER ── */
    .card-header { text-align:center; margin-bottom:28px; }

    .card-logo {
      display:inline-flex; align-items:center; gap:10px;
      text-decoration:none; margin-bottom:22px;
    }
    .card-logo-flame {
      width:44px; height:44px; object-fit:contain;
      filter:drop-shadow(0 0 14px rgba(255,100,10,.65));
      transition:filter .3s, transform .3s;
    }
    .card-logo:hover .card-logo-flame {
      filter:drop-shadow(0 0 24px rgba(255,92,26,.9));
      transform:scale(1.07) rotate(-4deg);
    }
    .card-logo-text { display:flex; flex-direction:column; line-height:1; gap:2px; text-align:left; }
    .card-logo-main {
      font-family:'Syne',sans-serif; font-weight:800; font-size:20px;
      background:var(--gradient-fire);
      -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
    }
    .card-logo-sub {
      font-family:'Syne',sans-serif; font-weight:600; font-size:9px;
      letter-spacing:.28em; text-transform:uppercase; color:var(--fire-amber);
    }
    .card-title {
      font-family:'Syne',sans-serif; font-size:24px; font-weight:800;
      color:var(--text-primary); margin-bottom:6px; letter-spacing:-.02em;
    }
    .card-subtitle { font-size:14px; color:var(--text-muted); line-height:1.6; }

    /* ── STEP INDICATORS ── */
    .steps {
      display:flex; align-items:center; justify-content:center;
      gap:0; margin-bottom:28px;
    }
    .step-node { display:flex; flex-direction:column; align-items:center; gap:5px; }
    .step-circle {
      width:30px; height:30px; border-radius:50%;
      border:1.5px solid var(--border);
      background:rgba(255,255,255,.03);
      display:flex; align-items:center; justify-content:center;
      font-family:'DM Mono',monospace; font-size:12px; font-weight:500;
      color:var(--text-dim);
      transition:all .3s ease;
    }
    .step-node.active .step-circle {
      border-color:var(--fire-orange);
      background:rgba(255,92,26,.1);
      color:var(--fire-amber);
      box-shadow:0 0 14px rgba(255,92,26,.25);
    }
    .step-node.done .step-circle {
      border-color:var(--success);
      background:rgba(34,197,94,.1);
      color:var(--success);
    }
    .step-label {
      font-size:10px; font-weight:600; color:var(--text-dim);
      letter-spacing:.07em; text-transform:uppercase; transition:color .3s;
      white-space:nowrap;
    }
    .step-node.active .step-label { color:var(--fire-amber); }
    .step-node.done  .step-label  { color:var(--success); }
    .step-connector {
      width:44px; height:1.5px; margin-bottom:20px;
      background:var(--border); transition:background .4s ease;
    }
    .step-connector.done { background:var(--success); }

    /* ── STEP PANELS ── */
    .step-panel { display:none; flex-direction:column; gap:14px; }
    .step-panel.active {
      display:flex;
      animation:step-slide-in .38s cubic-bezier(.4,0,.2,1) both;
    }
    .step-panel.going-back {
      animation:step-slide-back .38s cubic-bezier(.4,0,.2,1) both;
    }
    @keyframes step-slide-in   { from{opacity:0;transform:translateX(20px)} to{opacity:1;transform:translateX(0)} }
    @keyframes step-slide-back { from{opacity:0;transform:translateX(-20px)} to{opacity:1;transform:translateX(0)} }

    /* ── FORM FIELDS ── */
    .field-row { display:grid; grid-template-columns:1fr 1fr; gap:12px; }
    .field-group { display:flex; flex-direction:column; gap:6px; }
    .field-label {
      font-size:11px; font-weight:600; letter-spacing:.07em;
      text-transform:uppercase; color:var(--text-muted); padding-left:2px;
    }
    .field-wrap { position:relative; }
    .field-icon {
      position:absolute; left:13px; top:50%; transform:translateY(-50%);
      color:var(--text-dim); display:flex; align-items:center;
      pointer-events:none; transition:color .2s;
    }
    .field-input, .field-select {
      width:100%; padding:12px 14px 12px 40px;
      border-radius:12px;
      background:rgba(255,255,255,.04);
      border:1px solid rgba(255,255,255,.08);
      color:var(--text-primary);
      font-family:'DM Sans',sans-serif; font-size:14px;
      outline:none;
      transition:border-color .2s, background .2s, box-shadow .2s;
    }
    .field-input::placeholder { color:rgba(245,243,239,.2); }
    .field-input:focus, .field-select:focus {
      border-color:var(--fire-orange);
      background:rgba(255,92,26,.04);
      box-shadow:0 0 0 3px rgba(255,92,26,.12);
    }
    .field-wrap:focus-within .field-icon { color:var(--fire-amber); }
    .field-input.valid   { border-color:rgba(34,197,94,.4);  }
    .field-input.invalid { border-color:rgba(239,68,68,.4);  }
    .field-hint { font-size:11px; color:var(--text-dim); padding-left:2px; }

    .field-select {
      appearance:none; cursor:pointer;
      background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23555' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
      background-repeat:no-repeat; background-position:right 12px center;
    }
    .field-select option { background:#0d0b08; }

    /* Phone row */
    .phone-row { display:flex; gap:8px; }
    .phone-code {
      width:94px; flex-shrink:0; padding:12px 8px;
      border-radius:12px;
      background:rgba(255,255,255,.04);
      border:1px solid rgba(255,255,255,.08);
      color:var(--text-primary);
      font-family:'DM Sans',sans-serif; font-size:13px;
      outline:none; appearance:none; cursor:pointer;
      background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 24 24' fill='none' stroke='%23555' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
      background-repeat:no-repeat; background-position:right 6px center;
      transition:border-color .2s, box-shadow .2s;
    }
    .phone-code:focus { border-color:var(--fire-orange); box-shadow:0 0 0 3px rgba(255,92,26,.12); }
    .phone-code option { background:#0d0b08; }

    /* Password toggle */
    .pwd-toggle {
      position:absolute; right:12px; top:50%; transform:translateY(-50%);
      background:none; border:none; color:var(--text-dim);
      cursor:pointer; display:flex; align-items:center;
      padding:4px; border-radius:6px; transition:color .2s;
    }
    .pwd-toggle:hover { color:var(--text-muted); }

    /* Password strength */
    .pw-bars { display:flex; gap:4px; margin-top:2px; }
    .pw-bar  { height:3px; flex:1; border-radius:2px; background:rgba(255,255,255,.08); transition:background .3s; }
    .pw-label { font-size:11px; padding-left:2px; transition:color .3s; min-height:14px; }

    /* ── OTP SECTION ── */
    .otp-notice {
      text-align:center; padding:16px;
      background:rgba(255,92,26,.05); border:1px solid rgba(255,92,26,.15);
      border-radius:14px;
    }
    .otp-notice-icon {
      width:42px; height:42px; border-radius:50%;
      background:rgba(255,92,26,.1); border:1px solid rgba(255,92,26,.22);
      display:flex; align-items:center; justify-content:center;
      margin:0 auto 10px;
      box-shadow:0 0 18px rgba(255,92,26,.15);
    }
    .otp-notice-title { font-family:'Syne',sans-serif; font-size:15px; font-weight:700; margin-bottom:4px; }
    .otp-notice-desc  { font-size:13px; color:var(--text-muted); line-height:1.5; }
    .otp-email-pill {
      display:inline-block; margin-top:8px;
      padding:3px 12px; border-radius:100px;
      background:rgba(255,92,26,.1); border:1px solid rgba(255,92,26,.25);
      font-size:12px; font-weight:600; color:var(--fire-amber);
      font-family:'DM Mono',monospace; word-break:break-all;
    }

    /* OTP digit boxes */
    .otp-boxes { display:flex; gap:8px; justify-content:center; }
    .otp-box {
      width:50px; height:58px;
      text-align:center; border-radius:12px;
      background:rgba(255,255,255,.04);
      border:1.5px solid rgba(255,255,255,.08);
      color:var(--text-primary);
      font-family:'DM Mono',monospace; font-size:22px; font-weight:500;
      outline:none; caret-color:var(--fire-orange);
      transition:border-color .2s, background .2s, box-shadow .2s, transform .15s;
    }
    .otp-box:focus {
      border-color:var(--fire-orange);
      background:rgba(255,92,26,.05);
      box-shadow:0 0 0 3px rgba(255,92,26,.12);
      transform:scale(1.05);
    }
    .otp-box.filled  { border-color:rgba(255,149,0,.4); background:rgba(255,92,26,.06); }
    .otp-box.invalid { border-color:rgba(239,68,68,.5); background:rgba(239,68,68,.05); animation:otp-shake .35s ease; }
    .otp-box.valid   { border-color:rgba(34,197,94,.45); background:rgba(34,197,94,.05); }
    @keyframes otp-shake {
      0%,100%{transform:translateX(0)} 20%{transform:translateX(-4px)} 40%{transform:translateX(4px)} 60%{transform:translateX(-3px)} 80%{transform:translateX(2px)}
    }

    .otp-resend-row { text-align:center; font-size:13px; color:var(--text-dim); }
    .resend-btn {
      background:none; border:none; color:var(--fire-orange);
      font-family:'DM Sans',sans-serif; font-size:13px; font-weight:600;
      cursor:pointer; transition:opacity .2s;
    }
    .resend-btn:hover { opacity:.75; }
    .resend-btn:disabled { color:var(--text-dim); cursor:not-allowed; }
    #countdown { font-family:'DM Mono',monospace; font-size:12px; color:var(--text-muted); }

    /* ── ALERTS ── */
    .alert {
      display:flex; align-items:flex-start; gap:10px;
      padding:11px 14px; border-radius:12px;
      font-size:13px; line-height:1.5;
      animation:alert-pop .3s ease both;
    }
    @keyframes alert-pop { from{opacity:0;transform:translateY(-5px)} to{opacity:1;transform:translateY(0)} }
    .alert-error   { background:rgba(239,68,68,.08); border:1px solid rgba(239,68,68,.22); color:#fca5a5; }
    .alert-success { background:rgba(34,197,94,.08); border:1px solid rgba(34,197,94,.22); color:#86efac; }

    /* ── BUTTONS ── */
    .btn-primary {
      width:100%; padding:13px; border-radius:12px;
      background:var(--gradient-fire); border:none; color:#000;
      font-family:'DM Sans',sans-serif; font-size:15px; font-weight:700;
      cursor:pointer;
      display:flex; align-items:center; justify-content:center; gap:8px;
      box-shadow:0 4px 24px rgba(255,92,26,.4);
      transition:opacity .2s, transform .15s, box-shadow .2s;
      position:relative; overflow:hidden; margin-top:4px;
    }
    .btn-primary::after {
      content:''; position:absolute; inset:0;
      background:linear-gradient(120deg,transparent 30%,rgba(255,255,255,.18) 50%,transparent 70%);
      transform:translateX(-100%); transition:transform .5s ease;
    }
    .btn-primary:hover::after { transform:translateX(100%); }
    .btn-primary:hover { opacity:.92; transform:translateY(-1px); box-shadow:0 8px 32px rgba(255,92,26,.55); }
    .btn-primary:active { transform:translateY(0); }
    .btn-primary.loading { pointer-events:none; opacity:.72; }
    .btn-primary.loading .btn-text { opacity:0; }
    .btn-primary.loading .btn-spin { display:flex; }
    .btn-spin { display:none; position:absolute; align-items:center; gap:5px; }
    .sdot {
      width:6px; height:6px; border-radius:50%; background:#000;
      animation:sdot-bounce .65s ease infinite;
    }
    .sdot:nth-child(2){animation-delay:.11s} .sdot:nth-child(3){animation-delay:.22s}
    @keyframes sdot-bounce {
      0%,80%,100%{transform:scale(.55);opacity:.35} 40%{transform:scale(1);opacity:1}
    }

    .btn-ghost {
      width:100%; padding:12px; border-radius:12px; background:transparent;
      border:1px solid rgba(255,255,255,.08); color:var(--text-muted);
      font-family:'DM Sans',sans-serif; font-size:14px; font-weight:500;
      cursor:pointer; display:flex; align-items:center; justify-content:center; gap:7px;
      transition:background .2s, border-color .2s, color .2s;
    }
    .btn-ghost:hover { background:rgba(255,255,255,.04); border-color:rgba(255,255,255,.15); color:var(--text-primary); }

    .btn-row { display:flex; gap:10px; margin-top:4px; }
    .btn-row .btn-ghost    { flex:1; }
    .btn-row .btn-primary  { flex:2; margin-top:0; }

    /* ── SUCCESS ── */
    .success-panel {
      display:none; flex-direction:column; align-items:center;
      text-align:center; gap:14px; padding:8px 0;
    }
    .success-panel.active { display:flex; animation:step-slide-in .5s ease both; }
    .success-ring {
      width:76px; height:76px; border-radius:50%;
      background:rgba(34,197,94,.08); border:1.5px solid rgba(34,197,94,.3);
      display:flex; align-items:center; justify-content:center;
      box-shadow:0 0 28px rgba(34,197,94,.18);
      animation:ring-pop .55s cubic-bezier(.34,1.56,.64,1) both;
    }
    @keyframes ring-pop { from{transform:scale(0);opacity:0} to{transform:scale(1);opacity:1} }
    .check-path {
      stroke-dasharray:38; stroke-dashoffset:38;
      animation:draw-check .45s .45s ease forwards;
    }
    @keyframes draw-check { to{stroke-dashoffset:0} }
    .success-title { font-family:'Syne',sans-serif; font-size:22px; font-weight:800; letter-spacing:-.02em; }
    .success-desc  { font-size:14px; color:var(--text-muted); line-height:1.65; max-width:300px; }

    /* ── FOOTER ── */
    .footer-note { text-align:center; font-size:13px; color:var(--text-dim); margin-top:22px; }
    .footer-note a { color:var(--fire-orange); text-decoration:none; font-weight:600; transition:color .2s; }
    .footer-note a:hover { color:var(--fire-amber); }

    /* ── RESPONSIVE ── */
    @media(max-width:500px) {
      .signup-card { padding:36px 22px 32px; border-radius:24px; }
      .field-row   { grid-template-columns:1fr; }
      .step-connector { width:28px; }
      .otp-box     { width:42px; height:52px; font-size:18px; }
      .card-title  { font-size:20px; }
    }
  </style>
</head>
<body>

<!-- ══ LOADER — same as login.php ══ -->
<div id="loader">
  <div class="loader-flame-wrap">
    <div class="lflame"></div>
    <div class="lflame"></div>
    <div class="lflame"></div>
    <div class="lflame"></div>
    <div class="loader-glow"></div>
    <div class="spark" style="--tx:-22px;--ty:-100px;--dur:1.6s;--delay:0s;  --sz:4px;--col:#ffcc40;"></div>
    <div class="spark" style="--tx: 18px;--ty:-85px; --dur:1.9s;--delay:.3s; --sz:3px;--col:#ff9500;"></div>
    <div class="spark" style="--tx:-8px; --ty:-120px;--dur:2.1s;--delay:.6s; --sz:3px;--col:#ffe060;"></div>
    <div class="spark" style="--tx: 28px;--ty:-95px; --dur:1.7s;--delay:.15s;--sz:4px;--col:#ff7020;"></div>
    <div class="spark" style="--tx:-30px;--ty:-78px; --dur:2.3s;--delay:.45s;--sz:3px;--col:#ffcc40;"></div>
    <div class="spark" style="--tx: 10px;--ty:-110px;--dur:1.5s;--delay:.75s;--sz:2px;--col:#fff090;"></div>
  </div>
  <div class="loader-brand">
    <span class="loader-brand-name">Calcifer Labs</span>
    <span class="loader-brand-sub">Fueling your dreams</span>
  </div>
  <div class="loader-bar-wrap">
    <div class="loader-bar"></div>
  </div>
</div>

<!-- ══ BG CANVAS — same fire sky as login.php ══ -->
<canvas id="bg-canvas"></canvas>

<!-- ══ PAGE ══ -->
<div class="page-wrap">
  <div class="signup-card">
    <div class="card-inner">

      <!-- Header -->
      <div class="card-header">
        <a href="index.php" class="card-logo">
          <img src="storage/Calcifer Labs flame .png"
            onerror="this.src='storage/Calcifer Labs flame.png'"
            alt="Calcifer Labs" class="card-logo-flame">
          <div class="card-logo-text">
            <span class="card-logo-main">Calcifer</span>
            <span class="card-logo-sub">Labs</span>
          </div>
        </a>
        <h1 class="card-title">Create your account</h1>
        <p class="card-subtitle">Join us — we'll build something great together.</p>
      </div>

      <!-- Step indicators -->
      <div class="steps" id="steps-bar">
        <div class="step-node active" id="sn-1">
          <div class="step-circle" id="sc-1">1</div>
          <span class="step-label">Details</span>
        </div>
        <div class="step-connector" id="sl-1"></div>
        <div class="step-node" id="sn-2">
          <div class="step-circle" id="sc-2">2</div>
          <span class="step-label">Contact</span>
        </div>
        <div class="step-connector" id="sl-2"></div>
        <div class="step-node" id="sn-3">
          <div class="step-circle" id="sc-3">3</div>
          <span class="step-label">Verify</span>
        </div>
      </div>

      <!-- ───── STEP 1: Personal Details ───── -->
      <div class="step-panel active" id="panel-1">
        <div id="msg-1"></div>

        <div class="field-row">
          <div class="field-group">
            <label class="field-label">First Name</label>
            <div class="field-wrap">
              <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
              </svg>
              <input class="field-input" type="text" id="f-first" placeholder="Juan" autocomplete="given-name">
            </div>
          </div>
          <div class="field-group">
            <label class="field-label">Last Name</label>
            <div class="field-wrap">
              <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
              </svg>
              <input class="field-input" type="text" id="f-last" placeholder="dela Cruz" autocomplete="family-name">
            </div>
          </div>
        </div>

        <div class="field-group">
          <label class="field-label">Birthdate</label>
          <div class="field-wrap">
            <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
              <rect x="3" y="4" width="18" height="18" rx="2"/>
              <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/>
              <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
            <input class="field-input" type="date" id="f-bday" autocomplete="bday">
          </div>
          <span class="field-hint">You must be at least 13 years old.</span>
        </div>

        <div class="field-group">
          <label class="field-label">Country</label>
          <div class="field-wrap">
            <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
              <circle cx="12" cy="12" r="10"/>
              <line x1="2" y1="12" x2="22" y2="12"/>
              <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
            </svg>
            <select class="field-select" id="f-country">
              <option value="" disabled selected>Select your country</option>
              <option value="PH" selected>🇵🇭 Philippines</option>
              <option value="US">🇺🇸 United States</option>
              <option value="GB">🇬🇧 United Kingdom</option>
              <option value="AU">🇦🇺 Australia</option>
              <option value="CA">🇨🇦 Canada</option>
              <option value="SG">🇸🇬 Singapore</option>
              <option value="JP">🇯🇵 Japan</option>
              <option value="KR">🇰🇷 South Korea</option>
              <option value="IN">🇮🇳 India</option>
              <option value="DE">🇩🇪 Germany</option>
              <option value="FR">🇫🇷 France</option>
              <option value="AE">🇦🇪 UAE</option>
              <option value="MY">🇲🇾 Malaysia</option>
              <option value="ID">🇮🇩 Indonesia</option>
              <option value="TH">🇹🇭 Thailand</option>
              <option value="VN">🇻🇳 Vietnam</option>
              <option value="NZ">🇳🇿 New Zealand</option>
              <option value="SA">🇸🇦 Saudi Arabia</option>
              <option value="OTHER">🌍 Other</option>
            </select>
          </div>
        </div>

        <button class="btn-primary" id="btn-step1" onclick="nextStep1()">
          <span class="btn-text" style="display:flex;align-items:center;gap:8px;">
            Continue
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="14" height="14"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </span>
          <span class="btn-spin"><span class="sdot"></span><span class="sdot"></span><span class="sdot"></span></span>
        </button>
      </div>

      <!-- ───── STEP 2: Contact + Password ───── -->
      <div class="step-panel" id="panel-2">
        <div id="msg-2"></div>

        <div class="field-group">
          <label class="field-label">Email Address</label>
          <div class="field-wrap">
            <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
              <polyline points="22,6 12,13 2,6"/>
            </svg>
            <input class="field-input" type="email" id="f-email" placeholder="you@example.com" autocomplete="email">
          </div>
        </div>

        <div class="field-group">
          <label class="field-label">Phone Number</label>
          <div class="phone-row">
            <select class="phone-code" id="f-dialcode">
              <option value="+63">🇵🇭 +63</option>
              <option value="+1">🇺🇸 +1</option>
              <option value="+44">🇬🇧 +44</option>
              <option value="+61">🇦🇺 +61</option>
              <option value="+65">🇸🇬 +65</option>
              <option value="+81">🇯🇵 +81</option>
              <option value="+82">🇰🇷 +82</option>
              <option value="+91">🇮🇳 +91</option>
              <option value="+49">🇩🇪 +49</option>
              <option value="+33">🇫🇷 +33</option>
              <option value="+971">🇦🇪 +971</option>
              <option value="+60">🇲🇾 +60</option>
              <option value="+62">🇮🇩 +62</option>
              <option value="+66">🇹🇭 +66</option>
              <option value="+84">🇻🇳 +84</option>
            </select>
            <div class="field-wrap" style="flex:1">
              <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.38 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.86a16 16 0 0 0 6 6l.95-.95a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
              </svg>
              <input class="field-input" type="tel" id="f-phone" placeholder="9XX XXX XXXX" autocomplete="tel">
            </div>
          </div>
        </div>

        <div class="field-group">
          <label class="field-label">Password</label>
          <div class="field-wrap">
            <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
              <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
            <input class="field-input" type="password" id="f-password" placeholder="Min. 8 characters" autocomplete="new-password" style="padding-right:44px">
            <button type="button" class="pwd-toggle" onclick="togglePwd('f-password','eye-s','eye-h')">
              <svg id="eye-s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
              </svg>
              <svg id="eye-h" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15" style="display:none">
                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                <line x1="1" y1="1" x2="23" y2="23"/>
              </svg>
            </button>
          </div>
          <div class="pw-bars">
            <div class="pw-bar" id="pb1"></div><div class="pw-bar" id="pb2"></div>
            <div class="pw-bar" id="pb3"></div><div class="pw-bar" id="pb4"></div>
          </div>
          <span class="pw-label field-hint" id="pw-label"></span>
        </div>

        <div class="btn-row">
          <button class="btn-ghost" onclick="goBack(1)">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="14" height="14"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Back
          </button>
          <button class="btn-primary" id="btn-step2" onclick="nextStep2()">
            <span class="btn-text" style="display:flex;align-items:center;gap:8px;">
              Send Code
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="14" height="14"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
            </span>
            <span class="btn-spin"><span class="sdot"></span><span class="sdot"></span><span class="sdot"></span></span>
          </button>
        </div>
      </div>

      <!-- ───── STEP 3: OTP Verify ───── -->
      <div class="step-panel" id="panel-3">
        <div id="msg-3"></div>

        <div class="otp-notice">
          <div class="otp-notice-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="var(--fire-amber)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="18" height="18">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
              <polyline points="22,6 12,13 2,6"/>
            </svg>
          </div>
          <div class="otp-notice-title">Check your inbox</div>
          <div class="otp-notice-desc">We sent a 6-digit code to</div>
          <div class="otp-email-pill" id="otp-email">—</div>
        </div>

        <div class="otp-boxes">
          <input class="otp-box" type="text" inputmode="numeric" maxlength="1" id="otp-0" autocomplete="one-time-code">
          <input class="otp-box" type="text" inputmode="numeric" maxlength="1" id="otp-1">
          <input class="otp-box" type="text" inputmode="numeric" maxlength="1" id="otp-2">
          <input class="otp-box" type="text" inputmode="numeric" maxlength="1" id="otp-3">
          <input class="otp-box" type="text" inputmode="numeric" maxlength="1" id="otp-4">
          <input class="otp-box" type="text" inputmode="numeric" maxlength="1" id="otp-5">
        </div>

        <div class="otp-resend-row">
          Didn't get it?
          <button class="resend-btn" id="resend-btn" onclick="resendCode()" disabled>
            Resend in <span id="countdown">60s</span>
          </button>
        </div>

        <div class="btn-row">
          <button class="btn-ghost" onclick="goBack(2)">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="14" height="14"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Back
          </button>
          <button class="btn-primary" id="btn-step3" onclick="submitOtp()">
            <span class="btn-text" style="display:flex;align-items:center;gap:8px;">
              Verify &amp; Register
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="14" height="14"><path d="M20 6L9 17l-5-5"/></svg>
            </span>
            <span class="btn-spin"><span class="sdot"></span><span class="sdot"></span><span class="sdot"></span></span>
          </button>
        </div>
      </div>

      <!-- ───── SUCCESS ───── -->
      <div class="success-panel" id="success-panel">
        <div class="success-ring">
          <svg viewBox="0 0 24 24" fill="none" stroke="var(--success)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="30" height="30">
            <polyline class="check-path" points="20 6 9 17 4 12"/>
          </svg>
        </div>
        <h2 class="success-title">Welcome aboard! 🎉</h2>
        <p class="success-desc">Your account is ready. Time to build something extraordinary with Calcifer Labs.</p>
        <button class="btn-primary" style="max-width:220px" onclick="window.location.href='login.php'">
          <span class="btn-text" style="display:flex;align-items:center;gap:8px;">
            Go to Login
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="14" height="14"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </span>
          <span class="btn-spin"><span class="sdot"></span><span class="sdot"></span><span class="sdot"></span></span>
        </button>
      </div>

      <p class="footer-note" id="footer-note">
        Already have an account? <a href="login.php">Log in</a>
      </p>

    </div>
  </div>
</div>

<script>
/* ══ LOADER ══ */
window.addEventListener('load', () => {
  setTimeout(() => document.getElementById('loader').classList.add('hide'), 2200);
});

/* ══ FIRE SKY BACKGROUND — same as login.php ══ */
(function () {
  const canvas = document.getElementById('bg-canvas');
  const ctx = canvas.getContext('2d');
  let W, H, t = 0;
  const resize = () => { W = canvas.width = window.innerWidth; H = canvas.height = window.innerHeight; };
  resize(); window.addEventListener('resize', resize);

  const stars = Array.from({ length: 120 }, () => ({
    x:Math.random(), y:Math.random()*.65,
    r:Math.random()*1.2+.25, tw:Math.random()*Math.PI*2, spd:.006+Math.random()*.01,
  }));
  const hills = [
    {y:.82,amp:.06,freq:.003,spd:.00004,col:[8,6,4],   a:.5 },
    {y:.87,amp:.04,freq:.005,spd:.00007,col:[12,9,6],  a:.7 },
    {y:.91,amp:.025,freq:.008,spd:.0001,col:[16,12,8], a:.85},
    {y:.945,amp:.01,freq:.012,spd:.00013,col:[20,15,10],a:1  },
  ];

  (function loop() {
    t++;
    ctx.clearRect(0,0,W,H);
    const sky=ctx.createLinearGradient(0,0,0,H);
    sky.addColorStop(0,'#04030a'); sky.addColorStop(.3,'#080514');
    sky.addColorStop(.6,'#10080a'); sky.addColorStop(.85,'#1a0d07'); sky.addColorStop(1,'#0e0703');
    ctx.fillStyle=sky; ctx.fillRect(0,0,W,H);

    ctx.globalCompositeOperation='screen';
    stars.forEach(s=>{
      s.tw+=s.spd;
      const a=.25+.45*Math.abs(Math.sin(s.tw));
      ctx.beginPath(); ctx.arc(s.x*W,s.y*H,s.r,0,Math.PI*2);
      ctx.fillStyle=`rgba(255,248,230,${a})`; ctx.fill();
    });

    const cx=W*.5,cy=H*1.05,pulse=1+.05*Math.sin(t*.03);
    const bg=ctx.createRadialGradient(cx,cy,0,cx,cy,Math.min(W,H)*.5*pulse);
    bg.addColorStop(0,'rgba(255,110,18,.10)'); bg.addColorStop(.3,'rgba(255,70,8,.06)');
    bg.addColorStop(.65,'rgba(180,40,0,.025)'); bg.addColorStop(1,'rgba(0,0,0,0)');
    ctx.beginPath(); ctx.arc(cx,cy,Math.min(W,H)*.5*pulse,0,Math.PI*2);
    ctx.fillStyle=bg; ctx.fill();

    ctx.globalCompositeOperation='source-over';
    hills.forEach(l=>{
      l._off=(l._off||0)+l.spd*60;
      ctx.beginPath(); ctx.moveTo(0,H);
      for(let x=0;x<=W;x+=4){
        const y=l.y*H+Math.sin(x*l.freq+l._off)*l.amp*H+Math.sin(x*l.freq*2.3+l._off*1.4)*l.amp*.4*H;
        x===0?ctx.moveTo(x,y):ctx.lineTo(x,y);
      }
      ctx.lineTo(W,H); ctx.closePath();
      ctx.fillStyle=`rgba(${l.col[0]},${l.col[1]},${l.col[2]},${l.a})`; ctx.fill();
    });
    requestAnimationFrame(loop);
  })();
})();

/* ══ STEP STATE ══ */
let curStep = 1;
const DEMO_OTP = '123456'; // Replace with server-generated OTP in production
let _resendTimer = null;

function setStep(n, back) {
  // Hide all panels
  document.querySelectorAll('.step-panel').forEach(p => p.classList.remove('active','going-back'));
  const panel = document.getElementById('panel-' + n);
  if (panel) { panel.classList.add('active'); if (back) panel.classList.add('going-back'); }

  // Update nodes
  for (let i = 1; i <= 3; i++) {
    const node = document.getElementById('sn-' + i);
    const circ = document.getElementById('sc-' + i);
    node.classList.remove('active','done');
    if (i < n)  { node.classList.add('done');   circ.innerHTML = `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" width="12" height="12"><polyline points="20 6 9 17 4 12"/></svg>`; }
    if (i === n) { node.classList.add('active'); circ.textContent = i; }
    if (i > n)  { circ.textContent = i; }
  }
  // Update connectors
  for (let i = 1; i <= 2; i++) {
    document.getElementById('sl-' + i).classList.toggle('done', i < n);
  }
  curStep = n;
}

function showMsg(step, type, text) {
  const el = document.getElementById('msg-' + step);
  if (!el) return;
  el.innerHTML = `<div class="alert alert-${type}">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="14" height="14" style="flex-shrink:0;margin-top:1px">
      ${type==='error'
        ? '<circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>'
        : '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>'}
    </svg>${text}</div>`;
  setTimeout(() => { el.innerHTML = ''; }, 5000);
}

/* ── Step 1 → 2 ── */
function nextStep1() {
  const fn   = document.getElementById('f-first').value.trim();
  const ln   = document.getElementById('f-last').value.trim();
  const bday = document.getElementById('f-bday').value;
  const co   = document.getElementById('f-country').value;

  if (!fn || !ln)  return showMsg(1,'error','Please enter your first and last name.');
  if (!bday)       return showMsg(1,'error','Please select your birthdate.');
  if (!co)         return showMsg(1,'error','Please select your country.');

  const age = Math.floor((Date.now() - new Date(bday)) / (365.25*24*3600*1000));
  if (age < 13)    return showMsg(1,'error','You must be at least 13 years old to register.');

  setStep(2);
}

/* ── Step 2 → 3: send OTP ── */
function nextStep2() {
  const email = document.getElementById('f-email').value.trim();
  const phone = document.getElementById('f-phone').value.trim();
  const pw    = document.getElementById('f-password').value;

  if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email))
    return showMsg(2,'error','Please enter a valid email address.');
  if (!phone || phone.replace(/\D/g,'').length < 7)
    return showMsg(2,'error','Please enter a valid phone number.');
  if (!pw || pw.length < 8)
    return showMsg(2,'error','Password must be at least 8 characters.');

  const btn = document.getElementById('btn-step2');
  btn.classList.add('loading');

  // Simulate OTP send — replace with real fetch('/api/send-otp', ...) here
  setTimeout(() => {
    btn.classList.remove('loading');
    document.getElementById('otp-email').textContent = email;
    setStep(3);
    startCountdown(60);
    setTimeout(() => document.getElementById('otp-0').focus(), 200);
  }, 1400);
}

function goBack(n) { setStep(n, true); }

/* ── OTP boxes wiring ── */
const boxes = () => Array.from({length:6}, (_,i) => document.getElementById('otp-' + i));

document.addEventListener('DOMContentLoaded', () => {
  boxes().forEach((box, i) => {
    box.addEventListener('input', e => {
      box.classList.remove('invalid');
      const val = e.target.value.replace(/\D/g,'');
      box.value = val.slice(-1);
      box.classList.toggle('filled', !!box.value);
      if (box.value && i < 5) boxes()[i+1].focus();
      if (boxes().every(b => b.value)) submitOtp();
    });
    box.addEventListener('keydown', e => {
      if (e.key === 'Backspace' && !box.value && i > 0) {
        boxes()[i-1].value = '';
        boxes()[i-1].classList.remove('filled');
        boxes()[i-1].focus();
      }
    });
    box.addEventListener('paste', e => {
      e.preventDefault();
      const digits = (e.clipboardData||window.clipboardData).getData('text').replace(/\D/g,'').slice(0,6);
      boxes().forEach((b,j) => { b.value = digits[j]||''; b.classList.toggle('filled',!!b.value); });
      boxes()[Math.min(digits.length, 5)].focus();
      if (digits.length === 6) submitOtp();
    });
  });
});

function submitOtp() {
  const entered = boxes().map(b => b.value).join('');
  if (entered.length < 6) return showMsg(3,'error','Please enter the complete 6-digit code.');

  const btn = document.getElementById('btn-step3');
  btn.classList.add('loading');

  // Simulate verification — replace with real fetch('/api/verify-otp', ...) here
  setTimeout(() => {
    btn.classList.remove('loading');
    if (entered === DEMO_OTP) {
      boxes().forEach(b => { b.classList.add('valid'); b.classList.remove('filled'); });
      clearInterval(_resendTimer);
      setTimeout(() => {
        document.querySelectorAll('.step-panel.active').forEach(p => p.classList.remove('active'));
        const stepsBar = document.getElementById('steps-bar');
        stepsBar.style.transition = 'opacity .4s, transform .4s';
        stepsBar.style.opacity = '0'; stepsBar.style.transform = 'translateY(-6px)';
        document.getElementById('footer-note').style.display = 'none';
        document.getElementById('success-panel').classList.add('active');
      }, 700);
    } else {
      boxes().forEach(b => { b.classList.add('invalid'); b.value = ''; b.classList.remove('filled'); });
      setTimeout(() => boxes().forEach(b => b.classList.remove('invalid')), 600);
      showMsg(3,'error','Incorrect code. Please try again or request a new one.');
      boxes()[0].focus();
    }
  }, 1200);
}

/* ── Countdown & Resend ── */
function startCountdown(sec) {
  clearInterval(_resendTimer);
  const btn = document.getElementById('resend-btn');
  const cd  = document.getElementById('countdown');
  btn.disabled = true;
  let s = sec;
  cd.textContent = s + 's';
  _resendTimer = setInterval(() => {
    s--;
    cd.textContent = s + 's';
    if (s <= 0) {
      clearInterval(_resendTimer);
      btn.disabled = false;
      btn.innerHTML = 'Resend code';
    }
  }, 1000);
}

function resendCode() {
  const btn = document.getElementById('resend-btn');
  btn.disabled = true; btn.innerHTML = 'Sending…';
  // Replace with real resend API call
  setTimeout(() => {
    showMsg(3,'success','A new code has been sent to your email.');
    startCountdown(60);
  }, 1000);
}

/* ── Password strength ── */
document.addEventListener('DOMContentLoaded', () => {
  const pw = document.getElementById('f-password');
  if (!pw) return;
  pw.addEventListener('input', () => {
    const v = pw.value;
    let score = 0;
    if (v.length >= 8)       score++;
    if (/[A-Z]/.test(v))     score++;
    if (/[0-9]/.test(v))     score++;
    if (/[^A-Za-z0-9]/.test(v)) score++;

    const cols   = ['#EF4444','#f97316','#eab308','#22C55E'];
    const labels = ['Too weak','Fair','Good','Strong 💪'];
    const bars   = [document.getElementById('pb1'),document.getElementById('pb2'),
                    document.getElementById('pb3'),document.getElementById('pb4')];
    const lbl    = document.getElementById('pw-label');

    bars.forEach((b,i) => {
      b.style.background = i < score ? cols[score-1] : 'rgba(255,255,255,.08)';
    });
    lbl.textContent  = v.length ? (labels[score-1]||'') : '';
    lbl.style.color  = v.length ? cols[score-1] : 'var(--text-dim)';
  });
});

/* ── Password toggle ── */
function togglePwd(inpId, showId, hideId) {
  const inp  = document.getElementById(inpId);
  const show = document.getElementById(showId);
  const hide = document.getElementById(hideId);
  const isHidden = inp.type === 'password';
  inp.type            = isHidden ? 'text' : 'password';
  show.style.display  = isHidden ? 'none'  : 'block';
  hide.style.display  = isHidden ? 'block' : 'none';
}
</script>

</body>
</html>