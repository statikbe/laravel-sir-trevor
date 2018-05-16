# Sir Trevor implementation

## Installation
You can install this package via composer using this command:
```bash
composer require statikbe/laravel-sir-trevor
```  

Publish the config, javascript and css with:

```bash
php artisan vendor:publish --provider="Statikbe\SirTrevor\SirTrevorServiceProvider"
```  
This is the contents of the published config file:

```php
return [
    'class' => 'sir-trevor',
    
    'blocktypes' => ['Text', 'List', 'Quote', 'Video', 'Tweet', 'Heading', 'RichText', 'ImageExtended'],
    
    'js_path' => '/js/sir-trevor/sir-trevor.js',
    
    'css_path' => '/css/sir-trevor/sir-trevor.css',
    
    'icons_path' => '/assets/icons/sir-trevor/sir-trevor-icons.svg',
    
    'upload_url' => '/sir-trevor/upload',
    
    'upload_directory' => 'public/uploads',
    
    'language' => 'nl'
    
];
```  
Add to config/app.php inside the provider array
```php
Collective\Html\HtmlServiceProvider::class,
```  
Add to config/app.php inside the alias array
```php
'Form' => Collective\Html\FormFacade::class,
'HTML' => Collective\Html\HtmlFacade::class,
``` 


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
