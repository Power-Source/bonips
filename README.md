# BoniPress

**Deutsch** | [English](README.en.md)

[![Version](https://img.shields.io/badge/Version-1.0.0-2271b1?style=flat-square)](readme.txt)
![PHP](https://img.shields.io/badge/PHP-8.0%2B-777bb4?style=flat-square&logo=php&logoColor=white)
![WordPress](https://img.shields.io/badge/WordPress-bis%207.1.4-21759b?style=flat-square&logo=wordpress&logoColor=white)
![ClassicPress](https://img.shields.io/badge/ClassicPress-2.7.4-03768e?style=flat-square)
[![Lizenz](https://img.shields.io/badge/Lizenz-GPL--3.0--or--later-2ea44f?style=flat-square)](https://www.gnu.org/licenses/gpl-3.0.html)

**Deine Website. Deine Punkte. Deine Regeln.**

BoniPress bringt ein eigenes Punktesystem auf Deine WordPress- oder
ClassicPress-Website. Mitglieder können Punkte für ihre Aktivitäten erhalten,
Guthaben sammeln und – je nachdem, welche Funktionen Du aktivierst – Punkte
einlösen, übertragen oder für Inhalte und Einkäufe verwenden.

Du bestimmst, wie Deine Punkte heißen, wofür sie vergeben werden und welche
Möglichkeiten Deine Mitglieder haben. Ob „Community-Punkte“, „Bonussterne“
oder eine ganz eigene Bezeichnung: BoniPress passt sich Deinem Angebot an.

## Ein Beispiel aus der Praxis

Du betreibst eine Community und möchtest Mitglieder für ihre Beteiligung
belohnen:

1. Bei der Registrierung erhält ein neues Mitglied **50 Punkte**.
2. Für einen genehmigten Kommentar gibt es **5 Punkte**.
3. Ein täglicher Besuch wird mit **2 Punkten** belohnt.
4. Mitglieder sehen ihr Guthaben auf einer eigenen Seite und können sich in
   einer Bestenliste vergleichen.
5. Wer genügend Punkte gesammelt hat, erhält beispielsweise einen höheren
   Rang oder kann seine Punkte an ein anderes Mitglied übertragen.

Das sind nur Beispielwerte – Beträge, Bedingungen und Funktionen legst Du
selbst fest. Du kannst klein anfangen und weitere Möglichkeiten später
hinzufügen.

## Was BoniPress bietet

### Punkte verdienen und verwalten

- Vergib Punkte automatisch für Registrierungen, Logins, tägliche Besuche,
  Kommentare und veröffentlichte Inhalte.
- Belohne auch das Ansehen von Inhalten und Videos, Klicks auf entsprechend
  eingerichtete Links oder Empfehlungen.
- Lege fest, wie viele Punkte eine Aktion wert ist, und begrenze die Vergabe,
  wo entsprechende Einstellungen zur Verfügung stehen.
- Verwalte Guthaben im Administrationsbereich und sieh im Protokoll nach,
  wodurch Punkte vergeben oder abgezogen wurden.
- Verwende bei Bedarf mehrere Punkttypen, etwa getrennte Punkte für
  Community-Aktivitäten und Einkäufe.

### Erfolge und Guthaben zeigen

- Zeige Mitgliedern ihr aktuelles Guthaben und ihren Punkteverlauf.
- Erstelle Bestenlisten und mache besonders aktive Mitglieder sichtbar.
- Vergib Abzeichen für erreichte Ziele und erstelle Ränge mit eigenen Bildern.
- Informiere Mitglieder per E-Mail oder Popup über Punkteereignisse.

### Punkte einsetzen

- Lass Mitglieder Punkte an andere Mitglieder senden.
- Erstelle Gutscheine, mit denen Mitglieder ihrem Konto Punkte hinzufügen.
- Verkaufe Beiträge, Seiten oder Teile davon gegen Punkte.
- Ermögliche Punktzahlungen in unterstützten Shops und bei
  Veranstaltungsbuchungen.
- Biete den Kauf von Punkten an oder richte wiederkehrende Auszahlungen und
  Zinsen ein.

Für Abzeichen, Ränge, Überweisungen und weitere dieser Möglichkeiten aktivierst
Du die jeweilige mitgelieferte Erweiterung unter **Erweiterungen**. Bei
Zahlungen und Verbindungen zu anderen Plugins sind außerdem die jeweiligen
Anbieter beziehungsweise Plugins einzurichten.

## In wenigen Schritten zum eigenen Punktesystem

### 1. Installieren und einrichten

Installiere und aktiviere BoniPress über den Plugin-Bereich Deiner Website.
Öffne anschließend die **Ersteinrichtung** über den Hinweis im
Administrationsbereich.

Wähle die Bezeichnung in Einzahl und Mehrzahl, zum Beispiel „Bonuspunkt“ und
„Bonuspunkte“. Du kannst auch das Zahlenformat und die Anzahl der
Dezimalstellen festlegen. Für ganze Punkte verwendest Du **0 Dezimalstellen**.
Mit **Punkttyp erstellen** schließt Du die Einrichtung ab.

### 2. Aktionen belohnen

Öffne **Hooks**. Ein Hook ist eine Regel, die festlegt, was bei einer
bestimmten Aktion passiert.

Für das Beispiel mit Kommentaren:

1. Wähle den Hook für Kommentare und aktiviere ihn per Klick oder indem Du
   ihn in den Bereich für aktive Hooks ziehst.
2. Trage unter **Genehmigte Kommentare** bei **Mitglied** die gewünschte
   Punktzahl ein, zum Beispiel `5`.
3. Prüfe die Protokollvorlage und die Limits pro Beitrag und pro Tag. Dort
   bedeutet `0` bei den Limits **unbegrenzt**.
4. Speichere den Hook und teste ihn mit einem angemeldeten Benutzerkonto und
   einem genehmigten Kommentar.

Auf dieselbe Weise richtest Du weitere Aktionen ein, etwa die Belohnung für
eine Registrierung oder einen täglichen Besuch. Welche Einstellungen
verfügbar sind, hängt vom jeweiligen Hook ab.

### 3. Erweiterungen auswählen

Unter **Erweiterungen** aktivierst Du nur die Funktionen, die Du tatsächlich
brauchst. Einige Beispiele:

| Erweiterung | Wofür sie gedacht ist |
| --- | --- |
| **Abzeichen** | Mitglieder für erfüllte Anforderungen auszeichnen. |
| **Ränge** | Rangstufen anhand erreichter Punkte erstellen. |
| **Transaktionen** | Überweisungen zwischen Mitgliedern ermöglichen. |
| **Gutscheine** | Codes erstellen, die ein Punkteguthaben aufladen. |
| **Inhalt verkaufen** | Zugang zu ganzen Inhalten oder ausgewählten Teilen gegen Punkte anbieten. |
| **Gateway** | Punkte als Zahlungsmittel in unterstützten Shops und bei Veranstaltungen nutzen. |
| **Kreditkauf** | Mitgliedern den Kauf von Punkten anbieten. |
| **Banking** | Wiederkehrende Auszahlungen und Zinsen einrichten. |
| **E-Mail-Benachrichtigungen / Benachrichtigungen** | Über Ereignisse per E-Mail oder Popup informieren. |
| **Statistiken** | Gewinne und Verluste von Punkten auswerten. |
| **MarketPress** | Punktzahlungen und Belohnungen für MarketPress einrichten. |

### 4. Punkte auf Deiner Website anzeigen

Füge die folgenden kurzen Platzhalter in eine Seite oder einen Beitrag ein:

- `[bonips_my_balance]` zeigt angemeldeten Mitgliedern ihr aktuelles
  Guthaben.
- `[bonips_leaderboard]` zeigt eine Bestenliste.
- `[bonips_transfer]` zeigt ein Überweisungsformular. Dafür muss die
  Erweiterung **Transaktionen** aktiv sein.
- `[bonips_load_coupon]` zeigt das Formular zum Einlösen eines Gutscheins.
  Dafür muss die Erweiterung **Gutscheine** aktiv und eingerichtet sein.

Guthaben, Bestenlisten und Überweisungen lassen sich außerdem über Widgets
einbinden. Prüfe vor der Veröffentlichung, welche Angaben für Besucher und
andere Mitglieder sichtbar sind – insbesondere bei Bestenlisten und
Punkteverläufen.

## Zusammenarbeit mit anderen Plugins

BoniPress bietet unter anderem Verbindungen zu **PS Community**, **PS
Mitgliedschaften**, **CoursePress**, **Events and Bookings**, **WooCommerce**,
**BuddyPress**, **Contact Form 7** und **WP-Polls**. So kannst Du je nach
Integration beispielsweise Community-Aktivitäten, Formularübermittlungen,
Produktbewertungen oder die Teilnahme an Umfragen belohnen.

Die verfügbaren Möglichkeiten hängen davon ab, welche dieser Plugins auf
Deiner Website installiert und aktiviert sind. Richte anschließend den
passenden Hook oder die jeweilige Erweiterung in BoniPress ein.

## Häufige Fragen

**Muss ich alle Erweiterungen aktivieren?**  
Nein. Beginne mit den Funktionen, die Du brauchst, und aktiviere weitere
Erweiterungen später.

**Kann ich Punkte auch manuell anpassen?**  
Ja. Berechtigte Personen können Benutzerguthaben im Administrationsbereich
bearbeiten. Die Berechtigungen dafür lassen sich in den Einstellungen
festlegen.

**Warum erhält ein Mitglied keine Punkte?**  
Prüfe, ob der passende Hook aktiviert und gespeichert ist, ob die Aktion
seine Bedingungen erfüllt und ob ein Limit oder ein Ausschluss greift. Bei
Kommentaren kann beispielsweise die Genehmigung entscheidend sein.

**Kann ich verschiedene Arten von Punkten verwenden?**  
Ja. Neben dem ersten Punkttyp kannst Du in den Einstellungen weitere
Punkttypen anlegen und passend zu Deinem Angebot verwenden.

**In welchen Sprachen ist BoniPress verfügbar?**  
Die Ausgangssprache ist Deutsch; eine englische Übersetzung ist enthalten.

## PSOURCE Manager

Mit dem [PSOURCE Manager](https://psource.eimen.net/psource-manager/) kannst Du
PSOURCE-Plugins und -Themes installieren und aktualisieren.

## PSOURCE unterstützen

Du möchtest PSOURCE unterstützen? Auf der
[Unterstützungsseite](https://psource.eimen.net/spendenaktionen/psource-unterstuetzen/)
erfährst Du, wie das möglich ist.

## Hilfe und Lizenz

Ausführliche Anleitungen zu Hooks, Erweiterungen und Anzeigen findest Du in
der [BoniPress-Dokumentation](https://psource.eimen.net/wiki/ps-bonipress-dokumentation/).

BoniPress steht unter der [GPLv2 oder einer späteren Version](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html).
