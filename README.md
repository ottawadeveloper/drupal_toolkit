## 2014-02-27

This is a status update on the progress of the toolkit.

The following commands now work to some degree:
- site-build: Downloads a codebase and sets up the necessary structure
- site-install: Installs Drupal with a set of configured options
- site-exists: Checks if a site exists
- site-delete: Deletes a built site
- site-update: Updates the site to the latest version of the make file

The following features are now supported for various commands above:
- Setup of the database, supporting MySQL only.
- Configure a Drush alias for the site.
- Use Drush to backup the database.
- Install Drupal via Drush
- Enter into maintenance mode using Drush.
- Update the site using Drush's updb command.
- Configure a gateway server using Apache2 or nginx.
- Configure hosts files on Linux machines.
- Configure an HTTP server using Apache2 or nginx.
- Connect to the local machine or remote machines for many tasks
- Connect to a Pacemaker cluster for many tasks
- Configure permissions on all files, server files and root-only system files.
- Supports the standard build pattern that relies on symlinks which is very
  flexible and supports rollbacks.
- Supports downloading an upstream server's database and files before performing
  an update.
- Translate text into various languages (English is only language provided now)
- Log output to the terminal.
- Log output to a file.

## Original

Work in progress.

Goal is to replace the custom tool currently in use at uOttawa with a better tool that supports more cross-platform functionality (via switching to PHP) and more diverse functionality (via switching to a plugin system instead of static code). Also to improve documentation significantly.

Target functionality:
- build site (git clone, drush make, configure server[s], create database, host file entry)
- install site (drush si with default repos and ability to select repos)
- upgrade site (maintenance mode, automated backups, rebuild from drush make, update all server configuration, drush updb, yamlconfig refresh, features refresh, cache clear, varnish wipe, etc)
- rollback an update performed with upgrade site
- delete an existing site (all related files)
- check if site exists
- build / install / delete subsites, include subsites in their parent site's upgrade process
- automatic promotion of make files and projects between release branches (dev>qa>prod) - mostly in support of the uOttawa lifecycle
- a few nice add-ons in support of Redmine (mirror git repos and update code viewer in Redmine)
- support of uOttawa's Drush Make Manager project (auto generation of make file from DB with GUI)
- support for SimpleTest execution and configuration (limit packages)
- support for Doxygen
- support for various PHP metrics 
- support for JMeter and other metrics (long-term)

In general, we aim to support most or all of the functionality needed to manage a server with multiple Drupal installations on it (and integration with Jenkins for CI).
