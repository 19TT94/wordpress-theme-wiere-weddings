# Wiere Weddings

WordPress theme that serves as a **CMS** for [wiereweddings.com](https://wiereweddings.com). Content is managed in WordPress and consumed by the separate [wiere-weddings](https://github.com/19TT94/wiere-weddings) Vue frontend via the REST API.

Visiting the WordPress site directly (including a Local site) shows an admin readme on the homepage — that is expected. The public marketing site is the Vue app, not this theme’s front-end templates.

## Prerequisites

- [Local](https://localwp.com/) (or another local WordPress environment)
- [Node.js](https://nodejs.org/) 18+ and npm
- (Optional) [Yarn](https://yarnpkg.com/) — for the `wiere-weddings` frontend repo

## Local WordPress setup

### 1. Create a site in Local

Create a new WordPress site in Local (any name/domain is fine; `.local` domains are detected as development automatically).

### 2. Install the theme

Open the site folder in Local, then go to:

```
app/public/wp-content/themes/
```

Install this repository in that directory using either approach:

**Clone** (self-contained copy inside the Local site):

```sh
cd app/public/wp-content/themes
git clone https://github.com/19TT94/wordpress-theme-wiere-weddings.git wordpress-theme-wiere-weddings
cd wordpress-theme-wiere-weddings
```

**Symlink** (edit the same folder you use on your machine — recommended for day-to-day development):

```sh
cd app/public/wp-content/themes
ln -s /path/to/wordpress-theme-wiere-weddings wordpress-theme-wiere-weddings
```

The folder name under `themes/` can be anything; WordPress reads the theme name from `style.css` (**Wiere Weddings**).

### 3. Activate the theme

Open the site’s WP admin (e.g. `https://your-site.local/wp-admin`) → **Appearance → Themes** → activate **Wiere Weddings**.

### 4. Build theme assets

Compiled CSS and JS live in `dist/`, which is not committed to git. From the theme directory:

```sh
npm install
npm run watch
```

Leave `watch` running while you edit Sass or JS. For a one-off build, use `npm run dev` instead.

## Full local stack (optional)

To run the public website locally and pull content from your Local WordPress instance, use the **wiere-weddings** frontend repository alongside this theme.

### 1. Configure the frontend

In the `wiere-weddings` repo:

```sh
cp env_example .env
yarn install
```

Set these in `.env` (replace with your Local site URL):

```env
VITE_WORDPRESS_API=https://your-site.local/wp-json/wp/v2
VITE_WORDPRESS_USERNAME=<wordpress-username>
VITE_WORDPRESS_PASSWORD=<application-password>
```

Use a WordPress **Application Password** (Users → Profile) for API auth. Restart the dev server after changing `.env`.

### 2. Run both processes

| Terminal | Directory | Command |
| --- | --- | --- |
| WordPress CMS | `wordpress-theme-wiere-weddings` | `npm run watch` |
| Public site | `wiere-weddings` | `yarn dev` |

The Vite dev server is usually at `http://localhost:5173`. In development, this theme sets `SITE_URI` to `http://localhost:3000` for links in the WordPress admin UI only; the Vue app uses its own dev URL.

## Environment detection

`functions.php` treats these hosts as **development**: `localhost`, `127.0.0.1`, and any hostname containing `.local`. Production uses `https://wiere-weddings.com` for `SITE_URI`.

In **development**, demo content is seeded once from `inc/environment.php` using the bundled images in `assets/images/`. Content shapes match what the Vue app expects (`text`, `callout`, `block-left`, `block-right` layouts, bullet lists, and service excerpts). Bump `seed_version` in `inc/environment.php` to refresh local demo posts automatically.

To force a re-seed manually, run `wp option delete ww_development_content_seeded` and reload WordPress (or bump `seed_version`).

## Theme development

Compile for development:

```sh
npm run dev
```

Compile and watch Sass and JS:

```sh
npm run watch
```

## Deploy

```sh
npm run production
```

Build assets before deploying the theme. Deploy the theme files (including `dist/`) to the production WordPress host and ensure the **wiere-weddings** frontend’s `VITE_WORDPRESS_API` points at the production WordPress REST API.

## CMS overview

After activation, the admin includes custom post types for **Home Slides**, **Home Posts**, **About Posts**, and **Service Posts**, plus customized menus and the **Appearance → Customize** settings for site and social links. See the homepage readme in the WordPress admin for a fuller walkthrough.
