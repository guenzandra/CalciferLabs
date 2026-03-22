<!--index.php — Main Landing Page for Calcifer Labs-->
<?php
$page_title = "We Build Your Dreams";
$page_desc  = "Calcifer Labs builds powerful SaaS, ML integrations, mobile & standalone apps, ecommerce, school and learning management systems.";
include 'index/layout.php';
?>
<style>
  html,
  body {
    background: #060402 !important;
  }

  /* Override layout.php solid backgrounds */
  nav#mainNav {
    background: rgba(4, 3, 2, .72) !important;
    backdrop-filter: blur(20px) !important;
    border-bottom: 1px solid rgba(255, 255, 255, .06) !important;
  }

  nav#mainNav.scrolled {
    background: rgba(3, 2, 1, .88) !important;
  }

  footer {
    background: rgba(3, 2, 1, .65) !important;
    backdrop-filter: blur(16px) !important;
    border-top: 1px solid rgba(255, 255, 255, .06) !important;
  }

  /* The fixed canvas IS the background — all sections must be transparent */
  #fire-bg-canvas {
    position: fixed !important;
    inset: 0 !important;
    z-index: 0 !important;
    width: 100vw !important;
    height: 100vh !important;
    pointer-events: none !important;
  }

  /* Every section floats above the canvas */
  .hero,
  .marquee-section,
  .categories,
  .services-section,
  .features-section,
  .testimonials,
  .challenge-section,
  .signup-cta-section,
  .newsletter,
  footer {
    position: relative;
    z-index: 2;
  }

  /* ── GLOBAL CURSOR RESET ── */
  *,
  *::before,
  *::after {
    cursor: auto !important;
  }

  a,
  button,
  [role="button"],
  .cat-chip,
  .soc-btn,
  .sugg-chip,
  .enroll-btn,
  .view-all,
  .chat-send,
  .chat-toggle,
  .chat-close,
  .scroll-top,
  .proposal-close,
  select {
    cursor: pointer !important;
  }

  input,
  textarea {
    cursor: text !important;
  }

  .hero-right {
    cursor: grab !important;
  }

  .hero-right:active {
    cursor: grabbing !important;
  }

  #cursor-dot,
  #cursor-ring {
    display: none !important;
  }

  /* ── DESIGN TOKENS ── */
  :root {
    --glass-bg: rgba(255, 255, 255, .04);
    --glass-border: rgba(255, 255, 255, .07);
    --white-text: #f5f3ef;
    --white-muted: rgba(245, 243, 239, .55);
    --white-dim: rgba(245, 243, 239, .28);
    --accent-gold: #f0b429;
  }

  /* ── NOISE TEXTURE ── */
  body::after {
    content: '';
    position: fixed;
    inset: 0;
    pointer-events: none;
    z-index: 1;
    opacity: .022;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
    background-size: 180px;
  }

  /* ── HERO GRID OVERLAY ── */
  .hero::after {
    content: '';
    position: absolute;
    inset: 0;
    z-index: 0;
    background-image:
      linear-gradient(rgba(255, 255, 255, .016) 1px, transparent 1px),
      linear-gradient(90deg, rgba(255, 255, 255, .016) 1px, transparent 1px);
    background-size: 60px 60px;
    mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 30%, transparent 100%);
    pointer-events: none;
  }

  /* ── HERO ── */
  .hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: visible;
    padding: 120px 32px 80px;
    background: transparent;
  }

  .hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: 0;
    background:
      radial-gradient(ellipse 70% 60% at 50% 110%, rgba(255, 92, 26, .22) 0%, transparent 65%),
      radial-gradient(ellipse 40% 30% at 15% 60%, rgba(255, 149, 0, .07) 0%, transparent 55%),
      radial-gradient(ellipse 40% 30% at 85% 40%, rgba(255, 214, 10, .05) 0%, transparent 55%),
      var(--deep-dark);
  }

  .hero-inner {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 64px;
    align-items: center;
    max-width: 1140px;
    margin: 0 auto;
    width: 100%;
    overflow: visible;
  }

  .hero-left {
    text-align: left;
  }

  .hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 16px;
    border-radius: 100px;
    background: rgba(255, 92, 26, .1);
    border: 1px solid rgba(255, 92, 26, .25);
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: #f0b429;
    margin-bottom: 28px;
    animation: fade-up .7s ease both;
    backdrop-filter: blur(8px);
  }

  .hero-title {
    font-family: 'Syne', sans-serif;
    font-size: clamp(38px, 5.5vw, 68px);
    font-weight: 800;
    line-height: 1.05;
    margin-bottom: 24px;
    animation: fade-up .7s .12s ease both;
  }

  .hero-sub {
    font-size: 17px;
    line-height: 1.72;
    color: var(--text-muted);
    max-width: 480px;
    margin-bottom: 40px;
    animation: fade-up .7s .22s ease both;
  }

  .hero-cta {
    display: flex;
    align-items: center;
    gap: 14px;
    flex-wrap: wrap;
    animation: fade-up .7s .32s ease both;
  }

  .hero-stats {
    display: flex;
    gap: 40px;
    margin-top: 56px;
    flex-wrap: wrap;
    animation: fade-up .7s .44s ease both;
  }

  .stat-num {
    font-family: 'Syne', sans-serif;
    font-size: 30px;
    font-weight: 800;
    background: var(--gradient-fire);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .stat-label {
    font-size: 11px;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: .06em;
    margin-top: 3px;
  }

  @keyframes fade-up {
    from {
      opacity: 0;
      transform: translateY(22px)
    }

    to {
      opacity: 1;
      transform: translateY(0)
    }
  }

  /* ── HERO VISUAL ── */
  .hero-right {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    height: 680px;
    animation: fade-up .8s .1s ease both;
    cursor: grab;
    overflow: visible;
  }

  .hero-right:active {
    cursor: grabbing;
  }

  #fire3d-canvas {
    position: absolute;
    top: -200px;
    left: -200px;
    width: calc(100% + 400px);
    height: calc(100% + 400px);
    pointer-events: all;
  }

  /* ── MARQUEE ── */
  .marquee-section {
    background: rgba(0, 0, 0, .3);
    border-top: 1px solid rgba(255, 255, 255, .06);
    border-bottom: 1px solid rgba(255, 255, 255, .06);
    padding: 0;
    overflow: hidden;
    backdrop-filter: blur(8px);
  }

  .marquee-inner {
    display: flex;
    animation: marquee 28s linear infinite;
    width: max-content;
  }

  .marquee-inner:hover {
    animation-play-state: paused;
  }

  @keyframes marquee {
    0% {
      transform: translateX(0)
    }

    100% {
      transform: translateX(-50%)
    }
  }

  .marquee-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 28px;
    white-space: nowrap;
    font-size: 13px;
    color: var(--text-muted);
    font-weight: 500;
    border-right: 1px solid var(--border);
  }

  .mdot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--fire-orange);
    flex-shrink: 0;
    box-shadow: 0 0 6px var(--fire-orange);
  }

  /* ── CATEGORIES ── */
  .categories {
    background: rgba(0, 0, 0, .3);
    border-top: 1px solid rgba(255, 255, 255, .06);
    border-bottom: 1px solid rgba(255, 255, 255, .06);
    padding: 24px 32px;
    backdrop-filter: blur(10px);
    position: relative;
    z-index: 3;
  }

  .cat-grid {
    display: flex;
    gap: 12px;
    overflow-x: auto;
    padding-bottom: 4px;
    scrollbar-width: none;
    position: relative;
    z-index: 3;
    -webkit-overflow-scrolling: touch;
    touch-action: pan-x;
  }

  .cat-grid::-webkit-scrollbar {
    display: none;
  }

  .cat-chip {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 18px;
    min-height: 44px;
    border-radius: 100px;
    background: var(--card-bg);
    border: 1px solid var(--border);
    font-size: 13px;
    font-weight: 500;
    color: var(--text-muted);
    white-space: nowrap;
    cursor: pointer !important;
    transition: all .2s;
    position: relative;
    z-index: 3;
    -webkit-tap-highlight-color: rgba(255, 92, 26, 0.2);
    user-select: none;
    -webkit-user-select: none;
  }

  .cat-chip:hover,
  .cat-chip.active {
    border-color: var(--fire-orange);
    color: var(--fire-orange);
    background: rgba(255, 92, 26, .08);
  }

  /* ── SERVICES CAROUSEL ── */
  .services-section {
    background: rgba(0, 0, 0, .35);
    position: relative;
    overflow: hidden;
    padding: 80px 0 100px;
    backdrop-filter: blur(6px);
  }

  .services-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 800px;
    height: 350px;
    background: radial-gradient(ellipse, rgba(255, 120, 30, .05) 0%, transparent 70%);
    pointer-events: none;
  }

  .services-section::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image:
      linear-gradient(rgba(255, 255, 255, .01) 1px, transparent 1px),
      linear-gradient(90deg, rgba(255, 255, 255, .01) 1px, transparent 1px);
    background-size: 80px 80px;
    pointer-events: none;
    mask-image: linear-gradient(180deg, transparent 0%, black 20%, black 80%, transparent 100%);
  }

  .services-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 44px;
    gap: 16px;
    flex-wrap: wrap;
    padding: 0 32px;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
  }

  .view-all {
    font-size: 11px;
    font-weight: 700;
    color: rgba(245, 243, 239, .5);
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
    cursor: pointer;
    transition: color .2s, gap .2s;
    letter-spacing: .06em;
    text-transform: uppercase;
  }

  .view-all:hover {
    color: #f5f3ef;
    gap: 10px;
  }

  /* Carousel outer */
  .carousel-outer {
    position: relative;
  }

  .carousel-track-wrap {
    overflow: hidden;
    padding: 8px 0 20px;
  }

  .carousel-track {
    display: flex;
    gap: 22px;
    padding: 0 32px;
    transition: transform .5s cubic-bezier(.4, 0, .2, 1);
    will-change: transform;
  }

  /* Carousel controls */
  .carousel-controls {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    margin-top: 28px;
  }

  .carousel-btn {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: rgba(255, 255, 255, .04);
    border: 1px solid rgba(255, 255, 255, .08);
    color: rgba(245, 243, 239, .5);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all .2s;
    backdrop-filter: blur(8px);
  }

  .carousel-btn:hover {
    background: rgba(255, 255, 255, .1);
    border-color: rgba(255, 255, 255, .2);
    color: #f5f3ef;
    transform: scale(1.08);
  }

  .carousel-btn:disabled {
    opacity: .25;
    cursor: not-allowed !important;
    transform: none;
  }

  .carousel-dots {
    display: flex;
    gap: 6px;
    align-items: center;
  }

  .carousel-dot {
    width: 6px;
    height: 6px;
    border-radius: 100px;
    background: rgba(255, 255, 255, .18);
    transition: all .3s;
    cursor: pointer;
  }

  .carousel-dot.active {
    width: 22px;
    background: rgba(245, 243, 239, .8);
  }

  .service-card {
    background: rgba(255, 245, 220, .04);
    border: 1px solid rgba(255, 220, 150, .1);
    border-radius: 22px;
    overflow: hidden;
    cursor: pointer;
    transition: transform .3s, box-shadow .3s, border-color .3s, background .3s;
    position: relative;
    display: flex;
    flex-direction: column;
    flex-shrink: 0;
    width: 310px;
    backdrop-filter: blur(8px);
  }

  .service-card::before {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 22px;
    background: radial-gradient(circle at var(--mx, 50%) var(--my, 50%), rgba(255, 255, 255, .045), transparent 60%);
    opacity: 0;
    transition: opacity .4s;
    pointer-events: none;
    z-index: 0;
  }

  .service-card:hover::before {
    opacity: 1;
  }

  .service-card:hover {
    transform: translateY(-8px) scale(1.01);
    box-shadow: 0 24px 64px rgba(0, 0, 0, .55), 0 0 0 1px rgba(255, 255, 255, .13);
    border-color: rgba(255, 255, 255, .16);
    background: rgba(255, 255, 255, .05);
  }

  .service-card:hover .card-thumb-inner {
    transform: scale(1.06);
  }

  .card-thumb {
    width: 100%;
    aspect-ratio: 16/9;
    overflow: hidden;
    position: relative;
    flex-shrink: 0;
  }

  .card-thumb-inner {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    transition: transform .3s;
  }

  .card-thumb-inner::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 50%, rgba(0, 0, 0, .5) 100%);
  }

  .thumb-icon {
    position: relative;
    z-index: 1;
    width: 52px;
    height: 52px;
  }

  .badge {
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .05em;
    text-transform: uppercase;
    padding: 3px 8px;
    border-radius: 4px;
    z-index: 2;
  }

  .badge-bs {
    background: var(--fire-amber);
    color: #000;
  }

  .badge-new {
    background: #22C55E;
    color: #000;
  }

  .badge-challenge {
    background: var(--fire-orange);
    color: #000;
  }

  .card-body {
    padding: 20px;
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    flex: 1;
  }

  .card-cat {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: #f0b429;
    margin-bottom: 8px;
  }

  .card-title {
    font-family: 'Syne', sans-serif;
    font-size: 16px;
    font-weight: 700;
    line-height: 1.35;
    margin-bottom: 10px;
    flex: 1;
  }

  .card-instructor {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 12px;
  }

  .inst-av {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    font-weight: 700;
    color: #000;
    background: var(--gradient-fire);
    flex-shrink: 0;
  }

  .inst-name {
    font-size: 12px;
    color: var(--text-muted);
  }

  .card-meta {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 12px;
    color: var(--text-dim);
    margin-bottom: 14px;
  }

  .card-meta span {
    display: flex;
    align-items: center;
    gap: 4px;
  }

  .card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: auto;
    padding-top: 14px;
    border-top: 1px solid rgba(255, 92, 26, .1);
  }

  .card-price {
    font-family: 'Syne', sans-serif;
    font-size: 20px;
    font-weight: 800;
  }

  .enroll-btn {
    padding: 8px 18px;
    border-radius: 8px;
    background: rgba(255, 92, 26, .12);
    border: 1px solid rgba(255, 92, 26, .3);
    color: var(--fire-orange);
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
    font-family: 'DM Sans', sans-serif;
    transition: background .2s, transform .15s, color .2s;
  }

  .enroll-btn:hover {
    background: var(--fire-orange);
    color: #000;
    transform: scale(1.03);
  }

  /* ── FIRE MORPH DIVIDER ── */
  .fire-morph-divider {
    position: relative;
    height: 120px;
    overflow: hidden;
    background: transparent;
    pointer-events: none;
  }

  .fire-morph-divider svg {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  /* ── FEATURES — warm tone ── */
  .features-section {
    background: rgba(5, 3, 1, .52);
    position: relative;
    overflow: hidden;
    backdrop-filter: blur(12px);
  }

  .features-section::before {
    content: '';
    position: absolute;
    top: -40px;
    left: 50%;
    transform: translateX(-50%);
    width: 600px;
    height: 300px;
    background: radial-gradient(ellipse, rgba(255, 92, 26, .08) 0%, transparent 70%);
    pointer-events: none;
  }

  .features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 20px;
    margin-top: 48px;
    align-items: stretch;
  }

  .feature-card {
    padding: 32px 28px;
    border-radius: 20px;
    background: rgba(255, 255, 255, .03);
    border: 1px solid rgba(255, 92, 26, .12);
    transition: border-color .25s, transform .25s, background .25s;
    cursor: default;
    display: flex;
    flex-direction: column;
    gap: 0;
  }

  .feature-card:hover {
    border-color: rgba(255, 92, 26, .35);
    background: rgba(255, 92, 26, .04);
    transform: translateY(-4px);
  }

  .feature-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    background: rgba(255, 92, 26, .1);
    border: 1px solid rgba(255, 92, 26, .2);
    transition: background .25s;
    flex-shrink: 0;
  }

  .feature-card:hover .feature-icon {
    background: rgba(255, 92, 26, .2);
  }

  .feature-title {
    font-family: 'Syne', sans-serif;
    font-size: 17px;
    font-weight: 700;
    margin-bottom: 10px;
    color: #f0ece4;
  }

  .feature-desc {
    font-size: 13px;
    color: #a89880;
    line-height: 1.7;
    flex: 1;
  }

  /* ── TESTIMONIALS — ember glow ── */
  .testimonials {
    background: rgba(4, 2, 1, .5);
    border-top: 1px solid rgba(255, 255, 255, .06);
    position: relative;
    overflow: hidden;
    backdrop-filter: blur(12px);
  }

  .testimonials::before {
    content: '';
    position: absolute;
    bottom: -60px;
    left: 50%;
    transform: translateX(-50%);
    width: 800px;
    height: 300px;
    background: radial-gradient(ellipse, rgba(255, 149, 0, .07) 0%, transparent 70%);
    pointer-events: none;
  }

  .testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 48px;
    align-items: stretch;
  }

  .t-card {
    padding: 32px 28px;
    border-radius: 20px;
    background: rgba(255, 255, 255, .025);
    border: 1px solid rgba(255, 92, 26, .12);
    position: relative;
    transition: border-color .2s, transform .2s;
    display: flex;
    flex-direction: column;
  }

  .t-card::before {
    content: '"';
    position: absolute;
    top: 16px;
    right: 20px;
    font-size: 72px;
    font-family: Georgia, serif;
    line-height: 1;
    color: rgba(255, 92, 26, .08);
    pointer-events: none;
  }

  .t-card:hover {
    border-color: rgba(255, 92, 26, .3);
    transform: translateY(-3px);
  }

  .t-text {
    font-size: 14px;
    line-height: 1.75;
    color: #a89880;
    margin-bottom: 24px;
    flex: 1;
  }

  .t-author {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .t-av {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 800;
    color: #000;
    background: var(--gradient-fire);
    flex-shrink: 0;
  }

  .t-name {
    font-size: 14px;
    font-weight: 600;
    color: #f0ece4;
  }

  .t-role {
    font-size: 12px;
    color: #6e5c48;
  }

  /* ── ABOUT / CHALLENGE ── */
  .challenge-section {
    background: rgba(5, 3, 1, .48);
    backdrop-filter: blur(10px);
  }

  .challenge-inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 64px;
    align-items: center;
  }

  .challenge-visual {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 320px;
    border-radius: 24px;
    background: radial-gradient(ellipse 80% 80% at 50% 50%, rgba(255, 92, 26, .15) 0%, transparent 70%), rgba(255, 92, 26, .03);
    border: 1px solid rgba(255, 92, 26, .18);
    position: relative;
    overflow: hidden;
    transition: border-color .3s;
  }

  .challenge-visual:hover {
    border-color: rgba(255, 92, 26, .4);
  }

  .challenge-visual::before {
    content: '';
    position: absolute;
    inset: 0;
    background: conic-gradient(from 0deg, transparent 0%, rgba(255, 92, 26, .05) 50%, transparent 100%);
    animation: rotate 12s linear infinite;
  }

  .challenge-visual svg {
    position: relative;
    z-index: 1;
  }

  @keyframes rotate {
    to {
      transform: rotate(360deg)
    }
  }

  .challenge-metrics {
    display: flex;
    gap: 32px;
    margin-top: 32px;
    flex-wrap: wrap;
  }

  .c-metric .m-num {
    font-family: 'Syne', sans-serif;
    font-size: 22px;
    font-weight: 800;
    background: var(--gradient-fire);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .c-metric .m-label {
    font-size: 12px;
    color: #8a7060;
    margin-top: 4px;
  }

  /* ── SIGN-UP CTA SECTION ── */
  .signup-cta-section {
    background: rgba(4, 2, 1, .55);
    border-top: 1px solid rgba(255, 255, 255, .06);
    border-bottom: 1px solid rgba(255, 255, 255, .06);
    position: relative;
    overflow: hidden;
    padding: 96px 32px;
    backdrop-filter: blur(12px);
  }

  .signup-cta-section::before {
    content: '';
    position: absolute;
    top: -80px;
    left: 50%;
    transform: translateX(-50%);
    width: 900px;
    height: 400px;
    background: radial-gradient(ellipse, rgba(255, 92, 26, .13) 0%, transparent 70%);
    pointer-events: none;
  }

  .signup-cta-inner {
    max-width: 900px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 64px;
    align-items: center;
    position: relative;
    z-index: 1;
  }

  .signup-cta-left .section-label {
    margin-bottom: 14px;
  }

  .signup-cta-left h2 {
    font-family: 'Syne', sans-serif;
    font-size: clamp(26px, 3.5vw, 38px);
    font-weight: 800;
    line-height: 1.15;
    margin-bottom: 16px;
    color: #f0ece4;
  }

  .signup-cta-left p {
    font-size: 15px;
    color: #8a7060;
    line-height: 1.7;
    margin-bottom: 32px;
  }

  .signup-perks {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 32px;
  }

  .signup-perk {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    font-size: 14px;
    color: #b09880;
    line-height: 1.55;
  }

  .signup-perk-icon {
    width: 22px;
    height: 22px;
    border-radius: 6px;
    background: rgba(255, 92, 26, .15);
    border: 1px solid rgba(255, 92, 26, .3);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-top: 1px;
  }

  .signup-cta-right {
    background: rgba(255, 255, 255, .025);
    border: 1px solid rgba(255, 92, 26, .18);
    border-radius: 24px;
    padding: 36px 32px;
    display: flex;
    flex-direction: column;
    gap: 18px;
    position: relative;
    overflow: hidden;
  }

  /* Top amber shimmer line on card */
  .signup-cta-right::after {
    content: '';
    position: absolute;
    top: 0;
    left: 15%;
    right: 15%;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(255, 149, 0, .35), transparent);
  }

  .cta-card-badge {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 5px 14px;
    border-radius: 100px;
    background: rgba(255, 92, 26, .08);
    border: 1px solid rgba(255, 92, 26, .2);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .07em;
    text-transform: uppercase;
    color: var(--fire-amber);
    width: fit-content;
  }

  .signup-cta-right h3 {
    font-family: 'Syne', sans-serif;
    font-size: 20px;
    font-weight: 800;
    color: #f0ece4;
    line-height: 1.2;
    margin: 0;
  }

  .signup-cta-right p {
    font-size: 13px;
    color: #7a6454;
    line-height: 1.7;
    margin: 0;
  }

  /* Mini stat row */
  .cta-mini-stats {
    display: flex;
    align-items: center;
    gap: 0;
    padding: 14px 0;
    border-top: 1px solid rgba(255, 92, 26, .08);
    border-bottom: 1px solid rgba(255, 92, 26, .08);
  }

  .cta-mini-stat {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 3px;
  }

  .cta-stat-num {
    font-family: 'Syne', sans-serif;
    font-size: 20px;
    font-weight: 800;
    background: var(--gradient-fire);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1;
  }

  .cta-stat-lbl {
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .07em;
    color: #6a5040;
  }

  .cta-mini-divider {
    width: 1px;
    height: 32px;
    background: rgba(255, 92, 26, .12);
  }

  /* Primary CTA button */
  .btn-cta-main {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    padding: 14px 0;
    border-radius: 12px;
    background: var(--gradient-fire);
    border: none;
    color: #000;
    font-family: 'DM Sans', sans-serif;
    font-size: 15px;
    font-weight: 700;
    text-decoration: none;
    cursor: pointer;
    transition: opacity .2s, transform .15s, box-shadow .2s;
    box-shadow: 0 4px 24px rgba(255, 92, 26, .4);
    position: relative;
    overflow: hidden;
  }

  .btn-cta-main::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(120deg, transparent 30%, rgba(255, 255, 255, .15) 50%, transparent 70%);
    transform: translateX(-100%);
    transition: transform .5s ease;
  }

  .btn-cta-main:hover::after {
    transform: translateX(100%);
  }

  .btn-cta-main:hover {
    opacity: .92;
    transform: translateY(-2px);
    box-shadow: 0 8px 32px rgba(255, 92, 26, .55);
  }

  /* Alt actions */
  .cta-alt-actions {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
  }

  .btn-cta-ghost {
    width: 100%;
    padding: 11px 0;
    border-radius: 12px;
    background: transparent;
    border: 1px solid rgba(255, 255, 255, .08);
    color: var(--text-muted);
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: background .2s, border-color .2s, color .2s;
  }

  .btn-cta-ghost:hover {
    background: rgba(255, 255, 255, .04);
    border-color: rgba(255, 255, 255, .15);
    color: var(--text-primary);
  }

  .cta-login-note {
    font-size: 12px;
    color: #5a4a3a;
    text-align: center;
  }

  .cta-login-note a {
    color: var(--fire-orange);
    text-decoration: none;
    font-weight: 600;
  }

  .cta-login-note a:hover {
    color: var(--fire-amber);
  }

  /* ── NEWSLETTER ── */
  .newsletter {
    background: linear-gradient(180deg, #160b04 0%, #0e0804 100%);
    border-top: 1px solid rgba(255, 92, 26, .1);
    border-bottom: 1px solid rgba(255, 92, 26, .08);
  }

  .nl-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 32px;
    flex-wrap: wrap;
  }

  .nl-form {
    display: flex;
    gap: 10px;
    flex: 1;
    max-width: 420px;
  }

  .nl-form input {
    flex: 1;
    padding: 12px 18px;
    border-radius: 10px;
    background: rgba(255, 255, 255, .04);
    border: 1px solid rgba(255, 92, 26, .2);
    color: var(--text-primary);
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    outline: none;
    cursor: text;
    transition: border-color .2s;
  }

  .nl-form input:focus {
    border-color: var(--fire-orange);
  }

  .nl-form input::placeholder {
    color: #5a4a3a;
  }

  /* ── CURRENCY SWITCHER ── */
  .currency-switcher {
    display: flex;
    align-items: center;
    gap: 4px;
    background: rgba(255, 255, 255, .04);
    border: 1px solid rgba(255, 255, 255, .08);
    border-radius: 100px;
    padding: 4px;
    backdrop-filter: blur(8px);
  }

  .currency-btn {
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 5px 12px;
    border-radius: 100px;
    border: none;
    background: transparent;
    color: rgba(245, 243, 239, .45);
    font-family: 'DM Sans', sans-serif;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer !important;
    transition: all .2s;
    white-space: nowrap;
    letter-spacing: .03em;
  }

  .currency-btn:hover {
    color: rgba(245, 243, 239, .8);
    background: rgba(255, 255, 255, .06);
  }

  .currency-btn.active {
    background: rgba(255, 92, 26, .15);
    border: 1px solid rgba(255, 92, 26, .3);
    color: #f0b429;
  }

  .currency-flag {
    font-size: 13px;
    line-height: 1;
  }

  /* ── RESPONSIVE ── */
  @media(max-width:960px) {
    .hero-inner {
      grid-template-columns: 1fr;
      text-align: center;
      gap: 40px;
    }

    .hero-left {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .hero-sub {
      text-align: center;
    }

    /* Hide 3D orbit on mobile */
    .hero-right {
      display: none !important;
    }

    .challenge-inner {
      grid-template-columns: 1fr;
    }

    .challenge-visual {
      display: none;
    }

    .signup-cta-inner {
      grid-template-columns: 1fr;
      gap: 40px;
    }
  }

  @media(max-width:600px) {
    .hero {
      padding: 100px 20px 60px;
    }

    .hero-title {
      font-size: clamp(30px, 9vw, 42px);
    }

    .hero-cta {
      justify-content: center;
    }

    .hero-stats {
      gap: 20px 32px;
      justify-content: center;
    }

    .categories {
      padding: 20px;
    }

    .services-header {
      padding: 0 20px;
      margin-bottom: 28px;
      flex-direction: column;
      align-items: flex-start;
    }

    /* Stack currency switcher + view-all on mobile */
    .services-header>div:last-child {
      width: 100%;
      justify-content: space-between;
    }

    .currency-switcher {
      flex: 1;
    }

    .currency-btn {
      flex: 1;
      justify-content: center;
      padding: 5px 8px;
      font-size: 11px;
    }

    .currency-flag {
      font-size: 12px;
    }

    .carousel-track {
      padding: 0 20px;
    }

    .service-card {
      width: 280px;
    }

    .services-section,
    .features-section,
    .testimonials,
    .challenge-section,
    .newsletter,
    .signup-cta-section {
      padding: 56px 20px;
    }

    .nl-inner {
      flex-direction: column;
      align-items: stretch;
    }

    .nl-form {
      max-width: 100%;
    }

    .challenge-metrics {
      gap: 20px;
    }
  }
</style>

<!-- ══ HERO ══ -->
<section class="hero" id="home">
  <div class="hero-inner">
    <div class="hero-left">
      <div class="hero-badge">
        <svg width="11" height="11" viewBox="0 0 24 24" fill="var(--fire-amber)">
          <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
        </svg>
        Open for Challenges &middot; Fueling the Fire
      </div>
      <h1 class="hero-title">Build Your Dreams<br>with <span class="fire-text">Calcifer Labs</span></h1>
      <p class="hero-sub">SaaS platforms, machine learning pipelines, mobile apps, ecommerce, school systems and beyond. We don't back down from hard problems — we ignite them.</p>
      <div class="hero-cta">
        <button class="btn-fire-lg" onclick="document.getElementById('proposalModal').style.display='flex'">
          Send a Proposal
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14M12 5l7 7-7 7" />
          </svg>
        </button>
        <button class="btn-outline-lg" onclick="document.getElementById('about').scrollIntoView({behavior:'smooth'})">About Us</button>
      </div>
      <div class="hero-stats">
        <div class="stat">
          <div class="stat-num">50+</div>
          <div class="stat-label">Projects Delivered</div>
        </div>
        <div class="stat">
          <div class="stat-num">8+</div>
          <div class="stat-label">Service Verticals</div>
        </div>
        <div class="stat">
          <div class="stat-num">100%</div>
          <div class="stat-label">Challenges Accepted</div>
        </div>
      </div>
    </div>

    <!-- Desktop: 3D orbit canvas -->
    <div class="hero-right" id="heroRight">
      <canvas id="fire3d-canvas"></canvas>
    </div>

  </div>
</section>

<!-- ══ MARQUEE ══ -->
<div class="marquee-section" aria-hidden="true">
  <div class="marquee-inner">
    <?php
    $items = ['SaaS Development', 'Machine Learning & AI', 'Android Apps', 'iOS Apps', 'Ecommerce', 'School Management', 'Learning Management', 'Standalone Apps', 'Open for Challenges', 'Fueling the Fire'];
    $all = array_merge($items, $items);
    foreach ($all as $item): ?>
      <div class="marquee-item"><span class="mdot"></span><?= htmlspecialchars($item) ?></div>
    <?php endforeach; ?>
  </div>
</div>

<!-- ══ CATEGORIES ══ -->
<section class="categories" id="explore">
  <div class="container">
    <div class="cat-grid">
      <div class="cat-chip active" onclick="filterCat(this,'all')">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" width="15" height="15">
          <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
        </svg>All
      </div>
      <div class="cat-chip" onclick="filterCat(this,'saas')">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
          <path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z" />
        </svg>SaaS
      </div>
      <div class="cat-chip" onclick="filterCat(this,'ml')">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
          <rect x="3" y="3" width="18" height="18" rx="3" />
          <path d="M8 12h8M12 8v8" />
        </svg>AI &amp; ML
      </div>
      <div class="cat-chip" onclick="filterCat(this,'mobile')">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
          <rect x="5" y="2" width="14" height="20" rx="2" />
          <line x1="12" y1="18" x2="12.01" y2="18" />
        </svg>Mobile
      </div>
      <div class="cat-chip" onclick="filterCat(this,'ecom')">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
          <rect x="2" y="7" width="20" height="14" rx="2" />
          <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
        </svg>Ecommerce
      </div>
      <div class="cat-chip" onclick="filterCat(this,'edu')">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
          <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
          <path d="M6 12v5c3 3 9 3 12 0v-5" />
        </svg>Education
      </div>
      <div class="cat-chip" onclick="filterCat(this,'desktop')">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
          <rect x="2" y="3" width="20" height="14" rx="2" />
          <path d="M8 21h8M12 17v4" />
        </svg>Desktop
      </div>
      <div class="cat-chip" onclick="filterCat(this,'mgmt')">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
          <line x1="18" y1="20" x2="18" y2="10" />
          <line x1="12" y1="20" x2="12" y2="4" />
          <line x1="6" y1="20" x2="6" y2="14" />
        </svg>Management
      </div>
    </div>
  </div>
</section>

<!-- ══ SERVICES ══ -->
<section class="services-section" id="services">
  <div class="container">
    <div class="services-header reveal">
      <div>
        <div class="section-label">What We Build</div>
        <h2 class="section-title">Services &amp; Solutions</h2>
        <p class="section-sub">Forged for every challenge — from startup MVP to enterprise platform.</p>
      </div>
      <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;">
        <!-- Currency Switcher -->
        <div class="currency-switcher" id="currencySwitcher">
          <button class="currency-btn active" onclick="setCurrency('PHP')" data-currency="PHP">
            <span class="currency-flag">🇵🇭</span> ₱ PHP
          </button>
          <button class="currency-btn" onclick="setCurrency('USD')" data-currency="USD">
            <span class="currency-flag">🇺🇸</span> $ USD
          </button>
          <button class="currency-btn" onclick="setCurrency('EUR')" data-currency="EUR">
            <span class="currency-flag">🇪🇺</span> € EUR
          </button>
        </div>
        <a href="#contact" class="view-all">
          Start a project
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14M12 5l7 7-7 7" />
          </svg>
        </a>
      </div>
    </div>

    <div class="carousel-outer">
      <div class="carousel-track-wrap">
        <div class="carousel-track" id="carouselTrack">

          <div class="service-card" data-cat="saas">
            <div class="card-thumb">
              <div class="card-thumb-inner" style="background:linear-gradient(135deg,#0d1a2a,#1a1040)">
                <svg class="thumb-icon" viewBox="0 0 52 52" fill="none">
                  <rect x="10" y="10" width="32" height="32" rx="8" fill="rgba(255,149,0,.12)" stroke="rgba(255,149,0,.35)" stroke-width="1.5" />
                  <path d="M33 28H19a7 7 0 010-14 7 7 0 0113.6 2.3A5.5 5.5 0 0133 28z" stroke="#FF9500" stroke-width="2" fill="none" />
                  <line x1="23" y1="33" x2="23" y2="38" stroke="#FF9500" stroke-width="2" stroke-linecap="round" />
                  <line x1="29" y1="33" x2="29" y2="38" stroke="#FF9500" stroke-width="2" stroke-linecap="round" />
                  <line x1="19" y1="38" x2="33" y2="38" stroke="#FF9500" stroke-width="2.5" stroke-linecap="round" />
                </svg>
              </div>
              <div class="badge badge-bs">Popular</div>
            </div>
            <div class="card-body">
              <div class="card-cat">SaaS Development</div>
              <div class="card-title">Scalable Cloud Platforms &amp; Subscription Systems</div>
              <div class="card-instructor">
                <div class="inst-av">CL</div>
                <div class="inst-name">Calcifer Labs Team</div>
              </div>
              <div class="card-meta"><span style="color:var(--fire-amber)">&#9733; 5.0</span><span>Multi-tenant</span><span>API-first</span></div>
              <div class="card-footer">
                <div class="card-price currency-price" data-php="Custom" data-usd="Custom" data-eur="Custom">Custom</div>
                <button class="enroll-btn" onclick="document.getElementById('proposalModal').style.display='flex'">Get Quote</button>
              </div>
            </div>
          </div>

          <div class="service-card" data-cat="ml">
            <div class="card-thumb">
              <div class="card-thumb-inner" style="background:linear-gradient(135deg,#1a1040,#0d2a1a)">
                <svg class="thumb-icon" viewBox="0 0 52 52" fill="none">
                  <rect x="10" y="10" width="32" height="32" rx="8" fill="rgba(255,92,26,.1)" stroke="rgba(255,92,26,.3)" stroke-width="1.5" />
                  <circle cx="26" cy="26" r="9" stroke="#FF5C1A" stroke-width="2" fill="none" />
                  <line x1="26" y1="10" x2="26" y2="17" stroke="#FF5C1A" stroke-width="2" stroke-linecap="round" />
                  <line x1="26" y1="35" x2="26" y2="42" stroke="#FF5C1A" stroke-width="2" stroke-linecap="round" />
                  <line x1="10" y1="26" x2="17" y2="26" stroke="#FF5C1A" stroke-width="2" stroke-linecap="round" />
                  <line x1="35" y1="26" x2="42" y2="26" stroke="#FF5C1A" stroke-width="2" stroke-linecap="round" />
                  <circle cx="26" cy="26" r="3" fill="rgba(255,92,26,.6)" />
                </svg>
              </div>
              <div class="badge badge-new">Hot</div>
            </div>
            <div class="card-body">
              <div class="card-cat">Machine Learning &amp; AI</div>
              <div class="card-title">ML Pipelines, Model Integration &amp; Intelligent Automation</div>
              <div class="card-instructor">
                <div class="inst-av">CL</div>
                <div class="inst-name">Calcifer Labs Team</div>
              </div>
              <div class="card-meta"><span style="color:var(--fire-amber)">&#9733; 5.0</span><span>Python &middot; TF</span><span>Production</span></div>
              <div class="card-footer">
                <div class="card-price currency-price" data-php="Custom" data-usd="Custom" data-eur="Custom">Custom</div>
                <button class="enroll-btn" onclick="document.getElementById('proposalModal').style.display='flex'">Get Quote</button>
              </div>
            </div>
          </div>

          <div class="service-card" data-cat="mobile">
            <div class="card-thumb">
              <div class="card-thumb-inner" style="background:linear-gradient(135deg,#0d1a10,#1a0d2a)">
                <svg class="thumb-icon" viewBox="0 0 52 52" fill="none">
                  <rect x="10" y="10" width="32" height="32" rx="8" fill="rgba(34,197,94,.08)" stroke="rgba(34,197,94,.28)" stroke-width="1.5" />
                  <rect x="20" y="14" width="12" height="24" rx="3" stroke="#22C55E" stroke-width="2" fill="none" />
                  <line x1="24" y1="35" x2="28" y2="35" stroke="#22C55E" stroke-width="2" stroke-linecap="round" />
                </svg>
              </div>
              <div class="badge badge-bs">Popular</div>
            </div>
            <div class="card-body">
              <div class="card-cat">Mobile Apps</div>
              <div class="card-title">Android &amp; iOS Apps — Native &amp; Cross-Platform</div>
              <div class="card-instructor">
                <div class="inst-av" style="background:linear-gradient(135deg,#22C55E,#16A34A)">CL</div>
                <div class="inst-name">Calcifer Labs Team</div>
              </div>
              <div class="card-meta"><span style="color:var(--fire-amber)">&#9733; 5.0</span><span>Flutter &middot; Swift</span><span>App Store</span></div>
              <div class="card-footer">
                <div class="card-price currency-price" data-php="Custom" data-usd="Custom" data-eur="Custom">Custom</div>
                <button class="enroll-btn" onclick="document.getElementById('proposalModal').style.display='flex'">Get Quote</button>
              </div>
            </div>
          </div>

          <div class="service-card" data-cat="ecom">
            <div class="card-thumb">
              <div class="card-thumb-inner" style="background:linear-gradient(135deg,#2a1a0d,#0d2a1a)">
                <svg class="thumb-icon" viewBox="0 0 52 52" fill="none">
                  <rect x="10" y="10" width="32" height="32" rx="8" fill="rgba(249,115,22,.08)" stroke="rgba(249,115,22,.28)" stroke-width="1.5" />
                  <path d="M15 18h22l-3 12H18L15 18z" stroke="#F97316" stroke-width="2" fill="none" />
                  <circle cx="20" cy="33" r="2" fill="#F97316" />
                  <circle cx="32" cy="33" r="2" fill="#F97316" />
                  <path d="M13 15h3l2 6" stroke="#F97316" stroke-width="2" stroke-linecap="round" />
                </svg>
              </div>
            </div>
            <div class="card-body">
              <div class="card-cat">Ecommerce</div>
              <div class="card-title">Full Ecommerce Stores with Payments, Inventory &amp; CMS</div>
              <div class="card-instructor">
                <div class="inst-av" style="background:linear-gradient(135deg,#F97316,#EA580C)">CL</div>
                <div class="inst-name">Calcifer Labs Team</div>
              </div>
              <div class="card-meta"><span style="color:var(--fire-amber)">&#9733; 5.0</span><span>Stripe</span><span>Multi-vendor</span></div>
              <div class="card-footer">
                <div class="card-price currency-price" data-php="Custom" data-usd="Custom" data-eur="Custom">Custom</div>
                <button class="enroll-btn" onclick="document.getElementById('proposalModal').style.display='flex'">Get Quote</button>
              </div>
            </div>
          </div>

          <div class="service-card" data-cat="edu">
            <div class="card-thumb">
              <div class="card-thumb-inner" style="background:linear-gradient(135deg,#0d1a2a,#1a102a)">
                <svg class="thumb-icon" viewBox="0 0 52 52" fill="none">
                  <rect x="10" y="10" width="32" height="32" rx="8" fill="rgba(139,92,246,.08)" stroke="rgba(139,92,246,.28)" stroke-width="1.5" />
                  <path d="M26 16L38 22V26C38 33 32 38 26 40C20 38 14 33 14 26V22L26 16Z" stroke="#8B5CF6" stroke-width="2" fill="none" />
                  <polyline points="20,28 23,31 32,22" stroke="#8B5CF6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                </svg>
              </div>
              <div class="badge badge-new">New</div>
            </div>
            <div class="card-body">
              <div class="card-cat">Education Systems</div>
              <div class="card-title">School &amp; Learning Management Systems (SMS / LMS)</div>
              <div class="card-instructor">
                <div class="inst-av" style="background:linear-gradient(135deg,#8B5CF6,#6D28D9)">CL</div>
                <div class="inst-name">Calcifer Labs Team</div>
              </div>
              <div class="card-meta"><span style="color:var(--fire-amber)">&#9733; 5.0</span><span>Grades &amp; LMS</span><span>Multi-campus</span></div>
              <div class="card-footer">
                <div class="card-price currency-price" data-php="Custom" data-usd="Custom" data-eur="Custom">Custom</div>
                <button class="enroll-btn" onclick="document.getElementById('proposalModal').style.display='flex'">Get Quote</button>
              </div>
            </div>
          </div>

          <div class="service-card" data-cat="desktop">
            <div class="card-thumb">
              <div class="card-thumb-inner" style="background:linear-gradient(135deg,#1a1510,#0d1a2a)">
                <svg class="thumb-icon" viewBox="0 0 52 52" fill="none">
                  <rect x="10" y="10" width="32" height="32" rx="8" fill="rgba(59,130,246,.08)" stroke="rgba(59,130,246,.28)" stroke-width="1.5" />
                  <rect x="14" y="17" width="24" height="16" rx="2" stroke="#3B82F6" stroke-width="2" fill="none" />
                  <line x1="26" y1="33" x2="26" y2="38" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" />
                  <line x1="22" y1="38" x2="30" y2="38" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round" />
                </svg>
              </div>
            </div>
            <div class="card-body">
              <div class="card-cat">Standalone Apps</div>
              <div class="card-title">Desktop Applications — Windows, macOS &amp; Linux</div>
              <div class="card-instructor">
                <div class="inst-av" style="background:linear-gradient(135deg,#3B82F6,#1D4ED8)">CL</div>
                <div class="inst-name">Calcifer Labs Team</div>
              </div>
              <div class="card-meta"><span style="color:var(--fire-amber)">&#9733; 5.0</span><span>Offline-capable</span><span>Enterprise</span></div>
              <div class="card-footer">
                <div class="card-price currency-price" data-php="Custom" data-usd="Custom" data-eur="Custom">Custom</div>
                <button class="enroll-btn" onclick="document.getElementById('proposalModal').style.display='flex'">Get Quote</button>
              </div>
            </div>
          </div>

          <div class="service-card" data-cat="mgmt">
            <div class="card-thumb">
              <div class="card-thumb-inner" style="background:linear-gradient(135deg,#0a1a10,#1a0d10)">
                <svg class="thumb-icon" viewBox="0 0 52 52" fill="none">
                  <rect x="10" y="10" width="32" height="32" rx="8" fill="rgba(16,185,129,.08)" stroke="rgba(16,185,129,.28)" stroke-width="1.5" />
                  <line x1="34" y1="38" x2="34" y2="22" stroke="#10B981" stroke-width="5" stroke-linecap="round" />
                  <line x1="26" y1="38" x2="26" y2="14" stroke="#10B981" stroke-width="5" stroke-linecap="round" />
                  <line x1="18" y1="38" x2="18" y2="28" stroke="#10B981" stroke-width="5" stroke-linecap="round" />
                </svg>
              </div>
              <div class="badge badge-bs">Popular</div>
            </div>
            <div class="card-body">
              <div class="card-cat">Management Systems</div>
              <div class="card-title">Custom Business Management &amp; ERP Solutions</div>
              <div class="card-instructor">
                <div class="inst-av" style="background:linear-gradient(135deg,#10B981,#059669)">CL</div>
                <div class="inst-name">Calcifer Labs Team</div>
              </div>
              <div class="card-meta"><span style="color:var(--fire-amber)">&#9733; 5.0</span><span>Dashboard</span><span>Role-based</span></div>
              <div class="card-footer">
                <div class="card-price currency-price" data-php="Custom" data-usd="Custom" data-eur="Custom">Custom</div>
                <button class="enroll-btn" onclick="document.getElementById('proposalModal').style.display='flex'">Get Quote</button>
              </div>
            </div>
          </div>

          <div class="service-card" data-cat="saas ml mobile ecom edu desktop mgmt">
            <div class="card-thumb">
              <div class="card-thumb-inner" style="background:linear-gradient(135deg,#1a0808,#2a1500)">
                <svg class="thumb-icon" viewBox="0 0 52 52" fill="none">
                  <rect x="10" y="10" width="32" height="32" rx="8" fill="rgba(255,92,26,.12)" stroke="rgba(255,92,26,.4)" stroke-width="1.5" />
                  <path d="M26 14C26 14 20 20 20 25C20 28 22.7 30 26 30C29.3 30 32 28 32 25C32 23 30.3 21 30.3 21C30.3 21 29.8 23.5 28 23.5C28 23.5 29 21 26 14Z" fill="rgba(255,92,26,.7)" stroke="#FF5C1A" stroke-width="1" />
                  <ellipse cx="26" cy="27" rx="3" ry="2.5" fill="rgba(255,214,10,.6)" />
                </svg>
              </div>
              <div class="badge badge-challenge">Challenge</div>
            </div>
            <div class="card-body">
              <div class="card-cat" style="color:var(--fire-yellow)">Open Challenge</div>
              <div class="card-title">Throw Us Your Hardest Problem — We'll Build It</div>
              <div class="card-instructor">
                <div class="inst-av" style="display:flex;align-items:center;justify-content:center;">
                  <svg viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="12" height="12">
                    <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
                  </svg>
                </div>
                <div class="inst-name">Calcifer Labs — Fueling the Fire</div>
              </div>
              <div class="card-meta"><span style="color:var(--fire-amber)">&#9733; Always</span><span>100% accepted</span></div>
              <div class="card-footer">
                <div class="card-price" style="background:var(--gradient-fire);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">Let's Go</div>
                <button class="enroll-btn" style="background:rgba(255,92,26,.18);border-color:rgba(255,92,26,.5)" onclick="document.getElementById('proposalModal').style.display='flex'">Start Now</button>
              </div>
            </div>
          </div>

        </div><!-- /carousel-track -->
      </div><!-- /carousel-track-wrap -->
      <div class="carousel-controls">
        <button class="carousel-btn" id="carouselPrev" onclick="carouselMove(-1)" aria-label="Previous">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="18" height="18">
            <path d="M15 18l-6-6 6-6" />
          </svg>
        </button>
        <div class="carousel-dots" id="carouselDots"></div>
        <button class="carousel-btn" id="carouselNext" onclick="carouselMove(1)" aria-label="Next">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="18" height="18">
            <path d="M9 18l6-6-6-6" />
          </svg>
        </button>
      </div>
    </div><!-- /carousel-outer -->
  </div>
</section>

<!-- ══ FIRE MORPH DIVIDER ══ -->
<div class="fire-morph-divider" aria-hidden="true">
  <svg viewBox="0 0 1440 120" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <defs>
      <linearGradient id="flame-grad" x1="0%" y1="0%" x2="100%" y2="0%">
        <stop offset="0%" stop-color="rgba(255,92,26,0.0)" />
        <stop offset="25%" stop-color="rgba(255,120,10,0.18)" />
        <stop offset="50%" stop-color="rgba(255,149,0,0.28)" />
        <stop offset="75%" stop-color="rgba(255,120,10,0.18)" />
        <stop offset="100%" stop-color="rgba(255,92,26,0.0)" />
      </linearGradient>
    </defs>
    <path d="M0 120 Q 120 20 240 80 Q 360 10 480 70 Q 600 5 720 60 Q 840 0 960 65 Q 1080 8 1200 72 Q 1320 18 1440 80 L1440 120 Z" fill="url(#flame-grad)" opacity="0.7">
      <animate attributeName="d" dur="4s" repeatCount="indefinite"
        values="
          M0 120 Q 120 20 240 80 Q 360 10 480 70 Q 600 5 720 60 Q 840 0 960 65 Q 1080 8 1200 72 Q 1320 18 1440 80 L1440 120 Z;
          M0 120 Q 120 40 240 60 Q 360 0 480 55 Q 600 20 720 75 Q 840 15 960 50 Q 1080 0 1200 60 Q 1320 30 1440 65 L1440 120 Z;
          M0 120 Q 120 20 240 80 Q 360 10 480 70 Q 600 5 720 60 Q 840 0 960 65 Q 1080 8 1200 72 Q 1320 18 1440 80 L1440 120 Z
        " />
    </path>
    <path d="M0 120 Q 180 35 360 90 Q 540 15 720 75 Q 900 10 1080 82 Q 1260 25 1440 85 L1440 120 Z" fill="rgba(255,92,26,0.1)" opacity="0.5">
      <animate attributeName="d" dur="5.5s" repeatCount="indefinite"
        values="
          M0 120 Q 180 35 360 90 Q 540 15 720 75 Q 900 10 1080 82 Q 1260 25 1440 85 L1440 120 Z;
          M0 120 Q 180 55 360 70 Q 540 5 720 55 Q 900 30 1080 65 Q 1260 5 1440 70 L1440 120 Z;
          M0 120 Q 180 35 360 90 Q 540 15 720 75 Q 900 10 1080 82 Q 1260 25 1440 85 L1440 120 Z
        " />
    </path>
    <circle cx="360" cy="60" r="2" fill="rgba(255,200,50,0.5)">
      <animate attributeName="cy" dur="3s" repeatCount="indefinite" values="60;10;60" />
      <animate attributeName="opacity" dur="3s" repeatCount="indefinite" values="0.5;0;0.5" />
    </circle>
    <circle cx="720" cy="40" r="1.5" fill="rgba(255,180,30,0.6)">
      <animate attributeName="cy" dur="2.5s" repeatCount="indefinite" values="40;5;40" />
      <animate attributeName="opacity" dur="2.5s" repeatCount="indefinite" values="0.6;0;0.6" />
    </circle>
    <circle cx="1080" cy="55" r="2" fill="rgba(255,200,50,0.45)">
      <animate attributeName="cy" dur="3.8s" repeatCount="indefinite" values="55;8;55" />
      <animate attributeName="opacity" dur="3.8s" repeatCount="indefinite" values="0.45;0;0.45" />
    </circle>
  </svg>
</div>

<!-- ══ FEATURES ══ -->
<section class="features-section">
  <div class="container">
    <div class="section-label reveal" style="color:#ff9040;">Why Calcifer Labs</div>
    <h2 class="section-title reveal" style="color:#f0ece4;">Everything you need to ship</h2>
    <div class="features-grid">
      <div class="feature-card reveal">
        <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="var(--fire-orange)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="22" height="22">
            <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
            <path d="M6 12v5c3 3 9 3 12 0v-5" />
          </svg></div>
        <div class="feature-title">Full-Stack Expertise</div>
        <div class="feature-desc">From database schema to pixel-perfect UI — we own the entire stack end-to-end.</div>
      </div>
      <div class="feature-card reveal">
        <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="var(--fire-orange)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="22" height="22">
            <circle cx="12" cy="8" r="6" />
            <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
          </svg></div>
        <div class="feature-title">Production-Grade Output</div>
        <div class="feature-desc">No prototypes left in drawers. Every deliverable is deployable, documented, and scalable.</div>
      </div>
      <div class="feature-card reveal">
        <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="var(--fire-orange)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="22" height="22">
            <circle cx="12" cy="12" r="10" />
            <polyline points="12 6 12 12 16 14" />
          </svg></div>
        <div class="feature-title">Fast Turnaround</div>
        <div class="feature-desc">Agile sprints, constant comms, and rapid delivery — we move at startup speed.</div>
      </div>
      <div class="feature-card reveal">
        <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="var(--fire-orange)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="22" height="22">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
          </svg></div>
        <div class="feature-title">Security First</div>
        <div class="feature-desc">OWASP compliance, encrypted pipelines, and security reviews on every build.</div>
      </div>
      <div class="feature-card reveal">
        <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="var(--fire-orange)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="22" height="22">
            <rect x="5" y="2" width="14" height="20" rx="2" />
            <line x1="12" y1="18" x2="12.01" y2="18" />
          </svg></div>
        <div class="feature-title">Cross-Platform</div>
        <div class="feature-desc">Web, iOS, Android, desktop — consistent quality across every surface and device.</div>
      </div>
      <div class="feature-card reveal">
        <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="var(--fire-orange)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="22" height="22">
            <polyline points="16 18 22 12 16 6" />
            <polyline points="8 6 2 12 8 18" />
          </svg></div>
        <div class="feature-title">Open to Anything</div>
        <div class="feature-desc">Solo projects, big builds, or things nobody else will touch — all sizes accepted, all fires fueled.</div>
      </div>
    </div>
  </div>
</section>

<!-- ══ TESTIMONIALS ══ -->
<section class="testimonials">
  <div class="container">
    <div class="section-label reveal" style="color:#ff9040;">Client Stories</div>
    <h2 class="section-title reveal" style="color:#f0ece4;">Results that speak for themselves</h2>
    <div class="testimonials-grid">
      <div class="t-card reveal">
        <div class="t-text">Calcifer Labs delivered our ML recommendation engine in 6 weeks. The pipeline is still running flawlessly in production — 2 years later.</div>
        <div class="t-author">
          <div class="t-av">KJ</div>
          <div>
            <div class="t-name">Kira Johnson</div>
            <div class="t-role">CTO @ NovaTech AI</div>
          </div>
        </div>
      </div>
      <div class="t-card reveal">
        <div class="t-text">We had a wild idea for a multi-vendor ecommerce platform with real-time inventory sync. They didn't flinch — shipped it in 10 weeks, perfectly.</div>
        <div class="t-author">
          <div class="t-av" style="background:linear-gradient(135deg,#22C55E,#16A34A)">MP</div>
          <div>
            <div class="t-name">Marcus Patel</div>
            <div class="t-role">Founder @ ShopForge</div>
          </div>
        </div>
      </div>
      <div class="t-card reveal">
        <div class="t-text">Our school management system now handles 8 campuses and 12,000 students. Built from scratch — and it's actually beautiful to use.</div>
        <div class="t-author">
          <div class="t-av" style="background:linear-gradient(135deg,#8B5CF6,#6D28D9)">AO</div>
          <div>
            <div class="t-name">Amara Osei</div>
            <div class="t-role">Principal @ Horizon Academy</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══ ABOUT / CHALLENGE ══ -->
<section class="challenge-section" id="about">
  <div class="container">
    <div class="challenge-inner">
      <div class="reveal">
        <div class="section-label" style="color:#ff9040;">Open for Challenges</div>
        <h2 class="section-title" style="color:#f0ece4;">Share your vision.<br><span class="fire-text">Fuel the next build.</span></h2>
        <p class="section-sub" style="margin-bottom:32px;color:#8a7060;">Calcifer Labs doesn't back down from complex, unusual, or ambitious builds. Small solo project or massive enterprise system — every challenge is welcome. If someone told you it can't be done, you haven't talked to us yet.</p>
        <div style="display:flex;gap:12px;flex-wrap:wrap">
          <button class="btn-fire-lg" onclick="document.getElementById('proposalModal').style.display='flex'">
            Throw Us a Challenge
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14M12 5l7 7-7 7" />
            </svg>
          </button>
          <button class="btn-outline-lg">See Our Work</button>
        </div>
        <div class="challenge-metrics">
          <div class="c-metric">
            <div class="m-num">50+</div>
            <div class="m-label">Projects shipped</div>
          </div>
          <div class="c-metric">
            <div class="m-num">100%</div>
            <div class="m-label">Challenges accepted</div>
          </div>
          <div class="c-metric">
            <div class="m-num">&#8734;</div>
            <div class="m-label">Fire remaining</div>
          </div>
        </div>
      </div>
      <div class="challenge-visual reveal">
        <svg width="110" height="110" viewBox="0 0 80 80" fill="none">
          <rect x="8" y="14" width="64" height="44" rx="4" stroke="rgba(255,149,0,.45)" stroke-width="2" />
          <rect x="14" y="20" width="52" height="32" rx="2" fill="rgba(255,92,26,.07)" stroke="rgba(255,92,26,.2)" stroke-width="1" />
          <line x1="8" y1="58" x2="30" y2="66" stroke="rgba(255,149,0,.35)" stroke-width="2" />
          <line x1="72" y1="58" x2="50" y2="66" stroke="rgba(255,149,0,.35)" stroke-width="2" />
          <line x1="26" y1="66" x2="54" y2="66" stroke="rgba(255,149,0,.45)" stroke-width="2.5" stroke-linecap="round" />
          <circle cx="40" cy="36" r="10" stroke="rgba(255,92,26,.55)" stroke-width="2" fill="none" />
          <polygon points="37,31 37,41 47,36" fill="rgba(255,92,26,.55)" />
        </svg>
      </div>
    </div>
  </div>
</section>

<!-- ══ SIGN UP CTA ══ -->
<section class="signup-cta-section" id="signup">
  <div class="container">
    <div class="signup-cta-inner">
      <div class="signup-cta-left reveal">
        <div class="section-label" style="color:#ff9040;">Your Account, Your Edge</div>
        <h2>Build faster.<br>Negotiate smarter.<br><span class="fire-text">Get more done.</span></h2>
        <p>Create a free account and get direct access to our team — skip the back-and-forth, track your project, negotiate pricing, and raise issues the moment they arise. Small projects, solo builds, enterprise contracts — all welcome.</p>
        <div class="signup-perks">
          <div class="signup-perk">
            <div class="signup-perk-icon"><svg viewBox="0 0 24 24" fill="none" stroke="var(--fire-orange)" stroke-width="2.5" stroke-linecap="round" width="13" height="13">
                <polyline points="20 6 9 17 4 12" />
              </svg></div>
            Direct inquiry channel — no queues, straight to our team
          </div>
          <div class="signup-perk">
            <div class="signup-perk-icon"><svg viewBox="0 0 24 24" fill="none" stroke="var(--fire-orange)" stroke-width="2.5" stroke-linecap="round" width="13" height="13">
                <polyline points="20 6 9 17 4 12" />
              </svg></div>
            Price negotiation for any scale — solo to enterprise
          </div>
          <div class="signup-perk">
            <div class="signup-perk-icon"><svg viewBox="0 0 24 24" fill="none" stroke="var(--fire-orange)" stroke-width="2.5" stroke-linecap="round" width="13" height="13">
                <polyline points="20 6 9 17 4 12" />
              </svg></div>
            Real-time project updates and milestone tracking
          </div>
          <div class="signup-perk">
            <div class="signup-perk-icon"><svg viewBox="0 0 24 24" fill="none" stroke="var(--fire-orange)" stroke-width="2.5" stroke-linecap="round" width="13" height="13">
                <polyline points="20 6 9 17 4 12" />
              </svg></div>
            Raise issues instantly — we respond fast, always
          </div>
        </div>
      </div>

      <!-- Right: clean CTA card — no form, just a button to signup.php -->
      <div class="signup-cta-right reveal">
        <div class="cta-card-badge">
          <svg viewBox="0 0 24 24" fill="none" stroke="var(--fire-amber)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="13" height="13">
            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
          </svg>
          Free — No credit card needed
        </div>
        <h3>Ready to ignite your project?</h3>
        <p>Join clients who've built SaaS platforms, AI systems, mobile apps, and more with Calcifer Labs. Your account gives you a direct line to our team from day one.</p>

        <div class="cta-mini-stats">
          <div class="cta-mini-stat">
            <span class="cta-stat-num">50+</span>
            <span class="cta-stat-lbl">Projects</span>
          </div>
          <div class="cta-mini-divider"></div>
          <div class="cta-mini-stat">
            <span class="cta-stat-num">24h</span>
            <span class="cta-stat-lbl">Response</span>
          </div>
          <div class="cta-mini-divider"></div>
          <div class="cta-mini-stat">
            <span class="cta-stat-num">100%</span>
            <span class="cta-stat-lbl">Accepted</span>
          </div>
        </div>

        <a href="register.php" class="btn-cta-main">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
            <circle cx="9" cy="7" r="4" />
            <line x1="19" y1="8" x2="19" y2="14" />
            <line x1="22" y1="11" x2="16" y2="11" />
          </svg>
          Create Free Account
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="14" height="14">
            <path d="M5 12h14M12 5l7 7-7 7" />
          </svg>
        </a>

        <div class="cta-alt-actions">
          <button class="btn-cta-ghost" onclick="document.getElementById('proposalModal').style.display='flex'">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="14" height="14">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
              <polyline points="22,6 12,13 2,6" />
            </svg>
            Send a Proposal Instead
          </button>
          <p class="cta-login-note">Already have an account? <a href="login.php">Log in</a></p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ NEWSLETTER ══ -->
<section class="newsletter" id="contact">
  <div class="container">
    <div class="nl-inner reveal">
      <div>
        <h3 style="font-family:'Syne',sans-serif;font-size:22px;font-weight:800;margin-bottom:6px;display:flex;align-items:center;gap:10px;color:#f0ece4;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--fire-orange)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
            <polyline points="22,6 12,13 2,6" />
          </svg>
          Let's ignite something great
        </h3>
        <p style="font-size:14px;color:#6e5c48;">Drop your email — we'll reach out within 24 hours.</p>
      </div>
      <div class="nl-form">
        <input type="email" placeholder="Enter your email address" id="nlEmail">
        <button class="btn-fire" onclick="subscribeNL()">Send</button>
      </div>
    </div>
  </div>
</section>

<!-- ══ FOOTER ══ -->
<footer>
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="index.php" class="footer-logo-link">
          <img src="storage/Calcifer Labs flame .png" onerror="this.src='storage/Calcifer Labs flame.png'" alt="Calcifer Labs" class="footer-flame-img">
          <div class="nav-brand-text">
            <span class="nav-brand-main" style="font-size:22px">Calcifer</span>
            <span class="nav-brand-sub" style="font-size:11px;letter-spacing:.28em">Labs</span>
          </div>
        </a>
        <p>We build software that solves real problems. SaaS, AI, mobile, ecommerce, education — every challenge accepted, every fire fueled.</p>
        <div class="social-links">
          <a href="https://www.linkedin.com/company/calciferlabs" target="_blank" rel="noopener" class="soc-btn" title="LinkedIn">
            <svg viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
              <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
              <rect x="2" y="9" width="4" height="12" />
              <circle cx="4" cy="4" r="2" />
            </svg>
          </a>
          <div class="soc-btn" title="Facebook">
            <svg viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
              <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
            </svg>
          </div>
          <div class="soc-btn" title="Instagram">
            <svg viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
              <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
              <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
            </svg>
          </div>
          <div class="soc-btn" title="GitHub">
            <svg viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
              <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22" />
            </svg>
          </div>
        </div>
      </div>
      <div class="footer-col">
        <h4>Services</h4>
        <a href="#services">SaaS Development</a>
        <a href="#services">Machine Learning</a>
        <a href="#services">Mobile Apps</a>
        <a href="#services">Ecommerce</a>
        <a href="#services">Management Systems</a>
      </div>
      <div class="footer-col">
        <h4>Company</h4>
        <a href="#about">About Us</a>
        <a href="#about">Our Work</a>
        <a href="#contact">Careers</a>
        <a href="#contact">Blog</a>
        <a href="register.php">Create Account</a>
      </div>
      <div class="footer-col">
        <h4>Contact</h4>
        <a href="mailto:calciferlabs2026@calciferlabs.space">Work Inquiries</a>
        <a href="mailto:calciferlabs@gmail.com">Personal</a>
        <a href="https://www.linkedin.com/company/calciferlabs" target="_blank" rel="noopener">LinkedIn</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; <?= date('Y') ?> Calcifer Labs, Inc. All rights reserved.</p>
      <p>Fueling Dreams — Philippines</p>
    </div>
  </div>
</footer>

<!-- ══ CHATBOT ══ -->
<button class="chat-toggle" onclick="toggleChat()" id="chatToggle" title="Chat with Spark">
  <svg id="ico-open" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="22" height="22">
    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
  </svg>
  <svg id="ico-close" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2.5" stroke-linecap="round" width="22" height="22" style="display:none">
    <line x1="18" y1="6" x2="6" y2="18" />
    <line x1="6" y1="6" x2="18" y2="18" />
  </svg>
</button>

<div class="chat-win" id="chatWin">
  <div class="chat-head">
    <div class="chat-av">
      <svg viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="18" height="18">
        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
      </svg>
    </div>
    <div>
      <div class="chat-name">Spark — AI Assistant</div>
      <div class="chat-status">Online now</div>
    </div>
    <button class="chat-close" onclick="toggleChat()">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" width="16" height="16">
        <line x1="18" y1="6" x2="6" y2="18" />
        <line x1="6" y1="6" x2="18" y2="18" />
      </svg>
    </button>
  </div>
  <div class="chat-msgs" id="chatMsgs">
    <div class="chat-msg bot">Hey! I'm <strong>Spark</strong>, your Calcifer Labs guide. What are you looking to build?</div>
    <div class="chat-msg bot">I can help you explore services, get a quote, or answer any questions.</div>
  </div>
  <div class="chat-sugg" id="chatSugg">
    <div class="sugg-chip" onclick="sendSugg(this)">I have a challenge</div>
    <div class="sugg-chip" onclick="sendSugg(this)">Build a mobile app</div>
    <div class="sugg-chip" onclick="sendSugg(this)">ML / AI project</div>
  </div>
  <div class="chat-input-row">
    <input class="chat-input" type="text" placeholder="Ask Spark anything…" id="chatInput" onkeydown="if(event.key==='Enter')sendChat()">
    <button class="chat-send" onclick="sendChat()">
      <svg viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
        <line x1="22" y1="2" x2="11" y2="13" />
        <polygon points="22 2 15 22 11 13 2 9 22 2" />
      </svg>
    </button>
  </div>
</div>

<!-- ══ SCROLL TOP ══ -->
<button class="scroll-top" id="scrollTop" onclick="window.scrollTo({top:0,behavior:'smooth'})">
  <svg viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
    <line x1="12" y1="19" x2="12" y2="5" />
    <polyline points="5 12 12 5 19 12" />
  </svg>
</button>

<!-- ══ PROPOSAL MODAL ══ -->
<div id="proposalModal" style="display:none;position:fixed;inset:0;z-index:300;background:rgba(0,0,0,.85);backdrop-filter:blur(12px);align-items:center;justify-content:center;padding:16px">
  <div class="proposal-box">
    <button class="proposal-close" onclick="document.getElementById('proposalModal').style.display='none'">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" width="18" height="18">
        <line x1="18" y1="6" x2="6" y2="18" />
        <line x1="6" y1="6" x2="18" y2="18" />
      </svg>
    </button>
    <div style="text-align:center;margin-bottom:32px">
      <img src="storage/Calcifer Labs flame .png" onerror="this.src='storage/Calcifer Labs flame.png'" alt="Calcifer" style="width:56px;height:56px;object-fit:contain;margin:0 auto 16px;display:block;filter:drop-shadow(0 0 16px rgba(255,130,10,.6))">
      <h2 style="font-family:'Syne',sans-serif;font-size:26px;font-weight:800;margin-bottom:8px">Let's build something great</h2>
      <p style="font-size:14px;color:var(--text-muted)">Tell us about your project — we'll get back within 24 hours.</p>
    </div>
    <div class="proposal-grid">
      <input type="text" class="proposal-input" placeholder="Your name">
      <input type="email" class="proposal-input" placeholder="Email address">
      <select class="proposal-select proposal-span2">
        <option value="" disabled selected>Service type</option>
        <option>SaaS Development</option>
        <option>Machine Learning / AI</option>
        <option>Mobile App (Android / iOS)</option>
        <option>Ecommerce</option>
        <option>School / LMS System</option>
        <option>Desktop Application</option>
        <option>Business Management / ERP</option>
        <option>Open Challenge — Something else</option>
      </select>
      <textarea class="proposal-textarea proposal-span2" placeholder="Describe your project — the harder, the better. We don't back down."></textarea>
    </div>
    <button class="btn-fire-lg" style="width:100%;justify-content:center;margin-top:8px" onclick="submitProposal()">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" style="margin-right:6px">
        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
      </svg>
      Ignite the Project
    </button>
    <p style="text-align:center;font-size:12px;color:var(--text-dim);margin-top:12px">
      Work: <a href="mailto:calciferlabs2026@calciferlabs.space" style="color:var(--fire-orange)">calciferlabs2026@calciferlabs.space</a>
      &nbsp;&middot;&nbsp;
      Personal: <a href="mailto:calciferlabs@gmail.com" style="color:var(--fire-orange)">calciferlabs@gmail.com</a>
    </p>
  </div>
</div>

<script>
  /* ══════════════════════════════════════
     GHIBLI WORLD — Howl's Sky Background
  ══════════════════════════════════════ */
  (function() {
    const canvas = document.getElementById('fire-bg-canvas');
    const ctx = canvas.getContext('2d');
    let W, H, t = 0;

    function resize() {
      W = canvas.width = window.innerWidth;
      H = canvas.height = window.innerHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    const STAR_COUNT = 180;
    const stars = Array.from({
      length: STAR_COUNT
    }, () => ({
      x: Math.random(),
      y: Math.random() * 0.65,
      r: Math.random() * 1.4 + 0.3,
      twinkle: Math.random() * Math.PI * 2,
      speed: 0.006 + Math.random() * 0.01,
    }));

    const shoots = [];

    function spawnShoot() {
      shoots.push({
        x: 0.1 + Math.random() * 0.8,
        y: Math.random() * 0.4,
        len: 0.06 + Math.random() * 0.08,
        vx: 0.0018 + Math.random() * 0.001,
        vy: 0.0006 + Math.random() * 0.0004,
        life: 0,
        maxLife: 60 + Math.random() * 40,
        alpha: 0,
      });
    }
    spawnShoot();

    class Cloud {
      constructor(initial) {
        this.reset(initial);
      }
      reset(initial) {
        this.x = initial ? Math.random() * 1.3 - 0.15 : 1.15;
        this.y = 0.3 + Math.random() * 0.38;
        this.scale = 0.55 + Math.random() * 0.65;
        this.speed = (0.00012 + Math.random() * 0.00008) * (Math.random() < 0.3 ? -1 : 1);
        if (this.speed < 0) this.x = -0.15;
        this.alpha = 0.04 + Math.random() * 0.07;
        this.yWobble = Math.random() * Math.PI * 2;
        this.yWobbleS = 0.0003 + Math.random() * 0.0002;
        this.puffs = Array.from({
          length: 4 + Math.floor(Math.random() * 4)
        }, (_, i) => ({
          ox: (i - 2) * (28 + Math.random() * 18) * this.scale,
          oy: (Math.random() - 0.5) * 22 * this.scale,
          r: (22 + Math.random() * 22) * this.scale,
        }));
      }
      update() {
        this.yWobble += this.yWobbleS;
        this.x += this.speed;
        if (this.speed > 0 && this.x > 1.2) this.reset(false);
        if (this.speed < 0 && this.x < -0.2) {
          this.speed *= -1;
          this.x = 1.15;
        }
      }
      draw() {
        const cx = this.x * W,
          cy = (this.y + Math.sin(this.yWobble) * 0.012) * H;
        ctx.save();
        this.puffs.forEach(p => {
          const g = ctx.createRadialGradient(cx + p.ox, cy + p.oy - p.r * 0.2, 0, cx + p.ox, cy + p.oy, p.r);
          g.addColorStop(0, `rgba(255,245,230,${this.alpha * 1.4})`);
          g.addColorStop(0.5, `rgba(240,220,180,${this.alpha})`);
          g.addColorStop(1, `rgba(200,170,120,0)`);
          ctx.beginPath();
          ctx.arc(cx + p.ox, cy + p.oy, p.r, 0, Math.PI * 2);
          ctx.fillStyle = g;
          ctx.fill();
        });
        ctx.restore();
      }
    }
    const clouds = Array.from({
      length: 14
    }, (_, i) => new Cloud(true));

    const castle = {
      x: 0.72,
      y: 0.52,
      scale: 1,
      drift: 0,
      driftS: 0.00025
    };

    function drawCastle() {
      castle.drift += castle.driftS;
      const cx = castle.x * W,
        cy = (castle.y + Math.sin(castle.drift) * 0.018) * H;
      const s = Math.min(W, H) * 0.0042 * castle.scale,
        alpha = 0.22;
      ctx.save();
      ctx.fillStyle = `rgba(14,10,6,${alpha})`;
      ctx.strokeStyle = `rgba(255,200,80,${alpha * 0.4})`;
      ctx.lineWidth = 0.5;
      const rect = (x, y, w, h) => ctx.fillRect(cx + x * s, cy + y * s, w * s, h * s);
      const outline = (x, y, w, h) => ctx.strokeRect(cx + x * s - 0.5, cy + y * s - 0.5, w * s + 1, h * s + 1);
      rect(-60, 0, 120, 40);
      outline(-60, 0, 120, 40);
      rect(-12, -60, 24, 60);
      outline(-12, -60, 24, 60);
      ctx.beginPath();
      ctx.moveTo(cx - 12 * s, cy - 60 * s);
      ctx.lineTo(cx, cy - 85 * s);
      ctx.lineTo(cx + 12 * s, cy - 60 * s);
      ctx.closePath();
      ctx.fill();
      ctx.stroke();
      rect(-50, -40, 16, 40);
      outline(-50, -40, 16, 40);
      ctx.beginPath();
      ctx.moveTo(cx - 50 * s, cy - 40 * s);
      ctx.lineTo(cx - 42 * s, cy - 60 * s);
      ctx.lineTo(cx - 34 * s, cy - 40 * s);
      ctx.closePath();
      ctx.fill();
      ctx.stroke();
      rect(34, -45, 16, 45);
      outline(34, -45, 16, 45);
      ctx.beginPath();
      ctx.moveTo(cx + 34 * s, cy - 45 * s);
      ctx.lineTo(cx + 42 * s, cy - 68 * s);
      ctx.lineTo(cx + 50 * s, cy - 45 * s);
      ctx.closePath();
      ctx.fill();
      ctx.stroke();
      rect(-72, -20, 12, 20);
      ctx.beginPath();
      ctx.moveTo(cx - 72 * s, cy - 20 * s);
      ctx.lineTo(cx - 66 * s, cy - 32 * s);
      ctx.lineTo(cx - 60 * s, cy - 20 * s);
      ctx.closePath();
      ctx.fill();
      rect(60, -18, 12, 18);
      ctx.beginPath();
      ctx.moveTo(cx + 60 * s, cy - 18 * s);
      ctx.lineTo(cx + 66 * s, cy - 28 * s);
      ctx.lineTo(cx + 72 * s, cy - 18 * s);
      ctx.closePath();
      ctx.fill();
      ctx.fillStyle = `rgba(255,200,60,${alpha * 2.5})`;
      [
        [-6, -45],
        [2, -45],
        [-6, -30],
        [2, -30],
        [-44, -28],
        [-38, -28],
        [38, -32],
        [44, -32],
        [-28, 10],
        [-18, 10],
        [-8, 10],
        [4, 10],
        [14, 10],
        [24, 10]
      ].forEach(([wx, wy]) => {
        ctx.beginPath();
        ctx.arc(cx + wx * s, cy + wy * s, 2.2 * s, 0, Math.PI * 2);
        ctx.fill();
      });
      const hg = ctx.createRadialGradient(cx, cy + 20 * s, 0, cx, cy + 20 * s, 18 * s);
      hg.addColorStop(0, `rgba(255,160,20,${alpha * 1.8})`);
      hg.addColorStop(0.5, `rgba(255,80,0,${alpha * 0.6})`);
      hg.addColorStop(1, `rgba(255,40,0,0)`);
      ctx.fillStyle = hg;
      ctx.beginPath();
      ctx.arc(cx, cy + 20 * s, 18 * s, 0, Math.PI * 2);
      ctx.fill();
      ctx.strokeStyle = `rgba(14,10,6,${alpha * 1.2})`;
      ctx.lineWidth = 2.5 * s;
      [
        [-45, 40, -50, 65],
        [-20, 40, -22, 68],
        [8, 40, 6, 70],
        [30, 40, 35, 65],
        [52, 40, 55, 62]
      ].forEach(([x1, y1, x2, y2]) => {
        ctx.beginPath();
        ctx.moveTo(cx + x1 * s, cy + y1 * s);
        ctx.lineTo(cx + x2 * s, cy + y2 * s);
        ctx.stroke();
      });
      ctx.strokeStyle = `rgba(14,10,6,${alpha})`;
      ctx.lineWidth = 1.5 * s;
      [
        [-30, 0, -28, -18],
        [20, 0, 22, -14]
      ].forEach(([x1, y1, x2, y2]) => {
        ctx.beginPath();
        ctx.moveTo(cx + x1 * s, cy + y1 * s);
        ctx.lineTo(cx + x2 * s, cy + y2 * s);
        ctx.stroke();
      });
      ctx.restore();
    }

    const smokes = [];

    function spawnSmoke() {
      const cx = castle.x * W,
        cy = castle.y * H,
        s = Math.min(W, H) * 0.0042;
      [
        [-30, -18],
        [22, -14]
      ].forEach(([ox, oy]) => {
        smokes.push({
          x: cx + ox * s,
          y: cy + oy * s,
          r: 3 + Math.random() * 3,
          vx: (Math.random() - 0.6) * 0.4,
          vy: -(0.3 + Math.random() * 0.4),
          life: 0,
          maxLife: 90 + Math.random() * 50,
          alpha: 0.06 + Math.random() * 0.04
        });
      });
    }

    class Moth {
      constructor() {
        this.reset(true);
      }
      reset(initial) {
        this.x = Math.random() * W;
        this.y = initial ? Math.random() * H : H + 10;
        this.phase = Math.random() * Math.PI * 2;
        this.phaseS = 0.04 + Math.random() * 0.06;
        this.wingSpan = 4 + Math.random() * 6;
        this.vy = -(0.25 + Math.random() * 0.5);
        this.vx = (Math.random() - 0.5) * 0.4;
        this.life = initial ? Math.random() : 0;
        this.maxLife = 0.4 + Math.random() * 0.5;
        this.hue = Math.random() < 0.6 ? 28 : (Math.random() < 0.5 ? 45 : 200);
        this.sat = this.hue === 200 ? 60 : 85;
      }
      update() {
        this.phase += this.phaseS;
        this.x += this.vx + Math.sin(this.phase * 0.4) * 0.5;
        this.y += this.vy;
        this.life += 0.004;
        if (this.life > this.maxLife || this.y < -20) this.reset(false);
      }
      draw() {
        const a = Math.sin((this.life / this.maxLife) * Math.PI) * 0.55;
        const flap = Math.abs(Math.sin(this.phase)) * this.wingSpan;
        ctx.save();
        ctx.globalAlpha = a;
        ctx.translate(this.x, this.y);
        ctx.fillStyle = `hsla(${this.hue},${this.sat}%,72%,0.9)`;
        ctx.beginPath();
        ctx.ellipse(-flap * 0.8, 0, flap, flap * 0.45, -0.3, 0, Math.PI * 2);
        ctx.fill();
        ctx.beginPath();
        ctx.ellipse(flap * 0.8, 0, flap, flap * 0.45, 0.3, 0, Math.PI * 2);
        ctx.fill();
        ctx.fillStyle = `hsla(${this.hue + 10},${this.sat}%,40%,0.9)`;
        ctx.beginPath();
        ctx.ellipse(0, 0, 1.5, 4, 0, 0, Math.PI * 2);
        ctx.fill();
        ctx.restore();
      }
    }
    const moths = Array.from({
      length: 45
    }, () => new Moth());

    const calciferX = 0.5,
      calciferY = 1.04;

    function drawCalcifer(t) {
      const cx = calciferX * W,
        cy = calciferY * H,
        pulse = 1 + 0.06 * Math.sin(t * 0.04);
      const baseR = Math.min(W, H) * 0.55 * pulse;
      const bg = ctx.createRadialGradient(cx, cy, 0, cx, cy, baseR);
      bg.addColorStop(0, 'rgba(255,120,20,0.10)');
      bg.addColorStop(0.15, 'rgba(255,80,10,0.07)');
      bg.addColorStop(0.40, 'rgba(200,50,5,0.035)');
      bg.addColorStop(0.70, 'rgba(140,30,0,0.012)');
      bg.addColorStop(1, 'rgba(0,0,0,0)');
      ctx.beginPath();
      ctx.arc(cx, cy, baseR, 0, Math.PI * 2);
      ctx.fillStyle = bg;
      ctx.fill();
      const midR = Math.min(W, H) * 0.28 * pulse;
      const mg = ctx.createRadialGradient(cx, cy, 0, cx, cy, midR);
      mg.addColorStop(0, 'rgba(255,160,40,0.14)');
      mg.addColorStop(0.3, 'rgba(255,100,10,0.08)');
      mg.addColorStop(0.7, 'rgba(200,60,0,0.03)');
      mg.addColorStop(1, 'rgba(0,0,0,0)');
      ctx.beginPath();
      ctx.arc(cx, cy, midR, 0, Math.PI * 2);
      ctx.fillStyle = mg;
      ctx.fill();
      const coreR = Math.min(W, H) * 0.07 * pulse;
      const cg = ctx.createRadialGradient(cx, cy, 0, cx, cy, coreR);
      cg.addColorStop(0, 'rgba(255,230,160,0.22)');
      cg.addColorStop(0.2, 'rgba(255,170,50,0.14)');
      cg.addColorStop(0.6, 'rgba(255,90,10,0.05)');
      cg.addColorStop(1, 'rgba(255,50,0,0)');
      ctx.beginPath();
      ctx.arc(cx, cy, coreR, 0, Math.PI * 2);
      ctx.fillStyle = cg;
      ctx.fill();
      drawFlames(cx, cy, t, pulse);
    }

    function drawFlames(cx, cy, t, pulse) {
      const count = 7,
        baseH = Math.min(W, H) * 0.22 * pulse;
      for (let i = 0; i < count; i++) {
        const angle = (i / count) * Math.PI + Math.PI * 0.05;
        const sway = 0.28 * Math.sin(t * 0.03 + i * 1.2);
        const h = baseH * (0.5 + 0.5 * Math.abs(Math.sin(t * 0.022 + i * 0.9)));
        const w = Math.min(W, H) * (0.025 + 0.015 * Math.sin(t * 0.018 + i));
        const tx = cx + Math.sin(angle + sway) * w * 0.5,
          ty = cy - h;
        const c1x = cx + Math.sin(angle + sway * 1.4) * w * 1.2,
          c1y = cy - h * 0.35;
        const c2x = tx + Math.sin(angle + sway * 0.7) * w,
          c2y = ty + h * 0.25;
        const frac = i / (count - 1);
        const g1 = Math.floor(220 - frac * 150),
          b1 = Math.floor(120 - frac * 110);
        const a1 = (0.09 - frac * 0.04) * pulse;
        const grad = ctx.createLinearGradient(cx, cy, tx, ty);
        grad.addColorStop(0, `rgba(255,${g1},${b1},${a1 * 0.9})`);
        grad.addColorStop(0.5, `rgba(255,${Math.floor(g1 * 0.6)},0,${a1 * 0.5})`);
        grad.addColorStop(1, `rgba(255,80,0,0)`);
        ctx.beginPath();
        ctx.moveTo(cx - w * 0.5, cy);
        ctx.bezierCurveTo(c1x - w, c1y, c2x - w * 0.5, c2y, tx, ty);
        ctx.bezierCurveTo(c2x + w * 0.5, c2y, c1x + w, c1y, cx + w * 0.5, cy);
        ctx.closePath();
        ctx.fillStyle = grad;
        ctx.fill();
      }
    }

    const wisps = Array.from({
      length: 4
    }, (_, i) => ({
      phase: (i / 4) * Math.PI * 2,
      speed: 0.0004 + i * 0.00015,
      y: 0.08 + i * 0.09,
      amp: 0.05 + Math.random() * 0.04,
      len: 0.6 + Math.random() * 0.3,
      hue: [38, 28, 52, 200][i],
    }));

    function drawWisps(t) {
      wisps.forEach(w => {
        w.phase += w.speed * 60;
        const startX = ((w.phase * 0.05) % 1.4 - 0.2) * W,
          baseY = w.y * H;
        ctx.save();
        ctx.globalCompositeOperation = 'screen';
        for (let s = 0; s < 3; s++) {
          const alpha = (0.025 - s * 0.007),
            width = (12 - s * 3) * (W / 1400);
          ctx.beginPath();
          ctx.moveTo(startX, baseY);
          for (let k = 1; k <= 12; k++) {
            ctx.lineTo(startX + (k / 12) * w.len * W, baseY + Math.sin(w.phase + k * 0.55) * w.amp * H + Math.sin(w.phase * 1.7 + k * 0.3) * w.amp * 0.4 * H);
          }
          ctx.strokeStyle = `hsla(${w.hue},80%,70%,${alpha})`;
          ctx.lineWidth = width;
          ctx.lineCap = 'round';
          ctx.stroke();
        }
        ctx.restore();
      });
    }

    function drawHills() {
      const layers = [{
          y: 0.82,
          amp: 0.06,
          freq: 0.003,
          spd: 0.00004,
          col: [8, 6, 4],
          a: 0.55
        },
        {
          y: 0.87,
          amp: 0.04,
          freq: 0.005,
          spd: 0.00007,
          col: [12, 9, 6],
          a: 0.7
        },
        {
          y: 0.91,
          amp: 0.025,
          freq: 0.008,
          spd: 0.00010,
          col: [16, 12, 8],
          a: 0.85
        },
        {
          y: 0.945,
          amp: 0.01,
          freq: 0.012,
          spd: 0.00013,
          col: [20, 15, 10],
          a: 1.0
        },
      ];
      layers.forEach(l => {
        l._offset = (l._offset || 0) + l.spd * 60;
        ctx.beginPath();
        ctx.moveTo(0, H);
        for (let x = 0; x <= W; x += 4) {
          const y = l.y * H + Math.sin(x * l.freq + l._offset) * l.amp * H + Math.sin(x * l.freq * 2.3 + l._offset * 1.4) * l.amp * 0.4 * H;
          if (x === 0) ctx.moveTo(x, y);
          else ctx.lineTo(x, y);
        }
        ctx.lineTo(W, H);
        ctx.closePath();
        ctx.fillStyle = `rgba(${l.col[0]},${l.col[1]},${l.col[2]},${l.a})`;
        ctx.fill();
      });
    }

    let smokeTimer = 0,
      shootTimer = 0;

    function loop() {
      t++;
      ctx.clearRect(0, 0, W, H);
      const sky = ctx.createLinearGradient(0, 0, 0, H);
      sky.addColorStop(0, '#05040a');
      sky.addColorStop(0.25, '#080614');
      sky.addColorStop(0.55, '#12090a');
      sky.addColorStop(0.78, '#1c0d08');
      sky.addColorStop(0.92, '#2a1005');
      sky.addColorStop(1, '#100804');
      ctx.fillStyle = sky;
      ctx.fillRect(0, 0, W, H);
      ctx.globalCompositeOperation = 'screen';
      stars.forEach(s => {
        s.twinkle += s.speed;
        const a = 0.3 + 0.4 * Math.abs(Math.sin(s.twinkle));
        ctx.beginPath();
        ctx.arc(s.x * W, s.y * H, s.r, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(255,248,230,${a})`;
        ctx.fill();
      });
      shootTimer++;
      if (shootTimer > 320 + Math.random() * 200) {
        spawnShoot();
        shootTimer = 0;
      }
      shoots.forEach((s, i) => {
        s.life++;
        s.x += s.vx;
        s.y += s.vy;
        s.alpha = Math.sin((s.life / s.maxLife) * Math.PI) * 0.7;
        if (s.life > s.maxLife) shoots.splice(i, 1);
        else {
          ctx.beginPath();
          ctx.moveTo(s.x * W, s.y * H);
          ctx.lineTo((s.x - s.len * (s.life / s.maxLife)) * W, (s.y - s.len * 0.4 * (s.life / s.maxLife)) * H);
          const sg = ctx.createLinearGradient(s.x * W, s.y * H, (s.x - s.len) * W, (s.y - s.len * 0.4) * H);
          sg.addColorStop(0, `rgba(255,248,220,${s.alpha})`);
          sg.addColorStop(1, `rgba(255,248,220,0)`);
          ctx.strokeStyle = sg;
          ctx.lineWidth = 1.5;
          ctx.stroke();
        }
      });
      ctx.globalCompositeOperation = 'source-over';
      drawWisps(t);
      ctx.globalCompositeOperation = 'source-over';
      clouds.slice(0, 8).forEach(c => {
        c.update();
        c.draw();
      });
      drawCastle();
      clouds.slice(8).forEach(c => {
        c.update();
        c.draw();
      });
      smokeTimer++;
      if (smokeTimer > 18) {
        spawnSmoke();
        smokeTimer = 0;
      }
      smokes.forEach((s, i) => {
        s.life++;
        s.x += s.vx;
        s.y += s.vy;
        s.r += 0.15;
        const a = s.alpha * Math.sin((s.life / s.maxLife) * Math.PI);
        if (s.life > s.maxLife) {
          smokes.splice(i, 1);
          return;
        }
        ctx.globalCompositeOperation = 'screen';
        const g = ctx.createRadialGradient(s.x, s.y, 0, s.x, s.y, s.r);
        g.addColorStop(0, `rgba(180,140,80,${a})`);
        g.addColorStop(1, `rgba(100,70,30,0)`);
        ctx.beginPath();
        ctx.arc(s.x, s.y, s.r, 0, Math.PI * 2);
        ctx.fillStyle = g;
        ctx.fill();
        ctx.globalCompositeOperation = 'source-over';
      });
      ctx.globalCompositeOperation = 'screen';
      drawCalcifer(t);
      ctx.globalCompositeOperation = 'source-over';
      drawHills();
      ctx.globalCompositeOperation = 'screen';
      moths.forEach(m => {
        m.update();
        m.draw();
      });
      ctx.globalCompositeOperation = 'source-over';
      requestAnimationFrame(loop);
    }
    loop();
  })();

  /* ══════════════════════════════════════
     DARK SPHERE + FLOATING TECH CHIPS
     (Desktop only — hidden on mobile)
  ══════════════════════════════════════ */
  (function() {
    const container = document.getElementById('heroRight');
    // Don't init if container is hidden (mobile)
    if (!container || window.getComputedStyle(container).display === 'none') return;

    const canvas = document.getElementById('fire3d-canvas');
    const ctx = canvas.getContext('2d');
    let W, H;

    function resize() {
      if (window.getComputedStyle(container).display === 'none') return;
      W = canvas.width = container.offsetWidth + 400;
      H = canvas.height = container.offsetHeight + 400;
    }
    resize();
    new ResizeObserver(() => resize()).observe(container);

    let rotX = 0.22,
      rotY = 0,
      targetRotX = 0.22,
      targetRotY = 0,
      autoRotY = 0,
      dragging = false,
      lastMX = 0,
      lastMY = 0;
    container.addEventListener('mousedown', e => {
      dragging = true;
      lastMX = e.clientX;
      lastMY = e.clientY;
    });
    window.addEventListener('mousemove', e => {
      if (!dragging) return;
      targetRotY += (e.clientX - lastMX) * .009;
      targetRotX += (e.clientY - lastMY) * .007;
      targetRotX = Math.max(-.9, Math.min(.9, targetRotX));
      lastMX = e.clientX;
      lastMY = e.clientY;
    });
    window.addEventListener('mouseup', () => {
      dragging = false;
    });
    container.addEventListener('touchstart', e => {
      lastMX = e.touches[0].clientX;
      lastMY = e.touches[0].clientY;
    }, {
      passive: true
    });
    container.addEventListener('touchmove', e => {
      targetRotY += (e.touches[0].clientX - lastMX) * .009;
      targetRotX += (e.touches[0].clientY - lastMY) * .007;
      targetRotX = Math.max(-.9, Math.min(.9, targetRotX));
      lastMX = e.touches[0].clientX;
      lastMY = e.touches[0].clientY;
    }, {
      passive: true
    });

    const FL = 600,
      CX = () => W / 2,
      CY = () => H / 2 - 120;

    function proj(px, py, pz) {
      const y1 = py * Math.cos(rotX) - pz * Math.sin(rotX),
        z1 = py * Math.sin(rotX) + pz * Math.cos(rotX);
      const x2 = px * Math.cos(rotY) + z1 * Math.sin(rotY),
        z2 = -px * Math.sin(rotY) + z1 * Math.cos(rotY);
      const sc = FL / (FL + z2 + 380);
      return {
        sx: CX() + x2 * sc,
        sy: CY() + y1 * sc,
        z: z2,
        sc
      };
    }

    const ORB_R = 200,
      NODE_COUNT = 90;
    const sphereNodes = Array.from({
      length: NODE_COUNT
    }, (_, i) => {
      const phi = Math.acos(1 - 2 * (i + .5) / NODE_COUNT),
        theta = Math.PI * (1 + Math.sqrt(5)) * (i + .5);
      return {
        x: Math.sin(phi) * Math.cos(theta) * ORB_R,
        y: Math.sin(phi) * Math.sin(theta) * ORB_R,
        z: Math.cos(phi) * ORB_R,
        pulse: Math.random() * Math.PI * 2,
        pulseS: .018 + Math.random() * .012
      };
    });
    const sphereEdges = [];
    for (let i = 0; i < sphereNodes.length; i++)
      for (let j = i + 1; j < sphereNodes.length; j++) {
        const a = sphereNodes[i],
          b = sphereNodes[j];
        const dist = Math.sqrt((a.x - b.x) ** 2 + (a.y - b.y) ** 2 + (a.z - b.z) ** 2);
        if (dist < ORB_R * .72) sphereEdges.push([i, j, dist]);
      }

    function drawWireframeSphere() {
      const x = CX(),
        y = CY();
      const glow = ctx.createRadialGradient(x, y, ORB_R * .5, x, y, ORB_R * 1.85);
      glow.addColorStop(0, 'rgba(255,160,20,0.10)');
      glow.addColorStop(0.5, 'rgba(255,100,10,0.04)');
      glow.addColorStop(1, 'rgba(0,0,0,0)');
      ctx.beginPath();
      ctx.arc(x, y, ORB_R * 1.85, 0, Math.PI * 2);
      ctx.fillStyle = glow;
      ctx.fill();
      const proj_nodes = sphereNodes.map(n => {
        n.pulse += n.pulseS;
        return {
          ...proj(n.x, n.y, n.z),
          pulse: n.pulse
        };
      });
      sphereEdges.map(([i, j, dist]) => {
        const a = proj_nodes[i],
          b = proj_nodes[j];
        return {
          a,
          b,
          midZ: (a.z + b.z) / 2,
          dist
        };
      }).sort((a, b) => a.midZ - b.midZ).forEach(({
        a,
        b,
        midZ,
        dist
      }) => {
        const depth = (midZ + ORB_R + 380) / (ORB_R * 2 + 380),
          edgeAlpha = (.04 + depth * .28) * (1 - dist / (ORB_R * .72));
        if (edgeAlpha < 0.01) return;
        ctx.beginPath();
        ctx.moveTo(a.sx, a.sy);
        ctx.lineTo(b.sx, b.sy);
        ctx.strokeStyle = `rgba(255,${Math.floor(140+depth*80)},15,${edgeAlpha})`;
        ctx.lineWidth = .6 + depth * .5;
        ctx.stroke();
      });
      proj_nodes.forEach(p => {
        const depth = (p.z + ORB_R + 380) / (ORB_R * 2 + 380),
          nodeAlpha = .25 + depth * .75;
        const pulse = .85 + Math.sin(p.pulse) * .15,
          r = (2.5 + depth * 4.5) * p.sc * pulse;
        const ng = ctx.createRadialGradient(p.sx, p.sy, 0, p.sx, p.sy, r * 4);
        ng.addColorStop(0, `rgba(255,${Math.floor(180+depth*60)},30,${nodeAlpha*.5})`);
        ng.addColorStop(0.4, `rgba(255,140,10,${nodeAlpha*.18})`);
        ng.addColorStop(1, 'rgba(255,80,0,0)');
        ctx.beginPath();
        ctx.arc(p.sx, p.sy, r * 4, 0, Math.PI * 2);
        ctx.fillStyle = ng;
        ctx.fill();
        ctx.beginPath();
        ctx.arc(p.sx, p.sy, r, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(255,${Math.floor(200+depth*55)},40,${nodeAlpha})`;
        ctx.fill();
      });
    }

    const TECHS = [{
        label: 'Python',
        color: '#3B82F6'
      }, {
        label: 'React',
        color: '#22D3EE'
      }, {
        label: 'Flutter',
        color: '#54C5F8'
      },
      {
        label: 'Node.js',
        color: '#22C55E'
      }, {
        label: 'TensorFlow',
        color: '#FF9500'
      }, {
        label: 'Laravel',
        color: '#EF4444'
      },
      {
        label: 'Swift',
        color: '#F97316'
      }, {
        label: 'PostgreSQL',
        color: '#8B5CF6'
      }, {
        label: 'Docker',
        color: '#06B6D4'
      },
      {
        label: 'Kotlin',
        color: '#A78BFA'
      }, {
        label: 'TypeScript',
        color: '#60A5FA'
      }, {
        label: 'Redis',
        color: '#EF4444'
      },
    ];
    const CHIP_R = ORB_R * 1.92;
    const chips = TECHS.map((t, i) => {
      const phi = Math.acos(1 - 2 * (i + .5) / TECHS.length),
        theta = Math.PI * (1 + Math.sqrt(5)) * (i + .5);
      return {
        ...t,
        bx: Math.sin(phi) * Math.cos(theta) * CHIP_R,
        by: Math.sin(phi) * Math.sin(theta) * CHIP_R,
        bz: Math.cos(phi) * CHIP_R,
        driftA: Math.random() * Math.PI * 2,
        driftS: .0008 + Math.random() * .0006,
        driftAmp: 8 + Math.random() * 10,
        pulse: Math.random() * Math.PI * 2
      };
    });

    function drawChip(chip, p) {
      const depth = (p.z + CHIP_R + 380) / (CHIP_R * 2 + 380);
      if (depth < 0.05) return;
      const alpha = Math.min(1, Math.max(0, (depth - 0.05) / 0.18));
      const scClamped = Math.max(0.7, Math.min(1.3, p.sc)),
        fontSize = Math.round(14 * scClamped),
        dotR = 5.5 * scClamped;
      ctx.save();
      ctx.globalAlpha = alpha;
      ctx.font = `600 ${fontSize}px 'DM Sans', sans-serif`;
      const textW = ctx.measureText(chip.label).width,
        dotX = p.sx - textW * 0.5 - dotR * 2.2,
        dotY = p.sy;
      const dg = ctx.createRadialGradient(dotX, dotY, 0, dotX, dotY, dotR * 5);
      dg.addColorStop(0, chip.color + 'aa');
      dg.addColorStop(0.4, chip.color + '44');
      dg.addColorStop(1, 'rgba(0,0,0,0)');
      ctx.beginPath();
      ctx.arc(dotX, dotY, dotR * 5, 0, Math.PI * 2);
      ctx.fillStyle = dg;
      ctx.fill();
      ctx.beginPath();
      ctx.arc(dotX, dotY, dotR, 0, Math.PI * 2);
      ctx.fillStyle = chip.color;
      ctx.shadowColor = chip.color;
      ctx.shadowBlur = 10 * scClamped;
      ctx.fill();
      ctx.shadowBlur = 0;
      ctx.fillStyle = '#ffffff';
      ctx.shadowColor = 'rgba(0,0,0,0.8)';
      ctx.shadowBlur = 6;
      ctx.fillText(chip.label, p.sx - textW * 0.5 + dotR * 0.5, p.sy + fontSize * 0.36);
      ctx.shadowBlur = 0;
      ctx.restore();
    }

    function loop() {
      ctx.clearRect(0, 0, W, H);
      if (!dragging) autoRotY += .003;
      rotX += (targetRotX - rotX) * .09;
      rotY += (targetRotY + autoRotY - rotY) * .09;
      chips.forEach(c => {
        c.driftA += c.driftS;
        c.pulse += .012;
      });
      const projected = chips.map(c => {
        const dx = Math.sin(c.driftA) * c.driftAmp,
          dy = Math.cos(c.driftA * .7) * c.driftAmp * .6,
          dz = Math.sin(c.driftA * 1.3) * c.driftAmp * .5;
        return {
          chip: c,
          p: proj(c.bx + dx, c.by + dy, c.bz + dz)
        };
      }).sort((a, b) => a.p.z - b.p.z);
      projected.forEach(({
        chip,
        p
      }) => {
        if (p.z < 0) drawChip(chip, p);
      });
      drawWireframeSphere();
      projected.forEach(({
        chip,
        p
      }) => {
        if (p.z >= 0) drawChip(chip, p);
      });
      requestAnimationFrame(loop);
    }
    loop();
  })();

  /* ══ CURRENCY SWITCHER ══ */
  const CURRENCY = {
    PHP: {
      symbol: '₱',
      code: 'PHP',
      flag: '🇵🇭'
    },
    USD: {
      symbol: '$',
      code: 'USD',
      flag: '🇺🇸'
    },
    EUR: {
      symbol: '€',
      code: 'EUR',
      flag: '🇪🇺'
    }
  };

  let activeCurrency = 'PHP';

  function setCurrency(code) {
    if (!CURRENCY[code]) return;
    activeCurrency = code;

    // Update switcher button states
    document.querySelectorAll('.currency-btn').forEach(btn => {
      btn.classList.toggle('active', btn.dataset.currency === code);
    });

    // Update card prices — all show "Custom" regardless of currency
    // but we reflect the active symbol so clients know the context
    document.querySelectorAll('.currency-price').forEach(el => {
      el.textContent = 'Custom';
    });
  }

  /* ══ NAV ══ */
  window.addEventListener('scroll', () => {
    document.getElementById('mainNav').classList.toggle('scrolled', window.scrollY > 40);
    document.getElementById('scrollTop').classList.toggle('visible', window.scrollY > 400);
  }, {
    passive: true
  });

  /* ══ HAMBURGER ══ */
  function toggleMenu() {
    document.getElementById('mobileMenu').classList.toggle('open');
    document.getElementById('hamburger').classList.toggle('open');
  }

  /* ══ CAROUSEL ══ */
  (function() {
    const track = document.getElementById('carouselTrack');
    const dotsEl = document.getElementById('carouselDots');
    const prevBtn = document.getElementById('carouselPrev');
    const nextBtn = document.getElementById('carouselNext');
    let current = 0;
    const CARD_W = 310,
      GAP = 22;

    function getVisible() {
      return Math.max(1, Math.floor((track.parentElement.offsetWidth - 64) / (CARD_W + GAP)));
    }

    function getCards() {
      return Array.from(track.querySelectorAll('.service-card:not([style*="display: none"])'));
    }

    function buildDots() {
      dotsEl.innerHTML = '';
      const total = getCards().length,
        vis = getVisible(),
        pages = Math.ceil(total / vis);
      for (let i = 0; i < pages; i++) {
        const d = document.createElement('div');
        d.className = 'carousel-dot' + (i === 0 ? ' active' : '');
        const page = i;
        d.onclick = () => goToPage(page);
        dotsEl.appendChild(d);
      }
    }

    function updateDots() {
      const vis = getVisible(),
        page = Math.floor(current / vis);
      dotsEl.querySelectorAll('.carousel-dot').forEach((d, i) => d.classList.toggle('active', i === page));
    }

    function goTo(idx) {
      const cards = getCards(),
        vis = getVisible(),
        max = Math.max(0, cards.length - vis);
      current = Math.max(0, Math.min(idx, max));
      let offset = 0;
      for (let i = 0; i < current; i++) offset += CARD_W + GAP;
      track.style.transform = 'translateX(-' + offset + 'px)';
      prevBtn.disabled = current === 0;
      nextBtn.disabled = current >= max;
      updateDots();
    }

    function goToPage(page) {
      goTo(page * getVisible());
    }
    window.carouselMove = function(dir) {
      goTo(current + dir * getVisible());
    };
    window._carouselFilter = function(cat) {
      Array.from(track.querySelectorAll('.service-card')).forEach(card => {
        const cats = card.dataset.cat || '';
        card.style.display = (cat === 'all' || cats.includes(cat)) ? '' : 'none';
      });
      current = 0;
      track.style.transform = 'translateX(0)';
      buildDots();
      goTo(0);
    };
    buildDots();
    goTo(0);
    window.addEventListener('resize', () => {
      buildDots();
      goTo(0);
    });
    let startX = 0;
    track.addEventListener('touchstart', e => {
      startX = e.touches[0].clientX;
    }, {
      passive: true
    });
    track.addEventListener('touchend', e => {
      const diff = startX - e.changedTouches[0].clientX;
      if (Math.abs(diff) > 40) carouselMove(diff > 0 ? 1 : -1);
    }, {
      passive: true
    });
  })();

  /* ══ FILTER ══ */
  function filterCat(el, cat) {
    document.querySelectorAll('.cat-chip').forEach(c => c.classList.remove('active'));
    el.classList.add('active');
    window._carouselFilter(cat);
  }

  /* ══ REVEAL ══ */
  const obs = new IntersectionObserver(entries => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) {
        setTimeout(() => e.target.classList.add('visible'), i * 60);
        obs.unobserve(e.target);
      }
    });
  }, {
    threshold: .12,
    rootMargin: '0px 0px -40px 0px'
  });
  document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

  /* ══ CHAT ══ */
  const replies = {
    'i have a challenge': "Perfect — that's what we live for. Tell me what you're building and I'll connect you with the team.",
    'build a mobile app': "We build native Android & iOS and cross-platform apps (Flutter). Drop us the brief at <strong>calciferlabs2026@calciferlabs.space</strong> or click <strong>Get Quote</strong>.",
    'ml / ai project': "ML pipelines, model integration, NLP, recommendations — Python, TensorFlow, PyTorch. Tell me more and we'll scope it out.",
  };

  function toggleChat() {
    const w = document.getElementById('chatWin');
    w.classList.toggle('open');
    const o = w.classList.contains('open');
    document.getElementById('ico-open').style.display = o ? 'none' : 'block';
    document.getElementById('ico-close').style.display = o ? 'block' : 'none';
  }

  function sendSugg(el) {
    document.getElementById('chatSugg').style.display = 'none';
    appendMsg(el.textContent, 'user');
    showTyping();
    setTimeout(() => {
      removeTyping();
      appendMsg(replies[el.textContent.toLowerCase()] || "Great — let me connect you with the team at calciferlabs2026@calciferlabs.space", 'bot');
    }, 1100);
  }

  function sendChat() {
    const i = document.getElementById('chatInput'),
      t = i.value.trim();
    if (!t) return;
    i.value = '';
    document.getElementById('chatSugg').style.display = 'none';
    appendMsg(t, 'user');
    showTyping();
    setTimeout(() => {
      removeTyping();
      const k = Object.keys(replies).find(k => t.toLowerCase().includes(k.split(' ')[0]));
      appendMsg(k ? replies[k] : "Thanks! Reach us at calciferlabs2026@calciferlabs.space and we'll get back in 24 hrs.", 'bot');
    }, 900 + Math.random() * 500);
  }

  function appendMsg(text, type) {
    const m = document.getElementById('chatMsgs'),
      d = document.createElement('div');
    d.className = 'chat-msg ' + type;
    d.innerHTML = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
    m.appendChild(d);
    m.scrollTop = m.scrollHeight;
  }
  let typingEl = null;

  function showTyping() {
    const m = document.getElementById('chatMsgs');
    typingEl = document.createElement('div');
    typingEl.className = 'chat-typing';
    typingEl.innerHTML = '<span></span><span></span><span></span>';
    m.appendChild(typingEl);
    m.scrollTop = m.scrollHeight;
  }

  function removeTyping() {
    if (typingEl) {
      typingEl.remove();
      typingEl = null;
    }
  }

  /* ══ PROPOSAL MODAL ══ */
  function submitProposal() {
    const btn = event.currentTarget;
    btn.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16"><polyline points="20 6 9 17 4 12"/></svg>&nbsp;Proposal sent! We\'ll be in touch soon.';
    btn.disabled = true;
    btn.style.opacity = '0.7';
    setTimeout(() => document.getElementById('proposalModal').style.display = 'none', 2200);
  }
  document.getElementById('proposalModal').addEventListener('click', e => {
    if (e.target === document.getElementById('proposalModal')) document.getElementById('proposalModal').style.display = 'none';
  });

  /* ══ NEWSLETTER ══ */
  function subscribeNL() {
    const i = document.getElementById('nlEmail');
    if (i.value.includes('@')) {
      i.value = "You're in!";
      i.style.color = '#22C55E';
      i.disabled = true;
    } else {
      i.style.borderColor = 'var(--fire-orange)';
      i.placeholder = 'Enter a valid email';
    }
  }

  /* Smooth anchors */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const t = document.querySelector(a.getAttribute('href'));
      if (t) {
        e.preventDefault();
        t.scrollIntoView({
          behavior: 'smooth'
        });
      }
    });
  });

  /* Card mouse glow */
  document.querySelectorAll('.service-card').forEach(card => {
    card.addEventListener('mousemove', e => {
      const r = card.getBoundingClientRect();
      card.style.setProperty('--mx', ((e.clientX - r.left) / r.width * 100).toFixed(1) + '%');
      card.style.setProperty('--my', ((e.clientY - r.top) / r.height * 100).toFixed(1) + '%');
    });
  });
</script>

</body>

</html>