---
title: Zwischenstand zum OpenBikeSensor
author: Jurek Lang
date: 2021-12-08T15:18:07.727Z
draft: false
featured_image: /wp-content/uploads/2021/12/screenshot-2021-12-07-at-16-13-13-openbikesensor-visualisierung-straßenabschnitte.png
categories:
  - update
tags:
  - Fahrrad
  - Open Data
  - Transportkollektiv
  - Citizen Science
  - OpenBikeSensor
---
Im Juli wurden hier im Hausi [OpenBikeSensoren](https://www.openbikesensor.org/) (OBS) gebaut. Das sind Sensoren, die man am Fahrrad befestigen kann, und die dann den Abstand nach rechts und links messen können. Warum? Weil wir das Gefühl hatten, dass einen die Autos immer zu eng überholen. Nun haben wir zweieinhalbtausend Überholvorgänge getrackt und wollen mal eine Zwischenbilanz ziehen.\
\
Fährt jemand mit einem OBS am Fahrrad durch die Stadt, so werden ständig die Daten gesammelt, neben den Überholabständen auch Zeit und Ort und viele mehr. Wird man nun überholt, so kann man am OBS einen Knopf drücken, und diese Daten werden markiert. Am Ende einer Fahrt hat man also eine große Tabelle von Daten. Natürlich verarbeitet man eine solche Tabelle nicht von Hand, sondern man hat ein [Portal](https://obs.verschwoer.haus), auf das man diese Daten hochladen kann und alle Daten von verschiedenen Benutzer:innen sammelt. Die Software für das Portal haben wir von den Entwickler:innen des deutschlandweiten OBS-Projekts übernommen und lassen sie nun auf den Servern des Verschwörhauses laufen. Auf diesem Portal kann man jetzt den gefahrenen Track anschauen, und man sieht, wo man wie eng überholt wurde. Einige Tracks sind auch öffentlich zugänglich.

![Darstellung eines Tracks vom Eselsberg in die Innenstadt mit mehreren Überholvorgängen.](/wp-content/uploads/2021/12/screenshot-2021-12-07-at-16-11-35-openbikesensor-portal.png)

Um jetzt aber zu erkennen, welche Straßen denn wirklich gefährlich sind, und wo wir "nur" die normalen 30% an Autos haben, die nicht wissen, dass es den gesetzlichen Mindestüberholabstand von 1,50m gibt, wollen wir natürlich nicht alle über 150 Tracks durchwühlen. Deswegen gibt es natürlich ein Skript, dass das für uns übernimmt: Dieses Skript sammelt alle Überholvorgänge aus allen Tracks, sortiert diese und ordnet sie Straßen zu und gibt uns am Ende eine GeoJSON, eine Datei, in der zu jeder Straße ein Haufen an Informationen steht - natürlich annonymisiert. 

![Histogramm der Überholabstände, Daten zur Straße und Kartenlegende](/wp-content/uploads/2021/12/screenshot-2021-12-07-at-16-28-07-openbikesensor-visualisierung-straßenabschnitte.png)

Neben der Verteilung der Überholabstände als Histogramm sehen wir auch Statistiken wie den durchschnittlichen Überholabstand, den Prozentsatz, wie viele Autofahrer:innen zu nah rankommen, und vieles mehr. Basierend auf den Prozentsatz können wir jetzt auch die Karte einfärben: Grün, wenn nur wenige Autofahrer:innen sich regelwiedrig verhalten, Gelb bei 50% und Rot bei mehr. Und schaut man dann mal auf die Karte, ergibt sich statt einem rosigen Bild eher ein rotes. Einige Straßen, die Probleme machen, sind den erfahrenen Fahrradfahrer:innen sicher bekannt: Söflinger Straße und Mähringer Weg sind wahrscheinlich die bekanntesten, hier ist die Straße neben den in der Mitte liegenden Tramgleisen sehr schmal, aber die Autos wollen halt trotzdem überholen.\
\
Die Karte mit den ganzen Daten zum selbst durchklicken haben wir[ hier](https://obs.verschwoer.haus/visualization/roads.html). Das sind jetzt viele Daten, wir haben einige durchgeschaut und überprüft, aber fehlerhafte Messpunkte können natürlich trotzdem noch vorkommen. Insgesammt sollte das aber dennoch einen ersten guten Eindruck vermitteln, wie es um den Fahrradverkehr in Ulm steht. 

### Wie geht es jetzt weiter?

Aus den Messergebnissen lassen sich klar politische Forderungen für ein besseres und sichereres Radfahren ableiten. Die Messergebnisse den Stadtverwaltungen präsentieren zu können, ist natürlich auf lange Sicht unser Ziel, damit dann notwendige Verbesserungen geschaffen werden können. Wie man aber auf der Karte sieht, sind einige Straßen super vermessen, bei anderen sieht es eher mau aus. Um also statistisch aussagekräftige Daten zu haben, müssen wir also immer weiter radeln und weiter messen. Hier suchen wir auch gerne Messfahrer :) Und auch bei uns Betreiber:innen des Portals wird sich wohl bald noch was ändern, wurde doch eine neue Software Version angekündigt.

Das OBS-Projekt ist also noch keineswegs abgeschlossen, aber jetzt ist ein guter Zeitpunkt, um mal einen Zwischenstand festzuhalten und zu teilen. Weitere Updates werden natürlich bei zeiten folgen und wir freuen uns drauf, Ulm fahrradsicherer zu machen.
