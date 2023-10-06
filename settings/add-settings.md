# Ajouter des paramètres au plugin

Dans le fichier *skazyrgpd-settings.php* :
- Ajouter une nouvelle ligne dans le tableau **$settings** comme ceci :

```php
[
    "id" => "Id du paramètre",
    "section" => "Catégorie du paramètre",
    "callback" => "Fonction à appeler pour afficher les champs",
    "page" => "skazyrgpd-admin"
]
```

- Ajouter une nouvelle ligne dans le tableau **$defaults** comme ceci :

```php
"id" => "valeur",
```

- Créez une fonction du même nom que celle donnée dans **"callback"** avec les balises input à afficher :

```php
function skazyrgpd_function_name_render(){
    $option = get_option('skazyrgpd_settings');
    ?>
    // Votre <input> ici
    <input type="" name="skazyrgpd_settings[Id du paramètre]" value="<?php echo $option['Id du paramètre']">
    <?php
}
```

## Ajouter un service

Ajouter d'abord un paramètre au plugin de type "radio" dans le fichier *skazyrgpd-settings.php* (voir au-dessus). 
Dans le fichier *skazyrgpd-tarteaucitron.php* :
- Ajouter une nouvelle ligne comme ceci :

```php
if ($options['nomDuParamètre'] == "true") : ?>
    // Code JavaScript à récupérer à partir de https://tarteaucitron.io/ 
<?php endif;
```

Si le paramètre requiert une chaine de caractère, créez un deuxième paramètre pour pouvoir modifier cette chaîne.

## Ajouter une catégorie

Dans le fichier *skazyrgpd-settings.php* :
- Ajouter une nouvelle ligne dans le tableau **$sections** comme ceci :

```php
[
    "id" => "Nom de la catégorie",
    "title" => "Titre de la catégorie",
    "callback" => "Fonction à rappeler",
    "page" => "Page sur laquelle afficher les paramètres"
]
```