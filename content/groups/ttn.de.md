---
title: LoRaWAN / TTN
slug: ttn
menu: 
  main:
    title: 'LoRaWAN / TTN'
    parent: groups
type: page
---

Wir treffen uns jeden zweiten Mittwoch zum Thema LoRaWAN/The Things Network (TTN). Im weiteren Sinne geht's also um dieses “Internet of Things” und darüber wollen wir nicht abstrakt faseln, sondern selber machen, ausprobieren was möglich ist und dann gerne, aber eben auf dieser Basis, philosophieren.

Im vierwöchigen Wechsel gibt's einmal einen “Offenen Abend” und einmal den “Bastelabend”:

* Beim **OFFENEN ABEND** haben wir Zeit für alle deine/eure Fragen und Ideen. Alle Anwesenden und das Kernteam erklären gerne alles zum Thema und zwar von A bis Z. Manchmal gibt's zum Anfang vielleicht sogar einen Vortrag.
* Beim **BASTELABEND** soll Zeit sein an konkreten Projekten zu arbeiten. Auch hier sind natürlich alle willkommen und vor allem könnt' ihr eure eigenen Bastelprojekte mitbringen um daran zu arbeiten – Werkzeug und Unterstützung ist vorhanden. Evtl. hat das Kernteam an diesem Abend aber leider nicht Zeit Neulingen alle Grundlagen ganz in Ruhe zu erklären. Das soll aber niemanden vom Reinschauen abhalten.

**Regelmäßige Termine**

Alle zwei Wochen am Mittwochabend, ab 18:30 Uhr.

Dabei gibt's im vierwöchigen Wechsel einmal einen “Offenen Abend” und einmal den “Bastelabend”. komm' rein und einfach durchgehen, bis zum Lötlabor (Raum „Hase“). Wenn du dich nicht zurecht findest, trau' dich gerne jede:n anzusprechen. Manchmal ist in den vorderen Räumen wenig Licht an, lass' dich davon nicht aufhalten und komm nach hinten.

Den nächsten Termin findest du im [Kalender]({{< relref "/termine-und-oeffnungszeiten.md" >}}).

**Kontakt**

* Twitter: <https://twitter.com/ttn_ulm/>, bei Bedarf auch gerne DM.
* Channel im Verschwörhaus-internen Slack: #ttn
* Mail: info (ätt) ttnulm (pünkt) de

## Projekte

Im Umfeld des Verschwörhauses sind unzählige spannende Projekte mit LoRaWAN entstanden. Im Folgenden eine kleine Auswahl.

### Münsterplatine

![Foto der Münsterplatine](/wp-content/uploads/2022/03/ttn_minster-node.jpeg)

**Einstiegshürde** Als 2016 die ersten The Things Network- und LoRaWAN-Aktivitäten in Ulm begannen, kosteten durchschnittliche LoRaWAN-Nodes 50,00 € und mehr. Wir fanden das viel zu viel, um LoRaWAN einfach mal ausprobieren zu können. Daher entschieden wir uns, eine eigene Node zu designen und strebten dabei einen Stückpreis von 10,00 € an.

**Hardwareentwicklung** Zu solch einer Entwicklung gehört neben der Auswahl der geeigneten Mikroelektronik-Bauteile, die Erstellung eines Platinenlayouts und in unserem Falle die händische Bestückung der Platine mit den Komponenten.

**Ergebnis** Die Münsterplatine basiert auf dem Microcontroller Arduino Pro Mini (ATmega328, 8 MHz, 3,3 V), einem RFM95-LoRa-Funkmodul und hat die Form des Ulmer Münsters. Sie kann über einen externen Akku betrieben werden und diesen auch über USB laden. Wir verwenden sie auf verschiedenste Arten in unseren eigenen Projekten und Workshops.

