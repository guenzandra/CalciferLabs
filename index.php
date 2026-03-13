<?php
$page_title = "We Build Your Dreams";
$page_desc = "Calcifer Labs builds powerful SaaS, ML integrations, mobile & standalone apps, ecommerce, school and learning management systems. We fuel your fire.";
include 'index/layout.php';
?>

<style>
  /* ============================================
     INDEX.PHP — PAGE-SPECIFIC STYLES
     ============================================ */

  /* ─── Hero ─── */
  .hero {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    overflow: hidden;
    padding-top: 72px;
  }

  /* Background forge effect */
  .hero-bg {
    position: absolute;
    inset: 0;
    z-index: 0;
  }

  .hero-bg-grid {
    position: absolute;
    inset: 0;
    background-image:
      linear-gradient(rgba(255,107,26,0.04) 1px, transparent 1px),
      linear-gradient(90deg, rgba(255,107,26,0.04) 1px, transparent 1px);
    background-size: 60px 60px;
    mask-image: radial-gradient(ellipse 70% 60% at 60% 40%, black 20%, transparent 80%);
  }

  .hero-bg-glow {
    position: absolute;
    width: 700px; height: 700px;
    background: radial-gradient(circle, rgba(255,61,0,0.12) 0%, rgba(255,107,26,0.06) 35%, transparent 70%);
    right: -100px; top: 50%;
    transform: translateY(-50%);
    animation: pulse-glow 4s ease-in-out infinite alternate;
    border-radius: 50%;
  }

  .hero-bg-glow-2 {
    position: absolute;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(255,179,71,0.08) 0%, transparent 70%);
    left: 10%; bottom: 10%;
    animation: pulse-glow 6s ease-in-out 2s infinite alternate;
    border-radius: 50%;
  }

  @keyframes pulse-glow {
    0%   { opacity: 0.6; transform: translateY(-50%) scale(1); }
    100% { opacity: 1;   transform: translateY(-50%) scale(1.08); }
  }

  /* Decorative vertical lines */
  .hero-bg-lines {
    position: absolute;
    top: 0; right: 20%;
    width: 1px; height: 100%;
    background: linear-gradient(180deg, transparent, rgba(255,107,26,0.2) 30%, rgba(255,107,26,0.1) 70%, transparent);
  }

  .hero-content {
    position: relative;
    z-index: 2;
    padding: var(--section-pad) 0;
    max-width: 780px;
  }

  .hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 32px;
    opacity: 0;
    animation: slide-up 0.8s var(--ease-smooth) 0.2s forwards;
  }

  .hero-eyebrow-dot {
    width: 8px; height: 8px;
    background: var(--flame-core);
    border-radius: 50%;
    box-shadow: 0 0 10px var(--flame-core);
    animation: blink 2s ease-in-out infinite;
  }

  @keyframes blink {
    0%, 100% { opacity: 1; }
    50%       { opacity: 0.3; }
  }

  .hero-eyebrow-text {
    font-family: var(--font-display);
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--flame-core);
  }

  .hero-eyebrow-line {
    width: 40px; height: 1px;
    background: var(--flame-core);
    opacity: 0.5;
  }

  .hero-title {
    font-size: clamp(3rem, 7vw, 6rem);
    font-weight: 800;
    color: var(--white);
    line-height: 1.0;
    margin-bottom: 24px;
    opacity: 0;
    animation: slide-up 0.8s var(--ease-smooth) 0.4s forwards;
  }

  .hero-title .line-2 {
    display: block;
    color: var(--ash);
    font-weight: 400;
    font-style: italic;
    font-size: 0.65em;
    letter-spacing: -0.01em;
    margin-top: 4px;
  }

  .hero-title .flame-word {
    position: relative;
    display: inline-block;
  }

  .hero-title .flame-word::after {
    content: '';
    position: absolute;
    bottom: -4px; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--flame-ember), var(--gold), transparent);
  }

  .hero-desc {
    font-size: clamp(1rem, 2vw, 1.15rem);
    line-height: 1.75;
    color: var(--ash);
    max-width: 560px;
    margin-bottom: 44px;
    opacity: 0;
    animation: slide-up 0.8s var(--ease-smooth) 0.6s forwards;
  }

  .hero-actions {
    display: flex;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
    opacity: 0;
    animation: slide-up 0.8s var(--ease-smooth) 0.8s forwards;
  }

  .hero-stats {
    display: flex;
    gap: 48px;
    margin-top: 72px;
    padding-top: 40px;
    border-top: 1px solid var(--coal);
    opacity: 0;
    animation: slide-up 0.8s var(--ease-smooth) 1s forwards;
    flex-wrap: wrap;
    gap: 40px;
  }

  .stat-item {}

  .stat-num {
    font-family: var(--font-display);
    font-size: 2rem;
    font-weight: 800;
    color: var(--white);
    line-height: 1;
    display: flex;
    align-items: baseline;
    gap: 4px;
  }

  .stat-num sup {
    font-size: 1rem;
    color: var(--flame-core);
  }

  .stat-label {
    font-size: 0.78rem;
    color: var(--ash);
    margin-top: 6px;
    letter-spacing: 0.05em;
  }

  /* Scroll indicator */
  .scroll-hint {
    position: absolute;
    bottom: 40px; left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    opacity: 0;
    animation: fade-in 1s ease 1.5s forwards;
    z-index: 2;
  }

  .scroll-hint-text {
    font-size: 0.65rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--smoke);
    font-family: var(--font-display);
  }

  .scroll-hint-bar {
    width: 1px; height: 48px;
    background: linear-gradient(180deg, var(--flame-core), transparent);
    animation: scroll-bar 2s ease-in-out infinite;
  }

  @keyframes scroll-bar {
    0%, 100% { opacity: 0.3; transform: scaleY(1); }
    50%       { opacity: 1;   transform: scaleY(1.1); }
  }

  @keyframes slide-up {
    from { opacity: 0; transform: translateY(24px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  @keyframes fade-in {
    to { opacity: 1; }
  }

  /* ─── Marquee Strip ─── */
  .marquee-strip {
    background: var(--coal);
    border-top: 1px solid var(--ember);
    border-bottom: 1px solid var(--ember);
    padding: 14px 0;
    overflow: hidden;
  }

  .marquee-track {
    display: flex;
    gap: 0;
    width: max-content;
    animation: marquee 30s linear infinite;
  }

  .marquee-track:hover { animation-play-state: paused; }

  @keyframes marquee {
    from { transform: translateX(0); }
    to   { transform: translateX(-50%); }
  }

  .marquee-item {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 0 40px;
    font-family: var(--font-display);
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--ash);
    white-space: nowrap;
    transition: color 0.2s;
  }

  .marquee-sep {
    color: var(--flame-core);
    font-size: 0.9rem;
  }

  /* ─── Services Section ─── */
  .services {
    padding: var(--section-pad) 0;
    position: relative;
  }

  .services-header {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: end;
    margin-bottom: 72px;
  }

  .services-title {
    font-size: clamp(2.2rem, 4vw, 3.5rem);
    font-weight: 800;
    color: var(--white);
  }

  .services-intro {
    font-size: 1rem;
    line-height: 1.8;
    color: var(--ash);
  }

  .services-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1px;
    background: var(--coal);
    border: 1px solid var(--coal);
  }

  .service-card {
    background: var(--forge);
    padding: 36px 28px;
    position: relative;
    overflow: hidden;
    transition: background 0.35s;
    cursor: default;
  }

  .service-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255,107,26,0.06), transparent 60%);
    opacity: 0;
    transition: opacity 0.35s;
  }

  .service-card::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--flame-ember), var(--gold), transparent);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.45s var(--ease-fire);
  }

  .service-card:hover { background: var(--coal); }
  .service-card:hover::before { opacity: 1; }
  .service-card:hover::after { transform: scaleX(1); }

  .service-card:hover .service-icon {
    color: var(--flame-core);
    filter: drop-shadow(0 0 8px rgba(255,107,26,0.4));
    transform: scale(1.1);
  }

  .service-icon {
    font-size: 2rem;
    margin-bottom: 20px;
    transition: all 0.35s var(--ease-fire);
    display: block;
    color: var(--smoke);
  }

  .service-num {
    position: absolute;
    top: 28px; right: 28px;
    font-family: var(--font-display);
    font-size: 0.65rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    color: var(--ember);
  }

  .service-name {
    font-family: var(--font-display);
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--pale);
    margin-bottom: 10px;
    letter-spacing: -0.01em;
  }

  .service-desc {
    font-size: 0.82rem;
    color: var(--ash);
    line-height: 1.65;
  }

  /* ─── Capabilities / Feature ─── */
  .capabilities {
    padding: var(--section-pad) 0;
    background: var(--forge);
    border-top: 1px solid var(--coal);
    border-bottom: 1px solid var(--coal);
  }

  .cap-inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 100px;
    align-items: center;
  }

  .cap-title {
    font-size: clamp(2rem, 3.5vw, 3rem);
    font-weight: 800;
    color: var(--white);
    margin-bottom: 20px;
  }

  .cap-desc {
    font-size: 1rem;
    line-height: 1.8;
    color: var(--ash);
    margin-bottom: 36px;
  }

  .cap-list {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 16px;
  }

  .cap-item {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    padding: 16px 20px;
    background: var(--coal);
    border-left: 2px solid transparent;
    transition: border-color 0.3s, background 0.3s;
  }

  .cap-item:hover {
    border-left-color: var(--flame-core);
    background: var(--ember);
  }

  .cap-item-icon {
    color: var(--flame-core);
    font-size: 1.1rem;
    margin-top: 1px;
    flex-shrink: 0;
  }

  .cap-item-text {}
  .cap-item-name {
    font-family: var(--font-display);
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--pale);
    margin-bottom: 4px;
  }

  .cap-item-sub {
    font-size: 0.8rem;
    color: var(--ash);
  }

  /* Forge visual */
  .cap-visual {
    position: relative;
  }

  .forge-frame {
    aspect-ratio: 4/5;
    max-height: 520px;
    background: var(--coal);
    border: 1px solid var(--ember);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    clip-path: polygon(0 0, calc(100% - 24px) 0, 100% 24px, 100% 100%, 24px 100%, 0 calc(100% - 24px));
  }

  .forge-frame-inner {
    position: relative;
    z-index: 2;
    text-align: center;
    padding: 40px;
  }

  .forge-big-flame {
    font-size: 5rem;
    display: block;
    filter: drop-shadow(0 0 24px rgba(255,107,26,0.6));
    animation: forge-pulse 2.5s ease-in-out infinite alternate;
  }

  @keyframes forge-pulse {
    0%   { transform: scaleY(1) rotate(-2deg);   filter: drop-shadow(0 0 16px rgba(255,107,26,0.4)); }
    100% { transform: scaleY(1.05) rotate(2deg); filter: drop-shadow(0 0 40px rgba(255,107,26,0.8)); }
  }

  .forge-label {
    font-family: var(--font-display);
    font-size: 0.7rem;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: var(--flame-core);
    margin-top: 20px;
    display: block;
  }

  .forge-frame::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 50% 60%, rgba(255,61,0,0.15), transparent 70%);
    animation: forge-glow 3s ease-in-out infinite alternate;
  }

  @keyframes forge-glow {
    0%   { opacity: 0.5; }
    100% { opacity: 1; }
  }

  /* Floating tech tags */
  .forge-tags {
    position: absolute;
    inset: 0;
    z-index: 3;
    pointer-events: none;
  }

  .forge-tag {
    position: absolute;
    background: rgba(26, 26, 31, 0.9);
    border: 1px solid var(--ember);
    padding: 6px 12px;
    font-family: var(--font-display);
    font-size: 0.65rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    color: var(--flame-core);
    animation: float-tag 4s ease-in-out infinite alternate;
  }

  .forge-tag:nth-child(1) { top: 12%; left: 5%; animation-delay: 0s; }
  .forge-tag:nth-child(2) { top: 20%; right: 5%; animation-delay: 0.8s; }
  .forge-tag:nth-child(3) { bottom: 25%; left: 5%; animation-delay: 1.4s; }
  .forge-tag:nth-child(4) { bottom: 15%; right: 5%; animation-delay: 0.4s; }

  @keyframes float-tag {
    0%   { transform: translateY(0px); }
    100% { transform: translateY(-8px); }
  }

  /* ─── Challenge Banner ─── */
  .challenge {
    padding: var(--section-pad) 0;
    position: relative;
    overflow: hidden;
  }

  .challenge-inner {
    position: relative;
    background: var(--coal);
    border: 1px solid var(--ember);
    padding: clamp(48px, 7vw, 80px) clamp(32px, 6vw, 80px);
    text-align: center;
    overflow: hidden;
    clip-path: polygon(0 0, calc(100% - 28px) 0, 100% 28px, 100% 100%, 28px 100%, 0 calc(100% - 28px));
  }

  .challenge-glow {
    position: absolute;
    width: 500px; height: 300px;
    background: radial-gradient(ellipse, rgba(255,61,0,0.2), transparent 70%);
    left: 50%; top: 50%;
    transform: translate(-50%, -50%);
    pointer-events: none;
  }

  .challenge-icon {
    font-size: 3.5rem;
    display: block;
    margin: 0 auto 24px;
    position: relative;
    z-index: 1;
    filter: drop-shadow(0 0 20px rgba(255,107,26,0.5));
  }

  .challenge-title {
    font-size: clamp(2rem, 4vw, 3.2rem);
    font-weight: 800;
    color: var(--white);
    margin-bottom: 16px;
    position: relative;
    z-index: 1;
  }

  .challenge-desc {
    font-size: 1.05rem;
    color: var(--ash);
    max-width: 540px;
    margin: 0 auto 40px;
    line-height: 1.75;
    position: relative;
    z-index: 1;
  }

  .challenge-actions {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
    flex-wrap: wrap;
    position: relative;
    z-index: 1;
  }

  /* ─── Industries ─── */
  .industries {
    padding: var(--section-pad) 0;
    background: var(--forge);
    border-top: 1px solid var(--coal);
  }

  .industries-header {
    text-align: center;
    margin-bottom: 64px;
  }

  .industries-title {
    font-size: clamp(2rem, 3.5vw, 3rem);
    font-weight: 800;
    color: var(--white);
    margin-bottom: 16px;
  }

  .industries-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
  }

  .industry-card {
    background: var(--coal);
    border: 1px solid var(--ember);
    padding: 32px;
    position: relative;
    overflow: hidden;
    transition: all 0.35s var(--ease-smooth);
    clip-path: polygon(0 0, calc(100% - 16px) 0, 100% 16px, 100% 100%, 0 100%);
  }

  .industry-card:hover {
    border-color: var(--flame-core);
    transform: translateY(-4px);
    box-shadow: var(--glow-sm), 0 20px 40px rgba(0,0,0,0.4);
  }

  .industry-card:hover .industry-icon {
    transform: scale(1.1) rotate(-5deg);
  }

  .industry-icon {
    font-size: 2.2rem;
    margin-bottom: 16px;
    display: block;
    transition: transform 0.3s var(--ease-fire);
  }

  .industry-name {
    font-family: var(--font-display);
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--pale);
    margin-bottom: 8px;
  }

  .industry-desc {
    font-size: 0.83rem;
    color: var(--ash);
    line-height: 1.6;
  }

  .industry-arrow {
    position: absolute;
    top: 28px; right: 28px;
    color: var(--smoke);
    font-size: 1rem;
    transition: color 0.3s, transform 0.3s;
  }

  .industry-card:hover .industry-arrow {
    color: var(--flame-core);
    transform: translate(3px, -3px);
  }

  /* ─── CTA / Contact ─── */
  .contact {
    padding: var(--section-pad) 0;
    border-top: 1px solid var(--coal);
  }

  .contact-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 80px;
    align-items: start;
  }

  .contact-title {
    font-size: clamp(2rem, 3.5vw, 3rem);
    font-weight: 800;
    color: var(--white);
    margin-bottom: 16px;
  }

  .contact-desc {
    font-size: 1rem;
    color: var(--ash);
    line-height: 1.75;
    margin-bottom: 36px;
  }

  .contact-details { list-style: none; display: flex; flex-direction: column; gap: 14px; }

  .contact-detail {
    display: flex;
    align-items: center;
    gap: 14px;
    font-size: 0.9rem;
    color: var(--mist);
  }

  .contact-detail-icon {
    width: 38px; height: 38px;
    background: var(--coal);
    border: 1px solid var(--ember);
    display: flex; align-items: center; justify-content: center;
    font-size: 0.9rem;
    flex-shrink: 0;
    transition: all 0.3s;
  }

  .contact-detail:hover .contact-detail-icon {
    background: var(--ember);
    border-color: var(--flame-core);
    color: var(--flame-core);
  }

  /* Contact Form */
  .contact-form {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }

  .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

  .form-field {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  .form-label {
    font-family: var(--font-display);
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--ash);
  }

  .form-input,
  .form-select,
  .form-textarea {
    background: var(--coal);
    border: 1px solid var(--ember);
    color: var(--pale);
    font-family: var(--font-body);
    font-size: 0.9rem;
    padding: 14px 18px;
    outline: none;
    transition: border-color 0.25s, box-shadow 0.25s;
    width: 100%;
    appearance: none;
  }

  .form-input::placeholder,
  .form-textarea::placeholder {
    color: var(--smoke);
  }

  .form-input:focus,
  .form-select:focus,
  .form-textarea:focus {
    border-color: var(--flame-core);
    box-shadow: 0 0 0 3px rgba(255,107,26,0.1);
  }

  .form-textarea {
    resize: vertical;
    min-height: 120px;
    line-height: 1.6;
  }

  .form-select option {
    background: var(--coal);
  }

  /* ─── Responsive ─── */
  @media (max-width: 1024px) {
    .services-grid { grid-template-columns: repeat(2, 1fr); }
    .cap-inner { grid-template-columns: 1fr; gap: 60px; }
    .forge-frame { max-height: 300px; }
    .industries-grid { grid-template-columns: repeat(2, 1fr); }
    .contact-grid { grid-template-columns: 1fr; }
    .services-header { grid-template-columns: 1fr; gap: 24px; }
  }

  @media (max-width: 640px) {
    .services-grid { grid-template-columns: 1fr; }
    .industries-grid { grid-template-columns: 1fr; }
    .form-row { grid-template-columns: 1fr; }
    .hero-stats { flex-direction: column; gap: 24px; }
  }
