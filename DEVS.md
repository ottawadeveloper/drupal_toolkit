## Developer Notes

These notes are geared towards people who will be working on this toolkit or
providing third-party plug-ins for it.

### Key Documentation Note

In several places throughout DTK (events, options, string translations, 
configuration, etc), constants have been used instead of raw strings. These
constants have then been documented into certain defgroups. This pattern should
be continued whenever you work directly with DTK, as it keeps the documentation
on key strings up to date. Never use a raw string unless you are sure you know
what you are doing.


### File Structure

- dtk.php: This is the script file that should be used to execute DTK commands.
- /lib: Contains all relevant files for DTK.
- /lib/common.inc: Organizes the library files, setting up all the basic info
  that other scripts will require.
- /lib/functions.inc: Contains key functions that have wide usage. Includes
  several other files that contain additional non-class functions.
- /lib/setup.php: Initializes all the relevant core objects and triggers all
  relevant include/setup procedures.
- /lib/docs.inc: Doxygen comments only.
- /lib/translations: Contains core translation files.
- /lib/functions: Contains additional functions, organized by functional area.
- /lib/functions/drush.inc: Functions designed to make it easier to trigger
  drush commands from PHP.
- /lib/functions/hosts.inc: Functions designed to work with the host file.
- /lib/function/system.inc: Functions designed to work with the base filesystem.
- /lib/function/terminal.inc: Functions designed to work with terminal output.
- /lib/function/special.inc: Specialized functions that don't belong to another
  area.
- /lib/setup: Contains additional setup instructions.
- /lib/config.php: Instructions to parse configuration files into the core objects.
- /lib/plugins.php: Instructions to include and initialize all relevant plug-ins.
- /lib/classes: Contains core classes. These classes are essential for the toolkit
  and cannot be removed.
- /lib/classes/args: Core classes that process and manage command-line options and
  arguments.
- /lib/classes/commands: Core classes that process and manage command execution.
- /lib/classes/config: Core classes that manage DTK configuration options.
- /lib/classes/dm: Core classes that manage dependency injection.
- /lib/classes/events: Core classes that manage event management.
- /lib/classes/output: Core classes that manage output.
- /lib/classes/plugins: Core classes that support plug-in development.
- /lib/classes/router: Core classes that support command routing.
- /lib/classes/string: Core classes that support string translation and alteration.
- /lib/plugins: Contains core plugins. Core plugins differ from core classes in that
  they can be disabled if necessary (though this may break their dependencies).
- /lib/plugins/config-export: A plugin for exporting the default configuration settings.
- /lib/plugins/cron: A plugin for managing scheduled tasks.
- /lib/plugins/db-config: A plugin for managing databases.
- /lib/plugins/drupal-site: A plugin which supports managing Drupal sites.
- /lib/plugins/drupal-site-build: A plugin which provides the "site-build" command
  for spinning up a new codebase. Also provides a command for subsites.
- /lib/plugins/drupal-site-delete: A plugin which provides the "site-delete" command
  to completely remove an entire site. Also provides a command for subsites.
- /lib/plugins/drupal-site-exists: A plugin which provides the "site-exists" command
  to see if a site already exists. Also provides a command for subsites.
- /lib/plugins/drupal-site-install: A plugin which provides the "site-install" command
  to install a site. Also provides a command for subsites.
- /lib/plugins/drupal-site-rollback: A plugin which provides the "site-rollback" command
  which reverses an update installation. Subsites are always included in a rollback.
- /lib/plugins/drupal-site-update: A plugin which provides the "site-update" command
  which updates the database and provides suitable hooks for executing additional
  functionality. Subsites are always included in an update.
- /lib/plugins/drush-backup: A plugin which provides tools for backing up databases
  and restoring them using Drush.

### Dependency Injection

In order to properly support the plug-in system, the toolkit extensively 
leverages dependency injection (DI) in order to make life easier for the plug-ins.
The end goal is for all toolkit components, such as argument handling,
configuration, logging and events, to be available within a plug-in class
automatically. We make this happen through dependency injection. 

It is possible for developers to add new injected components in their
plug-ins that can be leveraged by other plug-ins as well.

