<?php
// ---- Configurable content (edit these to personalize the page) ----
$birthdayName   = "Dian";
$birthdayDate   = "2026-11-23"; // Y-m-d
$aboutText1     = "Happy 25th birthday, Girl! I wish you all the best for the next years ahead. Keep up the good energy that makes you effortless being a good woman, daughter, family, and person to others.";
$aboutText2     = "I'm excited to be part of your journey on this new chapter, lets experience the life just like what they said, ";
$instagramUrl   = "#";
$facebookUrl    = "#";
$twitterUrl     = "#";
$otherUrl       = "#";
$contactEmail   = "";

// ---- Figure out the eyebrow label ("THIS WEEKEND" vs a date) ----
$today     = new DateTime('today');
$eventDate = new DateTime($birthdayDate);
$diffDays  = (int)$today->diff($eventDate)->format('%r%a');

if ($diffDays >= 0 && $diffDays <= 7) {
    $eyebrowLabel = "FROM ME, TO YOU";
} else {
    $eyebrowLabel = strtoupper($eventDate->format('F j'));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($birthdayName) ?>'s Birthday</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="index.css">
</head>
<body>

<div class="page-bg">
  <div class="browser-frame">

    <div class="browser-topbar">
      <span class="dot dot-pink"></span>
      <span class="dot dot-mid"></span>
      <span class="dot dot-dark"></span>
    </div>

    <div class="browser-content">

      <div class="tape tape-top-left" aria-hidden="true"></div>
      <div class="tape tape-right" aria-hidden="true"></div>

      <main class="hero">

        <div class="hero-text">
          <p class="eyebrow"><?= htmlspecialchars($eyebrowLabel) ?></p>
          <h1 class="headline">WISH U<br>A HAPPIEST BIRTHDAY!</h1>
          <p class="lead"><?= htmlspecialchars($aboutText1) ?></p>
          <p class="lead"><?= htmlspecialchars($aboutText2) ?> 'Muda berkelana, tua bercerita'</p>
        </div>

      </main>

      <div class="popup-window" id="cakePopup">
        <div class="popup-topbar">
          <span class="dot dot-pink"></span>
          <span class="dot dot-mid"></span>
          <span class="dot dot-dark"></span>
        </div>
        <div class="popup-body">
          <p class="popup-name"><?= htmlspecialchars($birthdayName) ?>'s Birthday</p>
          <p class="popup-date"><?= htmlspecialchars($eventDate->format('l, F j, Y')) ?></p>
        </div>
        <button class="popup-makeawish" id="popupOkBtn">Make a Wish!</button>
      </div>

    </div>
  </div>
</div>

<div class="wish-modal hidden" id="wishModal">
  <div class="wish-modal-stack">
    <div class="wish-modal-top-row">
      <div class="wish-modal-banner">
        <p id="wishBannerText">Tutup mata & make a wish🙏🤲</p>
      </div>
      <button class="blow-btn hidden" id="blowCandleBtn">Tiup lilinnya!</button>
    </div>
    <div class="wish-modal-box">
      <div class="cake-wrap">
        <p class="tiup-text hidden" id="tiupText">Tiup! Tiup! Tiup!</p>
        <div class="cake-anim" aria-hidden="true">
          <svg viewBox="0 0 200 200">
            <path class="flame state-normal" id="candleFlame" d="M100 8c6 7 6 13 0 19-6-6-6-12 0-19Z"/>
            <rect class="candle" x="94" y="30" width="12" height="26" rx="2"/>
            <rect class="tier tier-top" x="58" y="56" width="84" height="38" rx="10"/>
            <rect class="tier tier-mid" x="38" y="92" width="124" height="44" rx="10"/>
            <rect class="tier tier-base" x="18" y="134" width="164" height="50" rx="10"/>
          </svg>
        </div>
      </div>

      <div class="wind-overlay" id="windOverlay" aria-hidden="true">
        <span class="wind-streak s1"></span>
        <span class="wind-streak s2"></span>
        <span class="wind-streak s3"></span>
        <span class="wind-streak s4"></span>
        <span class="wind-streak s5"></span>

        <svg class="wind-curl c1" viewBox="0 0 24 24"><path d="M9.59 4.59A2 2 0 1 1 11 8H2m10.59 11.41A2 2 0 1 0 14 16H2m15.73-8.27A2.5 2.5 0 1 1 19.5 12H2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
        <svg class="wind-curl c2" viewBox="0 0 24 24"><path d="M9.59 4.59A2 2 0 1 1 11 8H2m10.59 11.41A2 2 0 1 0 14 16H2m15.73-8.27A2.5 2.5 0 1 1 19.5 12H2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
        <svg class="wind-curl c3" viewBox="0 0 24 24"><path d="M9.59 4.59A2 2 0 1 1 11 8H2m10.59 11.41A2 2 0 1 0 14 16H2m15.73-8.27A2.5 2.5 0 1 1 19.5 12H2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
      </div>

      <div class="celebrate-overlay" id="celebrateOverlay" aria-hidden="true">
        <span class="confetti k1"></span>
        <span class="confetti k2"></span>
        <span class="confetti k3"></span>
        <span class="confetti k4"></span>
        <span class="confetti k5"></span>
        <span class="confetti k6"></span>
        <span class="confetti k7"></span>
        <span class="confetti k8"></span>
        <span class="confetti k9"></span>
        <span class="confetti k10"></span>

        <span class="firework f1"></span>
        <span class="firework f2"></span>
        <span class="firework f3"></span>
      </div>
    </div>
  </div>
</div>

<div class="fullscreen-fx" id="fullscreenFx" aria-hidden="true">
  <span class="confetti k1"></span>
  <span class="confetti k2"></span>
  <span class="confetti k3"></span>
  <span class="confetti k4"></span>
  <span class="confetti k5"></span>
  <span class="confetti k6"></span>
  <span class="confetti k7"></span>
  <span class="confetti k8"></span>
  <span class="confetti k9"></span>
  <span class="confetti k10"></span>

  <span class="firework f1"></span>
  <span class="firework f2"></span>
  <span class="firework f3"></span>

  <svg class="balloon-fs b1" viewBox="0 0 60 100">
    <line x1="30" y1="62" x2="30" y2="98" stroke="var(--deep-plum)" stroke-width="1.5"/>
    <ellipse cx="30" cy="30" rx="26" ry="30" fill="currentColor" stroke="var(--deep-plum)" stroke-width="2"/>
    <path d="M26 60 Q30 66 34 60" fill="none" stroke="var(--deep-plum)" stroke-width="1.5"/>
  </svg>
  <svg class="balloon-fs b2" viewBox="0 0 60 100">
    <line x1="30" y1="62" x2="30" y2="98" stroke="var(--deep-plum)" stroke-width="1.5"/>
    <ellipse cx="30" cy="30" rx="26" ry="30" fill="currentColor" stroke="var(--deep-plum)" stroke-width="2"/>
    <path d="M26 60 Q30 66 34 60" fill="none" stroke="var(--deep-plum)" stroke-width="1.5"/>
  </svg>
  <svg class="balloon-fs b3" viewBox="0 0 60 100">
    <line x1="30" y1="62" x2="30" y2="98" stroke="var(--deep-plum)" stroke-width="1.5"/>
    <ellipse cx="30" cy="30" rx="26" ry="30" fill="currentColor" stroke="var(--deep-plum)" stroke-width="2"/>
    <path d="M26 60 Q30 66 34 60" fill="none" stroke="var(--deep-plum)" stroke-width="1.5"/>
  </svg>
  <svg class="balloon-fs b4" viewBox="0 0 60 100">
    <line x1="30" y1="62" x2="30" y2="98" stroke="var(--deep-plum)" stroke-width="1.5"/>
    <ellipse cx="30" cy="30" rx="26" ry="30" fill="currentColor" stroke="var(--deep-plum)" stroke-width="2"/>
    <path d="M26 60 Q30 66 34 60" fill="none" stroke="var(--deep-plum)" stroke-width="1.5"/>
  </svg>
  <svg class="balloon-fs b5" viewBox="0 0 60 100">
    <line x1="30" y1="62" x2="30" y2="98" stroke="var(--deep-plum)" stroke-width="1.5"/>
    <ellipse cx="30" cy="30" rx="26" ry="30" fill="currentColor" stroke="var(--deep-plum)" stroke-width="2"/>
    <path d="M26 60 Q30 66 34 60" fill="none" stroke="var(--deep-plum)" stroke-width="1.5"/>
  </svg>
  <svg class="balloon-fs b6" viewBox="0 0 60 100">
    <line x1="30" y1="62" x2="30" y2="98" stroke="var(--deep-plum)" stroke-width="1.5"/>
    <ellipse cx="30" cy="30" rx="26" ry="30" fill="currentColor" stroke="var(--deep-plum)" stroke-width="2"/>
    <path d="M26 60 Q30 66 34 60" fill="none" stroke="var(--deep-plum)" stroke-width="1.5"/>
  </svg>
</div>

<script src="index.js"></script>
</body>
</html>