</style>

<!-- ════════════════════════════════════════
     HERO SECTION
═════════════════════════════════════════ -->
<section class="hero" id="home">
  <div class="hero-bg">
    <div class="hero-bg-grid"></div>
    <div class="hero-bg-glow"></div>
    <div class="hero-bg-glow-2"></div>
    <div class="hero-bg-lines"></div>
  </div>

  <div class="container">
    <div class="hero-content">
      <div class="hero-eyebrow">
        <span class="hero-eyebrow-dot"></span>
        <span class="hero-eyebrow-text">Calcifer Labs · Software Studio</span>
        <span class="hero-eyebrow-line"></span>
      </div>

      <h1 class="hero-title">
        We <span class="flame-word gradient-text">Build</span><br>
        Your Dreams.
        <span class="line-2">Into Products That Actually Work.</span>
      </h1>

      <p class="hero-desc">
        From SaaS platforms to machine learning pipelines, mobile apps to enterprise management systems — Calcifer Labs forges powerful software. Every challenge accepted, every fire fueled.
      </p>

      <div class="hero-actions">
        <a href="#services" class="btn-primary">
          <span>Explore Services</span>
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M2 8H14M8 2L14 8L8 14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <a href="#contact" class="btn-ghost">Start a Project</a>
      </div>

      <div class="hero-stats">
        <div class="stat-item">
          <div class="stat-num">50<sup>+</sup></div>
          <div class="stat-label">Projects Delivered</div>
        </div>
        <div class="stat-item">
          <div class="stat-num">8<sup>+</sup></div>
          <div class="stat-label">Service Verticals</div>
        </div>
        <div class="stat-item">
          <div class="stat-num">100<sup>%</sup></div>
          <div class="stat-label">Challenges Accepted</div>
        </div>
      </div>
    </div>
  </div>

  <div class="scroll-hint">
    <span class="scroll-hint-text">Scroll</span>
    <div class="scroll-hint-bar"></div>
  </div>
