# Webpack Plugin for OctoberCMS

## Prepare your theme
1. Create a themes/[YourTheme]/webpack.config.js (We are using Symfony Webpack Encore)
   ```js
   Encore
        .setOutputPath('./assets/build/')
        .setPublicPath('/themes/[YourTheme]/assets/build')
   ```
2. Add the build directory
3. Build your theme
4. Go on by implementing the tags

## Using the plugin

### Implement via functions
Use the following minimal skeleton or adapt it
```html
<!DOCTYPE html>
<html>
	<head>
		{{ webpack_styles("app", "assets/build/entrypoints.json") }}
	</head>

	<body>
		{{ webpack_scripts("app", "assets/build/entrypoints.json") }}
	</body>
</html>
```

### Implement via component
Use the following minimal skeleton or adapt it
```html
[webpackStyles]
entrypointsFile = "assets/build/entrypoints.json" // Default
entrypoint = "app" // Default
[webpackScripts]
entrypointsFile = "assets/build/entrypoints.json" // Default
entrypoint = "app" // Default
==
<!DOCTYPE html>
<html>
	<head>
		{% component 'webpackStyles' %}
	</head>

	<body>
		{% component 'webpackScripts' %}
	</body>
</html>
```

## Configuration
You can configure it, by just change the values given in the examples above. These can be left blank, to use the default values