* [Platinendesign auf github](https://github.com/verschwoerhaus/ttn-ulm-pcb)

### Hochwassersensor

![Foto des Hochwassersensors unter der Herdbrücke](/wp-content/uploads/2022/03/ttn_hochwassersensor.jpeg)

**Unnötige Umwege** Die Radwege an der Donau unterhalb der Herdbrücke sowie an der Blau (nahe In der Wanne), werden bei Hochwasser oft überschwemmt und sind dann nicht mehr befahrbar. Damit man das nicht erst merkt, wenn man davor steht, haben wir zusammen mit der Digitalen Agenda zwei Hochwassersensoren an diesen Stellen angebracht.

**Sensorik** Mit Ultraschall wird der Abstand zwischen Sensor und Fahrbahn gemessen. Der Sensor ist über Kopf angebracht und kann Abweichungen im Millimeterbereich erkennen. Wenn dieser Abstand dauerhaft kleiner wird, steht vermutlich Wasser auf der Fahrbahn. Die Differenz des normalen Abstands und des aktuellen Abstands gibt die Höhe des Wasserpegels an. Ausreißer, Schwankungen und weitere Störfaktoren werden herausgefiltert. Der Sensor arbeitet mit einer Akkuladung bis zu 3 Jahre lang autark und versendet seine Daten per LoRaWAN an eine Datenbank im Internet.

**Webseite und offene Daten** Wenn der Pegel über mehrere Minuten bis Stunden ansteigt, wird Hochwasser gemeldet. Unter https://hochwasser.ttnulm.de kann man jederzeit den aktuellen Status der Sensoren und die Historie der Wasserstände einsehen.

* [Hochwasserstatus](https://hochwasser.ttnulm.de)
* [Hochwasserstatus-API](https://hochwasser.ttnulm.de/apidoc)
* [Decentlab Ultrasonic Distance Level Sensor](https://www.decentlab.com/products/ultrasonic-distance-/-level-sensor-for-lorawan)

### OpenBike

![Foto OpenBike Wifi-Trackers Lortinchen](/wp-content/uploads/2022/03/ttn_wifi-tracker.jpeg)

**Freie Software von der Stadt für alle** Im Rahmen des Projekts [radforschung](https://radforschung.org/) entsteht das Open Source Fahrradverleihsystem [OpenBike](https://openbike.ulm.dev/). Dahinter steckt kein hippes Start-up mit der Suche nach einem privatwirtschaftlichen Businessmodell, sondern die Vision zusammen mit der Stadt Ulm, durch überall verfügbares, gutes Bikesharing unsere Mobilität ein wenig nachhaltiger, vielfältiger und angenehmer zu gestalten. Aktuell befindet sich OpenBike im Test mit Beschäftigten der Stadt Ulm und Freiwilligen des Verschwörhauses.

**Aktueller Funktionsumfang** OpenBike umfasst dabei nicht nur eine direkt im Smartphone-Browser aufrufbare Weboberfläche zur Ausleihe eines Rads, sondern auch die auf LoRaWAN aufbauenden Tracker. Der eigens entwickelte Tracker Lortinchen ermittelt seine bzw. die aktuelle Position des Fahrrads nicht über GPS, sondern kalkuliert sie anhand der aktuell verfügbaren WiFi-Netzwerke. Diese Technik wird auch von Smartphones genutzt, um bei schlechtem GPS-Empfang in Häuserschluchten eine räumliche Lokalisierung zu ermöglichen. Die Kommunikation mit dem OpenBike-Server erfolgt energieeffizient über LoRaWAN.

* [Überblicksrepository auf github](https://github.com/transportkollektiv/openbike)

### Autarkes Hochbeet

![Fotos des autarken Hochbeets vor dem Verschwörhaus](/wp-content/uploads/2022/03/ttn_hochbeet.jpeg)

**Automatischer grüner Daumen** Man sieht es gar nicht auf den ersten Blick, aber das vor dem Verschwörhaus aufgestellte Hochbeet ist nicht nur eine hübsch anzusehende Blumen-Bank, sondern kompensiert auch so manchen nicht vorhandenen grünen Daumen (Zaubern kann es aber leider auch nicht). Es überwacht völlig autark die Bodenfeuchte und bewässert bei Bedarf die beiden Blumenkästen.

**Funktionsweise** Die Bodenfeuchte wird dabei über ein Tensiometer ermittelt. Solch ein Tensiometer misst dabei den Saugdruck, den eine Pflanze in ihren Wurzeln aufbringen muss, um Wasser aus dem Boden zu saugen. Überschreitet der Saugdruck einen bestimmten Schwellwert, wird die Bewässerung gestartet. Dazu pumpt das Beet aus zwei großen Wassertanks, die sich jeweils unterhalb der Blumenkästen befinden, Wasser in die Blumenkästen. Neben Bodenfeuchte und Wasserstand werden auch verschiedene Umweltparameter ermittelt und über LoRaWAN an ein Dashboard übertragen, sodass das Hochbeet bequem aus der Ferne überwacht werden kann.

* [Hochbeet Dashboard](https://ttndata.cortex-media.de/grafana/d/c80ycHXWk/hochbeet-verschworhaus?orgId=1&from=now-7d&to=now)
* [Source Code auf github](https://github.com/verschwoerhaus/ttn-ulm-hochbeet-node)

### Rissüberwachung

![Foto Risssensors am Ulmer Münster](/wp-content/uploads/2022/03/ttn_risssensor.jpeg)

**Problemstellung** Im [Ulmer Münster](https://www.ulmer-muenster.de/) bilden sich an verschiedenen Stellen im Mauerwerk Risse. Das ist für ein jahrhundertealtes Gebäude natürlich und nicht besorgniserregend, sollte jedoch überwacht werden. Aktuell werden die Risse händisch mit einer Schieblehre abgelesen und deren Veränderungen so dokumentiert. Dieses Vorgehen ist aufwendig – insbesondere, wenn sich die Rissmarken teils in luftiger Höhe an der Decke oder den Außenwänden des Münsters befinden.

**Sensorik** Um die Breite der Risse bzw. die Abstände zwischen den beiden Mauerseiten automatisch zu messen wird ein Laser-Laufzeit-Sensor eingesetzt (“time of flight”). Außerdem werden die Umweltfaktoren Temperatur, Luftfeuchtigkeit und Luftdruck gemessen.

**Projekt** Zusammen mit der [Münsterbauhütte](http://www.muensterbauamt-ulm.de/) haben wir einen Prototypen zur automatischen Abstandsmessung entwickelt und zwei davon testweise am Münster angebracht. Die gemessenen Werte werden per LoRaWAN alle 15 Minuten an die Münsterbauhütte übertragen. Dadurch können insbesondere schnelle Veränderungen im Mauerwerk direkt erkannt werden. Im Gegensatz zur manuellen Messung, die teilweise nur einmal pro Jahr vorgenommen werden kann, ist außerdem eine kontinuierliche Überwachung möglich.

**Aktueller Stand** Da der verwendete Abstandssensor eigentlich für den Einsatz in Smartphones entwickelt wurde, schwanken die Werte der Abstandsmessungen leider noch stark. Ein Teil der Schwankungen wird durch die o.g. Umweltfaktoren verursacht. Unser aktuelles Ziel ist es, ein mathematisches Modell zu entwickeln, um damit die gemessenen Werte zu korrigieren – ideal wäre eine Genauigkeit von weniger als einem Millimeter.

* [Source Code auf github](https://github.com/jaqPi/ttn-ulm-muenster-monitor)