Each DI component comes with at least two interfaces and probably a class. For 
an example, we will be referencing the work done on the Arguments within this 
toolkit.

- An interface defining how other classes interact with your component (eg
  ArgsInterface). This allows other implementations of your component to be 
  used in place of your default implementation.
- A dependency interface (eg ArgsDependency). This is an interface that 
  specifies at least an injector method which takes an instance of your 
  component interface (ArgsInterface). You can also specify an accessor method
  if so desired.
- A default implementation of your interface (eg Args). This ensures that 
  some class will be available.

Having done this, you will then need to access the DependencyManagerInterface
instance (which is, itself, injected in most places) in order to leverage
dependency injection. You can do this in one of two ways:

- If you are working within an object that already leverages dependency
  injection (all plug-ins do by default), then you can simply implement the
  interface DependencyManagerDependency (also done by default for plug-ins) 
  and retrieve the manager using the dm() method.
- Alternatively, you can directly access the singleton using 
  DependencyManager::dm(). There are also static methods on DependencyManager
  which take care of the below tasks as well.

#### Registering an Interface

In order for the manager to use your interface, you must first register it. This
is done via the object method registerInjector() or the static method register().
It takes four parameters in either usage:

- A string with the name of your dependency interface
- A string with the name of the injector method on your dependency interface
- A string which uniquely identifies the name of the object to use
- A string with the name of the component interface

Essentially, this step will register that objects implementing your dependency
interface should have the injector method called, passing the object registered
with the unique name you provided. The component interface limits objects that
can be registered to the appropriate type.

#### Registering a Dependency Object

To register an object, you call the object method registerObject() or the static
method setObject(). This takes two parameters: the unique string used when
registering the dependency interface, and an instance of the object to use. You
should call this immediately after registering your interface with a default
implementation.

#### Injecting Dependencies

Finally, to have the dependency manager act on a new object, it must be 
passed to the manager's object method setDependencies() or static method 
inject(). This will inject all the relevant dependencies into the object. Note
that this is done automatically for all plug-ins when they are instantiated,
so plug-ins need not concern themselves with this step unless they are creating
child objects that may need dependencies injected.

The dependency manager has another object method named updateExisting(), or 
simply update() as a static call. This method refreshes the dependencies on
all previously registered objects. Therefore, if you replace one object with
another or have added a new interface, you should place a call to 
updateExisting().

In general, plug-ins should register new dependency interfaces and/or update
default objects with their replacements during the 
EVENT_CORE_DEPENDENCY_INJECTION event. After this event, updateExisting() is
automatically fired, so there is no need to call it unless you are acting
after that hook has been fired.

### Arguments and Options

The toolkit automatically parses all command-line arguments passed into options
and arguments. It uses the following logic:

- Anything that starts with two hyphens ("--") is considered a long option.
- Anything that starts with a single hyphen ("-") is considered a short option.
- Anything else is considered an argument.

Options are parsed by finding an equal sign and splitting the string into a 
key-value pair based on that. For long options, if there is no equal sign, TRUE 
is used as the value instead and the entire string is used as the key. For
short options, if there is no equal sign, the first non-hyphen character is
used as the key and any other characters are used as the value. If there are 
no other characters, the option's value is TRUE. Prefixing hyphens are always
removed from all options.

Essentially, this allows for five formats of options. The following would be
mostly equivalent (the ones with a value would have string "1" instead of 
boolean TRUE).

- Short, no value: "-v"
- Short, value: "-v1"
- Short, value, equal sign: "-v=1"
- Long, no value: "--verbose"
- Long, value: "--verbose=1"

All other strings are considered arguments and are then retrieved by position,
which is 1-indexed. Option strings are ignored when considering position of 
arguments. That means that in 
"dtk --branch=master site-build" and "dtk site-build --branch=master",
the argument "site-build" is in position 1 in both.

Both of these can be retrieved from plug-ins and other classes using 
dependency injection. By implementing the class ArgsDependency, an instance
of ArgsInterface will be injected into your object (this is done by default
for plug-ins). You can then access this object using the args() function. The
definition of ArgsInterface outlines how you can access them properly.

### Managing Configuration

Each plugin can require different configuration options. 