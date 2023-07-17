# Plugin Skazy RGPD WordPress 2023

## Installation

Télécharger le dépôt dans un dossier compressé .zip

Sur votre projet WordPress :
- Aller dans "Extensions" > "Ajouter" > "Téléverser une extension",
- Sélectionner le dossier compressé ou le glisser-déposer sur la page,
- Cliquez sur "installer maintenant".

## Activation du plugin

Après l'installation, activez le plugin.
La page admin du plugin devrait apparaître tout en bas du menu d'administration, elle se nomme "Skazy RGPD".

Les options ne sont pas visible sur cette page parce que la table ou elle sont stockées n'existe pas encore, il vous faudra donc faire ceci :

- Déroulez "Paramètres plugin" > Cliquez sur "Installer / Réinitialiser la BDD" > Confirmer

Cela va créer la table skazyrgpd dans la base de données WordPress et va créer toutes les options du plugins dans celle-ci.

Et voilà ! Le plugin à été installé et activé avec succès.

## Liste des paramètres disponibles

### Général

- Couleur de fond du bandeau
- Couleur du texte du bandeau
- URL de la politique de confientialité
- Position de la popup sur la page
- Titre affiché dans la popup
- Contenu affiché dans la popup

### Avancé

- Position dans le body HTML
- ID CSS du bandeau
- Nom du cookie pour stocker les paramètres
- Grouper les services par catégorie
- État d'activation des services par défaut
- Affichage de la bannière d'alertes
- Affichage de la liste des cookies
- Affichage de l'icône cookie
- URL de l'icône cookie
- Position de l'icône sur la page
- Alerte si bloqueur de pub
- Bouton tout accepter
- Bouton tout refuser
- Désactiver l'activation auto des services
- Refuser les cookies si requête Do Not Track
- Retirer le lien vers tarteaucitron.io
- Afficher "plus d'informations"
- Utiliser le CSS externe
- Utiliser le JS externe
- Nom de domaine pour les cookies partagés
- URL du lien "plus d'informations"
- Afficher les cookies essentiels
- Afficher le bouton accepter désactivé quand les cookies essentiels sont affichés

### Services

Services pouvant être activés par défaut sur ce plugin

- Google Tag Manager
- Google Analytics (ga.js)
- Matomo
- Zopim
- YouTube
- YouTube API
- Vimeo
- Facebook Likebox
- Facebook chat
- Google Maps
- Services personnalisés

### Plugin

- Réinitialiser les paramètres à leur valeur par défaut
- Réinitialiser la table du plugin de la BDD
