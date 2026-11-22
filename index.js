var BIRTHDAY_CONFIG = {
  name: 'Dian',
  date: '2026-11-23',
  aboutText1: 'Happy 25th birthday, Girl! I wish you all the best for the next years ahead. Keep up the good energy that makes you effortless being a good woman, daughter, family, and person to others.',
  aboutText2: "I'm excited to be part of your journey on this new chapter, lets experience the life just like what they said, "
};

function renderBirthdayContent(config) {
  var eventDate = new Date(config.date + 'T00:00:00');
  var today = new Date();
  today.setHours(0, 0, 0, 0);

  var diffDays = Math.round((eventDate - today) / 86400000);
  var eyebrowLabel = (diffDays >= 0 && diffDays <= 7)
    ? 'FROM ME, TO YOU'
    : new Intl.DateTimeFormat('en-US', { month: 'long', day: 'numeric' }).format(eventDate).toUpperCase();

  var formattedDate = new Intl.DateTimeFormat('en-US', {
    weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
  }).format(eventDate);

  document.title = config.name + "'s Birthday";
  document.getElementById('eyebrowLabel').textContent = eyebrowLabel;
  document.getElementById('aboutText1').textContent = config.aboutText1;
  document.getElementById('aboutText2').textContent = config.aboutText2;
  document.getElementById('popupName').textContent = config.name + "'s Birthday";
  document.getElementById('popupDate').textContent = formattedDate;
}

document.addEventListener('DOMContentLoaded', function () {
  renderBirthdayContent(BIRTHDAY_CONFIG);

  var wishBtn = document.getElementById('popupOkBtn');
  var wishModal = document.getElementById('wishModal');
  var blowBtn = document.getElementById('blowCandleBtn');
  var flame = document.getElementById('candleFlame');
  var windOverlay = document.getElementById('windOverlay');
  var celebrateOverlay = document.getElementById('celebrateOverlay');
  var fullscreenFx = document.getElementById('fullscreenFx');
  var wishBannerText = document.getElementById('wishBannerText');
  var tiupText = document.getElementById('tiupText');
  var originalBannerText = wishBannerText.textContent;
  var grantedBannerText = 'Semoga harapannya dikabulkan, amiinn🙏';
  var tiupPromptText = 'Ayo tiup lilinnya! Tiup beneran yaa😮‍💨';
  var tiupActionText = 'Tiup! Tiup! Tiup!';
  var flameTimers = [];

  function clearFlameTimers() {
    flameTimers.forEach(clearTimeout);
    flameTimers = [];
  }

  function setFlameState(state) {
    flame.classList.remove('state-normal', 'state-small', 'state-out');
    flame.classList.add(state);
  }

  function showTiupText(text) {
    tiupText.textContent = text;
    tiupText.classList.remove('hidden');
  }

  function hideTiupText() {
    tiupText.classList.add('hidden');
  }

  wishBtn.addEventListener('click', function () {
    wishModal.classList.remove('hidden');
    blowBtn.classList.add('hidden');
    windOverlay.classList.remove('active');
    celebrateOverlay.classList.remove('active');
    fullscreenFx.classList.remove('active');
    wishBannerText.textContent = originalBannerText;
    hideTiupText();

    clearFlameTimers();
    setFlameState('state-normal');
    flameTimers.push(setTimeout(function () {
      blowBtn.classList.remove('hidden');
    }, 5000));
  });

  blowBtn.addEventListener('click', function () {
    blowBtn.classList.add('hidden');
    windOverlay.classList.add('active');
    showTiupText(tiupPromptText);

    clearFlameTimers();
    flameTimers.push(setTimeout(function () {
      setFlameState('state-small');
      showTiupText(tiupActionText);
      flameTimers.push(setTimeout(function () {
        setFlameState('state-out');
        windOverlay.classList.remove('active');
        celebrateOverlay.classList.add('active');
        fullscreenFx.classList.add('active');
        wishBannerText.textContent = grantedBannerText;
        hideTiupText();
      }, 5000));
    }, 5000));
  });

  wishModal.addEventListener('click', function (e) {
    if (e.target === wishModal) {
      wishModal.classList.add('hidden');
      celebrateOverlay.classList.remove('active');
      fullscreenFx.classList.remove('active');
    }
  });
});
