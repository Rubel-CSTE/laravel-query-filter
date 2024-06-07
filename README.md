Laravel Query Filter
A Laravel package to filter queries based on model properties.

Installation
You can install the package via Composer:

bash
Copy code
composer require sufian/laravel-query-filter
Usage
Once installed, you can use the QueryFilter trait in your Eloquent model:

php
Copy code
use Sufian\LaravelQueryFilter\QueryFilter;

class YourModel extends Model
{
    use QueryFilter;
}
Then, you can apply filters to your queries:

php
Copy code
$filteredResults = YourModel::filter($request->all())->get();
Available Filters
You can define filters by creating methods in your model class following the naming convention filter{PropertyName}:

php
Copy code
class YourModel extends Model
{
    use QueryFilter;
    
    public function filterName($query, $value)
    {
        return $query->where('name', $value);
    }
}
You can then apply the filter in your controller:

php
Copy code
$filteredResults = YourModel::filter($request->all())->get();
Contributing
Thank you for considering contributing to this project! Please check the contributing guidelines for details.

Security Vulnerabilities
If you discover a security vulnerability within this package, please send an e-mail to Rubel at example@example.com. All security vulnerabilities will be promptly addressed.

License
This package is open-sourced software licensed under the MIT license.
