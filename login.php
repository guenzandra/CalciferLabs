<?php
// login.php — Calcifer Labs Login Page
session_start();
if (isset($_SESSION['user_id'])) {
  header('Location: dashboard.php');
  exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email    = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';
  // TODO: replace with real DB auth
  if (empty($email) || empty($password)) {
    $error = 'Please fill in all fields.';
  } else {
    // Placeholder — swap for real auth logic
    $error = 'Invalid email or password.';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In — Calcifer Labs</title>
  <meta name="description" content="Log in to your Calcifer Labs account.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300&display=swap" rel="stylesheet">

  <style>
    /* ── RESET & BASE ── */
    *,
    *::before,
    *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      height: 100%;
      scroll-behavior: smooth;
    }

    :root {
      --fire-orange: #FF5C1A;
      --fire-amber: #FF9500;
      --fire-yellow: #FFD60A;
      --deep-dark: #060402;
      --card-bg: rgba(255, 255, 255, .035);
      --border: rgba(255, 255, 255, .08);
      --border-fire: rgba(255, 92, 26, .25);
      --text-primary: #F5F3EF;
      --text-muted: rgba(245, 243, 239, .5);
      --text-dim: rgba(245, 243, 239, .25);
      --gradient-fire: linear-gradient(135deg, #FF5C1A, #FF9500, #FFD60A);
      --glow-fire: 0 0 40px rgba(255, 92, 26, .35);
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

    /* ── LOADER OVERLAY ── */
    #loader {
      position: fixed;
      inset: 0;
      z-index: 1000;
      background: #060402;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 32px;
      transition: opacity .6s ease, visibility .6s ease;
    }

    #loader.hide {
      opacity: 0;
      visibility: hidden;
      pointer-events: none;
    }

    /* Loader flame SVG container */
    .loader-flame-wrap {
      position: relative;
      width: 90px;
      height: 120px;
    }

    /* Each flame layer */
    .lflame {
      position: absolute;
      bottom: 0;
      left: 50%;
      transform-origin: center bottom;
      border-radius: 50% 50% 20% 20%;
      animation: flicker-up var(--dur, 1.4s) ease-in-out infinite alternate;
    }

    .lflame:nth-child(1) {
      width: 54px;
      height: 90px;
      background: radial-gradient(ellipse at 50% 100%, #ff2200 0%, #ff6600 40%, transparent 75%);
      margin-left: -27px;
      --dur: 1.2s;
      animation-delay: 0s;
    }

    .lflame:nth-child(2) {
      width: 40px;
      height: 72px;
      background: radial-gradient(ellipse at 50% 100%, #ff8800 0%, #ffbb00 50%, transparent 80%);
      margin-left: -20px;
      --dur: 1.5s;
      animation-delay: -.2s;
    }

    .lflame:nth-child(3) {
      width: 26px;
      height: 52px;
      background: radial-gradient(ellipse at 50% 100%, #ffe040 0%, #fff4a0 60%, transparent 85%);
      margin-left: -13px;
      --dur: 1.0s;
      animation-delay: -.4s;
    }

    /* Ember core */
    .lflame:nth-child(4) {
      width: 14px;
      height: 14px;
      border-radius: 50%;
      background: radial-gradient(circle, #fff 0%, #ffe86e 55%, transparent 100%);
      margin-left: -7px;
      bottom: 6px;
      box-shadow: 0 0 18px 6px rgba(255, 220, 40, .6), 0 0 40px 12px rgba(255, 120, 10, .3);
      animation: pulse-core 1.3s ease-in-out infinite alternate;
    }

    @keyframes flicker-up {
      0% {
        transform: scaleX(1) scaleY(1) rotate(-2deg);
        opacity: .9;
      }

      40% {
        transform: scaleX(.88) scaleY(1.07) rotate(2deg);
        opacity: 1;
      }

      100% {
        transform: scaleX(.94) scaleY(.95) rotate(-1deg);
        opacity: .85;
      }
    }

    @keyframes pulse-core {
      from {
        transform: scale(1);
        opacity: .9;
      }

      to {
        transform: scale(1.3);
        opacity: 1;
      }
    }

    /* Ground glow under flame */
    .loader-glow {
      position: absolute;
      bottom: -18px;
      left: 50%;
      transform: translateX(-50%);
      width: 90px;
      height: 20px;
      border-radius: 50%;
      background: radial-gradient(ellipse, rgba(255, 100, 10, .55) 0%, transparent 75%);
      animation: glow-pulse 1.4s ease-in-out infinite alternate;
    }

    @keyframes glow-pulse {
      from {
        opacity: .6;
        transform: translateX(-50%) scaleX(1);
      }

      to {
        opacity: 1;
        transform: translateX(-50%) scaleX(1.18);
      }
    }

    /* Spark particles */
    .spark {
      position: absolute;
      width: var(--sz, 4px);
      height: var(--sz, 4px);
      border-radius: 50%;
      background: var(--col, #ffcc40);
      box-shadow: 0 0 6px var(--col, #ffcc40);
      bottom: 10px;
      left: 50%;
      animation: spark-fly var(--dur, 1.8s) ease-out infinite;
      animation-delay: var(--delay, 0s);
      opacity: 0;
    }

    @keyframes spark-fly {
      0% {
        opacity: 0;
        transform: translate(-50%, 0) scale(1);
      }

      15% {
        opacity: 1;
      }

      100% {
        opacity: 0;
        transform: translate(calc(-50% + var(--tx, 0px)), var(--ty, -90px)) scale(0);
      }
    }

    /* Loader wordmark */
    .loader-brand {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 6px;
      animation: fade-in .8s .3s ease both;
    }

    .loader-brand-name {
      font-family: 'Syne', sans-serif;
      font-size: 28px;
      font-weight: 800;
      background: var(--gradient-fire);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      letter-spacing: -.01em;
    }

    .loader-brand-sub {
      font-size: 10px;
      font-weight: 600;
      letter-spacing: .32em;
      text-transform: uppercase;
      color: var(--text-dim);
    }

    /* Progress bar */
    .loader-bar-wrap {
      width: 160px;
      height: 2px;
      background: rgba(255, 255, 255, .07);
      border-radius: 2px;
      overflow: hidden;
    }

    .loader-bar {
      height: 100%;
      width: 0%;
      background: var(--gradient-fire);
      border-radius: 2px;
      animation: load-bar 1.8s cubic-bezier(.4, 0, .2, 1) forwards;
      box-shadow: 0 0 8px rgba(255, 92, 26, .6);
    }

    @keyframes load-bar {
      0% {
        width: 0%;
      }

      60% {
        width: 75%;
      }

      85% {
        width: 90%;
      }

      100% {
        width: 100%;
      }
    }

    @keyframes fade-in {
      from {
        opacity: 0;
        transform: translateY(8px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* ── BACKGROUND CANVAS ── */
    #bg-canvas {
      position: fixed;
      inset: 0;
      z-index: 0;
      pointer-events: none;
    }

    /* Noise overlay */
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

    /* ── PAGE LAYOUT ── */
    .page-wrap {
      position: relative;
      z-index: 2;
      width: 100%;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
      opacity: 0;
      animation: page-reveal .8s .1s ease forwards;
    }

    @keyframes page-reveal {
      from {
        opacity: 0;
        transform: translateY(16px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* ── LOGIN CARD ── */
    .login-card {
      width: 100%;
      max-width: 420px;
      background: rgba(255, 255, 255, .032);
      border: 1px solid rgba(255, 255, 255, .07);
      border-radius: 28px;
      padding: 44px 40px 40px;
      backdrop-filter: blur(28px);
      box-shadow:
        0 32px 80px rgba(0, 0, 0, .55),
        0 0 0 1px rgba(255, 92, 26, .06),
        inset 0 1px 0 rgba(255, 255, 255, .06);
      position: relative;
      overflow: hidden;
    }

    /* Subtle fire glow behind card */
    .login-card::before {
      content: '';
      position: absolute;
      bottom: -60px;
      left: 50%;
      transform: translateX(-50%);
      width: 320px;
      height: 200px;
      background: radial-gradient(ellipse, rgba(255, 92, 26, .12) 0%, transparent 70%);
      pointer-events: none;
      z-index: 0;
    }

    /* Top shimmer line */
    .login-card::after {
      content: '';
      position: absolute;
      top: 0;
      left: 10%;
      right: 10%;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(255, 149, 0, .4), transparent);
      border-radius: 1px;
    }

    .card-inner {
      position: relative;
      z-index: 1;
    }

    /* ── CARD HEADER ── */
    .card-header {
      text-align: center;
      margin-bottom: 36px;
    }

    .card-logo {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
      margin-bottom: 28px;
    }

    .card-logo-flame {
      width: 44px;
      height: 44px;
      object-fit: contain;
      filter: drop-shadow(0 0 14px rgba(255, 100, 10, .65));
      transition: filter .3s, transform .3s;
    }

    .card-logo:hover .card-logo-flame {
      filter: drop-shadow(0 0 24px rgba(255, 92, 26, .9));
      transform: scale(1.07) rotate(-4deg);
    }

    .card-logo-text {
      display: flex;
      flex-direction: column;
      line-height: 1;
      gap: 2px;
      text-align: left;
    }

    .card-logo-main {
      font-family: 'Syne', sans-serif;
      font-weight: 800;
      font-size: 20px;
      background: var(--gradient-fire);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .card-logo-sub {
      font-family: 'Syne', sans-serif;
      font-weight: 600;
      font-size: 9px;
      letter-spacing: .28em;
      text-transform: uppercase;
      color: var(--fire-amber);
    }

    .card-title {
      font-family: 'Syne', sans-serif;
      font-size: 26px;
      font-weight: 800;
      color: var(--text-primary);
      margin-bottom: 8px;
      letter-spacing: -.02em;
    }

    .card-subtitle {
      font-size: 14px;
      color: var(--text-muted);
      line-height: 1.6;
    }

    /* ── ERROR ALERT ── */
    .alert-error {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 12px 16px;
      border-radius: 12px;
      background: rgba(239, 68, 68, .1);
      border: 1px solid rgba(239, 68, 68, .25);
      color: #fca5a5;
      font-size: 13px;
      margin-bottom: 20px;
      animation: shake .4s ease;
    }

    @keyframes shake {

      0%,
      100% {
        transform: translateX(0);
      }

      20% {
        transform: translateX(-5px);
      }

      40% {
        transform: translateX(5px);
      }

      60% {
        transform: translateX(-4px);
      }

      80% {
        transform: translateX(3px);
      }
    }

    /* ── FORM ── */
    .login-form {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .field-group {
      display: flex;
      flex-direction: column;
      gap: 7px;
    }

    .field-label {
      font-size: 12px;
      font-weight: 600;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: var(--text-muted);
      padding-left: 2px;
    }

    .field-wrap {
      position: relative;
    }

    .field-icon {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-dim);
      display: flex;
      align-items: center;
      pointer-events: none;
      transition: color .2s;
    }

    .field-input {
      width: 100%;
      padding: 13px 44px 13px 44px;
      border-radius: 12px;
      background: rgba(255, 255, 255, .04);
      border: 1px solid rgba(255, 255, 255, .08);
      color: var(--text-primary);
      font-family: 'DM Sans', sans-serif;
      font-size: 14px;
      outline: none;
      transition: border-color .2s, background .2s, box-shadow .2s;
    }

    .field-input::placeholder {
      color: rgba(245, 243, 239, .22);
    }

    .field-input:focus {
      border-color: var(--fire-orange);
      background: rgba(255, 92, 26, .04);
      box-shadow: 0 0 0 3px rgba(255, 92, 26, .12);
    }

    .field-input:focus+.field-icon,
    .field-wrap:focus-within .field-icon {
      color: var(--fire-amber);
    }

    /* Password toggle */
    .pwd-toggle {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: var(--text-dim);
      cursor: pointer !important;
      display: flex;
      align-items: center;
      padding: 4px;
      border-radius: 6px;
      transition: color .2s;
    }

    .pwd-toggle:hover {
      color: var(--text-muted);
    }

    /* Forgot link */
    .field-meta {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      margin-top: -4px;
    }

    .forgot-link {
      font-size: 12px;
      color: var(--text-dim);
      text-decoration: none;
      transition: color .2s;
    }

    .forgot-link:hover {
      color: var(--fire-amber);
    }

    /* ── SUBMIT BUTTON ── */
    .btn-login {
      width: 100%;
      padding: 14px;
      border-radius: 12px;
      background: var(--gradient-fire);
      border: none;
      color: #000;
      font-family: 'DM Sans', sans-serif;
      font-size: 15px;
      font-weight: 700;
      cursor: pointer !important;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      box-shadow: 0 4px 24px rgba(255, 92, 26, .4);
      transition: opacity .2s, transform .15s, box-shadow .2s;
      margin-top: 6px;
      position: relative;
      overflow: hidden;
    }

    .btn-login::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(120deg, transparent 30%, rgba(255, 255, 255, .18) 50%, transparent 70%);
      transform: translateX(-100%);
      transition: transform .55s ease;
    }

    .btn-login:hover::after {
      transform: translateX(100%);
    }

    .btn-login:hover {
      opacity: .92;
      transform: translateY(-2px);
      box-shadow: 0 8px 32px rgba(255, 92, 26, .55);
    }

    .btn-login:active {
      transform: translateY(0);
    }

    /* Button loading state */
    .btn-login.loading {
      pointer-events: none;
      opacity: .75;
    }

    .btn-login.loading .btn-text {
      opacity: 0;
    }

    .btn-login.loading .btn-spinner {
      display: flex;
    }

    .btn-spinner {
      display: none;
      position: absolute;
      align-items: center;
      gap: 6px;
    }

    .spin-dot {
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: #000;
      animation: spin-bounce .7s ease infinite;
    }

    .spin-dot:nth-child(2) {
      animation-delay: .12s;
    }

    .spin-dot:nth-child(3) {
      animation-delay: .24s;
    }

    @keyframes spin-bounce {

      0%,
      80%,
      100% {
        transform: scale(.6);
        opacity: .4;
      }

      40% {
        transform: scale(1);
        opacity: 1;
      }
    }

    /* ── DIVIDER ── */
    .divider {
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 4px 0;
    }

    .divider-line {
      flex: 1;
      height: 1px;
      background: rgba(255, 255, 255, .07);
    }

    .divider-text {
      font-size: 11px;
      color: var(--text-dim);
      letter-spacing: .08em;
      text-transform: uppercase;
    }

    /* ── SOCIAL LOGIN ── */
    .social-row {
      display: flex;
      gap: 10px;
    }

    .btn-social {
      flex: 1;
      padding: 11px 0;
      border-radius: 10px;
      background: rgba(255, 255, 255, .04);
      border: 1px solid rgba(255, 255, 255, .08);
      color: var(--text-muted);
      font-family: 'DM Sans', sans-serif;
      font-size: 13px;
      font-weight: 500;
      cursor: pointer !important;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      transition: background .2s, border-color .2s, color .2s, transform .15s;
    }

    .btn-social:hover {
      background: rgba(255, 255, 255, .08);
      border-color: rgba(255, 255, 255, .16);
      color: var(--text-primary);
      transform: translateY(-1px);
    }

    /* ── FOOTER NOTE ── */
    .card-footer-note {
      text-align: center;
      font-size: 13px;
      color: var(--text-dim);
      margin-top: 28px;
    }

    .card-footer-note a {
      color: var(--fire-orange);
      text-decoration: none;
      font-weight: 600;
      transition: color .2s;
    }

    .card-footer-note a:hover {
      color: var(--fire-amber);
    }

    /* ── SPLIT LAYOUT PANEL (desktop) ── */
    .login-split {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 0;
      width: 100%;
      max-width: 900px;
      min-height: 600px;
      border-radius: 32px;
      overflow: hidden;
      box-shadow: 0 40px 100px rgba(0, 0, 0, .65), 0 0 0 1px rgba(255, 92, 26, .08);
    }

    /* Left decorative panel */
    .login-panel-left {
      background: linear-gradient(160deg, #0e0805 0%, #1a0c06 40%, #0d0804 100%);
      border-right: 1px solid rgba(255, 92, 26, .12);
      position: relative;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 48px 40px;
      gap: 32px;
    }

    /* Radial fire glow */
    .panel-glow {
      position: absolute;
      bottom: -40px;
      left: 50%;
      transform: translateX(-50%);
      width: 350px;
      height: 350px;
      background: radial-gradient(ellipse, rgba(255, 92, 26, .18) 0%, rgba(255, 60, 0, .06) 45%, transparent 70%);
      pointer-events: none;
    }

    /* Grid lines */
    .panel-grid {
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(rgba(255, 255, 255, .018) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 255, 255, .018) 1px, transparent 1px);
      background-size: 48px 48px;
      mask-image: radial-gradient(ellipse 80% 80% at 50% 60%, black 20%, transparent 75%);
    }

    /* Floating orbs */
    .panel-orb {
      position: absolute;
      border-radius: 50%;
      filter: blur(40px);
      pointer-events: none;
    }

    .panel-orb-1 {
      width: 200px;
      height: 200px;
      background: rgba(255, 92, 26, .09);
      top: -40px;
      right: -60px;
      animation: orb-float 7s ease-in-out infinite alternate;
    }

    .panel-orb-2 {
      width: 140px;
      height: 140px;
      background: rgba(255, 180, 30, .07);
      bottom: 40px;
      left: -30px;
      animation: orb-float 9s ease-in-out infinite alternate-reverse;
    }

    @keyframes orb-float {
      from {
        transform: translateY(0) scale(1);
      }

      to {
        transform: translateY(-20px) scale(1.08);
      }
    }

    .panel-content {
      position: relative;
      z-index: 1;
      text-align: center;
    }

    /* Animated flame icon */
    .panel-flame-wrap {
      position: relative;
      width: 80px;
      height: 100px;
      margin: 0 auto 28px;
    }

    .pf {
      position: absolute;
      bottom: 0;
      left: 50%;
      transform-origin: center bottom;
      border-radius: 50% 50% 20% 20%;
      animation: pf-flicker var(--d, 1.4s) ease-in-out infinite alternate;
    }

    .pf:nth-child(1) {
      width: 50px;
      height: 80px;
      margin-left: -25px;
      background: radial-gradient(ellipse at 50% 100%, #c81a00 0%, #ff4400 45%, transparent 80%);
      --d: 1.3s;
    }

    .pf:nth-child(2) {
      width: 36px;
      height: 64px;
      margin-left: -18px;
      background: radial-gradient(ellipse at 50% 100%, #ff6600 0%, #ffaa00 55%, transparent 82%);
      --d: 1.6s;
      animation-delay: -.2s;
    }

    .pf:nth-child(3) {
      width: 22px;
      height: 46px;
      margin-left: -11px;
      background: radial-gradient(ellipse at 50% 100%, #ffcc20 0%, #fff480 65%, transparent 88%);
      --d: 1.1s;
      animation-delay: -.35s;
    }

    .pf:nth-child(4) {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      margin-left: -5px;
      bottom: 8px;
      background: radial-gradient(circle, #fff 0%, #ffe870 60%, transparent 100%);
      box-shadow: 0 0 14px 4px rgba(255, 220, 40, .7);
      animation: pf-core 1.2s ease-in-out infinite alternate;
    }

    @keyframes pf-flicker {
      0% {
        transform: scaleX(1) scaleY(1) rotate(-2deg);
        opacity: .9;
      }

      50% {
        transform: scaleX(.9) scaleY(1.06) rotate(2deg);
        opacity: 1;
      }

      100% {
        transform: scaleX(.95) scaleY(.94) rotate(-1deg);
        opacity: .85;
      }
    }

    @keyframes pf-core {
      from {
        transform: scale(1);
        box-shadow: 0 0 14px 4px rgba(255, 220, 40, .6);
      }

      to {
        transform: scale(1.4);
        box-shadow: 0 0 20px 8px rgba(255, 220, 40, .8);
      }
    }

    .panel-tagline {
      font-family: 'Syne', sans-serif;
      font-size: 22px;
      font-weight: 800;
      line-height: 1.2;
      margin-bottom: 12px;
      color: #f0ece4;
    }

    .panel-tagline span {
      background: var(--gradient-fire);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .panel-desc {
      font-size: 13px;
      color: rgba(245, 243, 239, .45);
      line-height: 1.7;
      max-width: 260px;
      margin: 0 auto 28px;
    }

    /* Stat chips */
    .panel-stats {
      display: flex;
      flex-direction: column;
      gap: 10px;
      width: 100%;
      max-width: 260px;
    }

    .panel-stat {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 11px 16px;
      border-radius: 12px;
      background: rgba(255, 255, 255, .03);
      border: 1px solid rgba(255, 92, 26, .1);
      text-align: left;
    }

    .panel-stat-icon {
      width: 32px;
      height: 32px;
      border-radius: 8px;
      background: rgba(255, 92, 26, .1);
      border: 1px solid rgba(255, 92, 26, .2);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      color: var(--fire-amber);
    }

    .panel-stat-num {
      font-family: 'Syne', sans-serif;
      font-size: 16px;
      font-weight: 800;
      background: var(--gradient-fire);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      line-height: 1;
    }

    .panel-stat-label {
      font-size: 11px;
      color: rgba(245, 243, 239, .35);
      letter-spacing: .04em;
    }

    /* Right panel = login card */
    .login-panel-right {
      background: rgba(8, 5, 3, .92);
      backdrop-filter: blur(28px);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 48px 44px;
    }

    .login-panel-right .login-card {
      max-width: 100%;
      background: transparent;
      border: none;
      border-radius: 0;
      padding: 0;
      backdrop-filter: none;
      box-shadow: none;
    }

    .login-panel-right .login-card::before,
    .login-panel-right .login-card::after {
      display: none;
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 720px) {
      .login-split {
        grid-template-columns: 1fr;
        max-width: 420px;
        border-radius: 28px;
      }

      .login-panel-left {
        display: none;
      }

      .login-panel-right {
        padding: 44px 32px;
        background: rgba(255, 255, 255, .032);
        border: 1px solid rgba(255, 255, 255, .07);
        border-radius: 28px;
        backdrop-filter: blur(28px);
        box-shadow:
          0 32px 80px rgba(0, 0, 0, .55),
          0 0 0 1px rgba(255, 92, 26, .06),
          inset 0 1px 0 rgba(255, 255, 255, .06);
      }

      .login-panel-right .login-card {
        background: transparent;
        border: none;
        padding: 0;
        box-shadow: none;
      }
    }

    @media (max-width: 480px) {
      .login-panel-right {
        padding: 36px 24px;
      }

      .card-title {
        font-size: 22px;
      }
    }
  </style>
</head>

<body>

  <!-- ══ LOADER ══ -->
  <div id="loader">
    <div class="loader-flame-wrap">
      <div class="lflame"></div>
      <div class="lflame"></div>
      <div class="lflame"></div>
      <div class="lflame"></div>
      <div class="loader-glow"></div>
      <!-- Sparks -->
      <div class="spark" style="--tx:-22px;--ty:-100px;--dur:1.6s;--delay:0s;   --sz:4px;--col:#ffcc40;"></div>
      <div class="spark" style="--tx: 18px;--ty:-85px; --dur:1.9s;--delay:.3s;  --sz:3px;--col:#ff9500;"></div>
      <div class="spark" style="--tx:-8px; --ty:-120px;--dur:2.1s;--delay:.6s;  --sz:3px;--col:#ffe060;"></div>
      <div class="spark" style="--tx: 28px;--ty:-95px; --dur:1.7s;--delay:.15s; --sz:4px;--col:#ff7020;"></div>
      <div class="spark" style="--tx:-30px;--ty:-78px; --dur:2.3s;--delay:.45s; --sz:3px;--col:#ffcc40;"></div>
      <div class="spark" style="--tx: 10px;--ty:-110px;--dur:1.5s;--delay:.75s; --sz:2px;--col:#fff090;"></div>
    </div>
    <div class="loader-brand">
      <span class="loader-brand-name">Calcifer Labs</span>
      <span class="loader-brand-sub">Fueling your dreams</span>
    </div>
    <div class="loader-bar-wrap">
      <div class="loader-bar"></div>
    </div>
  </div>

  <!-- ══ BG CANVAS ══ -->
  <canvas id="bg-canvas"></canvas>

  <!-- ══ PAGE ══ -->
  <div class="page-wrap">
    <div class="login-split">

      <!-- Left decorative panel -->
      <div class="login-panel-left">
        <div class="panel-orb panel-orb-1"></div>
        <div class="panel-orb panel-orb-2"></div>
        <div class="panel-grid"></div>
        <div class="panel-glow"></div>

        <div class="panel-content">
          <div class="panel-flame-wrap">
            <div class="pf"></div>
            <div class="pf"></div>
            <div class="pf"></div>
            <div class="pf"></div>
          </div>
          <h2 class="panel-tagline">Welcome back to<br><span>Calcifer Labs</span></h2>
          <p class="panel-desc">Your project dashboard, proposal tracker, and direct line to our team — all in one place.</p>
          <div class="panel-stats">
            <div class="panel-stat">
              <div class="panel-stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
                  <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
                </svg>
              </div>
              <div>
                <div class="panel-stat-num">50+</div>
                <div class="panel-stat-label">Projects delivered</div>
              </div>
            </div>
            <div class="panel-stat">
              <div class="panel-stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
                  <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                </svg>
              </div>
              <div>
                <div class="panel-stat-num">100%</div>
                <div class="panel-stat-label">Challenges accepted</div>
              </div>
            </div>
            <div class="panel-stat">
              <div class="panel-stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
                  <circle cx="12" cy="12" r="10" />
                  <polyline points="12 6 12 12 16 14" />
                </svg>
              </div>
              <div>
                <div class="panel-stat-num">24h</div>
                <div class="panel-stat-label">Response time</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right: login form -->
      <div class="login-panel-right">
        <div class="login-card">
          <div class="card-inner">

            <div class="card-header">
              <a href="index.php" class="card-logo">
                <img src="storage/Calcifer Labs flame .png"
                  onerror="this.src='storage/Calcifer Labs flame.png'"
                  alt="Calcifer Labs"
                  class="card-logo-flame">
                <div class="card-logo-text">
                  <span class="card-logo-main">Calcifer</span>
                  <span class="card-logo-sub">Labs</span>
                </div>
              </a>
              <h1 class="card-title">Log in</h1>
              <p class="card-subtitle">Good to have you back. Let's build something.</p>
            </div>

            <?php if ($error): ?>
              <div class="alert-error">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" style="flex-shrink:0">
                  <circle cx="12" cy="12" r="10" />
                  <line x1="12" y1="8" x2="12" y2="12" />
                  <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
                <?= htmlspecialchars($error) ?>
              </div>
            <?php endif; ?>

            <form class="login-form" method="POST" action="login.php" id="loginForm" onsubmit="handleSubmit(event)">

              <div class="field-group">
                <label class="field-label" for="email">Email address</label>
                <div class="field-wrap">
                  <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                    <polyline points="22,6 12,13 2,6" />
                  </svg>
                  <input
                    class="field-input"
                    type="email"
                    id="email"
                    name="email"
                    placeholder="you@example.com"
                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                    autocomplete="email"
                    required>
                </div>
              </div>

              <div class="field-group">
                <label class="field-label" for="password">Password</label>
                <div class="field-wrap">
                  <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                  </svg>
                  <input
                    class="field-input"
                    type="password"
                    id="password"
                    name="password"
                    placeholder="••••••••"
                    autocomplete="current-password"
                    required>
                  <button type="button" class="pwd-toggle" id="pwdToggle" onclick="togglePwd()" aria-label="Show password">
                    <svg id="eye-show" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
                      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                      <circle cx="12" cy="12" r="3" />
                    </svg>
                    <svg id="eye-hide" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" style="display:none">
                      <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24" />
                      <line x1="1" y1="1" x2="23" y2="23" />
                    </svg>
                  </button>
                </div>
              </div>

              <div class="field-meta">
                <a href="forgot-password.php" class="forgot-link">Forgot password?</a>
              </div>

              <button type="submit" class="btn-login" id="loginBtn">
                <span class="btn-text" style="display:flex;align-items:center;gap:8px;">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
                    <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
                  </svg>
                  Log In
                </span>
                <span class="btn-spinner">
                  <span class="spin-dot"></span>
                  <span class="spin-dot"></span>
                  <span class="spin-dot"></span>
                </span>
              </button>

            </form>

            <div class="divider" style="margin-top:22px;">
              <div class="divider-line"></div>
              <span class="divider-text">or continue with</span>
              <div class="divider-line"></div>
            </div>

            <div class="social-row" style="margin-top:14px;">
              <button class="btn-social" onclick="alert('Google login coming soon!')">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none">
                  <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4" />
                  <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853" />
                  <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05" />
                  <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335" />
                </svg>
                Google
              </button>
              <button class="btn-social" onclick="alert('GitHub login coming soon!')">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
                  <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22" />
                </svg>
                GitHub
              </button>
            </div>

            <p class="card-footer-note">
              Don't have an account? <a href="register.php">Sign up free</a>
            </p>

          </div>
        </div>
      </div>

    </div>
  </div>

  <script>
    /* ══ LOADER ══ */
    window.addEventListener('load', () => {
      // Minimum display time so the animation actually plays
      setTimeout(() => {
        document.getElementById('loader').classList.add('hide');
      }, 2000);
    });

    /* ══ BACKGROUND — ambient fire sky (lighter version of index.php) ══ */
    (function() {
      const canvas = document.getElementById('bg-canvas');
      const ctx = canvas.getContext('2d');
      let W, H, t = 0;

      function resize() {
        W = canvas.width = window.innerWidth;
        H = canvas.height = window.innerHeight;
      }
      resize();
      window.addEventListener('resize', resize);

      // Stars
      const stars = Array.from({
        length: 120
      }, () => ({
        x: Math.random(),
        y: Math.random() * .65,
        r: Math.random() * 1.2 + .25,
        tw: Math.random() * Math.PI * 2,
        spd: .006 + Math.random() * .01,
      }));

      // Hills
      const hillLayers = [{
          y: .82,
          amp: .06,
          freq: .003,
          spd: .00004,
          col: [8, 6, 4],
          a: .5
        },
        {
          y: .87,
          amp: .04,
          freq: .005,
          spd: .00007,
          col: [12, 9, 6],
          a: .7
        },
        {
          y: .91,
          amp: .025,
          freq: .008,
          spd: .0001,
          col: [16, 12, 8],
          a: .85
        },
        {
          y: .945,
          amp: .01,
          freq: .012,
          spd: .00013,
          col: [20, 15, 10],
          a: 1
        },
      ];

      function loop() {
        t++;
        ctx.clearRect(0, 0, W, H);

        // Sky gradient
        const sky = ctx.createLinearGradient(0, 0, 0, H);
        sky.addColorStop(0, '#04030a');
        sky.addColorStop(.3, '#080514');
        sky.addColorStop(.6, '#10080a');
        sky.addColorStop(.85, '#1a0d07');
        sky.addColorStop(1, '#0e0703');
        ctx.fillStyle = sky;
        ctx.fillRect(0, 0, W, H);

        // Stars
        ctx.globalCompositeOperation = 'screen';
        stars.forEach(s => {
          s.tw += s.spd;
          const a = .25 + .45 * Math.abs(Math.sin(s.tw));
          ctx.beginPath();
          ctx.arc(s.x * W, s.y * H, s.r, 0, Math.PI * 2);
          ctx.fillStyle = `rgba(255,248,230,${a})`;
          ctx.fill();
        });

        // Calcifer bottom glow
        ctx.globalCompositeOperation = 'screen';
        const cx = W * .5,
          cy = H * 1.05;
        const pulse = 1 + .05 * Math.sin(t * .03);
        const bg = ctx.createRadialGradient(cx, cy, 0, cx, cy, Math.min(W, H) * .5 * pulse);
        bg.addColorStop(0, 'rgba(255,110,18,.10)');
        bg.addColorStop(.3, 'rgba(255,70,8,.06)');
        bg.addColorStop(.65, 'rgba(180,40,0,.025)');
        bg.addColorStop(1, 'rgba(0,0,0,0)');
        ctx.beginPath();
        ctx.arc(cx, cy, Math.min(W, H) * .5 * pulse, 0, Math.PI * 2);
        ctx.fillStyle = bg;
        ctx.fill();

        // Hills
        ctx.globalCompositeOperation = 'source-over';
        hillLayers.forEach(l => {
          l._off = (l._off || 0) + l.spd * 60;
          ctx.beginPath();
          ctx.moveTo(0, H);
          for (let x = 0; x <= W; x += 4) {
            const y = l.y * H +
              Math.sin(x * l.freq + l._off) * l.amp * H +
              Math.sin(x * l.freq * 2.3 + l._off * 1.4) * l.amp * .4 * H;
            x === 0 ? ctx.moveTo(x, y) : ctx.lineTo(x, y);
          }
          ctx.lineTo(W, H);
          ctx.closePath();
          ctx.fillStyle = `rgba(${l.col[0]},${l.col[1]},${l.col[2]},${l.a})`;
          ctx.fill();
        });

        requestAnimationFrame(loop);
      }
      loop();
    })();

    /* ══ PASSWORD TOGGLE ══ */
    function togglePwd() {
      const inp = document.getElementById('password');
      const show = document.getElementById('eye-show');
      const hide = document.getElementById('eye-hide');
      const isHidden = inp.type === 'password';
      inp.type = isHidden ? 'text' : 'password';
      show.style.display = isHidden ? 'none' : 'block';
      hide.style.display = isHidden ? 'block' : 'none';
    }

    /* ══ FORM SUBMIT (loading state) ══ */
    function handleSubmit(e) {
      const btn = document.getElementById('loginBtn');
      btn.classList.add('loading');
      // Let the form submit naturally — PHP handles it
      // If you want AJAX swap: e.preventDefault() and fetch here
    }
  </script>

</body>

</html>