# Laravel Query Filter

A Laravel package to filter Eloquent queries based on model properties.

## Installation

### Step 1: Install the Package

You can install the package via Composer:

```sh
composer require sufian/laravel-query-filter
```

## Usage

### Step 1: Use the Filterable Trait
Add the Filterable trait to the Eloquent models you want to filter:
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sufian\QueryFilter\Filterable;

class User extends Model
{
    use Filterable;
}
```

### Step 2: Create Filter Classes

To generate a new filter class, use the make:filter Artisan command followed by the name of the class you want to create. For example, to create a filter class for the User model, run:

```sh
php artisan make:filter YourModel Name
```
Example:
```sh
php artisan make:filter User
```
OR
Create filter classes in the App\Filters namespace for each model manually:

Example UserFilter Class

```php
namespace App\Filters;

use Sufian\QueryFilter\BaseFilter;
use Illuminate\Database\Eloquent\Builder;

class UserFilter extends BaseFilter
{
    protected $filters = ['name', 'email'];

    public function name(Builder $query, $value)
    {
        $query->where('name', 'like', '%' . $value . '%');
    }

    public function email(Builder $query, $value)
    {
        $query->where('email', 'like', '%' . $value . '%');
    }
}
```
### Step 3: Use the Filter in Controllers
You can now use the filter method in your controllers:

UserController
```php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::filter()->get();
        return response()->json($users);
    }
}
```
## Contributing

Thank you for considering contributing to the Laravel Query Filter package! Please read the [contribution guidelines]() for details on how to contribute.

## Security Vulnerabilities

If you discover a security vulnerability within this Laravel Query Filter package, please send an e-mail to sufian at [rubel.nstu27@gmail.com](mailto:rubel.nstu27@gmail.com). All security vulnerabilities will be promptly addressed.

## License
This package is open-sourced software licensed under the MIT license.