</section>

<!-- ════════════════════════════════════════
     MARQUEE STRIP
═════════════════════════════════════════ -->
<div class="marquee-strip" aria-hidden="true">
  <div class="marquee-track">
    <?php
    $items = ['SaaS Development','Machine Learning','Android Apps','iOS Apps','Ecommerce','School Management','Learning Management','Standalone Apps','Open to Challenges','Fueling the Fire'];
    $repeated = array_merge($items, $items, $items);
    foreach ($repeated as $item):
    ?>
      <span class="marquee-item">
        <span class="marquee-sep">🔥</span>
        <?= htmlspecialchars($item) ?>
      </span>
    <?php endforeach; ?>
  </div>
</div>

<!-- ════════════════════════════════════════
     SERVICES SECTION
═════════════════════════════════════════ -->
<section class="services" id="services">
  <div class="container">
    <div class="services-header reveal">
      <div>
        <div class="section-tag">What We Build</div>
        <h2 class="services-title">Forged for<br>Every Challenge</h2>
      </div>
      <p class="services-intro">
        Whether you're a startup igniting an idea or an enterprise scaling operations, we have the tools, the team, and the fire to make it real. End-to-end delivery. Zero compromise.
      </p>
    </div>

    <div class="services-grid reveal">
      <?php
      $services = [
        ['icon'=>'☁️','name'=>'SaaS Development','desc'=>'Scalable cloud-based platforms built for growth, automation, and seamless user experience.'],
        ['icon'=>'🧠','name'=>'Machine Learning','desc'=>'Smart integrations and ML pipelines that learn, adapt, and power intelligent decision-making.'],
        ['icon'=>'📊','name'=>'Management Systems','desc'=>'Custom business management solutions tailored to streamline operations and boost efficiency.'],
        ['icon'=>'🤖','name'=>'Android Apps','desc'=>'Native and cross-platform Android applications with polished UI and production-grade performance.'],
        ['icon'=>'🍎','name'=>'iOS Apps','desc'=>'Elegant, App Store-ready iOS applications crafted with precision and Swift-powered stability.'],
        ['icon'=>'🖥️','name'=>'Standalone Apps','desc'=>'Desktop applications for Windows, macOS, and Linux — offline-capable and enterprise-ready.'],
        ['icon'=>'🛒','name'=>'Ecommerce','desc'=>'End-to-end online stores with secure payments, inventory management, and conversion-focused design.'],
        ['icon'=>'🏫','name'=>'School & LMS','desc'=>'Complete school management and learning management systems for education that actually scales.'],
      ];
      foreach ($services as $i => $s):
      ?>
      <div class="service-card">
        <span class="service-icon"><?= $s['icon'] ?></span>
        <span class="service-num"><?= str_pad($i+1, 2, '0', STR_PAD_LEFT) ?></span>
        <div class="service-name"><?= htmlspecialchars($s['name']) ?></div>
        <div class="service-desc"><?= htmlspecialchars($s['desc']) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     CAPABILITIES SECTION
