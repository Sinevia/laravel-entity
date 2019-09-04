# Laravel Entity

A streamlined entity-attribute-value (EAV) implementation for Laravel. This package is designed for quick plug and play "schemeless" prototyping. To achieve this the package uses only two database tables unlike the standard EAV (which uses at least three tables).

## Installation ##

```
composer require sinevia/laravel-entity
```

## How to Use ##
```
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
