<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="cl-nav" id="cl-nav">
  <div class="nav-inner">
    <a href="index.php" class="nav-logo" aria-label="Calcifer Labs Home">
      <div class="logo-flame">
        <svg width="28" height="34" viewBox="0 0 28 34" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M14 0C14 0 20 6 20 12C20 12 24 8 24 8C24 8 28 16 28 22C28 29.732 21.732 34 14 34C6.268 34 0 29.732 0 22C0 16 4 8 4 8C4 8 8 12 8 12C8 6 14 0 14 0Z" fill="url(#flame-grad)" />
          <ellipse cx="14" cy="24" rx="5" ry="5" fill="url(#core-grad)" opacity="0.9" />
          <defs>
            <linearGradient id="flame-grad" x1="14" y1="0" x2="14" y2="34" gradientUnits="userSpaceOnUse">
              <stop offset="0%" stop-color="#FF6B1A" />
              <stop offset="50%" stop-color="#FF3D00" />
              <stop offset="100%" stop-color="#C62800" />
            </linearGradient>
            <radialGradient id="core-grad" cx="50%" cy="50%" r="50%">
              <stop offset="0%" stop-color="#FFE066" />
              <stop offset="100%" stop-color="#FF9A00" />
            </radialGradient>
          </defs>
        </svg>
      </div>
      <div class="logo-text">
        <span class="logo-name">Calcifer</span>
        <span class="logo-sub">LABS</span>
      </div>
    </a>

    <button class="nav-toggle" id="nav-toggle" aria-label="Toggle menu" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>

    <ul class="nav-links" id="nav-links">
      <li><a href="#services" class="nav-link <?= ($current_page === 'index.php') ? 'active' : '' ?>">Services</a></li>
      <li><a href="#capabilities" class="nav-link">Capabilities</a></li>
      <li><a href="#projects" class="nav-link">Projects</a></li>
      <li><a href="#about" class="nav-link">About</a></li>
      <li>
        <a href="#contact" class="nav-cta">
          <span>Ignite a Project</span>
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
            <path d="M1 7H13M7 1L13 7L7 13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </a>
      </li>
    </ul>
  </div>
</nav>