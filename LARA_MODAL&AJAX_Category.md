**Complete CRUD Application with Laravel 5.5**
________________________________________________________________________________


<small><i>
04 - Creating Categories Table and Bootstrap Modal Window with Form <br>
05 - Insert Data to Database from Bootstrap Modal and Display Them on Table <br>
06 - Edit Data with Bootstrap Modal Window in Laravel 5 5 <br>
07 - Update Data from Bootstrap Modal Window to database in Laravel <br>
08 - Delete Data with Bootstrap Modal Window Confirm in Laravel 5.5 <br></i></small>
--------------------------------------------------------------------------------
Source 04: https://www.youtube.com/watch?v=w3EYwxlcSbE&index=5&list=PLB4AdipoHpxYmPdyI3e-yH58-3CS4qoAf
Source 05: https://www.youtube.com/watch?v=4MmfrFzvIxE&list=PLB4AdipoHpxYmPdyI3e-yH58-3CS4qoAf&index=6
Source 06: https://www.youtube.com/watch?v=Q2sXw_RCbis&list=PLB4AdipoHpxYmPdyI3e-yH58-3CS4qoAf&index=7
Source 07: https://www.youtube.com/watch?v=_FGaDD-VuYI&index=8&list=PLB4AdipoHpxYmPdyI3e-yH58-3CS4qoAf
Source 08: https://www.youtube.com/watch?v=DAitIOhxOOA&index=9&list=PLB4AdipoHpxYmPdyI3e-yH58-3CS4qoAf
Author: Code Inspire<br>
Published: on Jan 28, 2018




ДОБАВЛЕНИЕ КАТЕГОРИИ
=====================

СОЗДАЕМ МОДЕЛЬ ТАБЛИЦЫ БД
--------------------------

1. Создаем модель для наших категорий с миграцией. Для этого в папке проекта:

$ php artisan make:model Category -m
Model created successfully.
Created migration 2018_01_22_011911_create_categories_table

2. Открываем файл миграции 2018_01_22_011911_create_categories_table.php и 
задаем в нем структуру нашей новой таблицы 'categories':

```php
public function up()
{
	Schema::create('categories', function (Blueprint $table) {
		$table->increments('id');
		$table->string('title');
		$table->mediumText('description');
		$table->timestamps();
	})
}
```

3. Файл нашей модели, в которой объявлен класс Category, пока пустой:

```php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	//
}
```

СОЗДАЕМ ТАБЛИЦУ Categories в БД
--------------------------------

4. Создаем по структуре, что мы определили в файле миграции, новую таблицу
в нашей БД под названием 'categories' с помощью команды:

$ php artisan migrate

В результате чего видим появление новой таблицы в phpMyAdmin.

ОТОБРАЖАЕМ КАТЕГОРИИ НА ЭКРАНЕ В ПЕРВОМ ПРИБЛИЖЕНИИ
----------------------------------------------------

5. Для будущего отображения всего, что связано с нашими категориями создаем новую
папку /resources/views/categories/, а также первый файл в ней для отображения списка
категорий index.blade.php (автор назвал эту папку 'category':

```php
@extends('layouts.app')

@section('title', '| Categories')

@section('content')
```

6. В файле /resources/views/layouts/app.blade.php задаем пункт меню в сайдбаре
для ссылки на список наших категорий:


<li><a href="{{ route('categories.index') }}"><i class="fa fa-link"></i> <span>Categories</span></a></li>

Автор дает несколько другой вариант:

<li><a href="{{ url('category') }}"><i class="fa fa-link"></i> <span>Categories</span></a></li>

СОЗДАЕМ КОНТРОЛЛЕР
-------------------

7. Чтобы наша страница начала отображаться в браузере сначала создаем ресурсный контроллер
CategoryController.php (т.е. с заготовками для всех методов CRUD-операций: index(),
create(), store(), show(), update(), destroy() ):

$ php artisan make:controller CategoryController -r
Controller created successfully.

ЗАДАЕМ МАРШРУТ
---------------

8. Теперь задаем новый также ресурсный маршрут в файле /routes/web.php:

Route::resource('categories', 'CategoryController');

Вариант автора соответственно:

Route::resource('category', 'CategoryController');

Для проверки нашей работы:

$ php artisan route:list

и наблюдаем все созданные маршруты (у автора везде в ед.числе 'category'):


 Method		| URI					| Name					| Action
------------|-----------------------|-----------------------|------------------------------------------------
 POST		| categories			| categories.store 		| App\Http\Controllers\CategoryController@store
 GET |HEAD	| categories			| categories.index 		| App\Http\Controllers\CategoryController@index
 GET |HEAD	| categories/create		| categories.create 	| App\Http\Controllers\CategoryController@create 
 PUT |PATCH	| categories/{category} | categories.update 	| App\Http\Controllers\CategoryController@update 
 GET |HEAD 	| categories/{category} | categories.show 		| App\Http\Controllers\CategoryController@show 
 DELETE 	| categories/{category	| categories.destroy 	| App\Http\Controllers\CategoryController@destroy 
 GET |HEAD  | categories/{category}/edit | category.edit 	| App\Http\Controllers\CategoryController@edit 



ПЕРВЫЙ МЕТОД КОНТРОЛЛЕРА index()
--------------------------------

9. После этого реализуем метод index() в классе контроллера CategoryController:

```php
public function index()
{
	return view('categories.index');
}
```

ОТОБРАЖАЕМ КАТЕГОРИИ НА ЭКРАНЕ ВО ВТОРОМ ПРИБЛИЖЕНИИ
----------------------------------------------------

10. Теперь можно продолжить разработку кода файла /resources/views/categories/index.blade.php.

1) Добавляем заголовок

@extends('layouts.app')

@section('title', '| Categories')

@section('content')


<div class="user-administration">
    <h1><i class="fa fa-list"></i> Category Administration <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a></h1>
    <hr>
</div>    	

@endsection

2) Добавляем кнопку и форму для модального окна. Для этого ббращаемся к фреймворку 
Bootstrap 3.3.7 >> JavaScript >> Modal и копируем код из раздела 'Live demo':

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

