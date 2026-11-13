=== BoniPress ===
Contributors: PSOURCE
Tags: point, credit, loyalty program, engagement, reward
Requires at least: 4.9
Requires CP: 2.7
Tested up to: 7.1.4
ClassicPress: 2.7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Dein Punktesystem für Community, Mitgliederbereich und Online-Shop: Aktivitäten belohnen, Erfolge zeigen und Punkte vielseitig einsetzen.

== Description ==

BoniPress bringt ein eigenes Punktesystem auf Deine WordPress- oder ClassicPress-Website. Mitglieder sammeln Punkte für ihre Aktivitäten und können sie – je nach Deinen Einstellungen – einlösen, übertragen oder für Inhalte und Einkäufe verwenden.

Du entscheidest, wie Deine Punkte heißen, wofür sie vergeben werden und welche Möglichkeiten Deine Mitglieder haben. Nenne sie zum Beispiel Community-Punkte oder Bonussterne und gestalte Dein Belohnungssystem passend zu Deiner Website.

= Ein Beispiel aus der Praxis =

Du betreibst eine Community und möchtest Deine Mitglieder für ihre Beteiligung belohnen:

1. Bei der Registrierung erhält ein neues Mitglied 50 Punkte.
2. Für einen genehmigten Kommentar gibt es 5 Punkte.
3. Ein täglicher Besuch wird mit 2 Punkten belohnt.
4. Mitglieder sehen ihr Guthaben auf einer eigenen Seite und können sich in einer Bestenliste vergleichen.
5. Wer genügend Punkte gesammelt hat, erreicht beispielsweise einen höheren Rang oder überträgt Punkte an ein anderes Mitglied.

Die Beträge sind Beispiele. Du legst selbst fest, welche Aktionen belohnt werden und wie viele Punkte es dafür gibt.

= Punkte verdienen und verwalten =

* Vergib Punkte für Registrierungen, Logins, tägliche Besuche, Kommentare und veröffentlichte Inhalte.
* Belohne auch das Ansehen von Inhalten und Videos, Klicks auf entsprechend eingerichtete Links oder Empfehlungen.
* Lege für jede aktivierte Aktion die Punktzahl und, wo verfügbar, passende Limits fest.
* Verwalte Benutzerguthaben und sieh im Protokoll nach, wodurch Punkte vergeben oder abgezogen wurden.
* Erstelle bei Bedarf mehrere Punkttypen, etwa für Community-Aktivitäten und Einkäufe.

= Erfolge sichtbar machen und Punkte einsetzen =

* Zeige Guthaben, Punkteverläufe und Bestenlisten auf Deiner Website.
* Vergib Abzeichen und erstelle Ränge für erreichte Ziele.
* Informiere Mitglieder per E-Mail oder Popup über Punkteereignisse.
* Ermögliche Überweisungen zwischen Mitgliedern und erstelle Gutscheine zum Aufladen von Guthaben.
* Biete Inhalte gegen Punkte an oder nutze Punkte als Zahlungsmittel in unterstützten Shops und bei Veranstaltungen.
* Biete den Kauf von Punkten an oder richte wiederkehrende Auszahlungen und Zinsen ein.

Funktionen wie Abzeichen, Ränge, Gutscheine und Überweisungen werden über die mitgelieferten Erweiterungen aktiviert. Für Zahlungen und Verbindungen zu anderen Plugins müssen außerdem die jeweiligen Anbieter beziehungsweise Plugins eingerichtet sein.

= Erweiterungen =

Unter „Erweiterungen“ kannst Du die Funktionen auswählen, die Du für Dein Punktesystem brauchst:

* **Abzeichen und Ränge:** Mitglieder für erfüllte Anforderungen und erreichte Punktestände auszeichnen.
* **Transaktionen:** Überweisungen zwischen Mitgliedern ermöglichen.
* **Gutscheine:** Codes erstellen, mit denen Mitglieder Punkte ihrem Guthaben hinzufügen.
* **Inhalt verkaufen:** Zugang zu Beiträgen, Seiten oder Teilen davon gegen Punkte anbieten.
* **Gateway und MarketPress:** Punktzahlungen und, mit MarketPress, Belohnungen für Einkäufe einrichten.
* **Kreditkauf und Banking:** Punktekäufe, wiederkehrende Auszahlungen und Zinsen anbieten.
* **E-Mail-Benachrichtigungen und Benachrichtigungen:** Mitglieder per E-Mail oder Popup informieren.
* **Statistiken:** Gewinne und Verluste von Punkten auswerten.

= Zusammenarbeit mit anderen Plugins =

