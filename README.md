# Custom WordPress Theme: hwppoc

This theme was developed as a technical test to demonstrate proficiency in modern, professional WordPress development. It is built from scratch, following best practices for code quality, file structure, security, and functionality.

The theme is fully responsive and includes custom post types, custom page templates, a custom REST API endpoint, and advanced filtering capabilities.

## Key Features

*   **Custom Theme Development:** Built entirely from scratch without page builders.
*   **Responsive Design:** Mobile-first design implemented with the Bootstrap framework.
*   **Professional File Structure:** Logic is separated into different files within an `/includes` directory for maintainability and clarity.
*   **Custom Post Type (CPT):** A "Projects" CPT with a fully customized admin UI (custom labels and update messages).
*   **Advanced Custom Fields (ACF):** Deep integration with ACF for project-specific metadata.
*   **Custom Page Templates:** Two distinct page templates for a dynamic "Home Page" and a "Blog Page" with a unique layout.
*   **Custom REST API Endpoint:** A custom read-only endpoint to expose project data in JSON format.
*   **Date-Range Filtering:** The "Projects" archive page includes a date-range filter.
*   **Internationalization Ready:** All strings are wrapped in translation functions, and a `.pot` file is included.
*   **Security Best Practices:** Employs sanitization for inputs and escaping for outputs.

---

## Getting Started & Installation

1.  Download the theme folder (`hwppoc`).
2.  Place the theme folder into your WordPress installation's `wp-content/themes/` directory.
3.  In the WordPress admin dashboard, navigate to **Appearance > Themes**.
4.  Find "hwppoc" and click **Activate**.

---

## Theme Setup & Configuration (Required Steps)

To use all the features of this theme, a few configuration steps are required after activation.

### 1. Required Plugin: Advanced Custom Fields (ACF)

This theme relies on ACF to manage the custom fields for the "Projects" post type.

*   **Action:** Please install and activate the "Advanced Custom Fields" plugin from the WordPress plugin repository. The free version is sufficient.

### 2. Configuring Project Custom Fields

After activating ACF, you must create a Field Group with the specific fields the theme templates are designed to use.

1.  In the WordPress admin, navigate to **Custom Fields > Field Groups**.
2.  Click **"Add New"** to create a new group. Name it **"Project Details"**.
3.  **Location Rules:** Set the rule to **Show this field group if `Post Type` is equal to `Project`**. This is critical.
4.  Add the following fields with the exact **Field Name** and **Field Type**:

| Field Label          | Field Name (slug)     | Field Type    |
| -------------------- | --------------------- | ------------- |
| Project Name         | `project_name`        | Text          |
| Project Description  | `project_description` | Text Area     |
| Project Start Date   | `project_start_date`  | Date Picker   |
| Project End Date     | `project_end_date`    | Date Picker   |
| Project URL          | `project_url`         | URL           |

5.  Click **"Save Changes"**.

### 3. Creating the Main Menu

The theme's header will not display a navigation menu until one is created and assigned to the theme's designated location.

*   **Action:** This is a required step to see the navigation.
    1.  Navigate to **Appearance > Menus**.
    2.  Create a new menu and give it a name (e.g., "Main Navigation").
    3.  Add the pages, posts, and links you want to display.
    4.  At the bottom of the page, under **"Menu Settings"**, check the box for **"Primary Menu"** in the "Display location" section.
    5.  Click **"Save Menu"**.

### 4. Setting a Static Homepage (Important)

To make the **Home Page** template appear as the front page of your website, you must configure WordPress's reading settings.

*   **Action:** This is required for the homepage to display correctly.
    1.  First, ensure you have created a page and assigned it the **"Home Page"** template (see instructions below).
    2.  Navigate to **Settings > Reading** in the WordPress admin dashboard.
    3.  Under **"Your homepage displays"**, select the **"A static page"** option.
    4.  From the **"Homepage"** dropdown, select the page you created to be your homepage.
    5.  (Optional but Recommended) For the **"Posts page"** dropdown, you can select the page you've assigned the **"Blog Page"** template.
    6.  Click **"Save Changes"**.

---

## Using the Custom Page Templates

This theme includes two custom page templates that provide unique layouts beyond the default page design.

### Home Page Template

*   **Purpose:** Creates a dynamic homepage with a large hero section.
*   **Features:** The hero section uses the page's **Featured Image** as its background. If no image is set, it gracefully falls back to a solid color.
*   **How to Use:**
    1.  Create or edit a page you wish to be your homepage.
    2.  In the "Page Attributes" box on the right, select **"Home Page"** from the "Template" dropdown.
    3.  Set a Featured Image for the best visual result.

### Blog Page Template

*   **Purpose:** Creates a custom landing page for your blog with a multi-part layout.
*   **Features:**
    1.  A top hero section displaying the page's title and its featured image as a background.
    2.  A middle section that displays the **complete content** from that page's WordPress editor.
    3.  A final section that automatically lists your most recent blog posts.
*   **How to Use:**
    1.  Create or edit a page (e.g., a page titled "Blog").
    2.  In the "Page Attributes" box, select **"Blog Page"** from the "Template" dropdown.
    3.  Add any introductory text or images you want into the main content editor for that page.

---

## Additional Feature Explanations

*   **Projects CPT:** The theme adds a "Projects" menu item to the admin dashboard. The archive of all projects can be found at the URL `/projects/`.
*   **Custom REST API Endpoint:** The theme provides a public, read-only endpoint that lists all projects and their custom field data. It can be accessed at `/wp-json/hwppoc/v1/projects`.

### Internationalization (Translation)

The theme is fully translatable. A master `.pot` file is included in the `/languages` directory.

*   **How to Translate the Theme:**
    1.  Open the `hwppoc.pot` file.
    2.  Create a new translation for your target language (e.g., German). Poedit will create a `de_DE.po` file.
    3.  Translate the strings in the Poedit interface.
    4.  Save the file. Poedit will automatically generate a compiled `.mo` file (`de_DE.mo`).
    5.  Place both the `.po` and `.mo` files into the theme's `/languages` folder.
    6.  In the WordPress admin, go to **Settings > General** and change the **Site Language** to your target language (e.g., Deutsch). The translated strings will now appear on the site.

Thank you for the opportunity to complete this technical assessment.