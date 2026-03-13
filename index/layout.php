<?php
// layout.php — Global Layout Shell for Calcifer Labs
// Include this at the top of every page before DOCTYPE
// Sets up global styles, fonts, and shared JS behavior
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($page_title) ? htmlspecialchars($page_title) . ' — Calcifer Labs' : 'Calcifer Labs — We Build Your Dreams' ?></title>
  <meta name="description" content="<?= isset($page_desc) ? htmlspecialchars($page_desc) : 'Calcifer Labs builds powerful SaaS, ML integrations, mobile apps, ecommerce, school management systems and more. We fuel your fire.' ?>">
  <meta property="og:title" content="Calcifer Labs — We Build Your Dreams">
  <meta property="og:type" content="website">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet">

  <style>
    /* ==========================================
       CALCIFER LABS — GLOBAL DESIGN SYSTEM
       Aesthetic: Dark Industrial · Flame Accents
       ========================================== */

    :root {
      /* Core Palette */
      --obsidian:     #0A0A0B;
      --forge:        #111114;
      --coal:         #1A1A1F;
      --ember:        #242429;
      --smoke:        #3A3A44;
      --ash:          #6B6B7A;
      --mist:         #9898A8;
      --pale:         #D4D4E0;
      --white:        #F5F5FA;

      /* Flame Accent System */
      --flame-core:   #FF6B1A;
      --flame-bright: #FF8C42;
      --flame-deep:   #CC3D00;
      --flame-ember:  #FF3D00;
      --gold:         #FFB347;
      --gold-pale:    #FFE4A0;

      /* Glow Effects */
      --glow-sm:      0 0 12px rgba(255, 107, 26, 0.25);
      --glow-md:      0 0 30px rgba(255, 107, 26, 0.20), 0 0 60px rgba(255, 107, 26, 0.08);
      --glow-lg:      0 0 60px rgba(255, 107, 26, 0.30), 0 0 120px rgba(255, 107, 26, 0.10);

      /* Typography */
      --font-display: 'Syne', sans-serif;
      --font-body:    'DM Sans', sans-serif;

      /* Spacing */
      --section-pad:  clamp(80px, 10vw, 140px);
      --container:    1240px;

      /* Transitions */
      --ease-fire:    cubic-bezier(0.34, 1.20, 0.64, 1);
      --ease-smooth:  cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    *, *::before, *::after {
      margin: 0; padding: 0;
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
      font-size: 16px;
    }

    body {
      font-family: var(--font-body);
      background-color: var(--obsidian);
      color: var(--pale);
      line-height: 1.6;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
    }

    /* ─── Noise Texture Overlay ─── */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='1'/%3E%3C/svg%3E");
      opacity: 0.025;
      pointer-events: none;
      z-index: 1000;
    }

    /* ─── Typography ─── */
    h1, h2, h3, h4, h5 {
      font-family: var(--font-display);
      line-height: 1.1;
      letter-spacing: -0.02em;
    }

    p { color: var(--mist); }

    a {
      color: inherit;
      text-decoration: none;
    }

    img { display: block; max-width: 100%; }

    /* ─── Container ─── */
    .container {
      max-width: var(--container);
      margin: 0 auto;
      padding: 0 clamp(20px, 5vw, 60px);
    }

    /* ─── Flame Accent Text ─── */
    .accent {
      color: var(--flame-core);
    }
    .accent-gold {
      color: var(--gold);
    }
    .gradient-text {
      background: linear-gradient(135deg, var(--flame-core), var(--gold));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* ─── Section Tag ─── */
    .section-tag {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-family: var(--font-display);
      font-size: 0.7rem;
      font-weight: 700;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--flame-core);
      margin-bottom: 20px;
    }

    .section-tag::before {
      content: '';
      width: 20px;
      height: 2px;
      background: var(--flame-core);
      display: block;
    }

    /* ─── Buttons ─── */
    .btn-primary {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 16px 32px;
      background: var(--flame-ember);
      color: var(--white);
      font-family: var(--font-display);
      font-weight: 600;
      font-size: 0.9rem;
      letter-spacing: 0.04em;
      border: none;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      transition: all 0.3s var(--ease-smooth);
      clip-path: polygon(0 0, calc(100% - 12px) 0, 100% 12px, 100% 100%, 12px 100%, 0 calc(100% - 12px));
    }

    .btn-primary::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, var(--flame-bright), var(--flame-deep));
      opacity: 0;
      transition: opacity 0.3s;
    }

    .btn-primary:hover { transform: translateY(-2px); box-shadow: var(--glow-md); }
    .btn-primary:hover::before { opacity: 1; }
    .btn-primary span { position: relative; z-index: 1; }

    .btn-ghost {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 15px 31px;
      background: transparent;
      color: var(--pale);
      font-family: var(--font-display);
      font-weight: 600;
      font-size: 0.9rem;
      letter-spacing: 0.04em;
      border: 1px solid var(--smoke);
      cursor: pointer;
      transition: all 0.3s var(--ease-smooth);
      clip-path: polygon(0 0, calc(100% - 12px) 0, 100% 12px, 100% 100%, 12px 100%, 0 calc(100% - 12px));
    }

    .btn-ghost:hover {
      border-color: var(--flame-core);
      color: var(--flame-core);
      box-shadow: var(--glow-sm);
    }

    /* ─── Divider ─── */
    .flame-divider {
      width: 60px;
      height: 3px;
      background: linear-gradient(90deg, var(--flame-ember), transparent);
      margin: 20px 0;
    }

    /* ─── Scroll reveal base ─── */
    .reveal {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.7s var(--ease-smooth), transform 0.7s var(--ease-smooth);
    }
    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* ─── NAVIGATION ─── */
    .cl-nav {
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 900;
      padding: 0;
      transition: background 0.4s, backdrop-filter 0.4s, border-color 0.4s;
      border-bottom: 1px solid transparent;
    }

    .cl-nav.scrolled {
      background: rgba(10, 10, 11, 0.88);
      backdrop-filter: blur(20px);
      border-bottom-color: var(--coal);
    }

    .nav-inner {
      max-width: var(--container);
      margin: 0 auto;
      padding: 0 clamp(20px, 5vw, 60px);
      height: 72px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 24px;
    }

    .nav-logo {
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
      flex-shrink: 0;
    }

    .logo-flame {
      position: relative;
      filter: drop-shadow(0 0 8px rgba(255, 107, 26, 0.5));
      transition: filter 0.3s;
    }

    .nav-logo:hover .logo-flame {
      filter: drop-shadow(0 0 16px rgba(255, 107, 26, 0.8));
      animation: flame-flicker 0.5s ease infinite alternate;
    }

    @keyframes flame-flicker {
      0%   { transform: scaleY(1) rotate(-1deg); }
      100% { transform: scaleY(1.04) rotate(1deg); }
    }

    .logo-text {
      display: flex;
      flex-direction: column;
      line-height: 1;
    }

    .logo-name {
      font-family: var(--font-display);
      font-weight: 800;
      font-size: 1.2rem;
      letter-spacing: -0.02em;
      color: var(--white);
    }

    .logo-sub {
      font-family: var(--font-display);
      font-weight: 600;
      font-size: 0.52rem;
      letter-spacing: 0.28em;
      color: var(--flame-core);
      margin-top: 1px;
    }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 4px;
      list-style: none;
    }

    .nav-link {
      font-family: var(--font-display);
      font-size: 0.85rem;
      font-weight: 500;
      color: var(--ash);
      padding: 8px 16px;
      letter-spacing: 0.02em;
      transition: color 0.25s;
      position: relative;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      bottom: 2px; left: 50%;
      width: 0; height: 2px;
      background: var(--flame-core);
      transition: width 0.3s var(--ease-fire), left 0.3s var(--ease-fire);
      box-shadow: var(--glow-sm);
    }

    .nav-link:hover,
    .nav-link.active {
      color: var(--white);
    }

    .nav-link:hover::after,
    .nav-link.active::after {
      width: calc(100% - 32px);
      left: 16px;
    }

    .nav-cta {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      margin-left: 12px;
      padding: 10px 22px;
      background: var(--flame-ember);
      color: var(--white);
      font-family: var(--font-display);
      font-weight: 700;
      font-size: 0.8rem;
      letter-spacing: 0.04em;
      clip-path: polygon(0 0, calc(100% - 8px) 0, 100% 8px, 100% 100%, 8px 100%, 0 calc(100% - 8px));
      transition: all 0.3s var(--ease-smooth);
    }

    .nav-cta:hover {
      background: var(--flame-bright);
      box-shadow: var(--glow-sm);
      transform: translateY(-1px);
    }

    .nav-toggle {
      display: none;
      flex-direction: column;
      gap: 5px;
      background: none;
      border: none;
      cursor: pointer;
      padding: 6px;
    }

    .nav-toggle span {
      display: block;
      width: 24px;
      height: 2px;
      background: var(--pale);
      transition: all 0.3s var(--ease-smooth);
      transform-origin: center;
    }

    .nav-toggle.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
    .nav-toggle.open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
    .nav-toggle.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

    /* ─── FOOTER ─── */
    .cl-footer {
      background: var(--forge);
      border-top: 1px solid var(--coal);
      padding: 80px 0 40px;
      margin-top: auto;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: 1.5fr repeat(3, 1fr);
      gap: 60px;
      padding-bottom: 60px;
      border-bottom: 1px solid var(--coal);
    }

    .footer-brand p {
      font-size: 0.9rem;
      line-height: 1.7;
      margin: 16px 0 24px;
      color: var(--ash);
    }

    .footer-flame-bar {
      display: flex;
      align-items: center;
      gap: 8px;
      font-family: var(--font-display);
      font-size: 0.7rem;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--flame-core);
    }

    .footer-col h4 {
      font-family: var(--font-display);
      font-size: 0.75rem;
      font-weight: 700;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: var(--mist);
      margin-bottom: 20px;
    }

    .footer-col ul { list-style: none; }

    .footer-col ul li {
      margin-bottom: 10px;
    }

    .footer-col ul li a {
      font-size: 0.9rem;
      color: var(--ash);
      transition: color 0.25s;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .footer-col ul li a:hover {
      color: var(--flame-core);
    }

    .footer-col ul li a::before {
      content: '→';
      font-size: 0.7rem;
      opacity: 0;
      transform: translateX(-6px);
      transition: opacity 0.25s, transform 0.25s;
    }

    .footer-col ul li a:hover::before {
      opacity: 1;
      transform: translateX(0);
    }

    .footer-bottom {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding-top: 32px;
      font-size: 0.8rem;
      color: var(--smoke);
    }

    .footer-bottom a {
      color: var(--ash);
      transition: color 0.25s;
    }

    .footer-bottom a:hover { color: var(--flame-core); }

    /* ─── Responsive ─── */
    @media (max-width: 900px) {
      .nav-links {
        display: none;
        position: fixed;
        top: 72px; left: 0; right: 0;
        background: rgba(10, 10, 11, 0.97);
        backdrop-filter: blur(20px);
        flex-direction: column;
        padding: 24px 32px 40px;
        gap: 4px;
        border-bottom: 1px solid var(--coal);
        align-items: flex-start;
      }

      .nav-links.open { display: flex; }
      .nav-toggle { display: flex; }

      .nav-link { padding: 12px 0; font-size: 1rem; }
      .nav-cta { margin: 16px 0 0; padding: 14px 24px; }
    }

    @media (max-width: 768px) {
      .footer-grid {
        grid-template-columns: 1fr 1fr;
        gap: 40px;
      }
      .footer-brand { grid-column: 1 / -1; }
      .footer-bottom { flex-direction: column; gap: 12px; text-align: center; }
    }

    @media (max-width: 480px) {
      .footer-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<?php include __DIR__ . '/nav.php'; ?>