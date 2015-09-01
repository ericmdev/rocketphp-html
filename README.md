# html

[![Build Status](https://travis-ci.org/rocketphp/html.svg?branch=master)](https://travis-ci.org/rocketphp/html)
[![Dependency Status](https://www.versioneye.com/user/projects/55e5eb448c0f620019000540/badge.svg?style=flat)](https://www.versioneye.com/user/projects/55e5eb448c0f620019000540)

[![Latest Stable Version](https://poser.pugx.org/rocketphp/html/v/stable)](https://packagist.org/packages/rocketphp/html)
[![License](https://poser.pugx.org/rocketphp/html/license)](https://packagist.org/packages/rocketphp/html)

`RocketPHP\HTML` is a component for object oriented HTML generation.

**_To construct HTML_** – start with an instance of HTML and add tags by accessing the tag’s method on that object.

```php
use RocketPHP\HTML\HTML;

$h = new HTML();
$div = $h->div('id="foo" class="bar"');
$div->p('Hello, World!');
echo $h;
```

```html
<div id="foo" class="bar">
  <p>
    Hello, World!
  </p>
</div>
```

- File issues at https://github.com/rocketphp/html/issues
- Documentation is at http://rocketphp.io/html