═════════════════════════════════════════ -->
<section class="capabilities" id="capabilities">
  <div class="container">
    <div class="cap-inner">
      <div class="reveal">
        <div class="section-tag">How We Work</div>
        <h2 class="cap-title">Built in the<br><span class="gradient-text">Forge</span></h2>
        <p class="cap-desc">
          Our process is fire-tested. We move fast without cutting corners, communicate without fluff, and ship products that hold up under real-world pressure.
        </p>
        <ul class="cap-list">
          <?php
          $caps = [
            ['icon'=>'⚡','name'=>'Rapid Prototyping','sub'=>'From concept to clickable prototype in days, not months.'],
            ['icon'=>'🔗','name'=>'API & Integration','sub'=>'Seamless third-party integrations: payments, auth, CRM, analytics.'],
            ['icon'=>'🔒','name'=>'Security First','sub'=>'Built-in data protection, OWASP compliance, and encrypted pipelines.'],
            ['icon'=>'📈','name'=>'Scalable Architecture','sub'=>'Infrastructure that grows with you — cloud-native, modular, resilient.'],
            ['icon'=>'🎨','name'=>'UI/UX Design','sub'=>'Interfaces people actually enjoy using. Research-backed, pixel-perfect.'],
          ];
          foreach ($caps as $cap):
          ?>
          <li class="cap-item">
            <span class="cap-item-icon"><?= $cap['icon'] ?></span>
            <div class="cap-item-text">
              <div class="cap-item-name"><?= htmlspecialchars($cap['name']) ?></div>
              <div class="cap-item-sub"><?= htmlspecialchars($cap['sub']) ?></div>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="cap-visual reveal">
        <div class="forge-frame">
          <div class="forge-tags">
            <div class="forge-tag">Python · TensorFlow</div>
            <div class="forge-tag">React · Laravel</div>
            <div class="forge-tag">Flutter · Swift</div>
            <div class="forge-tag">PostgreSQL · Redis</div>
          </div>
          <div class="forge-frame-inner">
            <span class="forge-big-flame">🔥</span>
            <span class="forge-label">The Calcifer Forge</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     CHALLENGE BANNER
