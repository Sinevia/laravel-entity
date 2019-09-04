# Laravel Entity

Cool schemaless models for Laravel.

## Details ##
A streamlined entity-attribute-value (EAV) implementation for Laravel. This package is designed for quick plug and play "schemeless" prototyping. To achieve this the package uses only two database tables unlike the standard EAV (which uses at least three tables).

## Features ##

- Schemaless implementation with 2 database tables only.
- Entitiies have types. Each type is like a class (i.e. note, category, etc)
- Entitiies may have unlimited fields. Fields can have any value (string, int, float, array)
- Entitiies may have hierarchy (parent and children). Great when you have categories, or paths
- Ideal for quick prototyping
- Uses human friendly IDs (see https://github.com/Sinevia/php-library-uid)

## Installation ##

```
composer require sinevia/laravel-entity
```

## How to Use ##

```php
// 1. Create your model class
class Note extends \Sinevia\Entities\Models\Entity {
    function getType()
    {
        return 'note';
    }
}

// 2. Create new instance and add fields
$note = new Note();
$note->save();
$note->setFieldValue('Title','Note title');
$note->setFieldValue('Text','Note text');

// 3. Create new instance and add fields
$note = Note::find($noteId);
echo $note->getFieldValue('Title');
echo $note->getFieldValue('Text');

// 4. Iterate throuhh all notes
$note = Note::all();
foreach($notes as $note){
    echo $note->getFieldValue('Title');
}

```

## Table Schema ##

The following schema is used for the database.

| Entity    |                  |
|-----------|------------------|
| Id        | String, UniqueId |
| Status    | String           |
| Type      | String           |
| ParentId  | String, UniqueId |
| Sequence  | Integer          |
| Name      | String           |
| CreatedAt | DateTime         |
| DeletedAt | DateTime         |
| Udated At | DateTime         |

| Field     |                  |
|-----------|------------------|
| Id        | String, UniqueId |
| EntityId  | String, UniqueId |
| Key       | String           |
| Value     | JSON Text (Long) |
| CreatedAt | DateTime         |
| DeletedAt | DateTime         |
| UpdatedAt | DateTime         |
