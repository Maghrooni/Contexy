Contexy
=======

Contexy is a free laravel 3 bundle that helps you create and bind a context menu to your view very quickly and easily :)


it will use Jquery, Jquery-UI and Bootstrap for Styling ! 
when you make a contexy , it will bind as Context menu and whenever user right clicks it will appear in the clicked area ! and then with a click it will disapear ! 

## Installation

Download the files and put them in your Bundles Directory

Add the following line to application/bundles.php

```php
'contexy' => array('auto' => true),
```

Publish the bundle assets to your public folder.

```shell
php artisan bundle:publish
```

Add the following to your template's header and footer view file to include the Twitter Bootstrap and Jquery's CSS and Javascript.

```php
Asset::container('header')->styles();
Asset::container('footer')->scripts();
```



##Usage
in your View files , you can add a Context menu as Simple as these examples ! 

Simple Menu 

```php
contexy::make(array(
	'home'=>URL::to_route('home'),
	'login'=>URL::to_route('login'),
	'My FB'=>'http://www.facebook.com/maghrooni'));
```

Menu with Submenu

```php
contexy::make(array(
	'home'=>'home_link',
	'user-menu'=>array(
		'login'=>URL::to_route('login'),
		'Register'=>URL::to_route('register'))
	));
```
Menu with so many submenus ! 

```php
contexy::make(array(
	'Home' => URL::to_route('home'),
	'Contact' => 'contact_us',
	'UserMenu>' => array(
		'Login' => 'login',
		'Register' => URL::to_route('register'),
		'Groups' => array(
			'Photography' => 'Photography_Link',
			'Web Development'=>'Web_Link',
			'Design'=>array(
				'Userr Interface'=>URL::to_route('ui'),
				'Catalogue'=>'catalogue_link'
				)
		))
	));
```

Menu with icons ! 
	You can set any icons from jquery ui or bootstrap icons , or you can leave it as default icon ! 
	if you prefer to not include any icons you can change the config file to 'icon'=>''
	
```php
contexy::make(array(
	'home|icon:ui-icon ui-icon-disk'=>URL::to_route('home'),
	'login|icon:icon-lock'=>URL::to_route('login'),
	'My FB'=>'http://www.facebook.com/maghrooni'));
```

Specify the Target option or leave it ! Default is _blank
```php
contexy::make(array(
	'home|icon:ui-icon ui-icon-disk|target:_self'=>URL::to_route('home'),
	'login|icon:icon-lock'=>URL::to_route('login'),
	'My FB'=>'http://www.facebook.com/maghrooni'));
```
[Visit my website][http://www.maghrooni.ir]
