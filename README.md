# Skazy RGPD (version 2023)

Extension pour installer tarteaucitron sur un site WordPress avec page d'option pour respect du RGPD.

## Installation

- Créér un fichier .zip avec le dossier **skz-tarteaucitron**
- Installer le plugin (fichier zip) via l'installateur Wordpress
- Dans l'administration Wordpress se rendre dans **Réglages > Tarteaucitron** et configurer le plugin (couleur bandeau, lien page de politique de protection des données, ...)
  _**(Certains service ont des configurations spéciales, se referer au site de tarteaucitron.)**_

PS : Il arrive que certains services existent mais ne soit pas encore sur le site officiel de tarteaucitron, il vous faudra alors le chercher dans le fichier JS (https://tarteaucitron.io/cache/tarteaucitron.services.js)

## Snazzy Maps

Nous n'utilisons plus directement Google API pour des raisons diverses. Nous préférons employer Snazzy Maps car il permet notamment une plus grande souplesse graphique.
Afin d'implémenter cette fonctionnalité, vous devez d'abord l'activer dans le menu de configuration et indiquer l'ID.

Ensuite rajouter dans votre code à l'emplacement de votre Google Maps :

```html
<div class="snazzymaps-container" zoom="1" latitude="0" longitude="0" style="width: 100%; height: 600px;"></div>
```

## MapBox

Nous utilisons Mapbox pour customiser encore plus l'api GoogleMap en facilitant la création des markers. Une fois activé, vous pouvez
utiliser du js Custom via le textarea de l'administration ou bien implémenter la fonction js detailsMapBoxJs() dans votre page pour totalement écrire l'appel à votre convenance.

Rajouter dans votre code à l'emplacement de votre Google Maps :

```html
<div id="map" class="mapbox-container" data-lat="-22.24443" data-long="166.4504709" data-zoom="15" data-zoom-max="18" data-icon="/templates/skazy9/dist/img/icon-google.png"></div>
```

NB : data-icon est optionnel.


# Reste à faire
- voir pour ajouter des onglets pour les differentes sections des paramètres
- optimiser +++ le code
