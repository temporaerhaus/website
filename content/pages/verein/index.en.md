---
title: Der Verein
type: page
slug: verein

---

The temporärhaus e.V. ([temporarily renamed](/stellungnahme-und-ausblick-zum-urteil-im-markenrechtsstreit/)) is a registered, non-profit association in Ulm and supports the volunteers with activities in and around the temporärhaus - such as the organization and handling of workshops and events and with sponsorships.

Do I have to be a member of the association to be active in the house or to do _anything_?  
No, because of the support of our external sponsors we can open the temporärhaus to all people without having to rely on membership fees for rent etc.

<!--
Warum sollte ich (Förder)mitglied werden?  
Wenn man sich für eine Mitgliedschaft entscheidet, bekommt man zum einen ein Stimmrecht bei allen Vereinsfragen sowie eine Art “virtuelles” Abzeichen, dass man das Haus und den dortigen Spirit unterstützt.

Weiter ermöglichen die Mitgliedsbeiträge die Beschaffung von interessanten Dingen für alle, Workshopmaterial und den ein oder anderen Kostenpunkt im Haus.
-->


For all things concerning the association you can reach us best at _vorstand (at) temporaerhaus.de_.

### Membership 
You want to join our non-profit association? Please send us an email to `vorstand (at) temporaerhaus.de` with your name, e-mail, postal address (needed for the charitable donation certificate) and a short description why you want to join and how and where you are active in the past in our group.

Usually the membership fee is 10 € per month. In case you need an adaption of the fee, please get in contact with us.

### Supporting Membership
We're happy to welcome you or your organization as a supporting member for our non-profit association. Please use the form below or simply send us an email to `vorstand (at) temporaerhaus.de` with your name, e-mail, postal address (needed for the charitable donation certificate).

We recommend an amount of 10 € per month for private persons and 50 € per month for companies and organisations for supporting membership.

### Application Form

<form style="display: flex; flex-wrap: wrap;" method="POST" action="https://temporaerhaus.de/member-application.php?lang=en" id="applicationForm">
<div style="display: none; flex-grow: 0; flex-shrink: 1; flex-basis: 230px;">
  <ol>
    <li><a href="#step1">Personal data</a></li>
    <li><a href="#step2">Membership fee</a></li>
    <li><a href="#step3">Payment method</a></li>
    <li><a href="#step4">Address</a></li>
    <li><a href="#step5">Privacy Policy</a></li>
  </ol>
</div>

<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 280px;">
<div id="step1" style="scroll-padding-top: 2em;">
<p>
<label for="firstname">First name:</label>
<input type="text" id="firstname" name="firstname">
</p>
<p>
<label for="lastname">Last name:</label>
<input type="text" id="lastname" name="lastname">
</p>
<p>
<label for="email">Email address:</label>
<input type="text" id="email" name="email">
</p>
</div>

<div id="step2" style="scroll-padding-top: 2em;">
<p>
<label for="type">Type of membership:</label>
<select id="type" name="type">
    <option>Supporting member (Fördermitglied)</option>
    <option>Active member (Aktives Mitglied)</option>
</select>
</p>
<p>
<label for="amount">Monthly membership fee:</label>
<input type="number" id="amount" name="amount">
<small class="info" style="padding-block: 0.25em;"><b>ℹ</b> We recommend an amount of 10 € per month for private persons and 50 € per month for companies and organisations for supporting membership.</small>
</p>
</div>

<div id="step3" style="scroll-padding-top: 2em;">
<p>
<label for="interval">Payment interval:</label>
<select id="interval" name="interval">
    <option>yearly</option>
    <option>half-yearly</option>
    <option>monthly</option>
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
I hereby grant permission for collection by SEPA direct debit from my account stated above.
</label>
</p>
</div>

<div id="step4" style="scroll-padding-top: 2em;">
<p>
<label for="address">Street and house number:</label>
<input type="text" id="address" name="address">
</p>
<p>
<label for="suffix">Address suffix:</label>
<input type="text" id="suffix" name="suffix">
</p>
<p>
<label for="city">City:</label>
<input type="text" id="city" name="city">
</p>
<p>
<label for="zip">Postcode:</label>
<input type="text" id="zip" name="zip">
</p>
<p>
<label for="country">Country:</label>
<input type="text" id="country" name="country" value="Deutschland">
</p>
</div>

<div id="step5" style="scroll-padding-top: 2em;">
<p>
<label for="mailconsent">
<input type="checkbox" id="mailconsent" name="mailconsent">
I agree to receive information about the work of the temporärhaus by email and post.
The terms of our <a href="/datenschutzerklaerung" target="_blank">privacy policy</a> apply.
</label>
</p>
<p>
<label for="message">Message:</label>
<textarea id="message" name="message"></textarea>
<small class="info" style="padding-block: 0.25em;"><b>ℹ</b> Here you can send us more information about your membership.</small>
</p>
</div>

<div style="display: none; align-items: center; justify-content: space-between;">
<button id="prevStep">◀ Back</button>
<button id="nextStep">▶ Next</button>
</div>

<button type="submit">✉ Send Application</button>
</div>
<div style="display: none" id="application-loading">
    <h3>⏳ One moment, your request is being saved.</h3>
</div>
<div style="display: none" id="application-error">
    <h3>💻 Computer says "no" :(</h3>
    <p>Please check the highlighted form fields again.</p>
</div>
</form>
