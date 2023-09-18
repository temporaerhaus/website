(async function() {
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

  const stateClass = spaceapi?.state?.message || (spaceapi?.state?.open ? 'open' : 'closed');

  document.querySelectorAll('.tph-door-unknown').forEach((el) => {
      el.classList.replace('tph-door-unknown', `tph-door-${stateClass}`);
  });

  document.querySelectorAll('.space-state').forEach((el) => {
    el.innerText = el.dataset?.[`i18n${stateClass.charAt(0).toUpperCase()}${stateClass.slice(1)}`] || stateClass;
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

  if (document.querySelector('#applicationForm')) {
    const form = document.getElementById('applicationForm');
    const nextStep = document.getElementById('nextStep');
    const prevStep = document.getElementById('prevStep');
    nextStep.parentNode.style.display = 'flex';
    document.querySelector('button[type="submit"]').remove();
    form.children[0].style.display = 'block';
  
    window.addEventListener('hashchange', () => {
      const hash = location.hash.startsWith('#step') ? location.hash : '#step1';
      const a = document.querySelector(`a[href="${hash}"]`);
      const e = document.querySelector(hash);
      if (!a || !e) {
        return;
      }
      a.closest('ol').querySelectorAll('li').forEach(e => {
        e.style.fontWeight = 'normal';
        e.style.color = '#666';
        e.children[0].style.color = '#666';
      });
      a.parentNode.style.fontWeight = 'bold';
      a.parentNode.style.color = 'black';
      a.style.color = 'black';
  
      e.parentNode.querySelectorAll('div[id]').forEach(e => {
        e.style.display = 'none';
      });
      e.style.display = 'block';
  
      prevStep.disabled = (hash === '#step1');
      nextStep.innerText = (hash === '#step5') ? '✉ Antrag Versenden' : '▶ Weiter';
    });
  
    const changeStep = (e) => {
      e.preventDefault();
      e.stopPropagation();
  
      const hash = location.hash.startsWith('#step') ? location.hash : '#step1';
      const target = (Number(hash.slice(5)) || 0) + (e.target.id === 'nextStep' ? 1 : -1);
      if (target === 6) {
        form.dispatchEvent(new Event('submit'));
        return;
      }
  
      location.hash = `#step${target}`;
      window.dispatchEvent(new Event('hashchange'));
    };
    nextStep.addEventListener('click', changeStep);
    prevStep.addEventListener('click', changeStep);
  
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      e.stopPropagation();
  
      form.querySelectorAll('p').forEach(e => e.classList.remove('danger'));
      nextStep.disabled = true;
      prevStep.disabled = true;
  
      let response = document.getElementById('formResponse')
      if (!response) {
        response = document.createElement('div');
        response.id = 'formResponse';
        form.insertAdjacentElement('beforebegin', response);
      }
  
      response.className = 'info';
      response.innerHTML = document.getElementById('application-loading').innerHTML;
  
      const data = new URLSearchParams(new FormData(form));
      const res = await fetch(form.action, { method: 'post', body: data });
      nextStep.disabled = false;
      prevStep.disabled = false;
  
      const text = await res.text();
      const parser = new DOMParser();
      const htmlDocument = parser.parseFromString(text, 'text/html');
      const main = htmlDocument.documentElement.querySelector('main');
  
      if (res.status === 200) {
        form.reset();
        location.hash = '#step1';
        window.dispatchEvent(new Event('hashchange'));
        response.className = 'success';
        response.innerHTML = main.innerHTML;
      } else if (res.status === 500) {
        response.className = 'danger';
        response.innerHTML = main.innerHTML;
      } else {
        const body = JSON.parse(main.dataset.errors);
        response.className = 'danger';
        response.innerHTML = document.getElementById('application-error').innerHTML;
  
        let step = 'step5';
        for (const field of Object.keys(body)) {
          const e = document.getElementById(field);
          e?.closest?.('p')?.classList?.add?.('danger');
          const id = e?.closest?.('div[id]')?.id;
          if (id < step) {
            step = id;
          }
        }
        if (location.hash !== `#${step}`) {
          location.hash = `#${step}`;
          window.dispatchEvent(new Event('hashchange'));
        }
      }
    });
  
    window.dispatchEvent(new Event('hashchange'));
  }
}, false);
