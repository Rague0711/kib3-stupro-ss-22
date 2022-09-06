# Lehrer Dokumentation / Teacher Documentation

## Deutsch
Dieses Dokument soll als Anleitung für Lehrkräfte dienen, die das __Jupyter Notebook__ Plugin in ihrem Moodle Kurs einrichten wollen.\
Es wird erklärt wie Lehrende ein __Jupter Notebook__ einem Kurs hinzufügen können sowie spezifische Einstellungen vornehmen können.

### Voraussetzungen
Um dieses Plugin verwenden zu können sollte es zuvor auf der Moodle Seite installiert worden sein.\
Außerdem ist eine laufende Instanz von JupyterHub erforderlich.\ 
Diese sollte zuvor von Ihrem IT-Administrator eingerichtet worden sein.\
Weitere Informationen dazu finden Sie in der IT-Administrator-Dokumentation.\

### Einbindung des Plugins in einen Kurs
1. Navigieren Sie zur __Startseite__.
2. Wählen Sie den Kurs aus, indem sie das Plugin verwenden möchten.
3. Aktivieren Sie die Bearbeitung  mit __Bearbeiten einschalten__ oben rechts.
   ![courseEditingOn](images/bearbeitenEinschalten.png)
4. Klicken Sie auf __"Aktivität oder Material anlegen"__ und wählen Sie das __Jupyter Notebook__ Plugin.
   ![addActivity](images/aktivitaetAnlegen.png)
   ![jupyterPlugin](images/jupyterNotebookWaehlen.png)
5. Geben Sie einen Namen für ihre Jupyter Instanz an. \
   Um ihre Jupyter Notebook Dateien an die im Kurs eingeschriebenen Studierenden zu verteilen, müssen Sie sie zunächst in einem Git-Repository hochladen (z. B. [GitLab](https://gitlab.com/) oder [GitHub](https://github.com/)).\
   Nun müssen Sie die URL des Repositorys und den zu verwendenden branch angeben (der Standardbranch heißt `main` oder `master`) sowie die Datei angeben, die geöffnet werden soll.
6. Falls erwünscht, können Moodle spezifische Einstellungen auf dieser Seite vorgenommen werden.  
7. Nun kann gespeichert und angezeigt werden.

## English
This document is intended as a guide for teachers who want to set up the __JupyterNotebook__ plugin in their Moodle course.
It explains how instructors can add a __JupyterNotebook__ to a course and how to set specific preferences.

### Prerequisites
To make use of this plugin it should be installed on your Moodle site. Also, a running instance of JupyterHub is necessary.\
This should have been set up by your IT-administrator beforehand.\
For further information on that regard please refer to the IT-administrator documentation.\

### Add plugin to course
1. Go to __Site Home__.
2. Click on the course you want to use the plugin in.
3. __Turn editing on__ at the top right.
   ![courseEditingOn](images/courseEditingOn.png)
4. Click on __"Add an activity or resource"__ and add the __Jupyter Notebook__ plugin as an activity.
   ![addActivity](images/addActivity.png)
   ![jupyterPlugin](images/addJupyter.png)
5. Put in a name for your Jupyter Instance.\
   To distribute Jupyter Notebook files to students enrolled in the course, you need to upload them to a remote git repository (i.e., [GitLab](https://gitlab.com/) or [GitHub](https://github.com/)).\
   When including the plugin in a Moodle course, you need to provide the URL of the repository, the branch you want to use (the default branch is called `main` or `master`), and specify the file you want to be opened.
6. Optionally, specify moodle specifig settings.  
7. Save and return to the course.
