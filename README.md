## Overview

Drupal ToolKit (DTK) is a PHP command line tool that aims to simplify managing
multiple sites, with and without different codebases, for enterprise Drupal 
environments. The target audience of this project would be organizations that
create and manage multiple Drupal sites, using either many codebases or a 
single codebase, and are looking for a tool that they can use on their own
servers to build and install new sites, updating existing sites, delete old 
sites, etc.

### Why not Drush?

Drush is an amazing tool, and this tool strongly leverages Drush to perform
existing tasks. Once a site is up and running, Drush can and should be used
to manage most of your tasks.

But a site install is more complicated than what Drush does, and we feel that
Drush should remain focused on interacting only with Drupal. We therefore have
chosen to build a different tool that leverages Drush wherever possible but
also can interact with other libraries, such as Apache, nginx, etc.

### Features

Our goal is therefore to support the entire spin-up process of a Drupal site, of
which Drush is merely a part of. Specifically, we aim to support:

- Generating a new codebase using drush make
- Creating database(s) via MySQL directly (and other DBMSs)
- Installing Drupal via drush
- Adding any relevant host file entries
- Adding a crontab entry
- Managing Apache/nginx server configurations (both web servers and gateway 
  servers)
- Creating a drush alias automatically
- Automatically take backups at key points
- Properly setup file system permissions
- Interface with multiple servers for relevant configuration options
- Download the database and files from an upstream server (QA verification)
- Preserve certain variables on the site when downloading from upstream
- Support a consistent structure for sites that is easy to update
- Streamlining the update procedure to be automated with good failure protection
- Streamlining the deletion procedure to ensure all relevant files are removed

## Command Status

- site-build: working
- site-exists: working
- site-install: working
- site-update: working (site only)
- site-rollback: working (site only)
- site-delete: ??
- subsite-build: working
- subsite-exists: working
- subsite-install: not implemented
- subsite-delete: not implemented

## 2014-05-12

Work is ongoing to update to the new event model. Pacemaker work put on hold
due to us switching away from it.

## 2014-04-27

Currently this project is undergoing some significant tweaks to support
sub-sites as well as proper Drupal sites. These subsites follow the 
documentation provided for creating subsites (see 
https://drupal.org/documentation/install/multi-site).

## 2014-03-04

Confirmed the six original commands work with default settings on
Ubuntu 12 LTS.

## 2014-02-27

This is a status update on the progress of the toolkit.

The following commands now work to some degree:
- site-build: Downloads a codebase and sets up the necessary structure
- site-install: Installs Drupal with a set of configured options
- site-exists: Checks if a site exists
- site-delete: Deletes a built site
- site-update: Updates the site to the latest version of the make file
- site-rollback: Rollback an update that was done with site-update.

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
- Sets up cron tasks via dropping a file in /etc/cron.d

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
