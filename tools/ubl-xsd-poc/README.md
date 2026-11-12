# Isolated UBL 2.1 Invoice XSD POC

This tool-only proof of concept does not implement a production invoice
generator, alter application contracts, sign XML, connect to SUNAT, or assert
SUNAT-profile/business-rule compliance.

## Schema source

The schema bundle comes from the official OASIS UBL 2.1 OS archive:

`https://docs.oasis-open.org/ubl/os-UBL-2.1/UBL-2.1.zip`

The downloaded archive SHA-256 is
`60b80d76394a8a2add90723ecb8e0e2e9d826775de9749df37a72d60703f86ed`.
Its complete `xsd/` subtree (79 XSD files) is retained under
`schema-bundle/xsd/`; generation and validation use the local
`maindoc/UBL-Invoice-2.1.xsd` and relative imports/includes only.

## Dependency isolation

The app's `composer.json` and `composer.lock` are not modified. The package
dependencies and generated classes/metadata are confined to this directory.
The app-level Composer dry-run required `--with-all-dependencies` because
xsd2php 0.4.14 accepts Symfony YAML through 7.x, while this app lockfile
selects 8.1.11. That solver proposed Symfony YAML 7.4.23 plus package installs;
no app dependency changes were applied.

The POC was evaluated in the running `laravel.test` container with PHP 8.4.1,
Laravel 12.71.0, Composer 2.8.3, libxml 2.9.14, and DOM/libxml extensions.

## Commands

Run from the repository root, with the `laravel.test` Sail service running:

```sh
docker compose exec -T laravel.test composer install --working-dir=tools/ubl-xsd-poc --no-interaction --no-scripts --prefer-dist
docker compose exec -T -w /var/www/html/tools/ubl-xsd-poc laravel.test vendor/bin/xsd2php convert xsd2php.yml schema-bundle/xsd/maindoc/UBL-Invoice-2.1.xsd -vv
docker compose exec -T -w /var/www/html/tools/ubl-xsd-poc laravel.test php bin/generate-synthetic-invoice.php
docker compose exec -T -w /var/www/html/tools/ubl-xsd-poc laravel.test vendor/bin/phpunit
```

The PHPUnit tests serialize one explicitly synthetic invoice using generated
classes and JMS metadata, validate the resulting XML offline with DOM/libxml
against the official Invoice XSD, and test required-input and invalid-schema
handling. The XML is unsigned and synthetic.

All fixture identities, names, product details, tax category/scheme values,
and amounts are test-only inputs. They encode no taxpayer information, tax
calculation, or production business rule.
