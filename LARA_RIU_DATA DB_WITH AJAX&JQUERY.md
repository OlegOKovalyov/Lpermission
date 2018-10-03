**Laravel 5.5 READ, INSERT, UPDATE DATA DATABASE WITH AJAX&JQUERY**
________________________________________________________________________________


<small><i>
Laravel 5.5 Advance Read Data From Database With Ajax Jquery Part 1 <br></i></small>
--------------------------------------------------------------------------------
Source: https://www.youtube.com/watch?v=ZkGNY07aZh0&t=1274s
Author: Alex Petro<br>
Published on Sep 17, 2017


1. Создаем контроллер:

$ php artisan make:controller AjaxController

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
	public function index()
	{
		return view('ajax.index');
	}
}

```

2. Создаем view-файл для метода index() /resources/ajax/index.blade.php:

@extends ('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Dashboard</div>
				<div class="panel-body">
					<table class="table table-bordered table-striped table-condensed">
						<thead>
							<tr>
								<th>ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Full Name</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

3. Создаем маршрут:

```php
Route::get('students','AjaxController@index');
```