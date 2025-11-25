# Tom Troc - Site de mise en relation pour lecteurs

## Description

Tom Troc est une application PHP utilisant le modèle MVC pour mettre en contact des lecteurs via une bibliothèque d’échange et de partage de livres.  
Ce projet est un **MVP** (Minimal Viable Product), une première version fonctionnelle évolutive.

## Prérequis

- PHP 8.2 ou ultérieur
- Extension GD activée
- Composer (gestionnaire de dépendances PHP) installé
- Serveur web (exemple : Apache avec XAMPP)
- Base de données MySQL ou équivalente

## Installation et démarrage

1. **Clonage du dépôt**

    ```bash
    git clone <url-du-projet>
    cd <dossier-du-projet>
    ```

2. **Configuration**

   Renommez le fichier **_config.php** situé dans *app/Config* en **config.php**.  
   Modifiez les informations de connexion à la base de données si nécessaire.

3. **Installation des dépendances**

    ```bash
    composer install
    ```

4. **Base de données**

    Importez le fichier **tom_troc.sql** dans votre base de données avec phpMyAdmin, Adminer ou directement en ligne de commande :
    ```bash
    mysql -u <utilisateur> -p <nom_de_la_base> < tom_troc.sql
    ```

5. **Lancement de l’application**

    Accédez au chemin du répertoire *public* avec votre navigateur (exemple : http://localhost/dossier-du-projet/public).

6. **Connexion au site**

    Pour tester l'application, vous pouvez vous connecter avec **dave@mail.com** ou l'un des comptes suivants avec le mot de passe **password** :
    - lotrfanclub67@mail.com
    - victoirefabr912@mail.com
    - annikabrahms@mail.com
    - verogo33@mail.com
    - ml95@mail.com
    - sas634@mail.com
    - lolobzh@mail.com
    - louetben50@mail.com
    - hamza@mail.com
    - christiane75014@mail.com
    - juju1432@mail.com
    - hugo1990_12@mail.com
    - alex@mail.com
    - nathalie@mail.com
    - camille@mail.com

## Notes

- Vérifiez l'activation de l’extension GD dans votre fichier *php.ini*.
- Redémarrez Apache en cas de modification.
- Composer vérifie la version de PHP et la présence de l’extension GD et renvoie un avertissement en cas de problème.