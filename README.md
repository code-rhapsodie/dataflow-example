# Code Rhapsodie Dataflow example

## Requirements

* A SGDB server (MySQL, MariaDB, or other...).
* PHP 7.1+
* composer

## Install

Clone this repository or download an archive.

Open your favorite terminal, and go into `dataflow-example` folder.
Execute this command to install all vendor dependencies :

```shell script
$ php composer install -o
```

## Configure

Add `.env.local` at the root of the project with the configuration for connecting to the databases.

## Dump the SQL query

Execute this command to dump all necessary SQL queries:

```shell script
$ php bin/console code-rhapsodie:dataflow:dump-schema --update
```

Execute queries on your databases.

## Try

Now you can use all command to try Dataflow bundle.
