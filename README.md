## Installation

1. Add `'Andytt\Uuid\UuidServiceProvider'` to `providers` array in `app/config/app.php`.
2. Add Alias to `aliases` array in `app/config/app.php`.
 * For example, `'Uuid' => 'Andytt\Uuid\Facades\Uuid'`.

## Usage

[API wiki](https://github.com/andytt/laravel-uuid/wiki/API)

```
Uuid::get(4); // Get version 4
Uuid::get(5, [namespace], [name]); // Get version 5
```

## License

Base on: [ramsey/uuid](https://github.com/ramsey/uuid)

This is licensed under the [MIT License](http://opensource.org/licenses/MIT)
