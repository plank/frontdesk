<p align="center"><a href="https://plank.co"><img src="https://raw.githubusercontent.com/plank/frontdesk/main/.github/img-frontdesk%402x.png" width="100%"></a></p>
<p align="center">
<a href="https://packagist.org/packages/plank/frontdesk"><img src="https://img.shields.io/packagist/php-v/plank/frontdesk?color=%23fae370&label=php&logo=php&logoColor=%23fff" alt="PHP Version Support"></a>
<a href="https://github.com/plank/frontdesk/actions?query=workflow%3Arun-tests"><img src="https://img.shields.io/github/actions/workflow/status/plank/frontdesk/run-tests.yml?branch=main&&color=%23bfc9bd&label=run-tests&logo=github&logoColor=%23fff" alt="GitHub Workflow Status"></a>
<a href="https://codeclimate.com/github/plank/frontdesk/test_coverage"><img src="https://img.shields.io/codeclimate/coverage/plank/frontdesk?color=%23ff9376&label=test%20coverage&logo=code-climate&logoColor=%23fff" /></a>
<a href="https://codeclimate.com/github/plank/frontdesk/maintainability"><img src="https://img.shields.io/codeclimate/maintainability/plank/frontdesk?color=%23528cff&label=maintainablility&logo=code-climate&logoColor=%23fff" /></a>
</p>


# Frontdesk
Frontdesk simplifies the way you build a navigation bar using models within your Laravel application. Frontdesk treats a Navigation menu
like any other model, so you can have total, and dynamic control over the contents of your menus.


## Installation

You can install the package via composer:

```bash
composer require plank/frontdesk
```

## Usage

Frontdesk separates the concept of a navigation bar into 2 parts: 
the `Menu` and the `Hyperlink`. 
A `Menu` is a collection of `Hyperlink`s. 
Each `Hyperlink` can have a parent `Hyperlink` and a collection of child `Hyperlink`s. 

To that end you may have content that is "linkable" and content that is "menuable".

To use Frontdesk simply add the traits and implement the corresponding interfaces on your models.

### Linkable
```php

class MyModel extends Model implements Linkable
{
    use IsLinkable;
    
    public function linkTitle(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->title
        );
    }
    
    public function linkUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => route('my-model.show', $this)
        );
    }
}
```

### Menuable

```php
class MyMenuModel extends Model implements Menuable 
{
    use HasMenus;
}
```

### Saving Menus & Links

Once you have a few models that implement the appropriate interfaces you can start building your navigation bar.

```php
// Create a menu
$myMenu = MyMenuModel::find(1)->menus()->create([
    'identifier' => 'header-nav'
]); 
$myOtherMenu = MyMenuModel::find(1)->menus()->create([
    'identifier' => 'footer-nav'
]);

// Create a hyperlink referencing 
$myModelLink = MyModel::find(1)->hyperlinks()->create([
    'menu_id' => $myMenu->id,
]);

// A link also doesn't strictly need to be attached to a model
$myMenuLink = Hyperlink::create([
    'menu_id' => $myMenu->id,
    'title' => 'My Link',
    'url' => 'https://example.com',
]);

// You can also associate an existing hyperlink to an existing menu
$myMenuLink->menus()->associate($myOtherMenu)->save();
```

### Getting Menus & Links
After building a few menus, you can retrieve them using the `Menu` model, or via a model's relation to the `Menu` model.
```php
// Get a menu by identifier
$myMenu = Menu::where('identifier', 'header-nav')->first();

// Via a model relationship
$myMenu = MyMenuModel::find(1)->menus()->where('identifier', 'header-nav')->first();
```

Getting links out of the menu is as simple as calling the `hyperlinks` relationship on the `Menu` model.
```php
$myMenu->hyperlinks;
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email <a href="mailto:security@plankdesign.com">security@plankdesign.com</a> instead of using the issue tracker.

## Credits

-   [Massimo Triassi](https://github.com/m-triassi)
-   [Kurt Friars](https://github.com/kfriars)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
