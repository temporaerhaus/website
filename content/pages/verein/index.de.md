---
title: Der Verein
type: page
slug: verein

---

Der temporärhaus e.V. ([vorübergehend so genannt](/stellungnahme-und-ausblick-zum-urteil-im-markenrechtsstreit/)) ist ein eingetragener, gemeinnütziger Verein in Ulm und unterstützt die Ehrenamtlichen bei Aktivitäten im und um das Haus herum - wie der Organisation und Abwicklung von Workshops und Veranstaltungen und bei Förderungen.

Muss ich im Verein Mitglied sein um im Haus aktiv zu sein oder _irgendwas_ zu machen?  
Nein, denn durch unsere externen Förderungen können wir das Haus für alle Menschen öffnen, ohne auf Mitgliedsbeiträge für Miete usw. angewiesen zu sein.

<!--
Warum sollte ich (Förder)mitglied werden?  
Wenn man sich für eine Mitgliedschaft entscheidet, bekommt man zum einen ein Stimmrecht bei allen Vereinsfragen sowie eine Art “virtuelles” Abzeichen, dass man das Haus und den dortigen Spirit unterstützt.

Weiter ermöglichen die Mitgliedsbeiträge die Beschaffung von interessanten Dingen für alle, Workshopmaterial und den ein oder anderen Kostenpunkt im Haus.
-->


Für alle Dinge rund um den Verein erreichst du uns am besten unter _vorstand (at) temporaerhaus.de_.

### Mitgliedschaft im Verein
Du willst Mitglied im Verein werden? Dann schicke uns einfach eine Mail an `vorstand (at) temporaerhaus.de` mit deinem Namen, E-Mail, Postadresse (brauchen wir für die Beitragsquittung) sowie einer kurzen Beschreibung warum du beitreten willst bzw. wie du bisher bei uns aktiv warst.

In der Regel beträgt der Mitgliedsbeitrag 10 € im Monat, kann aber nach Rücksprache angepasst werden.

### Fördermitgliedschaft
Wir freuen uns sehr über deine Unterstützung als Fördermitglied im Verein. Um Fördermitglied zu werden, kannst du das Antragsformular unten nutzen oder uns einfach eine Mail an `vorstand (at) temporaerhaus.de` schicken, mit deinem Namen, E-Mail Adresse, Postadresse (brauchen wir für deine jährliche Spendenbescheinigung) und deinem gewünschten monatlichen Förderbeitrag.

Wir empfehlen für Fördermitglieder einen monatlichen Mindestbeitrag von 10€ für natürliche Personen und 50€ pro Monat oder mehr für juristische Personen wie Firmen oder Organisationen.

Vielen Dank!

### Antragsformular

<form style="display: flex; flex-wrap: wrap;" method="POST" action="https://temporaerhaus.de/member-application.php" id="applicationForm">
<div style="flex-grow: 0; flex-shrink: 1; flex-basis: 230px;">
  <ol>
    <li><a href="#step1">Persönliche Angaben</a></li>
    <li><a href="#step2">Mitgliedsbeitrag</a></li>
    <li><a href="#step3">Zahlungsweise</a></li>
    <li><a href="#step4">Anschrift</a></li>
    <li><a href="#step5">Datenschutzerklärung</a></li>
  </ol>
</div>

<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 280px;">
<div id="step1" style="scroll-padding-top: 2em;">
<p>
<label for="firstname">Vorname:</label>
<input type="text" id="firstname" name="firstname">
</p>
<p>
<label for="lastname">Nachname:</label>
<input type="text" id="lastname" name="lastname">
</p>
<p>
<label for="email">E-Mail Adresse:</label>
<input type="text" id="email" name="email">
</p>
</div>

<div id="step2" style="scroll-padding-top: 2em;">
<p>
<label for="type">Art der Mitgliedschaft:</label>
<select id="type" name="type">
    <option>Fördermitgliedschaft</option>
    <option>Fördermitgliedschaft für Personen in Schule, Ausbildung und Studium</option>
    <option>Ideelle Mitgliedschaft</option>
</select>
</p>
<p>
<label for="amount">Monatlicher Förderbeitrag:</label>
<input type="number" id="amount" name="amount">
</p>
</div>

<div id="step3" style="scroll-padding-top: 2em;">
<p>
<label for="interval">Zahlungsinterval:</label>
<select id="interval" name="interval">
    <option>jährlich</option>
    <option>halbjährig</option>
    <option>monatlich</option>
</select>
</p>
<p>
<label for="iban">IBAN:</label>
<input type="text" id="iban" name="iban">
</p>
<p>
<label for="bic">BIC:</label>
<input type="text" id="bic" name="bic">
</p>
<p>
<label for="consent">
<input type="checkbox" id="consent" name="consent">
Ich erteile hiermit die Erlaubnis zum Einzug per SEPA-Lastschrift von meinem oben angegebenen Konto.
</label>
</p>
</div>

<div id="step4" style="scroll-padding-top: 2em;">
<p>
<label for="address">Straße und Hausnummer:</label>
<input type="text" id="address" name="address">
</p>
<p>
<label for="suffix">Addresszusatz:</label>
<input type="text" id="suffix" name="suffix">
</p>
<p>
<label for="city">Stadt:</label>
<input type="text" id="city" name="city">
</p>
<p>
<label for="zip">Postleitzahl:</label>
<input type="text" id="zip" name="zip">
</p>
<p>
<label for="country">Land:</label>
<input type="text" id="country" name="country" value="Deutschland">
</p>
</div>

<div id="step5" style="scroll-padding-top: 2em;">
<p>
<label for="mailconsent">
<input type="checkbox" id="mailconsent" name="mailconsent">
Ich willige in die Übersendung von Informationen über die Arbeit des temporärhaus per E-Mail und Post ein.
Es gelten die Bestimmungen unserer <a href="/datenschutzerklaerung" target="_blank">Datenschutzerklärung</a>.
</label>
</p>
<p>
<label for="message">Nachricht:</label>
<textarea id="message" name="message"></textarea>
<small class="info" style="padding-block: 0.25em;"><b>ℹ</b> Hier kannst du uns noch weitere Informationen zu deiner Mitgliedschaft übermitteln.</small>
</p>
</div>

<div style="display: flex; align-items: center; justify-content: space-between;">
<button id="prevStep">◀ Zurück</button>
<button id="nextStep">▶ Weiter</button>
</div>
</div>
</form>

<script type="text/javascript">
(() => {
    const form = document.getElementById('applicationForm');
    const nextStep = document.getElementById('nextStep');
    const prevStep = document.getElementById('prevStep');
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
        response.innerHTML = '<h3>⏳ Einen Moment, dein Antrag wird gespeichert.</h3>';

        const data = new URLSearchParams(new FormData(form));
        const res = await fetch(form.action, { method: 'post', body: data });
        nextStep.disabled = false;
        prevStep.disabled = false;

        if (res.status === 200) {
            // show success and clear form?
            form.reset();
            location.hash = '#step1';
            window.dispatchEvent(new Event('hashchange'));
            response.className = 'success';
            response.innerHTML = await res.text();
        } else {
            const body = await res.json();
            response.className = 'danger';
            response.innerHTML = '<h3>💻 Computer sagt "Nein" :(</h3><p>Bitte überprüfe die hervorgehobenen Formularfelder noch einmal.</p>';

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
})();
</script>
