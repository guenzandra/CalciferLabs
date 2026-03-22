<?php
// index/layout.php — Global Layout Head for Calcifer Labs
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($page_title) ? htmlspecialchars($page_title) . ' — Calcifer Labs' : 'Calcifer Labs — We Build Your Dreams' ?></title>
  <meta name="description" content="<?= isset($page_desc) ? htmlspecialchars($page_desc) : 'Calcifer Labs builds powerful SaaS, ML integrations, mobile apps, ecommerce, school management systems and more.' ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
  <style>
    /* =============================================
       CALCIFER LABS — GLOBAL DESIGN SYSTEM
       ============================================= */
    :root {
      --fire-orange: #FF5C1A;
      --fire-amber: #FF9500;
      --fire-yellow: #FFD60A;
      --deep-dark: #0D0D0D;
      --dark-surface: #161616;
      --card-bg: #1E1E1E;
      --border: #2A2A2A;
      --text-primary: #F5F5F0;
      --text-muted: #888;
      --text-dim: #555;
      --gradient-fire: linear-gradient(135deg, #FF5C1A, #FF9500, #FFD60A);
      --glow: 0 0 40px rgba(255, 92, 26, 0.3);
    }

    *,
    *::before,
    *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--deep-dark);
      color: var(--text-primary);
      overflow-x: hidden;
      cursor: none;
    }

    /* ── CUSTOM CURSOR (dot + ring, no flame trail) ── */
    #cursor-dot {
      position: fixed;
      width: 8px;
      height: 8px;
      background: var(--fire-orange);
      border-radius: 50%;
      pointer-events: none;
      z-index: 9999;
      transform: translate(-50%, -50%);
      box-shadow: 0 0 10px var(--fire-orange), 0 0 20px rgba(255, 92, 26, .4);
      transition: transform .12s ease, width .12s, height .12s;
    }

    #cursor-ring {
      position: fixed;
      width: 32px;
      height: 32px;
      border: 1.5px solid rgba(255, 149, 0, .45);
      border-radius: 50%;
      pointer-events: none;
      z-index: 9998;
      transform: translate(-50%, -50%);
      transition: width .18s, height .18s, border-color .18s;
    }

    #cursor-dot.hovered {
      width: 12px;
      height: 12px;
      transform: translate(-50%, -50%) scale(1.5);
    }

    #cursor-ring.hovered {
      width: 48px;
      height: 48px;
      border-color: rgba(255, 92, 26, .7);
    }

    /* ── AMBIENT FIRE BG CANVAS (full page, behind everything) ── */
    #fire-bg-canvas {
      position: fixed;
      inset: 0;
      pointer-events: none;
      z-index: 0;
    }

    /* ── NAV ── */
    nav {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 100;
      display: flex;
      align-items: center;
      padding: 0 32px;
      height: 70px;
      background: rgba(13, 13, 13, 0.82);
      backdrop-filter: blur(18px);
      border-bottom: 1px solid var(--border);
      transition: background .3s;
    }

    nav.scrolled {
      background: rgba(13, 13, 13, .97);
    }

    /* ── NAV LOGO WRAPPER ── */
    .nav-logo {
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
      flex-shrink: 0;
    }

    /* Clip wrapper — crops out transparent padding around the PNG */
    .logo-clip {
      width: 48px;
      height: 48px;
      flex-shrink: 0;
      overflow: hidden;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .logo-clip img {
      /* Scale up 2.2x so the flame fills the container despite transparent padding */
      width: 200%;
      height: 200%;
      object-fit: contain;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) scale(1);
      transition: filter .3s, transform .3s;
    }

    .nav-logo:hover .logo-clip img {
      transform: translate(-50%, -50%) scale(1.08) rotate(-4deg);
    }

    /* Footer clip — bigger */
    .logo-clip-lg {
      width: 64px;
      height: 64px;
      flex-shrink: 0;
      overflow: hidden;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .logo-clip-lg img {
      width: 200%;
      height: 200%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      transition: filter .3s, transform .3s;
    }

    .brand-name {
      font-family: 'Syne', sans-serif;
      font-weight: 800;
      font-size: 18px;
      background: var(--gradient-fire);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .nav-logo-img {
      height: 36px;
      width: auto;
      display: block;
      transition: filter .3s, transform .3s;
      filter: drop-shadow(0 0 8px rgba(255, 92, 26, .35));
    }

    .nav-logo:hover .nav-logo-img {
      filter: drop-shadow(0 0 18px rgba(255, 92, 26, .7));
      transform: scale(1.05);
    }

    /* Flame icon + text combo */
    .nav-flame-img {
      height: 44px;
      width: auto;
      display: block;
      flex-shrink: 0;
      transition: filter .3s, transform .3s;
      filter: drop-shadow(0 0 10px rgba(255, 100, 10, .5));
    }

    .nav-logo:hover .nav-flame-img {
      filter: drop-shadow(0 0 22px rgba(255, 92, 26, .85));
      transform: scale(1.06) rotate(-4deg);
    }

    /* Footer logo — same flame but slightly larger */
    .footer-flame-img {
      height: 52px;
      width: auto;
      display: block;
      flex-shrink: 0;
      filter: drop-shadow(0 0 12px rgba(255, 100, 10, .55));
      transition: filter .3s, transform .3s;
    }

    .footer-logo-link {
      margin-bottom: 16px;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
    }

    .footer-logo-link:hover .footer-flame-img {
      filter: drop-shadow(0 0 24px rgba(255, 92, 26, .9));
      transform: scale(1.05) rotate(-4deg);
    }

    .footer-logo-link .nav-brand-main {
      font-size: 20px;
    }

    .footer-logo-link .nav-brand-sub {
      font-size: 11px;
      letter-spacing: .28em;
    }

    .nav-brand-text {
      display: flex;
      flex-direction: column;
      line-height: 1;
      gap: 2px;
    }

    .nav-brand-main {
      font-family: 'Syne', sans-serif;
      font-weight: 800;
      font-size: 19px;
      background: var(--gradient-fire);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      letter-spacing: .01em;
    }

    .nav-brand-sub {
      font-family: 'Syne', sans-serif;
      font-weight: 600;
      font-size: 10px;
      letter-spacing: .28em;
      text-transform: uppercase;
      color: var(--fire-amber);
    }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 4px;
      list-style: none;
      margin-left: 32px;
    }

    .nav-links a {
      text-decoration: none;
      color: var(--text-muted);
      font-size: 14px;
      font-weight: 500;
      padding: 8px 14px;
      border-radius: 8px;
      transition: color .2s, background .2s;
      cursor: none;
    }

    .nav-links a:hover,
    .nav-links a.active {
      color: var(--text-primary);
      background: var(--border);
    }

    .nav-search {
      flex: 1;
      max-width: 300px;
      margin: 0 24px;
      position: relative;
    }

    .nav-search input {
      width: 100%;
      padding: 9px 16px 9px 38px;
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: 100px;
      color: var(--text-primary);
      font-family: 'DM Sans', sans-serif;
      font-size: 13px;
      outline: none;
      cursor: none;
      transition: border-color .2s, box-shadow .2s;
    }

    .nav-search input:focus {
      border-color: var(--fire-orange);
      box-shadow: 0 0 0 3px rgba(255, 92, 26, .15);
    }

    .nav-search input::placeholder {
      color: var(--text-dim);
    }

    .search-icon {
      position: absolute;
      left: 11px;
      top: 50%;
      transform: translateY(-50%);
      display: flex;
      align-items: center;
    }

    .nav-actions {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-left: auto;
    }

    .btn-ghost {
      padding: 8px 18px;
      border-radius: 8px;
      background: transparent;
      border: 1px solid var(--border);
      color: var(--text-primary);
      font-family: 'DM Sans', sans-serif;
      font-size: 13px;
      font-weight: 500;
      cursor: none;
      white-space: nowrap;
      transition: border-color .2s, background .2s;
    }

    .btn-ghost:hover {
      border-color: var(--fire-orange);
      background: rgba(255, 92, 26, .06);
    }

    .btn-fire {
      padding: 8px 20px;
      border-radius: 8px;
      background: var(--gradient-fire);
      border: none;
      color: #000;
      font-family: 'DM Sans', sans-serif;
      font-size: 13px;
      font-weight: 700;
      cursor: none;
      white-space: nowrap;
      display: inline-flex;
      align-items: center;
      gap: 7px;
      transition: opacity .2s, transform .15s, box-shadow .2s;
    }

    .btn-fire:hover {
      opacity: .9;
      transform: translateY(-1px);
      box-shadow: var(--glow);
    }

    .hamburger {
      display: none;
      background: none;
      border: none;
      cursor: none;
      flex-direction: column;
      gap: 5px;
      padding: 4px;
      margin-left: auto;
    }

    .hamburger span {
      display: block;
      width: 22px;
      height: 2px;
      background: var(--text-primary);
      border-radius: 2px;
      transition: all .3s;
    }

    .hamburger.open span:nth-child(1) {
      transform: translateY(7px) rotate(45deg);
    }

    .hamburger.open span:nth-child(2) {
      opacity: 0;
    }

    .hamburger.open span:nth-child(3) {
      transform: translateY(-7px) rotate(-45deg);
    }

    .mobile-menu {
      display: none;
      position: fixed;
      top: 70px;
      left: 0;
      right: 0;
      background: rgba(13, 13, 13, .97);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--border);
      padding: 16px 24px 24px;
      z-index: 99;
      flex-direction: column;
      gap: 4px;
    }

    .mobile-menu.open {
      display: flex;
    }

    .mobile-menu a {
      color: var(--text-primary);
      text-decoration: none;
      padding: 10px 4px;
      font-weight: 500;
      border-bottom: 1px solid var(--border);
    }

    .mob-actions {
      display: flex;
      gap: 10px;
      margin-top: 12px;
    }

    .mob-actions button {
      flex: 1;
    }

    /* ── SHARED UTILITIES ── */
    section {
      padding: 80px 32px;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .section-label {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: .14em;
      text-transform: uppercase;
      color: var(--fire-orange);
      margin-bottom: 12px;
    }

    .section-title {
      font-family: 'Syne', sans-serif;
      font-size: clamp(28px, 4vw, 40px);
      font-weight: 800;
      margin-bottom: 16px;
    }

    .section-sub {
      font-size: 16px;
      color: var(--text-muted);
      max-width: 500px;
      line-height: 1.65;
    }

    .fire-text {
      background: var(--gradient-fire);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .reveal {
      opacity: 0;
      transform: translateY(24px);
      transition: opacity .7s ease, transform .7s ease;
    }

    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .btn-fire-lg {
      padding: 14px 32px;
      border-radius: 12px;
      background: var(--gradient-fire);
      border: none;
      color: #000;
      font-family: 'DM Sans', sans-serif;
      font-size: 15px;
      font-weight: 700;
      cursor: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      box-shadow: 0 4px 24px rgba(255, 92, 26, .4);
      transition: opacity .2s, transform .2s, box-shadow .2s;
    }

    .btn-fire-lg:hover {
      opacity: .9;
      transform: translateY(-2px);
      box-shadow: 0 8px 32px rgba(255, 92, 26, .5);
    }

    .btn-outline-lg {
      padding: 14px 32px;
      border-radius: 12px;
      background: transparent;
      border: 1.5px solid var(--border);
      color: var(--text-primary);
      font-family: 'DM Sans', sans-serif;
      font-size: 15px;
      font-weight: 500;
      cursor: none;
      transition: border-color .2s, background .2s;
    }

    .btn-outline-lg:hover {
      border-color: var(--fire-orange);
      background: rgba(255, 92, 26, .06);
    }

    /* ── FOOTER ── */
    footer {
      background: var(--deep-dark);
      padding: 64px 32px 32px;
      border-top: 1px solid var(--border);
    }

    .footer-grid {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr 1fr;
      gap: 48px;
      margin-bottom: 48px;
    }

    .footer-brand p {
      font-size: 13px;
      color: var(--text-muted);
      line-height: 1.7;
      margin: 16px 0 20px;
      max-width: 260px;
    }

    .social-links {
      display: flex;
      gap: 10px;
    }

    .soc-btn {
      width: 34px;
      height: 34px;
      border-radius: 8px;
      background: var(--card-bg);
      border: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: none;
      transition: border-color .2s, background .2s, transform .2s;
    }

    .soc-btn:hover {
      border-color: var(--fire-orange);
      background: rgba(255, 92, 26, .1);
      transform: translateY(-2px);
    }

    .footer-col h4 {
      font-family: 'Syne', sans-serif;
      font-size: 13px;
      font-weight: 700;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: var(--text-dim);
      margin-bottom: 16px;
    }

    .footer-col a {
      display: block;
      font-size: 13px;
      color: var(--text-muted);
      text-decoration: none;
      margin-bottom: 10px;
      cursor: none;
      transition: color .2s, padding-left .2s;
    }

    .footer-col a:hover {
      color: var(--fire-orange);
      padding-left: 5px;
    }

    .footer-bottom {
      border-top: 1px solid var(--border);
      padding-top: 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 12px;
    }

    .footer-bottom p {
      font-size: 12px;
      color: var(--text-dim);
    }

    /* ── CHATBOT ── */
    .chat-toggle {
      position: fixed;
      bottom: 24px;
      right: 24px;
      z-index: 200;
      width: 56px;
      height: 56px;
      border-radius: 50%;
      background: var(--gradient-fire);
      border: none;
      cursor: none;
      box-shadow: 0 4px 24px rgba(255, 92, 26, .5), 0 0 0 4px rgba(255, 92, 26, .12);
      display: flex;
      align-items: center;
      justify-content: center;
      transition: transform .2s, box-shadow .2s;
      animation: pulse-ring 2.5s ease infinite;
    }

    .chat-toggle:hover {
      transform: scale(1.08);
      box-shadow: 0 8px 32px rgba(255, 92, 26, .6);
    }

    @keyframes pulse-ring {

      0%,
      100% {
        box-shadow: 0 4px 24px rgba(255, 92, 26, .5), 0 0 0 4px rgba(255, 92, 26, .12)
      }

      50% {
        box-shadow: 0 4px 24px rgba(255, 92, 26, .6), 0 0 0 12px rgba(255, 92, 26, .04)
      }
    }

    .chat-win {
      position: fixed;
      bottom: 92px;
      right: 24px;
      z-index: 200;
      width: 340px;
      border-radius: 20px;
      background: var(--dark-surface);
      border: 1px solid var(--border);
      box-shadow: 0 20px 60px rgba(0, 0, 0, .5);
      display: none;
      flex-direction: column;
      overflow: hidden;
      transform-origin: bottom right;
    }

    .chat-win.open {
      display: flex;
      animation: pop-in .25s ease both;
    }

    @keyframes pop-in {
      from {
        opacity: 0;
        transform: scale(.85) translateY(10px)
      }

      to {
        opacity: 1;
        transform: scale(1) translateY(0)
      }
    }

    .chat-head {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 16px 18px;
      border-bottom: 1px solid var(--border);
      background: var(--card-bg);
    }

    .chat-av {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: var(--gradient-fire);
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 0 12px rgba(255, 92, 26, .4);
      flex-shrink: 0;
    }

    .chat-name {
      font-family: 'Syne', sans-serif;
      font-size: 14px;
      font-weight: 700;
    }

    .chat-status {
      font-size: 11px;
      color: #22C55E;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .chat-status::before {
      content: '';
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: #22C55E;
    }

    .chat-close {
      margin-left: auto;
      background: none;
      border: none;
      color: var(--text-dim);
      cursor: none;
      padding: 4px;
      display: flex;
      align-items: center;
      transition: color .2s;
    }

    .chat-close:hover {
      color: var(--text-primary);
    }

    .chat-msgs {
      padding: 16px;
      display: flex;
      flex-direction: column;
      gap: 12px;
      height: 260px;
      overflow-y: auto;
    }

    .chat-msg {
      max-width: 85%;
      padding: 10px 14px;
      border-radius: 14px;
      font-size: 13px;
      line-height: 1.55;
    }

    .chat-msg.bot {
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: 14px 14px 14px 4px;
      align-self: flex-start;
    }

    .chat-msg.user {
      background: var(--gradient-fire);
      color: #000;
      font-weight: 500;
      border-radius: 14px 14px 4px 14px;
      align-self: flex-end;
    }

    .chat-typing {
      display: flex;
      gap: 4px;
      padding: 12px 14px;
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: 14px 14px 14px 4px;
      align-self: flex-start;
      max-width: 85%;
    }

    .chat-typing span {
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: var(--text-dim);
      animation: blink-dot 1.2s infinite;
    }

    .chat-typing span:nth-child(2) {
      animation-delay: .2s
    }

    .chat-typing span:nth-child(3) {
      animation-delay: .4s
    }

    @keyframes blink-dot {

      0%,
      80%,
      100% {
        opacity: .3
      }

      40% {
        opacity: 1
      }
    }

    .chat-sugg {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
      padding: 0 16px 12px;
    }

    .sugg-chip {
      font-size: 11px;
      padding: 5px 10px;
      border-radius: 100px;
      background: rgba(255, 92, 26, .1);
      border: 1px solid rgba(255, 92, 26, .2);
      color: var(--fire-orange);
      cursor: none;
      font-family: 'DM Sans', sans-serif;
      transition: background .2s;
    }

    .sugg-chip:hover {
      background: rgba(255, 92, 26, .2);
    }

    .chat-input-row {
      display: flex;
      gap: 8px;
      padding: 14px 16px;
      border-top: 1px solid var(--border);
    }

    .chat-input {
      flex: 1;
      padding: 9px 14px;
      border-radius: 100px;
      background: var(--card-bg);
      border: 1px solid var(--border);
      color: var(--text-primary);
      font-family: 'DM Sans', sans-serif;
      font-size: 13px;
      outline: none;
      cursor: none;
      transition: border-color .2s;
    }

    .chat-input:focus {
      border-color: var(--fire-orange);
    }

    .chat-input::placeholder {
      color: var(--text-dim);
    }

    .chat-send {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: var(--gradient-fire);
      border: none;
      cursor: none;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      transition: opacity .2s, transform .15s;
    }

    .chat-send:hover {
      opacity: .9;
      transform: scale(1.08);
    }

    /* Scroll top */
    .scroll-top {
      position: fixed;
      bottom: 90px;
      right: 90px;
      z-index: 199;
      width: 40px;
      height: 40px;
      border-radius: 10px;
      background: var(--card-bg);
      border: 1px solid var(--border);
      cursor: none;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all .2s;
      opacity: 0;
      pointer-events: none;
    }

    .scroll-top.visible {
      opacity: 1;
      pointer-events: auto;
    }

    .scroll-top:hover {
      border-color: var(--fire-orange);
      box-shadow: var(--glow);
    }

    /* ── PROPOSAL MODAL ── */
    #proposalModal {
      display: none;
      position: fixed;
      inset: 0;
      z-index: 300;
      background: rgba(0, 0, 0, .8);
      backdrop-filter: blur(10px);
      align-items: center;
      justify-content: center;
      padding: 16px;
    }

    .proposal-box {
      background: var(--dark-surface);
      border: 1px solid var(--border);
      border-radius: 24px;
      padding: 44px;
      max-width: 560px;
      width: 100%;
      position: relative;
      box-shadow: 0 32px 80px rgba(0, 0, 0, .6), 0 0 0 1px rgba(255, 92, 26, .08);
    }

    .proposal-close {
      position: absolute;
      top: 18px;
      right: 18px;
      background: none;
      border: none;
      cursor: none;
      color: var(--text-dim);
      display: flex;
      align-items: center;
      padding: 6px;
      transition: color .2s;
      border-radius: 8px;
    }

    .proposal-close:hover {
      color: var(--text-primary);
      background: var(--card-bg);
    }

    .proposal-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
      margin-bottom: 12px;
    }

    .proposal-input,
    .proposal-select,
    .proposal-textarea {
      width: 100%;
      padding: 12px 16px;
      border-radius: 10px;
      background: var(--card-bg);
      border: 1px solid var(--border);
      color: var(--text-primary);
      font-family: 'DM Sans', sans-serif;
      font-size: 14px;
      outline: none;
      cursor: none;
      transition: border-color .2s, box-shadow .2s;
    }

    .proposal-input:focus,
    .proposal-select:focus,
    .proposal-textarea:focus {
      border-color: var(--fire-orange);
      box-shadow: 0 0 0 3px rgba(255, 92, 26, .1);
    }

    .proposal-input::placeholder,
    .proposal-textarea::placeholder {
      color: var(--text-dim);
    }

    .proposal-select {
      appearance: none;
      cursor: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23555' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 14px center;
    }

    .proposal-select option {
      background: var(--card-bg);
    }

    .proposal-textarea {
      resize: vertical;
      min-height: 100px;
      line-height: 1.6;
    }

    .proposal-span2 {
      grid-column: span 2;
    }

    /* ── RESPONSIVE ── */
    @media(max-width:900px) {

      .nav-links,
      .nav-search,
      .nav-actions {
        display: none;
      }

      .hamburger {
        display: flex;
      }

      .footer-grid {
        grid-template-columns: 1fr 1fr;
      }
    }

    @media(max-width:600px) {
      section {
        padding: 56px 20px;
      }

      nav {
        padding: 0 20px;
      }

      .footer-grid {
        grid-template-columns: 1fr;
        gap: 28px;
      }

      footer {
        padding: 48px 20px 28px;
      }

      .chat-win {
        width: calc(100vw - 32px);
        right: 16px;
        bottom: 88px;
      }

      .proposal-grid {
        grid-template-columns: 1fr;
      }

      .proposal-span2 {
        grid-column: span 1;
      }

      .proposal-box {
        padding: 28px 20px;
      }
    }
  </style>
</head>

<body>

  <!-- Cursor (no flame trail) -->
  <div id="cursor-dot"></div>
  <div id="cursor-ring"></div>

  <!-- Ambient fire background canvas -->
  <canvas id="fire-bg-canvas"></canvas>

  <?php include __DIR__ . '/nav.php'; ?>