═════════════════════════════════════════ -->
<section class="challenge" id="about">
  <div class="container">
    <div class="challenge-inner reveal">
      <div class="challenge-glow"></div>
      <span class="challenge-icon">⚔️</span>
      <h2 class="challenge-title">Open for <span class="gradient-text">Challenges</span></h2>
      <p class="challenge-desc">
        Calcifer Labs doesn't back down from hard problems. Got something unconventional, ambitious, or downright impossible-sounding? Bring it. We'll fuel the fire and build it anyway.
      </p>
      <div class="challenge-actions">
        <a href="#contact" class="btn-primary"><span>Throw Us a Challenge</span></a>
        <a href="#services" class="btn-ghost">See What We Do</a>
      </div>
    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     INDUSTRIES SECTION
═════════════════════════════════════════ -->
<section class="industries" id="projects">
  <div class="container">
    <div class="industries-header reveal">
      <div class="section-tag">Domains We Ignite</div>
      <h2 class="industries-title">Built for Every Industry</h2>
      <p style="color:var(--ash);max-width:480px;margin:0 auto;font-size:0.95rem;line-height:1.7;">
        Our work spans sectors — from education technology to retail, healthcare to enterprise logistics.
      </p>
    </div>

    <div class="industries-grid">
      <?php
      $industries = [
        ['icon'=>'🎓','name'=>'Education & EdTech','desc'=>'LMS platforms, school ERP, student portals, e-learning modules, and exam systems.'],
        ['icon'=>'🛍️','name'=>'Retail & Ecommerce','desc'=>'Online stores, multi-vendor marketplaces, inventory and order management systems.'],
        ['icon'=>'🏥','name'=>'Healthcare','desc'=>'Patient portals, clinic management, appointment booking, and health record systems.'],
        ['icon'=>'🏭','name'=>'Enterprise & Operations','desc'=>'ERP, HRMS, project management, workflow automation, and BI dashboards.'],
        ['icon'=>'📱','name'=>'Mobile & Consumer','desc'=>'Social apps, utility tools, fintech, and lifestyle applications across iOS and Android.'],
        ['icon'=>'🤖','name'=>'AI & Data','desc'=>'Machine learning models, data pipelines, recommendation engines, and NLP tools.'],
      ];
      foreach ($industries as $ind):
      ?>
      <div class="industry-card reveal">
        <span class="industry-icon"><?= $ind['icon'] ?></span>
        <span class="industry-arrow">↗</span>
        <div class="industry-name"><?= htmlspecialchars($ind['name']) ?></div>
        <div class="industry-desc"><?= htmlspecialchars($ind['desc']) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     CONTACT SECTION