и вставляем его в /resources/views/categories/index.blade.php. После чего
подгоняем данный html-код под свои нужды. Меняем заголовок и названия кнопок:

* Modal title на New Category
* Launch demo modal на Add New
* Save changes на Save

3) Далее добавляем саму форму, которая будет охватывать тело и футер модального окна:

<form>
	<div class="modal-body"></div>
	<div class="modal-footer"></div>	
</form>

и прописываем ей action и method:

<form action="{{ route('categories.store') }}" method="post"></form>

4) В теле модального окна прописываем наши поля ввода вместе с их метками:

<div class="form-group">
	<label for="title">Title</label>
	<input type="text" class="form-control" name="title" id="title">
</div>
<div class="form-group">
	<label for="des">Description</label>
	<textarea name="description" id="des" cols="20" rows="5" class="form-control"></textarea>
</div>

5) В modal-footer меняем тип кнопки Save на 'submit'.

6) Не забываем поставить защиту {{ csrf_field() }} сразу же после тега <form>.

ВТОРОЙ МЕТОД КОНТРОЛЛЕРА store()
--------------------------------

11. Пришло время написания метода store() контроллера CategoryController.php:

```php
public function store(Request $request)
{
	return $request->all(); // для проверки работоспособности - получаем post-массив
}
```

Сам же метод store() должен выглядеть так:

```php
	Category::create($request->all());
```

ОТЛАДКА
--------	

12. ОТЛАДКА. После объявления метода store() в браузере видим ошибку:

`Class 'App\Http\Controllers\Category' not found`

В контроллер CategoryController добавляем строку use App\Category;

Эта ошибка пропадает, но появляется новая:

`Add [_token] to fillable property to allow mass assignment on [App\Category].`


Для ее исправления мы должны в модели /app/Category.php указать закрытое свойство
$fillable, которому присвоить массив с именами полей таблицы categories, для 
которых разрешено массова заполнение:

```php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	//

	protected $fillable = ['title', 'description'];
}
```

Сразу после выполнения этих действий видим, что в таблице categories появилась
наша первая запись!

13. Завершаем написание метода store() контроллера CategoryController.php:

```php
public function store(Request $request)
{
	Category::create($request->all());
	return back();
}
```

и все работает как нужно! Однако у нас нет отображения данных из нашей таблицы
categories.

ЗАВЕРШАЕМ ОТОБРАЖЕНИЕ КАТЕГОРИЙ НА ЭКРАНЕ
------------------------------------------

14. Создаем таблицу и вставляем ее сразу после заголовка страницы.

<table class="table table-responsive">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Modify</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Name</td>
			<td>Description</td>
			<td>Edit / Delete</td>
		</tr>
	</tbody>
</table>

МЕТОД index() ВЫВОДИТ ДАННЫЕ ИЗ БД НА ЭКРАН
--------------------------------------------

15. Чтобы в таблицу на странице попадали данные из нашей таблицы в БД усовершенствуем
наш метод index() контроллера CategoryController.php. А именно прочитаем все 
значения из таблицы  categories нашей БД и передадим их :

```php
public function index()
{
	$categories = Category::all();
	return view('categories.index', compact('categories'));
}
```

