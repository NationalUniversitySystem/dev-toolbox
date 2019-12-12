## Dev Toolbox
Collection of code and plugins used for site development at a local level, and possibly dev environment.

### Implementation Guide
- Add the plugin to the `mu-plugins` folder (`client-mu-plugins` folder in WPVIP site repos).
	- Although the above implementation is recommended, it can also be added as a regular plugin then activated in the WP admin.
- *Copy* the file `-dev-toolbox.php` file inside the plugin folder to the root of the `mu-plugins` folder (`client-mu-plugins` folder in WPVIP site repos).
- Add `dev-toolbox` folder and `-dev-toolbox.php` file to the site repo's `.gitignore` file.
	- **If** the plugin was instead implemented as a regular WP plugin, only the folder name needs to be added to the `.gitignore` file.
- Define `WP_ENV` constant as `true` in the `wp-config.php` file.

### Notes
- Should not be committed to a site's repo.
- Each file has it's own description. Read each to understand the use of each.
