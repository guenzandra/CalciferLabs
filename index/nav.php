<?php
// nav.php — Reusable Navigation Component for Calcifer Labs
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav id="mainNav">
  <a href="index.php" class="nav-logo">
    <div class="logo-clip">
      <img src="storage/Calcifer Labs flame .png"
        onerror="this.src='storage/Calcifer Labs flame.png'"
        alt="Calcifer Labs">
    </div>
    <div class="nav-brand-text">
      <span class="nav-brand-main">Calcifer</span>
      <span class="nav-brand-sub">Labs</span>
    </div>
  </a>

  <ul class="nav-links">
    <li><a href="#home" <?= ($current_page === 'index.php') ? 'class="active"' : '' ?>>Home</a></li>
    <li class="nav-dropdown-wrap" id="servicesDropdown">
      <a href="#services" class="nav-dropdown-trigger" id="servicesDropdownTrigger">
        Services
        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="6 9 12 15 18 9" />
        </svg>
      </a>
      <div class="nav-dropdown" id="servicesDropdownMenu">
        <a href="services/saas.php" class="nav-dd-item">
          <div class="nav-dd-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
              <path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z" />
            </svg>
          </div>
          <div>
            <div class="nav-dd-label">SaaS Development</div>
            <div class="nav-dd-desc">Cloud platforms &amp; subscription systems</div>
          </div>
        </a>
        <a href="services/ml.php" class="nav-dd-item">
          <div class="nav-dd-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
              <rect x="3" y="3" width="18" height="18" rx="3" />
              <path d="M8 12h8M12 8v8" />
            </svg>
          </div>
          <div>
            <div class="nav-dd-label">Machine Learning &amp; AI</div>
            <div class="nav-dd-desc">ML pipelines &amp; intelligent automation</div>
          </div>
        </a>
        <a href="services/mobile.php" class="nav-dd-item">
          <div class="nav-dd-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
              <rect x="5" y="2" width="14" height="20" rx="2" />
              <line x1="12" y1="18" x2="12.01" y2="18" />
            </svg>
          </div>
          <div>
            <div class="nav-dd-label">Mobile Apps</div>
            <div class="nav-dd-desc">Android &amp; iOS — native &amp; cross-platform</div>
          </div>
        </a>
        <a href="services/ecommerce.php" class="nav-dd-item">
          <div class="nav-dd-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
              <rect x="2" y="7" width="20" height="14" rx="2" />
              <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
            </svg>
          </div>
          <div>
            <div class="nav-dd-label">Ecommerce</div>
            <div class="nav-dd-desc">Stores with payments, inventory &amp; CMS</div>
          </div>
        </a>
        <a href="services/education.php" class="nav-dd-item">
          <div class="nav-dd-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
              <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
              <path d="M6 12v5c3 3 9 3 12 0v-5" />
            </svg>
          </div>
          <div>
            <div class="nav-dd-label">Education Systems</div>
            <div class="nav-dd-desc">School &amp; learning management systems</div>
          </div>
        </a>
        <a href="services/desktop.php" class="nav-dd-item">
          <div class="nav-dd-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
              <rect x="2" y="3" width="20" height="14" rx="2" />
              <path d="M8 21h8M12 17v4" />
            </svg>
          </div>
          <div>
            <div class="nav-dd-label">Desktop Apps</div>
            <div class="nav-dd-desc">Windows, macOS &amp; Linux applications</div>
          </div>
        </a>
        <a href="services/management.php" class="nav-dd-item">
          <div class="nav-dd-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
              <line x1="18" y1="20" x2="18" y2="10" />
              <line x1="12" y1="20" x2="12" y2="4" />
              <line x1="6" y1="20" x2="6" y2="14" />
            </svg>
          </div>
          <div>
            <div class="nav-dd-label">Management &amp; ERP</div>
            <div class="nav-dd-desc">Custom business &amp; enterprise solutions</div>
          </div>
        </a>
        <a href="#services" class="nav-dd-item nav-dd-challenge">
          <div class="nav-dd-icon nav-dd-icon-fire">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" width="16" height="16">
              <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
            </svg>
          </div>
          <div>
            <div class="nav-dd-label" style="color:#f0b429">Open Challenge</div>
            <div class="nav-dd-desc">Something unusual? We don't back down.</div>
          </div>
        </a>
      </div>
    </li>
    <li><a href="#projects">Projects</a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>

  <style>
    .nav-dropdown-wrap {
      position: relative;
    }

    .nav-dropdown-trigger {
      display: flex !important;
      align-items: center;
      gap: 5px;
    }

    .nav-dropdown-trigger svg {
      transition: transform .2s;
      opacity: .5;
    }

    /* Desktop: hover opens dropdown */
    @media (hover: hover) and (pointer: fine) {
      .nav-dropdown-wrap:hover .nav-dropdown-trigger svg {
        transform: rotate(180deg);
        opacity: 1;
      }

      .nav-dropdown-wrap:hover .nav-dropdown {
        opacity: 1;
        pointer-events: auto;
        transform: translateX(-50%) translateY(0);
      }
    }

    /* JS-toggled open class (used for touch/mobile) */
    .nav-dropdown-wrap.dropdown-open .nav-dropdown-trigger svg {
      transform: rotate(180deg);
      opacity: 1;
    }

    .nav-dropdown-wrap.dropdown-open .nav-dropdown {
      opacity: 1;
      pointer-events: auto;
      transform: translateX(-50%) translateY(0);
    }

    .nav-dropdown {
      position: absolute;
      top: calc(100% + 12px);
      left: 50%;
      transform: translateX(-50%);
      width: 480px;
      background: rgba(14, 12, 10, .97);
      border: 1px solid rgba(255, 255, 255, .08);
      border-radius: 16px;
      padding: 12px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2px;
      box-shadow: 0 24px 64px rgba(0, 0, 0, .7), 0 0 0 1px rgba(255, 255, 255, .04);
      backdrop-filter: blur(20px);
      opacity: 0;
      pointer-events: none;
      transform: translateX(-50%) translateY(-8px);
      transition: opacity .2s, transform .2s;
      z-index: 200;
    }

    .nav-dd-item {
      display: flex !important;
      align-items: flex-start;
      gap: 12px;
      padding: 12px 14px !important;
      border-radius: 10px;
      text-decoration: none;
      color: var(--text-primary) !important;
      background: transparent;
      border: none !important;
      cursor: pointer !important;
      transition: background .18s;
      font-size: 14px !important;
      font-weight: 400 !important;
    }

    .nav-dd-item:hover {
      background: rgba(255, 255, 255, .05) !important;
    }

    .nav-dd-icon {
      width: 32px;
      height: 32px;
      border-radius: 8px;
      background: rgba(255, 255, 255, .05);
      border: 1px solid rgba(255, 255, 255, .08);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      color: rgba(245, 243, 239, .6);
      margin-top: 1px;
    }

    .nav-dd-icon-fire {
      background: rgba(255, 180, 40, .1);
      border-color: rgba(255, 180, 40, .2);
      color: #f0b429;
    }

    .nav-dd-label {
      font-family: 'DM Sans', sans-serif;
      font-size: 13px;
      font-weight: 600;
      color: rgba(245, 243, 239, .9);
      margin-bottom: 2px;
    }

    .nav-dd-desc {
      font-size: 11px;
      color: rgba(245, 243, 239, .35);
      line-height: 1.4;
    }

    .nav-dd-challenge {
      grid-column: span 2;
    }

    /* Dropdown arrow pointer */
    .nav-dropdown::before {
      content: '';
      position: absolute;
      top: -6px;
      left: 50%;
      width: 12px;
      height: 12px;
      background: rgba(14, 12, 10, .97);
      border-top: 1px solid rgba(255, 255, 255, .08);
      border-left: 1px solid rgba(255, 255, 255, .08);
      transform: translateX(-50%) rotate(45deg);
    }

    /* ── MOBILE MENU: Services accordion ── */
    .mob-services-toggle {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
      padding: 10px 4px;
      background: none;
      border: none;
      border-bottom: 1px solid var(--border);
      color: var(--text-primary);
      font-family: 'DM Sans', sans-serif;
      font-size: 15px;
      font-weight: 500;
      cursor: pointer !important;
      text-align: left;
      -webkit-tap-highlight-color: rgba(255, 92, 26, 0.15);
    }

    .mob-services-toggle svg {
      transition: transform .25s;
      opacity: .5;
      flex-shrink: 0;
    }

    .mob-services-toggle.open svg {
      transform: rotate(180deg);
      opacity: 1;
    }

    .mob-services-list {
      display: none;
      flex-direction: column;
      gap: 2px;
      padding: 8px 0 4px;
      border-bottom: 1px solid var(--border);
    }

    .mob-services-list.open {
      display: flex;
    }

    .mob-services-item {
      display: flex !important;
      align-items: center;
      gap: 10px;
      padding: 10px 12px;
      border-radius: 10px;
      text-decoration: none;
      color: var(--text-muted) !important;
      font-size: 14px !important;
      font-weight: 500 !important;
      cursor: pointer !important;
      transition: background .15s, color .15s;
      -webkit-tap-highlight-color: rgba(255, 92, 26, 0.1);
    }

    .mob-services-item:hover,
    .mob-services-item:active {
      background: rgba(255, 255, 255, .05);
      color: var(--text-primary) !important;
    }

    .mob-services-item .mob-svc-dot {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: rgba(255, 92, 26, .5);
      flex-shrink: 0;
    }

    .mob-services-item.mob-challenge-item .mob-svc-dot {
      background: #f0b429;
      box-shadow: 0 0 6px #f0b429;
    }

    .mob-services-item.mob-challenge-item {
      color: rgba(240, 180, 41, .8) !important;
    }
  </style>

  <div class="nav-search">
    <span class="search-icon">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--text-dim)" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8" />
        <path d="M21 21l-4.35-4.35" />
      </svg>
    </span>
    <input type="text" placeholder="Search services, projects…">
  </div>

  <div class="nav-actions">
    <a href="login.php" class="btn-ghost" style="font-size:13px;padding:8px 16px;text-decoration:none;">Log In</a>
    <a href="register.php" class="btn-outline-nav" style="font-size:13px;padding:8px 16px;text-decoration:none;border-radius:8px;border:1.5px solid rgba(255,92,26,.4);color:var(--fire-orange);background:rgba(255,92,26,.06);font-family:'DM Sans',sans-serif;font-weight:600;transition:all .2s;white-space:nowrap;">Sign Up</a>
    <button class="btn-fire" onclick="document.getElementById('proposalModal').style.display='flex'">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
      </svg>
      Send Proposal
    </button>
  </div>

  <button class="hamburger" id="hamburger" onclick="toggleMenu()" aria-label="Menu">
    <span></span><span></span><span></span>
  </button>