Кроме того необходимо усовершенствовать представление нашей страницы на экране, 
добавив цикл @foreach, указав в нем переменные, которые нужно отражать:

<tbody>
	@foreach($categories as $cat)
		<tr>
			<td>{{ $cat->title }}</td>
			<td>{{ $cat->Description }}</td>
			<td>Edit / Delete</td>
		</tr>
	@endforeach
</tbody>

Теперь добавление записей и отображение их на странице в виде списка полностью
работает. Нобходимо добавить их редактирование и удаления.




РЕДАКТИРОВАНИЕ КАТЕГОРИИ
=========================

СОЗДАЕМ КНОПКУ 'Edit'
----------------------

1. Создаем кнопку 'Edit' в файле /resources/views/categories/index.blade.php:

<td>
	<button class="btn btn-info">Edit</button>
	/
	Delete
</td>

СОЗДАЕМ НОВОЕ МОДАЛЬНОЕ ОКНО
-----------------------------

2. Копируем модуль <!-- Modal -->, который мы создали для добавления категорий и
размещаем его сразу же под ним. Вносим следующие изменения:

1) Mеняем id модального окна с 'myModal' на 'edit'.

2) Добавляем новые атрибуты для кнопки 'Edit':

`data-toggle="modal" data-target="#edit"`

3) Для уменьшения дублирования кода, т.к.  поля для ввода данных при создании
категории и ее редактировании одинаковые, выносим их в отдельный файл
/resources/views/categories/form.blade.php:

<div class="form-group">
	<label for="title">Title</label>
	<input type="text" class="form-control" name="title" id="title">
</div>
<div class="form-group">
	<label for="des">Description</label>
	<textarea name="description" id="des" cols="20" rows="5" class="form-control"></textarea>
</div>

а их место в модальном теле двух popup-форм замещаем директивой @include:

<div class="modal-body">
	@include('categories.form')
</div>

4) В нашей новой модальной форме меняем название заголовка и клавиши submit:

* с 'New Category' на 'Edit Category'
* с 'Save' на 'Save Changes'

5) Меняем action формы на:

<form action="{{ route('categories.update') }}" method="post"></form>

Для проверки в инспекторе браузере можно набрать:

<form action="{{ route('categories.update','test') }}" method="post"></form>

ФУНКЦИОНАЛ КНОПКИ 'Edit' ОСНОВАН НА jQuery
-------------------------------------------

3. Чтобы обработать кнопку 'Edit', которых много на странице, необходимо
снова обратиться к документации Bootstrap 3.3.7 >> JavaScript >> Modal >>
раздел "Varying modal content based on trigger button", откуда берем код:

<script>
	$('#exampleModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var recipient = button.data('whatever') // Extract info from data-* attributes
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)
	  modal.find('.modal-title').text('New message to ' + recipient)
	  modal.find('.modal-body input').val(recipient)
	})
</script>

и вставляем его в конец файла /resources/views/layouts/app.blade.php после всех
js-скриптов между тегами <script></script>, несколько видоизменив его:

<script>
	$('#edit').on('show.bs.modal', function (event) {

	console.log('Modal Opened'); // Сообщение 'Modal Opened' можно увидеть в консоли инспектора браузера
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var recipient = button.data('whatever') // Extract info from data-* attributes
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)
	  modal.find('.modal-title').text('New message to ' + recipient)
	  modal.find('.modal-body input').val(recipient)
	})
</script>

В нашу кнопку 'Edit' добавляем новый атрибут, например, data-mytitle="hello" и 
соответственно меняем наш jQuery-код:

<script>
	$('#edit').on('show.bs.modal', function (event) {

	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var title = button.data('mytitle') // Extract info from data-* attributes
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)

	  modal.find('.modal-body #title').val(title)
	})
</script>

Видим, как 'hello' появляется в поле 'title' при нажатии на каждую кнопку 'Edit'.
Видоизменяем наш новый атрибут data-mytitle="{{ $cat->title}}", и видим, что в 
тех же полях 'title' уже содержатся реальные заголовки из нашей БД. Аналогично
проворачиваем и для поля 'description' только добавив id='des' к input-полю для 
'description':

<script>
	$('#edit').on('show.bs.modal', function (event) {

	  var button = $(event.relatedTarget);
	  var title = button.data('mytitle');
	  var description = button.data('mydescription');

	  var modal = $(this);

	  modal.find('.modal-body #title').val(title);
	  modal.find('.modal-body #des').val(description);
	})
</script>

Если мы нажмем клавишу 'Save Changes', то получим ошибку:

`No message`