═════════════════════════════════════════ -->
<section class="contact" id="contact">
  <div class="container">
    <div class="contact-grid">
      <div class="reveal">
        <div class="section-tag">Get In Touch</div>
        <h2 class="contact-title">Let's Ignite<br>Something Great</h2>
        <p class="contact-desc">
          Have a project in mind? A challenge nobody else will take? Or just want to see if we're the right fit? Reach out — we respond to every fire.
        </p>
        <ul class="contact-details">
          <li class="contact-detail">
            <div class="contact-detail-icon">📍</div>
            <span>Philippines — Remote-First Globally</span>
          </li>
          <li class="contact-detail">
            <div class="contact-detail-icon">📧</div>
            <span>hello@calciferabs.dev</span>
          </li>
          <li class="contact-detail">
            <div class="contact-detail-icon">⏱️</div>
            <span>Response within 24 hours</span>
          </li>
        </ul>
      </div>

      <div class="reveal">
        <form class="contact-form" onsubmit="handleSubmit(event)">
          <div class="form-row">
            <div class="form-field">
              <label class="form-label" for="fname">First Name</label>
              <input class="form-input" type="text" id="fname" name="fname" placeholder="Juan" required>
            </div>
            <div class="form-field">
              <label class="form-label" for="lname">Last Name</label>
              <input class="form-input" type="text" id="lname" name="lname" placeholder="dela Cruz" required>
            </div>
          </div>
          <div class="form-field">
            <label class="form-label" for="email">Email</label>
            <input class="form-input" type="email" id="email" name="email" placeholder="you@company.com" required>
          </div>
          <div class="form-field">
            <label class="form-label" for="service">Service Needed</label>
            <select class="form-select" id="service" name="service">
              <option value="">— Select a Service —</option>
              <option>SaaS Development</option>
              <option>Machine Learning / AI</option>
              <option>Android Application</option>
              <option>iOS Application</option>
              <option>Standalone Application</option>
              <option>Ecommerce</option>
              <option>School Management System</option>
              <option>Learning Management System</option>
              <option>Management System</option>
              <option>I have a challenge</option>
            </select>
          </div>
          <div class="form-field">
            <label class="form-label" for="message">Tell Us About Your Project</label>
            <textarea class="form-textarea" id="message" name="message" placeholder="Describe your idea, challenge, or what you need built..." required></textarea>
          </div>
          <button type="submit" class="btn-primary" style="width:100%;justify-content:center;margin-top:4px;">
            <span>Send &amp; Ignite</span>
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M2 8H14M8 2L14 8L8 14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     FOOTER
═════════════════════════════════════════ -->
<footer class="cl-footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="index.php" class="nav-logo" style="display:inline-flex;margin-bottom:4px;">
          <div class="logo-flame" style="filter:drop-shadow(0 0 10px rgba(255,107,26,0.4));">
            <svg width="24" height="28" viewBox="0 0 28 34" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14 0C14 0 20 6 20 12C20 12 24 8 24 8C24 8 28 16 28 22C28 29.732 21.732 34 14 34C6.268 34 0 29.732 0 22C0 16 4 8 4 8C4 8 8 12 8 12C8 6 14 0 14 0Z" fill="url(#flame-f)"/>
              <defs><linearGradient id="flame-f" x1="14" y1="0" x2="14" y2="34" gradientUnits="userSpaceOnUse"><stop offset="0%" stop-color="#FF6B1A"/><stop offset="100%" stop-color="#C62800"/></linearGradient></defs>
            </svg>
          </div>
          <div class="logo-text" style="margin-left:10px;">
            <span class="logo-name">Calcifer</span>
            <span class="logo-sub">LABS</span>
          </div>
        </a>
        <p>We build software that solves real problems — from SaaS and AI to mobile apps and enterprise systems. Every project is a challenge. Every challenge, accepted.</p>
        <div class="footer-flame-bar">🔥 <span>Fueling the Fire Since Day One</span></div>
      </div>

      <div class="footer-col">
        <h4>Services</h4>
        <ul>
          <li><a href="#services">SaaS Development</a></li>
          <li><a href="#services">Machine Learning</a></li>
          <li><a href="#services">Android & iOS Apps</a></li>
          <li><a href="#services">Ecommerce</a></li>
          <li><a href="#services">Management Systems</a></li>
          <li><a href="#services">School & LMS</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Company</h4>
        <ul>
          <li><a href="#about">About Us</a></li>
          <li><a href="#capabilities">How We Work</a></li>
          <li><a href="#projects">Projects</a></li>
          <li><a href="#contact">Careers</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Connect</h4>
        <ul>
          <li><a href="#">GitHub</a></li>
          <li><a href="#">LinkedIn</a></li>
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Twitter / X</a></li>
          <li><a href="#contact">hello@calciferlabs.dev</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <span>© <?= date('Y') ?> Calcifer Labs. All rights reserved.</span>
      <span>Built with 🔥 in the Philippines</span>
      <div style="display:flex;gap:20px;">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
      </div>
    </div>
  </div>
</footer>

<!-- ════════════════════════════════════════
     GLOBAL SCRIPTS
═════════════════════════════════════════ -->
<script>
  // ─── Nav Scroll State ───
  const nav = document.getElementById('cl-nav');
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 20);
  }, { passive: true });

  // ─── Mobile Menu Toggle ───
  const toggle = document.getElementById('nav-toggle');
  const links  = document.getElementById('nav-links');

  toggle.addEventListener('click', () => {
    const open = links.classList.toggle('open');
    toggle.classList.toggle('open', open);
    toggle.setAttribute('aria-expanded', open);
  });

  // Close on link click
  links.querySelectorAll('a').forEach(a => {
    a.addEventListener('click', () => {
      links.classList.remove('open');
      toggle.classList.remove('open');
      toggle.setAttribute('aria-expanded', false);
    });
  });

  // ─── Scroll Reveal ───
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
      if (entry.isIntersecting) {
        entry.target.style.transitionDelay = (entry.target.dataset.delay || 0) + 'ms';
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

  document.querySelectorAll('.reveal').forEach((el, i) => {
    el.dataset.delay = (i % 4) * 80;
    observer.observe(el);
  });

  // ─── Smooth Anchor Scroll ───
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // ─── Contact Form ───
  function handleSubmit(e) {
    e.preventDefault();
    const btn = e.target.querySelector('button[type="submit"] span');
    btn.textContent = 'Fire Sent! ✓';
    btn.closest('button').style.background = '#2a5a2a';
    setTimeout(() => {
      btn.textContent = 'Send & Ignite';
      btn.closest('button').style.background = '';
      e.target.reset();
    }, 3000);
  }
</script>

</body>
</html>