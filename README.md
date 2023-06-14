## Blog
### Setup [project]
Pour utiliser ce projet, suivez les instructions ci-dessous :

- Télécharger le projet
- Extraire le projet dans un dossier nommé "blog" sur un serveur apache tel que XAMPP.
- Rendez-vous sur PhpMyAdmin, créer une base de donnée (nommé la comme vous la souhaitez)
- Cliquer sur la base de donnée que vous venez de créer et aller dans l'onglet "Importer"
- Cliquer sur le bouton "Choisir un fichier" et choisissez le fichier "sqlBlogP5.sql" qui est dans le dossier "blog" sur votre serveur apache
- Une fois tout cela fait, entrez dans le dossier "projet" et ouvrez le fichier ".env" et remplissez les données demandées

Pour le fichier env :
- DB_HOST = le nom d'hôte de la base de donnée, en général "127.0.0.1"
- DB_NAME = le nom que vous avez choisis à l'étape 3 de la base de donnée
- DB_USER = le nom d'utilisateur pour accéder à la base de donnée
- DB_PASSWORD = le mot de passe pour accéder à la base de donnée
- MAIL = l'email qui sera utilisé pour l'envoie de mail (formulaire de contact, mot de passe oublié)
- MAIL_PASSWORD = le mot de passe de votre email

Pour la prochaine étape vous devez avoir installer composer
(si vous ne l'avez pas d'installer : https://getcomposer.org/download/)

Une fois composer installer, lancer visual studio code, ouvrez le dossier "projet" et ouvrer un terminal, ecrivez ceci dans le terminal :
composer require phpmailer/phpmailer

C'est fini !

Pour vous connecter, rendez-vous sur un lien qui devrait ressembler à celui-ci :

http://localhost:8080/public?p=connexion

une fois sur la page cliquer sur "connexion" puis entrez les informations suivantes :
- Email : admin@gmail.com
- Mot de passe : admin
