![Quartiersplattform Banner](https://github.com/studio-arrenberg/quartiersplattform/raw/main/.github/assets/quartiersplattform-banner-02.jpg)

## Dokumentation für die Quartiersplattform
Hier finden sich alle Informationen und Einstellungen die für die korrekte Einrichtung des Plugins Ultimate Member benötigt werden.

### Plugin Ultimate Member

#### Installation
1. Installieren Sie das Plugin über den Wordpress Plugin Manager. [Ultimate Member](https://de.wordpress.org/plugins/ultimate-member/) 
2. Aktivieren Sie das Plugin.
3. Öffnen Sie den Bereich Ultimate Member im Wordpress Admin Panel.
4. Erstellen Sie die Seiten durch das Ultimate Member Plugin.
![Seiteneinstellungen](/documentation/assets/UM_Pages_Documentation.jpg)
<br>
<br>

#### Einstellungen Formulare
1. Tragen Sie auf der Seite `Profil` "*Dashboard-Menu --> Seiten --> Profil*" den Shortcode von Ultimate Member für das Profil Formular ein. Diesen finden Sie in den Ultimate Member Einstellungen im Bereich Formulare (kopieren&einfügen).
![Formulare](/documentation/assets/UM_Profilseite_Shortcode_.jpg)

<br>
<br>

2. Deaktivieren Sie das Profil Menü in den Einstellungen von Ultimate Member unter dem Reiter Design. `braucht man nicht`
![Profil Menü](/documentation/assets/UM_Design_Profilmenu_Documentation.jpg)
<br>
<br>

3. Deaktivieren Sie in den Einstellungen "*Allgemein --> Konto*" die Datenschutz, Nachrichten und die Konto löschen Registerkarte. `! muss das weg?`
![Datenschutz](/documentation/assets/UM_Allgemein_Konto_Documentation.jpg)



#### Einstellungen – E-Mail `audit`
1. Deaktivieren Sie unter dem Bereich E-Mail alle Benachrichtigungen, außer der Willkommens- der Aktivierungs- sowie den beiden Passwort E-Mails.
![E-Mail Einstellungen](/documentation/assets/E-Mail_Documentation.jpg)

#### Einstellungen – Weiterleitungen `automatisiert`
1. Stellen Sie in "*Ultimate Member --> Benutzerrollen*" die korrekten Weiterleitungen für die Benutzerrollen "*Subscriber*" und "*Administrator*" ein. Ändern Sie die Einstellung wie folgt als Registrierungs-, Anmelde- und Abmeldeoption:<br>
	* Maßnahmen, die nach der Anmeldung ergriffen werden --> Zu URL Umleiten<br>
	* Benutzerdefinierte Weiterleitungs-URL setzen --> quartiersplattform-domain.de** (Durch die Domain der Quartiersplattform Installation ersetzen)
![Benutzerrollen](/documentation/assets/UM_Benutzerrollen_Weiterleitung_Documentation.jpg)

***

## Anmerkungen

#### Einstellungen – Benutzer
1. In den Einstellungen von Ultimate Member unter dem Bereich Benutzer lassen sich die die Profilweiterleitung und das Mitgliederverzeichnis nicht aktivieren! Dies wird vom Theme verhindert.
![Benutzereinstellungen](/documentation/assets/UM_Allgemein_Benutzer_Documentation.jpg)











