---
title: Ein Wochenende voller Wikidata
author: Stefan Kaufmann
type: post
date: 2016-12-07T16:55:24+00:00
url: /ein-wochenende-voller-wikidata/
featured_image: /wp-content/uploads/2017/01/wikidata-1200x676.jpg
categories:
  - Workshops
tags:
  - Code for Germany
  - OK Lab
  - SPARQL
  - Wikidata
  - Wikimedia
  - Wikipedia

---
Die [Wikipedia][1] kennen sicherlich die meisten – aber was es mit [Wiki_data_][2] auf sich hat, ist bislang immer noch ziemliches Insiderwissen. Deswegen waren am ersten Dezemberwochenende fast 50 Freiwillige [aus den OK Labs von Code for Germany][3] aus ganz Deutschland bei uns in Ulm zu Gast und haben sich dieses Projekt einmal genauer angesehen.

Wie die Wiki_pedia_ ist auch Wiki_data_ eines von [vielen Projekten][4] von [Wiki_media_][5] – das sind die, die zu Jahresende immer die Spendenbanner einblenden, und der deutsche Wikimedia Deutschland e.V. hatte auch zu diesem Wikidata-Wochenende eingeladen.

Das Besondere an Wikidata ist, dass es zum Einen die Datenquelle für möglichst viele andere Wikimedia-Projekte sein kann. Damit beispielsweise die Einwohnerzahl von Ulm, wenn sie sich ändert, nur beim [Wikidata-Ulm-Eintrag][6] geändert werden muss, und dann stimmt die Zahl auch in allen Sprachversionen der Wikipedia.

<!--more-->

{{< figure src="/wp-content/uploads/2017/01/johl.jpg" caption="Wikimedia-Urgestein @johl erklärt das Grundprinzip von Wikidata" >}}

Zum Anderen ist Wikidata aber keine „normale“, klassische Datenbank mit Schlüsseln und Werten, sondern beschreibt Aussagen wie „Ulm hat die Eigenschaft _Einwohnerzahl_, und zum 31.12.2013 war der Wert dieser Eigenschaft _119,218±0_“. Klingt kompliziert, ist aber im Diagramm vielleicht etwas verständlicher:

{{< figure src="/wp-content/uploads/2017/01/Wikidata_statement_de.svg" attr="[Wikidata\_statement\_mk.svg](/wiki/File:Wikidata_statement_mk.svg): *[Wikidata_statement.png](/wiki/File:Wikidata_statement.png): Lydia Pintscher derivative work: [Bjankuloski06en](https://commons.wikimedia.org/wiki/User:Bjankuloski06en) derivative work: [Kolja21](https://commons.wikimedia.org/wiki/User:Kolja21), [Wikidata statement de](https://commons.wikimedia.org/wiki/File:Wikidata_statement_de.svg), [CC BY-SA 3.0](https://creativecommons.org/licenses/by-sa/3.0/legalcode)" >}}

Das heißt, dass es zu einem bestimmten Schlüssel (z.B. „Einwohnerzahl“) nicht nur _einen_ Wert geben kann, sondern mehrere – zum Beispiel, wenn sich der Wert über die Zeit hinweg ändert, oder wenn es verschiedene Quellen zu einer Sache gibt, die sich widersprechen.

![](/wp-content/uploads/2017/01/wikidata_ws.jpg)

Mit diesen Daten sollen Menschen aber natürlich auch etwas anfangen können – deswegen gab es an diesem Wochenende umfangreiche Einführungen in Wikidata und die Abfragesprache SPARQL, und die Gelegenheit, eigene Prototypen und Anwendungen damit umzusetzen. Beispielsweise den Universal-Saarland-Umrechner, der automatisch für beliebige Städte, Länder oder andere Dinge angibt, wie groß sie in Saarland sind. Oder die sehr beeindruckende Einbindung unseres Matelights, das danach live aktuelle Änderungen visualisierte:

<blockquote class="twitter-tweet" data-lang="de">
  <p dir="ltr" lang="en">
    Wiki live edit <a href="https://twitter.com/hashtag/clubmate?src=hash">#clubmate</a> display by fionera in <a href="https://twitter.com/hashtag/Ulm?src=hash">#Ulm</a> &#8211; blue : new user, white :edit, violett : bot edit <a href="https://twitter.com/hashtag/okwiki?src=hash">#okwiki</a> <a href="https://twitter.com/hashtag/wikipedia?src=hash">#wikipedia</a> <a href="https://twitter.com/hashtag/matehacks?src=hash">#matehacks</a> <a href="https://t.co/4gSZ9BQnAa">pic.twitter.com/4gSZ9BQnAa</a>
  </p>
  
  <p>
    — Huelfe &#8211; N &#8211; Zero (@huelfe) <a href="https://twitter.com/huelfe/status/805332664102293504">4. Dezember 2016</a>
  </p>
</blockquote>



Es hat uns sehr gefreut, Gastgeber für dieses Wochenende sein zu dürfen!

Rückblicke und weitere Lektüre:

  * [Wikidata-Hackathon][16] (codefor.de)
  * [#wikidata #okwiki][17] (riedelwerk.de)
  * [Sketchnotes der Veranstaltung][18] (github.com, danke [@bleeptrack!][19])

![](/wp-content/uploads/2017/01/opening.png)

 [1]: http://de.wikipedia.org/
 [2]: https://www.wikidata.org/wiki/Wikidata:Main_Page
 [3]: http://codefor.de/
 [4]: https://de.wikipedia.org/wiki/Kategorie:Wikiprojekt
 [5]: https://de.wikipedia.org/wiki/Wikimedia
 [6]: https://www.wikidata.org/wiki/Q3012
 [15]: /wp-content/uploads/2017/01/wikidata_ws.jpg
 [16]: http://codefor.de/blog/wikidata
 [17]: https://riedelwerk.wordpress.com/2016/12/05/804-wikidata-okwiki/
 [18]: https://github.com/bleeptrack/wikidata-sketchnotes-2016
 [19]: http://www.bleeptrack.de/
 [20]: /wp-content/uploads/2017/01/opening.png