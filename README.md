# Bootstrap Icon

Utility to get the markup of Bootstrap icons (https://icons.getbootstrap.com/)

Installation
---

```sh
composer require aeyoll/bootstrap-icons
```


Usage
---

### Get an icon markup:

```php
use Aeyoll\BootstrapIcons\BootstrapIcons;

$bi = new BootstrapIcons();
$alertIcon = $bi->getIcon('alarm');
```

### Display an icon markup:

```php
use Aeyoll\BootstrapIcons\BootstrapIcons;

$bi = new BootstrapIcons();
$bi->displayIcon('alarm'); // Echo "<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" ...
```
