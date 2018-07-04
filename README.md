# Laravel Entity

A streamlined entity-attribute-value (EAV) implementation for Laravel. This package is designed for quick plug and play "schemeless" prototyping. To achieve this the package uses only two database tables unlike the standard EAV (which uses at least three tables).

## Installation ##

```
composer require sinevia/laravel-entity
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
