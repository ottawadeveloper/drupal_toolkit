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
