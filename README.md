# Laravel Query Filter

A Laravel package to filter Eloquent queries based on model properties.

## Installation

### Step 1: Install the Package

You can install the package via Composer:

```sh
composer require sufian/laravel-query-filter
```

## Usage

Once installed, you can use the QueryFilter trait in your Eloquent model:

```php
use Sufian\LaravelQueryFilter\QueryFilter;

class YourModel extends Model
{
    use QueryFilter;
}
```

Then, you can apply filters to your queries:

```php
$filteredResults = YourModel::filter($request->all())->get();
```
### Available Filters
You can define filters by creating methods in your model class following the naming convention filter{PropertyName}:

```php
class YourModel extends Model
{
    use QueryFilter;
    
    public function filterName($query, $value)
    {
        return $query->where('name', $value);
    }
}
```
You can then apply the filter in your controller:

```php
$filteredResults = YourModel::filter($request->all())->get();
```
## Contributing
Thank you for considering contributing to this project! Please check the contributing guidelines for details.

## Security Vulnerabilities
If you discover a security vulnerability within this package, please send an e-mail to sufian at [rubel.nstu27@gmail.com](mailto:rubel.nstu27@gmail.com). All security vulnerabilities will be promptly addressed.

## License
This package is open-sourced software licensed under the MIT license.
