# ModernBlog - WordPress Professional Blogging Theme

ModernBlog is a premium-quality, fully responsive, and SEO-optimized WordPress blogging theme designed for content creators, news writers, and personal bloggers. 

## Features

- Fully responsive and mobile-first architecture.
- Modular component-based development.
- Dark mode toggle support.
- Translation-ready (`.pot` file included).
- Accessible and SEO-friendly semantic HTML.

---

## 1. Theme Installation

### Installing the Parent Theme
1. Download the main theme files from this repository.
2. Log in to your WordPress Admin Dashboard.
3. Navigate to **Appearance > Themes**.
4. Click **Add New** and then **Upload Theme**.
5. Choose the `modernblog` directory (zipped) and click **Install Now**.

### Installing the Child Theme (Recommended)
We strongly recommend using the provided child theme to preserve your customizations during future updates.
1. Download the `modernblog-child.zip` file.
2. In the WordPress Admin Dashboard, navigate to **Appearance > Themes**.
3. Click **Add New** > **Upload Theme**.
4. Choose the `modernblog-child.zip` file and click **Install Now**.
5. Click **Activate** to activate the Child Theme.

---

## 2. One Click Demo Import

ModernBlog integrates with the **One Click Demo Import (OCDI)** plugin to help you set up your site instantly.

1. Ensure the **One Click Demo Import** plugin is installed and activated.
2. Navigate to **Appearance > Import Demo Data**.
3. You will see multiple demo layouts (e.g., Personal Blogger, Tech Blog, News).
4. Click **Import Demo** on your preferred layout.
5. The importer will automatically configure:
   - Homepage and Blog page settings
   - Customizer options
   - Widgets and Sidebars
   - Menus
   - Demo posts and images

---

## 3. Theme Customization

ModernBlog uses the native WordPress Customizer for all theme settings. Navigate to **Appearance > Customize** to access the Theme Options Panel.

### General Settings
Configure your site layout (container width), primary/secondary colors, and typography (choose from modern fonts like Inter or Outfit). You can also configure default Dark Mode behaviors here.

### Header Settings
- Upload your Logo.
- Choose between different header layouts (Sticky Header, Transparent Header).
- Toggle search icons and dark-mode toggles.

### Blog & Archive Settings
- Configure how blog posts appear on archive pages (Grid, List, Masonry).
- Set the length of post excerpts and customize the "Read More" text.
- Enable or disable sidebar layouts (Left, Right, No Sidebar).

### Single Post Settings
- Toggle the visibility of the Author Box, Reading Time, and Social Sharing Buttons.
- Manage "Related Posts" algorithms (by category or tags).

---

## 4. Homepage Setup (Dynamic Widgets)

The homepage in ModernBlog can be heavily customized using widgets. 
To build the dynamic homepage sections:

1. Create a new page and name it "Home".
2. Set the Page Template to **Homepage** (if available) or leave it as Default to use the Customizer configurations.
3. Go to **Settings > Reading** and set "Your homepage displays" to "A static page", selecting your new "Home" page.
4. Navigate to **Appearance > Widgets**.
5. Drag and drop custom ModernBlog widgets (like "Trending Posts" or "Featured Hero Slider") into the **Homepage Sections** widget areas.

---

## 5. Menu & Navigation Setup

1. Go to **Appearance > Menus**.
2. Create a new menu (e.g., "Main Menu").
3. Assign it to the **Primary Menu** display location.
4. Save the menu. ModernBlog supports dropdowns and mega-menu styles automatically.

---

## 6. Updating the Theme from GitHub

If you are managing this theme via GitHub:

1. Clone or pull the latest changes from `https://github.com/shammir-ahmed/wordpress-blog-theme.git`.
2. Do not modify the parent `modernblog` directory directly if you intend to pull future updates. Always make custom CSS or PHP changes inside the `modernblog-child` directory.
3. If structural updates are pushed to the main repository, simply `git pull` the changes and your child theme will inherit the updates safely.

---

## 7. Developer Documentation

### Modifying Templates
ModernBlog uses WordPress `get_template_part()` functions heavily. To override a component (e.g., the post card layout):
1. Copy `modernblog/template-parts/post/content.php`.
2. Paste it into the exact same folder structure in your child theme: `modernblog-child/template-parts/post/content.php`.
3. Modify the file in your child theme. WordPress will automatically load your customized version.

### Compiling CSS
Currently, the theme relies on vanilla CSS with variables in `style.css`. To alter the color scheme programmatically, you can override the `:root` CSS variables in the child theme's `style.css` file.

### Hooks & Filters
ModernBlog provides several action and filter hooks for advanced customization. (e.g., `modernblog_before_header`, `modernblog_after_content`). Search the `functions.php` file for `do_action` and `apply_filters` to see available hooks.

---

*Development by Md Shammir Ahmed*
