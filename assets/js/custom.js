(async function() {
  // spaceapi currently disabled
  return;

  function capitalize(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
  }

  const SPACEAPI_URL = 'https://spaceapi.temporaerhaus.de/spaceapi/';

  let response, spaceapi;
  try {
    response = await fetch(SPACEAPI_URL);
    if (!response.ok) {
      throw new Error('spaceapi: network failed');
    }
    spaceapi = await response.json();
  } catch (error) {
    console.error(error);
    return;
  }

  const state = spaceapi.state.open;
  const stateClass = state ? 'open' : 'closed';
  const stateClassCap = capitalize(stateClass);

  document.querySelectorAll('.vsh-door-unknown').forEach(el => el.classList.replace('vsh-door-unknown', `vsh-door-${stateClass}`));
  document.querySelectorAll('.space-state').forEach(el => {
    el.classList.replace('space-state--unknown', `space-state--${stateClass}`);
    var text = el.dataset[`i18n${stateClassCap}`];
    if (typeof text === 'undefined') {
      text = stateClassCap;
    }
    el.innerText = text;
    el.dataset['state'] = stateClass;
  });
})();

document.addEventListener('DOMContentLoaded', () => {
  if (document.querySelector('.tabs')) {
    document.querySelectorAll('.tabs .tab-content .tab').forEach((e) => {
      document.querySelector('.tabs .tab-links').insertAdjacentHTML(
        'beforeend',
        `<li${e.classList.contains('active') ? ' class="active"' : ''}><a href="#${e.id}">${e.title}</a></li>`
      );
    });

    document.querySelectorAll('.tabs .tab-links a').forEach((a) => a.addEventListener('click', (e) => {
      e.preventDefault();
      const hash = decodeURIComponent(new URL(a.href).hash);

      // Show/Hide Tabs
      document.querySelectorAll(`.tab-content .tab`).forEach(e => e.classList.remove('active'));
      document.querySelector(`.tab-content ${hash}`).classList.add('active');

      // Change/remove current tab to active
      a.closest('ul').childNodes.forEach(e => e.classList.remove('active'));
      a.closest('li').classList.add('active');
    }));

    const tabName = new URL(document.location)?.searchParams?.get?.('tab');
    if (tabName) {
        document.querySelector(`.tabs .tab-links a[href="#${tabName}"`)?.click?.();
        document.querySelector(`.tabs .tab-links a[href="#${decodeURIComponent(tabName)}"`)?.click?.();
        document.querySelector(`#${decodeURIComponent(tabName)}`)?.scrollIntoView?.();
    }
  }
}, false);

