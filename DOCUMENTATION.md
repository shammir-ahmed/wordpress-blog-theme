# ModernBlog Theme Documentation

Welcome to ModernBlog! This documentation will help you set up and customize your new WordPress theme.

## 1. Theme Installation
1. Download the theme folder.
2. In your WordPress admin panel, go to **Appearance > Themes**.
3. Click **Add New** and then **Upload Theme**.
4. Choose the zipped theme file and click **Install Now**.
5. Once installed, click **Activate**.

## 2. Recommended Plugins
The theme is built to work seamlessly with:
- **Elementor** (Page Builder)
- **ModernBlog Elementor Companion** (Included in the `modernblog-elementor` folder, you can move it to `wp-content/plugins/` to use as a separate plugin or require it).

## 3. Creating Menus
1. Go to **Appearance > Menus**.
2. Create a new menu and assign it to the **Primary** location for the header menu.
3. You can also create a menu for the **Footer Menu** location.

## 4. Customizer Settings
Go to **Appearance > Customize** to configure theme options:
- **Site Identity**: Upload your logo and set the site title/tagline.
- **Theme Options**: 
  - **Primary Colors**: Change the main accent color of the theme.

## 5. Setting up the Homepage
1. Create a new page and name it "Home". 
2. (Optional) If you want to use Elementor to build the homepage, edit the page with Elementor.
3. Create another page named "Blog".
4. Go to **Settings > Reading**.
5. Set "Your homepage displays" to **A static page**.
6. Select "Home" for the Homepage and "Blog" for the Posts page.

## 6. Elementor Widgets
When Elementor and the ModernBlog Companion plugin are active, you will find custom widgets in the Elementor editor:
- **ModernBlog Post Grid**: Display a customizable grid of your latest blog posts.

## 7. Developer Customization
- **CSS**: The main stylesheet is located in `assets/css/main.css`. It uses modern CSS variables for easy customization.
- **Functions**: Add your custom PHP code in `functions.php` or create a child theme.

## Troubleshooting
- **Layout breaking?** Ensure you haven't deleted required template files.
- **Colors not updating?** Clear your caching plugins and browser cache.
