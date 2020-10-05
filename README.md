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

## Implement via component
Use the following minimal skeleton or adapt it
```html
[webpackStyles]
[webpackScripts]
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
