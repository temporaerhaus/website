---
title: Hochwassermessung per TTN – jetzt auch im Praxistest!
author: Jakob Pietron
type: post
date: 2021-02-14T18:35:58+00:00
featured_image: /wp-content/uploads/2021/02/PXL_20210130_112354382.MP_-768x1024.jpg
categories:
  - news
tags:
  - Hochwasser
  - TTN
  - Zukunftsstadt
---
Seitdem im Winter 2016 die ersten Gateways für das Community-Sensornetzwerk [The Things Network](https://thethingsnetwork.org/) in Ulm entstanden, beschäftigen wir uns auch im Verschwörhaus mit passenden und vor allem auch gerne witzigen Anwendungsfällen. Gemeinsam mit der Digitalen Agenda der Stadt entstand Ende 2018 die Idee, doch einfach mal zu überprüfen, ob Radverkehrsachsen von Hochwasser betroffen sind. Es gibt nämlich mehrere Stellen, die bei Hochwasser der Donau oder Blau überflutet werden – die Stelle des Donauradwegs unter der Herdbrücke ist beispielsweise so anfällig für Donauhochwasser, dass es sogar eine Schrankenanlage kurz vor der Stelle gibt, die im Überflutungsfall den Radverkehr auf dem Donauradweg über die Altstadt umleitet. Jedenfalls dann, wenn der Baubetriebshof davon Wind bekommen und die Schranken abgesenkt hat. Wir hatten uns deswegen überlegt, [Ultraschallsensoren](https://www.decentlab.com/products/ultrasonic-distance-/-level-sensor-for-lorawan) über der Fahrbahn zu montieren. Wie eine Fledermaus schicken diese – über der Fahrbahn hängend – Schallimpulse in Richtung der Fahrbahnoberfläche und messen die Zeit, bis das Echo wieder bei ihnen ankommt. Der Messwert wird dann per LoRaWAN übertragen – und dann legt sich der Sensor wieder „schlafen“, um Energie zu sparen.

Im Frühjahr 2019 wurden die Sensoren im Rahmen des Projekts „[Zukunftsstadt](https://www.zukunftsstadt-ulm.de/)“ beschafft und erst einmal im Verschwörhaus getestet. <a href="https://lora.ulm-digital.com/blog/hochwassermessung-in-ulm" data-cke-saved-href="https://lora.ulm-digital.com/blog/hochwassermessung-in-ulm">Im Juni 2019 konnte dann der erste Sensor installiert werden</a> – auch eine schöne Sache, wenn man sich als Hack- und Makespace Dinge ausdenkt und dann einige Monate später gemeinsam mit dem Baubetriebshof Sensoren ganz offiziell an Brücken kleben darf!

Was in der Theorie eine gute Idee ist, muss sich aber auch in der Praxis bewähren. Nur wie testet man einen Hochwassersensor? Da sich das temporäre Fluten des Fuß- und Radweges unter der Herdbrücke als keine praktikable Lösung herausstellte, hieß es: warten.

Warten bis zum 29.01.2021. Die Lokalpresse berichtete bereits eifrig seit dem Morgen, die Stadtverwaltung habe den Weg unter der Herdbrücke gesperrt, denn an diesem Tag würde womöglich das aus dem Allgäu über die Iller in die Donau fließende Hochwasser den Donauweg überfluten.

![Herdbruecke Graph](/wp-content/uploads/2021/02/2021-02-herdbruecke-graph.png)

Ab 12:45 Uhr konnten wir einen kontinuierlich schrumpfenden Abstand zwischen Sensor und Donau<s>weg</s> verzeichnen. An dieser Stelle sei erwähnt, dass der Donaupegel natürlich nicht &#8222;eckig&#8220; ansteigt, sondern unser Hochwassersensor nur alle 15 Minuten einen Messwert schickt und dadurch der treppenförmige Abfall des Abstandes zwischen Sensor und Weg bzw. Donau zu Stande kommt. Um 14.00 Uhr war dann auch nichts mehr vom Donauweg zu erkennen, dieser stand nun gut 85 cm unter Wasser.

![Hochwasser img](/wp-content/uploads/2021/02/PXL_20210130_121623172.MP_-1024x768.jpg)

Soweit, so technisch. Dashboards voller Graphen sind technische Spielereien, die man in einem durchschnittlichen Alltag eher weniger gebrauchen kann, daher ein Blick auf die Status-Anzeige unter <a href="https://hochwasser.ttnulm.de/" data-cke-saved-href="https://hochwasser.ttnulm.de/">https://hochwasser.ttnulm.de/</a>. Herdbrücke: Hochwasser. Funktioniert. Cool! Aber was ist mit dem Radweg an der Blau los? Kein Hochwasser? Merkwürdig &#8230;

Auch an der <a href="https://www.openstreetmap.org/?mlat=48.40386&mlon=9.94958#map=18/48.40386/9.94958" data-cke-saved-href="https://www.openstreetmap.org/?mlat=48.40386&mlon=9.94958#map=18/48.40386/9.94958">Radwegunterführung unter der Eisenbahnbrücke bei der Blau</a> wurde nämlich gemeinsam mit der Stadt ein Sensor angebracht. Dieses Zusammenspiel ist wirklich klasse: Die Unternehmerinitiative hatte die ersten Gateways installiert, weitere Gateways folgten aus der Zivilgesellschaft und weiteren örtlichen Unternehmen, und als zivilgesellschaftliche Gruppe konnten und können wir selber Input und Ideen anliefern, die dann z.B. von der Stadt aufgenommen werden. Dabei fällt auch auf, dass die Erfassung von Daten immer mit Ungenauigkeiten verbunden ist. So schwankte der per Ultraschall gemessene Abstand zur Fahrbahnoberfläche an der Herdbrücke in der Nacht immer wieder um mehrere Zentimeter. Wir dachten – wir sind ja keine Bauingenieur:innen – zuerst, dass das temperaturbedingte Ausdehnungserscheinungen an der Brücke selbst sind. Städtische Ingenieur:innen konnten uns aber davon überzeugen, dass das definitiv nicht der Fall ist: Wenn sich der Abstand der Brückenunterkante zur Fahrbahn wirklich um Zentimeter im Tagesverlauf ändern sollte, wäre das nicht etwa eine normale Erscheinung, sondern baulich wirklich bedenklich! Später kamen wir darauf, dass es eine Temperaturkonstante für die Ausbreitung von Ultraschall gibt, die temperaturabhängig ist – und der Sensor scheint das trotz dem, was auf der Packung steht, nicht zu kompensieren. Puh.

Trotzdem, es war seltsam, dass sich ausgerechnet jetzt, als Hochwasser sein sollte, an der Brücke unter der Blau nichts signifikant zu ändern schien. Also nicht im Bereich weniger Zentimeter, sondern so, dass die Änderung auf eine Überflutung des Radwegs hinweisen würde.

Sensornodes mit LoRaWAN zeichnen sich allgemein durch ihren sehr geringen Energiebedarf aus und die daraus resultierende Möglichkeit, diese autark über eine lange Zeit (1+ Jahre) mit einer Batterie zu betreiben. Das ist super praktisch, wenn man diese z.B. am Radweg entlang der Blau zwischen Ulm und Blaustein montiert. Wir alle wissen aber auch, dass Batterien natürlich genau dann leer gehen, wenn es spannend wird. So natürlich auch passiert beim Eisenbahnbrücken-Hochwassersensor an der Blau. Zwei Tage vor dem Hochwasser ging die Batterie leer – und keiner hat&#8217;s gemerkt. Ups. Warum? Der Sensor übermittelt zwar tapfer bis zum letzten Datenpaket seinen Batteriestand, aber es muss halt auch jemand die Daten angucken, auswerten und rechtzeitig hinfahren. Wenn das niemand macht, muss man halt hin, wenn es &#8222;spannend&#8220; ist. Allerdings ist &#8222;spannend&#8220; im Falle eines Hochwassersensors gleichzusetzen mit &#8222;Hochwasser&#8220; und Hochwasser erleichtert jetzt nicht unbedingt die Wartung eben dieses Sensors.

![Hochwasser img 2](/wp-content/uploads/2021/02/PXL_20210130_112838290.MP_-768x1024.jpg)

![Hochwasser img 3](/wp-content/uploads/2021/02/PXL_20210130_112809887.MP_-768x1024.jpg)

Auf den Fotos zu erkennen: Hochwasser macht das Wechseln einer Batterie nicht unbedingt einfacher!

(Fotos und waghalsiger Wartungseinsatz von [@dermatthias](https://twitter.com/dermatthias/))