# html

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
