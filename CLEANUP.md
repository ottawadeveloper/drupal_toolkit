# Clean-up Notes

## Conversion to dtk_constant()

Where plugin-ins use constants defined by other modules (usually event 
constants), they should use dtk_constant() to access them, in order to get
the proper value and not cause a hideous PHP notice (it still gives a notice,
just a cleaner one).

## Conversion to constants.php

Plug-ins should move their constant definitions from the top of the plugin class
file to a file named constants.php in order to keep the plugin class file
clean and tidy. This file (constants.php) will be automatically included before
the rest of the plug-in files are included.