Contexy
=======

Contexy is a free laravel bundle that helps you create and bind different context menus to elements you want in your view very quickly and easily :)

#Now more flexible & Powerful !

it will use Jquery, Jquery-UI and Bootstrap for Styling ! 
when you make a contexy or many of them, it will bind the Context menu to the bindings you specify and whenever user right clicks on those elements ,it will appear in the clicked area ! and then with a click it will disapear ! 

## Installation

You can install this bundle by running the following CLI command:

```php
php artisan bundle:install Contexy
```
or 
You Can Download the files and put them in your Bundles Directory

Add the following line to application/bundles.php

```php
'contexy' => array('auto' => true),
```

Publish the bundle assets to your public folder.

```shell
php artisan bundle:publish
```

Add the following to your template's header view file to include the Jquery,Jquery UI and needed bootstrap classes

```php
Asset::container('header')->styles();
Asset::container('header')->scripts();
```

##Features ! (Updated) 
-Menu with unlimited Submenu
-support icons for each item
-define target for each link
-bind as many as contexy menu to specific elements in your page as you want !
-new configs : width, opacity, sortable, Background
-cross browser

##Usage
in your View files , you can add a Context menu as Simple as these examples ! 

#Simple Menu 

```php
contexy::make(array(
	'home'=>URL::to_route('home'),
	'login'=>URL::to_route('login'),
	'My FB'=>'http://www.facebook.com/maghrooni'));
```

#Menu with Submenu

```php
contexy::make(array(
	'home'=>'home_link',
	'user-menu'=>array(
		'login'=>URL::to_route('login'),
		'Register'=>URL::to_route('register'))
	));
```
#Menu with so many submenus ! 

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
				'User Interface'=>URL::to_route('ui'),
				'Catalogue'=>'catalogue_link'
				)
		))
	));
```

#Menu with icons ! 
	You can set any icons from bootstrap icon classes , or you can leave it as default icon ! 
	if you prefer to not include any icons you can change the config file to 'icon'=>''
	
```php
contexy::make(array(
	'home|icon:icon-lock'=>URL::to_route('home'),
	'login|icon:icon-lock'=>URL::to_route('login'),
	'My FB'=>'http://www.facebook.com/maghrooni'));
```

Specify the Target option or leave it ! Default is _blank
```php
contexy::make(array(
	'home|icon:icon-lock|target:_self'=>URL::to_route('home'),
	'login|icon:icon-lock'=>URL::to_route('login'),
	'My FB'=>'http://www.facebook.com/maghrooni'));
```

#Multiple Menus
Now You Can use Multiple Contexy on a Page ! and bind it on a Specific Element !
Just Pass the second argument as $menuID for example contexy , will be used as id="#contexy"
and third argument as $bindings , for example '".carousel,.users"' , pay attention to the  ' ".class,.class,#ID"  ' example...
```php
 contexy::make(array(
	'home'=>URL::to_route('home'),
	'login'=>URL::to_route('login'),
	'My FB'=>'http://www.facebook.com/maghrooni'),'contexy','".carousel,.user"');
 contexy::make(array(
	'home'=>URL::to_route('home'),
	'login'=>URL::to_route('login'),
	'My FB'=>'http://www.facebook.com/maghrooni'),'another_contexy','".navbar"');
```

#Note
-Do not Call Jquery Library Twice !(in case you already have it...)

[Visit my website][http://www.maghrooni.ir]