BoniPress bietet unter anderem Verbindungen zu PS Community, PS Mitgliedschaften, CoursePress, Events and Bookings, WooCommerce, BuddyPress, Contact Form 7 und WP-Polls. So kannst Du je nach Integration beispielsweise Community-Aktivitäten, Formularübermittlungen, Produktbewertungen oder die Teilnahme an Umfragen belohnen.

Die verfügbaren Möglichkeiten hängen davon ab, welche Plugins installiert und aktiviert sind. Richte anschließend den passenden Hook oder die jeweilige Erweiterung in BoniPress ein.

== Installation ==

1. Installiere und aktiviere BoniPress über den Plugin-Bereich Deiner Website.
2. Öffne die **Ersteinrichtung** über den Hinweis im Administrationsbereich.
3. Lege die Bezeichnungen für Einzahl und Mehrzahl fest, zum Beispiel „Bonuspunkt“ und „Bonuspunkte“. Wähle das gewünschte Zahlenformat; für ganze Punkte verwendest Du 0 Dezimalstellen.
4. Schließe die Einrichtung mit **Punkttyp erstellen** ab.
5. Öffne **Hooks** und aktiviere die Aktionen, für die Du Punkte vergeben möchtest. Lege die Beträge und gegebenenfalls Limits fest und speichere Deine Einstellungen.
6. Aktiviere unter **Erweiterungen** die zusätzlichen Funktionen, die Du verwenden möchtest, und richte sie ein.
7. Teste Dein Punktesystem mit einem Benutzerkonto, bevor Du es Deinen Mitgliedern vorstellst.

= Beispiel: Punkte für Kommentare =

Aktiviere unter **Hooks** den Hook für Kommentare per Klick oder ziehe ihn in den Bereich für aktive Hooks. Trage unter **Genehmigte Kommentare** bei **Mitglied** beispielsweise 5 Punkte ein und prüfe die Protokollvorlage und die Limits pro Beitrag und pro Tag. Bei diesen Limits bedeutet 0 „unbegrenzt“. Speichere den Hook und teste ihn mit einem angemeldeten Benutzerkonto und einem genehmigten Kommentar.

= Guthaben und Funktionen anzeigen =

Füge diese Shortcodes in eine Seite oder einen Beitrag ein:

* `[bonips_my_balance]` – zeigt angemeldeten Mitgliedern ihr aktuelles Guthaben.
* `[bonips_leaderboard]` – zeigt eine Bestenliste.
* `[bonips_transfer]` – zeigt ein Überweisungsformular; die Erweiterung **Transaktionen** muss aktiv sein.
* `[bonips_load_coupon]` – zeigt ein Gutscheinformular; die Erweiterung **Gutscheine** muss aktiv und eingerichtet sein.

Guthaben, Bestenlisten und Überweisungen lassen sich außerdem über Widgets einbinden. Prüfe vor der Veröffentlichung, welche Angaben für Besucher und andere Mitglieder sichtbar sind – insbesondere bei Bestenlisten und Punkteverläufen.

== Frequently Asked Questions ==

= Muss ich alle Erweiterungen aktivieren? =

Nein. Beginne mit den Funktionen, die Du brauchst, und aktiviere weitere Erweiterungen später.

= Kann ich Punkte manuell anpassen? =

Ja. Berechtigte Personen können Benutzerguthaben im Administrationsbereich bearbeiten. Die Berechtigungen dafür lassen sich in den Einstellungen festlegen.

= Warum erhält ein Mitglied keine Punkte? =

Prüfe, ob der passende Hook aktiviert und gespeichert ist, ob die Aktion seine Bedingungen erfüllt und ob ein Limit oder ein Ausschluss greift. Bei Kommentaren kann beispielsweise die Genehmigung entscheidend sein.

= Kann ich verschiedene Arten von Punkten verwenden? =

Ja. Neben dem ersten Punkttyp kannst Du in den Einstellungen weitere Punkttypen anlegen und passend zu Deinem Angebot verwenden.

= Welche Sprachen sind verfügbar? =

Die Ausgangssprache ist Deutsch; eine englische Übersetzung ist enthalten.

= Wo finde ich weitere Hilfe? =

Ausführliche Anleitungen zu Hooks, Erweiterungen und Anzeigen findest Du in der [BoniPress-Dokumentation](https://psource.eimen.net/wiki/ps-bonipress-dokumentation/).

== PSOURCE Manager ==

Mit dem [PSOURCE Manager](https://psource.eimen.net/psource-manager/) kannst Du PSOURCE-Plugins und -Themes installieren und aktualisieren.

== PSOURCE unterstützen ==

Du möchtest PSOURCE unterstützen? Auf der [Unterstützungsseite](https://psource.eimen.net/spendenaktionen/psource-unterstuetzen/) erfährst Du, wie das möglich ist.

== Changelog ==

= 1.0.0 =

* Erste öffentliche Version.

