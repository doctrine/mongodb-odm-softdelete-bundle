# Doctrine MongoDBSoftDelete Bundle

This bundle implements soft-deletion for Doctrine MongoDB ODM and Symfony2.

## Installation

* Grab this repository and [mongodb-odm-softdelete](/doctrine/mongodb-odm-softdelete) into your Symfony project
* Add `Doctrine\Bundle\MongoDBSoftDeleteBundle\DoctrineMongoDBSoftDeleteBundle` to your Kernel#registerBundles() method
* Add autoloader for Doctrine\ODM\MongoDB\SoftDelete and Doctrine\Bundle namespaces

