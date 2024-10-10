---
title: Der Verein
type: page
slug: verein

---

Der temporärhaus e.V. ist ein eingetragener, gemeinnütziger Verein in Ulm und unterstützt die Ehrenamtlichen bei Aktivitäten im und um das Haus herum - wie der Organisation und Abwicklung von Workshops und Veranstaltungen und bei Förderungen.

Muss ich im Verein Mitglied sein um im Haus aktiv zu sein oder _irgendwas_ zu machen?  
Nein, denn durch unsere externen Förderungen können wir das Haus für alle Menschen öffnen, ohne auf Mitgliedsbeiträge für Miete usw. angewiesen zu sein.

<!--
Warum sollte ich (Förder)mitglied werden?  
Wenn man sich für eine Mitgliedschaft entscheidet, bekommt man zum einen ein Stimmrecht bei allen Vereinsfragen sowie eine Art “virtuelles” Abzeichen, dass man das Haus und den dortigen Spirit unterstützt.

Weiter ermöglichen die Mitgliedsbeiträge die Beschaffung von interessanten Dingen für alle, Workshopmaterial und den ein oder anderen Kostenpunkt im Haus.
-->


Für alle Dinge rund um den Verein erreichst du uns am besten unter _vorstand (at) temporaerhaus.de_.

### Mitgliedschaft im Verein
Du warst schon ein paar mal im Haus, dir gefällt es dort und du willst nun Mitglied im Verein werden?
Dann benutze gerne [das Antragsformular unten](#applicationForm) - oder schicke uns eine Mail an `vorstand (at) temporaerhaus.de` mit deinem Namen, E-Mail, Postadresse (brauchen wir für die Beitragsquittung) sowie einer kurzen Beschreibung warum du beitreten willst bzw. wie du bisher bei uns aktiv warst.

In der Regel beträgt der Mitgliedsbeitrag 10 € im Monat, kann aber nach Rücksprache angepasst werden.

### Fördermitgliedschaft
Wir freuen uns sehr über deine Unterstützung als Fördermitglied im Verein. Um Fördermitglied zu werden, kannst du [das Antragsformular unten](#applicationForm) nutzen oder uns einfach eine Mail an `vorstand (at) temporaerhaus.de` schicken, mit deinem Namen, E-Mail Adresse, Postadresse (brauchen wir für deine jährliche Spendenbescheinigung) und deinem gewünschten monatlichen Förderbeitrag.

Wir empfehlen für Fördermitglieder*innen einen monatlichen Mindestbeitrag von 10€ für natürliche Personen und 50€ pro Monat oder mehr für juristische Personen wie Firmen oder Organisationen.

Vielen Dank!

### Antragsformular

<form style="display: flex; flex-wrap: wrap;" method="POST" action="https://temporaerhaus.de/member-application.php?lang=de" id="applicationForm">
<div style="display: none; flex-grow: 0; flex-shrink: 1; flex-basis: 230px;">
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
    <option>Fördermitglied</option>
    <option>Aktives Mitglied</option>
</select>
</p>
<p>
<label for="amount">Monatlicher Förderbeitrag:</label>
<input type="number" id="amount" name="amount">
<small class="info" style="padding-block: 0.25em;"><b>ℹ</b> Wir empfehlen mindestens 10 € / Monat für natürliche Personen und 50 € / Monat für Firmen und Organisationen bei einer Fördermitgliedschaft.</small>
</p>
<p>
<label for="slackuser">Benutzername im temporärhaus-Slack:</label>
<input type="number" id="slackuser" name="slackuser">
<small class="info" style="padding-block: 0.25em;"><b>ℹ</b> Diese Angabe hilft uns bei aktiven Mitgliedern, dir nach erfolgter Aufnahme die passenden Kanäle und Gruppen zuzuordnen.</small>
</p>
</div>

<div id="step3" style="scroll-padding-top: 2em;">
<p>
<label for="interval">Zahlungsintervall:</label>
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

<div style="display: none; align-items: center; justify-content: space-between;">
<button id="prevStep">◀ Zurück</button>
<button id="nextStep">▶ Weiter</button>
</div>

<button type="submit">✉ Antrag Versenden</button>
</div>
<div style="display: none" id="application-loading">
    <h3>⏳ Einen Moment, dein Antrag wird gespeichert.</h3>
</div>
<div style="display: none" id="application-error">
    <h3>💻 Computer sagt "Nein" :(</h3>
    <p>Bitte überprüfe die hervorgehobenen Formularfelder noch einmal.</p>
</div>
</form>