МЕТОД КОНТРОЛЛЕРА update() + ОТЛАДКА
-------------------------------------

4. Создаем метод update() контроллера CategoryController. Сначала убираем
параметр $id и вводим проверочную хелпер-функцию dd():

```php
public function update(Request $request)
{
	dd($request->all());
}
```

5. Добавляем {{ method_field('patch') }} сразу после объявления <form></form>. 
После нажатия на одну из клавиш 'Edit' появляется модальное окно. Нажимаем 
'Save Changes' и получаем массив:

`array:4 [▼
  "_method" => "patch"
  "_token" => "IpC8cXXDKE0cfFE00h4pcrz4eNnvqRmJ3NOawrwi"
  "title" => "Title7"
  "description" => "Description7"
]`

При попытке изменить значения в полях ввода видим, что и данный массив тоже 
соответственно меняется. Т.е. все работае как  надо.

Приводим в порядок метод update():

```php
public function update(Request $request)
{
	Category::update($request->all());
	return back();
}
```

Оказывается метод update() не является статическим, и так '::' вызывать его нельзя.
Поэтому в тело нашей edit-формы добавляем скрытое поле:

<input type="hidden" name="category_id" id="cat_id" value="">

В нашу кнопку 'Edit' добавляем еще один параметр data-catid="{{ $cat->id }}" и 
соответственно в наш js-скрипт:

<script>
var cat_id = button.data('catid');
...
modal.find('.modal-body #cat_id').val(cat_id);
</script>

И теперь наш метод update() будет выглядеть так:

```php
public function update(Request $request)
{
	$category = Category::findOrFail($request->category_id); // соответствует значению name hidden-поля в форме
	
	$category->update($request->all());

	return back();
}
```
ВСЕ РАБОТАЕТ!!!




УДАЛЕНИЕ КАТЕГОРИИ
===================

1. Создаем кнопку 'Delete' в файле /resources/views/categories/index.blade.php:

<button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>

2. Копируем модуль <!-- Modal -->, который мы создали для редактирования категорий и
размещаем его сразу же под ним. Вносим следующие изменения:

1) Mеняем id модального окна с 'edit' на 'delete'.

2) Добавляем новые атрибуты для кнопки 'Delete':

`data-toggle="modal" data-target="#delete"`

3) Удаляем директиву @include('categories.form').

4) В нашей новой модальной форме меняем название заголовка и клавиши submit, а
также другие изменения:

* с 'Edit Category' на 'Delete Confirmation'
* добавляем класс для заголовка 'text-center'
* добавляем в тело модального окна параграф:
<p class="alert alert-danger text-center">
	<strong>Are you sure you want to delete this?</strong>
</p>
* с 'Save Changes' на 'Yes, Delete'
* с 'Close' на 'No, Cancel'
* меняем класс клавиши submit с 'primary' на 'warning'

5) Меняем action формы на:

<form action="{{ route('categories.destroy') }}" method="post"></form>

6) Задаем:

{{ method_field('delete') }}

3. Создаем метод destroy() в контроллере CategoryController:

```php
public function destroy($id)
 {
 	echo 'Delete data'; // проверка срабатывания метода в браузере при нажатии клавиши 'Yes, Delete'
 } 
```

4. Теперь нам нужно передать id категории с помощью jQuery аналогично как мы 
делали для метода update(). Поэтому создаем дубликат js-скрипта для клавиши
'Edit' и производим в нем необходимые изменения, чтобы работала клавиша 'Delete'
(а именно, убираем строки для 'title' и 'description':

<script>
  $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget);

      var cat_id = button.data('catid');
      var modal = $(this);

      modal.find('.modal-body #cat_id').val(cat_id);
  })
</script>

5. Добавляем кнопке 'Delete' из списка категорий новый атрибут `data-catid="{{ $cat->id }}"`.
Проверяем в инспекторе браузера при открытии списка категорий - мы видим, что
наша клавиша 'Delete' получила соответствующее числовое значение для нового параметра, 
например `data-catid=9`. После нажатия клавиши 'Yes, Delete' также в инспекторе
видим, что атрибут value скрытого поля также содержит соответствующее конкретное
значение, например:

<input type="hidden" name="category_id" id="cat_id" value="9">

6. Завершаем разработку метода delete():

```php
public function destroy(Request $request)
 {
        //    
        // echo 'Delete data'; // проверка срабатывания метода в браузере при нажатии клавиши 'Yes, Delete'
        // dd($request->category_id); // видим, что категория выбрана в БД для последующего удаления
        $categories = Category::findOrFail($request->category_id); // соответствует значению name hidden-поля в форме      
        $categories->delete();
        return back();   
 } 
```

