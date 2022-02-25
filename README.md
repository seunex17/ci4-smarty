![GitHub](https://img.shields.io/github/license/irsyadulibad/ci4-datatables)
![Hits](https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=seunex17/ci4-smarty)

# ci4-smarty
ci4-smarty
Easily implement the Smarty templating engine in your CodeIgniter 4 project.

**NOTE: This library is under early development.**

## Description
Separate the application logic from your presentation layer in CodeIgniter 4 using this clean and semantic pre-built Smarty template.


## Requirements
* Codeigniter 4.x
* Smarty 4.x

## Installation
Installation is best done via Composer, you may use the following command:

  > composer require zubdev/ci4smarty

This will simply add the latest release of **ci4-smarty** as a module to your project.


### Manual Installation

Should you choose not to use Composer to install, you can download this repo, extract and rename this folder to **ci4-smarty**. 
Then enable it by editing **app/Config/Autoload.php** and adding the **Zubdev\Ci4Smarty**
namespace to the **$psr4** array. For example, if you copied it into **app/Libraries**:
```php
    $psr4 = [
        'Config'      => APPPATH . 'Config',
        APP_NAMESPACE => APPPATH,
        'Zubdev\Ci4Smarty' => APPPATH . 'Libraries/Ci4Smarty',
    ];
```


## Example:
Here is an example of basic usage:
* PHP:
```php
<?php namespace App\Controllers;

use Zubdev\Ci4Smarty\Smartie;

class Home extends BaseController
{
	public function index() {
	   $smarty = new Smartie();
		
	   return $smarty->view('index');
	}
}
```

To pass data from the Controller to the View:
* PHP:
```php
<?php namespace App\Controllers;

use Zubdev\Ci4Smarty\Smartie;

class Admin extends BaseController
{
	public function index() {
	
	    $smarty = new Smartie();
	    $data = [
	      'name' => 'John Doe',
	    ];
		
	   return $smarty->view('admin/dashboard', $data);
	}
}
```

* View
```html
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	Welcome to admin dashboard {$name}
</body>
</html>

```


## Global Availability:

Expose the library to the entire application by modifying the BaseController: **app/Controllers/BaseController**
```php
<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Zubdev\Ci4Smarty\Smartie;

class BaseController extends Controller
{
   protected $request;
   protected $smarty;
   
   public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
       $this->smarty = new Smartie();
    }
}
```


* Controller:
```php
<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index() {
		
	   return $this->smarty->view('index');
	}
}
```

<br />

## Contributing:
All contributions are extremely appreciated.
