ci-bootstrap
=============

A collection of tools for easily integrating Bootstrap components into CodeIgniter projects.


## Installation

1. Copy the `/application/views/bootstrap/` folder into your own CodeIgniter's `application/views` folder.


## Usage

### Breadcrumbs
A **view** which outputs HTML. Accepts:

* **items**: an array containing the crumbs.  Each item should be a key-value pairs of strings:
  * *key*: the URL the crumb should link to.  Basic strings are run through `site_url()`, while #page_anchors and external links are left alone.
  * *value*: the visible area of the crumb.  Can contain HTML.


##### Example:
```php
$this->load->view('bootstrap/breadcrumbs', array(
	'items' => array(
		'' => 'Home',
		'library' => 'Library',
		'data' => 'Data'
	)
));
```
##### Outputs:
```html
<ol class="breadcrumb">
	<li><a href="http://{{your_url}}/index.php">Home</a></li>
	<li><a href="#library">Library</a></li>
	<li><a href="http://{{your_url}}/index.php/data">Data</a></li>
	<li class="active">This Page</li>
</ol>
```
