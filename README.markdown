# SoftDeleteBundle

This bundle implements soft-deletion for Doctrine ODM and Symfony2.

## Installation

This bundle requires no configuration. To enable it, simply import its DI
configuration from your project configuration:

    # app/config/config.yml

    imports:
        - { resource: @SoftDeleteBundle/Resources/config/soft_delete.xml }