</nav>

<div class="mobile-menu" id="mobileMenu">
  <a href="#home">Home</a>

  <!-- Services accordion for mobile -->
  <button class="mob-services-toggle" id="mobServicesToggle" onclick="toggleMobServices()">
    Services
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
      <polyline points="6 9 12 15 18 9" />
    </svg>
  </button>
  <div class="mob-services-list" id="mobServicesList">
    <a href="services/saas.php" class="mob-services-item"><span class="mob-svc-dot"></span>SaaS Development</a>
    <a href="services/ml.php" class="mob-services-item"><span class="mob-svc-dot"></span>Machine Learning &amp; AI</a>
    <a href="services/mobile.php" class="mob-services-item"><span class="mob-svc-dot"></span>Mobile Apps</a>
    <a href="services/ecommerce.php" class="mob-services-item"><span class="mob-svc-dot"></span>Ecommerce</a>
    <a href="services/education.php" class="mob-services-item"><span class="mob-svc-dot"></span>Education Systems</a>
    <a href="services/desktop.php" class="mob-services-item"><span class="mob-svc-dot"></span>Desktop Apps</a>
    <a href="services/management.php" class="mob-services-item"><span class="mob-svc-dot"></span>Management &amp; ERP</a>
    <a href="#services" class="mob-services-item mob-challenge-item"><span class="mob-svc-dot"></span>⚡ Open Challenge</a>
  </div>

  <a href="#projects">Projects</a>
  <a href="#about">About</a>
  <a href="#contact">Contact</a>
  <div style="padding:10px 4px">
    <input type="text" style="width:100%;padding:10px 14px;border-radius:10px;background:var(--card-bg);border:1px solid var(--border);color:var(--text-primary);font-size:14px;outline:none;" placeholder="Search…">
  </div>
  <div class="mob-actions" style="margin-top:8px;gap:8px;display:flex;flex-direction:column;">
    <div style="display:flex;gap:8px;">
      <a href="login.php" style="flex:1;text-align:center;padding:10px 0;border-radius:8px;border:1px solid var(--border);color:var(--text-primary);font-family:'DM Sans',sans-serif;font-weight:500;font-size:13px;text-decoration:none;">Log In</a>
      <a href="register.php" style="flex:1;text-align:center;padding:10px 0;border-radius:8px;border:1.5px solid rgba(255,92,26,.4);color:var(--fire-orange);background:rgba(255,92,26,.06);font-family:'DM Sans',sans-serif;font-weight:600;font-size:13px;text-decoration:none;">Sign Up</a>
    </div>
    <button class="btn-fire" style="width:100%;justify-content:center" onclick="document.getElementById('proposalModal').style.display='flex'">Send Proposal</button>
  </div>
</div>

<script>
  /* ── Desktop dropdown: also support click/tap toggle ── */
  (function() {
    const wrap = document.getElementById('servicesDropdown');
    const trigger = document.getElementById('servicesDropdownTrigger');
    if (!wrap || !trigger) return;

    trigger.addEventListener('click', function(e) {
      // Only intercept on touch/non-hover devices
      const isTouch = window.matchMedia('(hover: none)').matches;
      if (!isTouch) return; // let CSS :hover handle it on desktop

      e.preventDefault();
      wrap.classList.toggle('dropdown-open');
    });

    // Close when clicking outside
    document.addEventListener('click', function(e) {
      if (!wrap.contains(e.target)) {
        wrap.classList.remove('dropdown-open');
      }
    });
  })();

  /* ── Mobile: services accordion ── */
  function toggleMobServices() {
    const btn = document.getElementById('mobServicesToggle');
    const list = document.getElementById('mobServicesList');
    if (!btn || !list) return;
    btn.classList.toggle('open');
    list.classList.toggle('open');
  }
</script>