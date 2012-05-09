# Doctrine MongoDB SoftDelete Bundle

This bundle implements soft-deletion for Doctrine MongoDB ODM and Symfony2.

## Installation **(Symfony 2.0.x only)**

##### 1. Add the following to your `deps` file:

```ini
[doctrine-odm-softdelete]
    git=git://github.com/doctrine/mongodb-odm-softdelete.git

[DoctrineMongoDBSoftDeleteBundle]
    git=git://github.com/doctrine/mongodb-odm-softdelete-bundle.git
    target=bundles/Doctrine/Bundle/MongoDBSoftDeleteBundle
```

##### 2. Run the vendors install script:

```
php bin/vendors install
```

##### 3. Add the `Doctrine\\ODM\\MongoDB\\SoftDelete` namespace to `app/autoload.php`:

```php
<?php
// ...
    $loader->registerNamespaces(array(
        // ...
        'Doctrine\\ODM\\MongoDB\\SoftDelete' => __DIR__ . '/../vendor/doctrine-odm-softdelete/lib',
```

##### 4. Setup the bundle to load in `app/appKernel.php`:

```php
<?php
// ...
        $bundles = array(
        // ...
            new Doctrine\Bundle\MongoDBSoftDeleteBundle\DoctrineMongoDBSoftDeleteBundle(),
```

## Configuration

Add the following to `config.yml` to get started:

```yml
doctrine_mongodb_softdelete:
    deleted_field_name: deletedAt
```