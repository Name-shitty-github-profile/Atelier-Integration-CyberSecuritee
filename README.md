# Atelier Intégration CyberSécuritée
Un atelier présentable qui a le but d'intégrer des élèves du secondaire aux Cégeps.
# Sujets
Cet atelier va toucher les sujets suivants :
* L'OSINT
* Les failles MYSQL
* Exploitation de pages web non sécurisées
* Force brute
* Le rançongiciel

Chaque sujet est lier d'une manière à une autre, tu ne peux pas sauter un sujet sans qu'il te manque quelque chose.
# Le rançongiciel
L'ordinateur central va avoir un site web en plein écran qui ressemble l'affichage d'un rançongiciel qui prend en charge un code pour débloquer l'ordinateur.

Pour cette partie il faut :
* le code
# Force Brute (le code)
Un site web où les pirates rangent les codes de rançongiciel, qui permet d'essayer divers mots de passe pour un pseudonyme spécifique, donc une attaque de Force Brute.

Pour cette partie il faut :
* Le pseudonyme
* Les mots de passe
# Partie OSINT (pseudonyme)
Nous allons donner aux étudiants une simple photo de quelqu'un, ils vont devoir effectuer une recherche inversée par image pour trouver le profil Instagram de la personne.

Ensuite ils vont aller voir les publications de la personne et un commentaire sur l'une des publications contient la question suivante : "Quel est ton pseudonyme sur les autres réseaux sociaux?" et sa réponse va nous donner son pseudonyme.

Pour cette partie aucun prérequis n'est nécessaire.
# Partie des Failles MYSQL / Exploitation de pages web non sécurisées (les mots de passe)
Nous allons dire que la personne est inscrite sur le site du marché local de Saint-Tite, ce site possède deux possibilités pour donner tous les mots de passe.

### Faille MYSQL
Le site possède une page pour les mots de passe oubliés, cette page donne le mot de passe selon le nom de l'utilisateur, une faille MYSQL est possible sur cette page, donc faire une faille MYSQL peut donner tous les mots de passe sur le site.

### Exploitation de pages web non sécurisées
Le site possède aussi une page d'administrateur, qui liste tous les mots de passe ainsi que nom d'utilisateurs, créations, etc.

En simplement modifiant l'URL pour accéder à cette page, il est possible d'avoir la liste de mots de passe.
# Mise en marche
## Ordinateur principal avec projecteur
1. Ouvrir le projecteur
2. Partager votre écran au projecteur en mode duplication
3. Ouvrir le fichier index.html du dossier "SiteVirus"
4. Faire F11 pour le mettre en plein écran

## Stations de la classe
### PartieWeb en local
1. Ouvrir tous les ordinateurs dans un environnement protégé (destructions de travaux personnels impossibles)
2. Mettre le dossier PartieWeb dans le dossier www de Uwamp
3. Ouvrir Uwamp
4. Ouvrir le navigateur www
5. Ouvrir la page PartieWeb/init_db.php
6. Mettre sur l'index du site

### PartieWeb avec un domaine
1. Ouvrir tous les ordinateurs dans un environnement protégé (destructions de travaux personnels impossibles)
2. Ouvrir l'url du site web avec tout les ordinateurs
3. Ouvrir la page PartieWeb/init_db.php sur un seul ordinateur
4. Mettre sur l'index du site

## Dossiers de mise en situation
1. Imprimer le fichier miseEnSituation.docx en couleur
2. Le donner aux étudiants du secondaire lors de leurs tours
3. Les reprendre après (optionnel)