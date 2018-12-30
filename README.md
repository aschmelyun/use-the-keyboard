# Use The Keyboard

The source behind [usethekeyboard.com](https://usethekeyboard.com)

## Prerequisites
If you'd like to clone this repo and use the underlying static site generator, you'll need to have the following installed on your environment:

- PHP 5.6.4 or higher
- Composer
- Node/npm

After cloning the repo, you'll want to get all the vendor packages installed. Run the following command from the project root:

```bash
composer install && npm install
```

## Adding/modifying a page
All content for the site is stored in the `content` directory as JSON files. The actual names of the files don't correlate to anything, but for organization purposes are named the same as the page slug. 

During the site build process, each key in the content file is converted to a PHP variable and passed through to a Blade template engine for processing.

For **Use The Keyboard**, these are the following required attributes and their purpose on rendered pages:

- **view** - The Blade view template that these variables should be passed to. All pages use `layout.shortcut` except the landing page, which uses `layout.default`. 

- **slug** - The string that appears in the URL after https://usethekeyboard.com/

- **title** - The string that appears in the title before &rarr; UseTheKeyboard

- **meta_title** - The title that appears as the h1 in the sidebar of shortcut pages

- **meta_description** - Both the subtitle in the sidebar of shortcut pages, and the content value for the meta description of the page

- **reference_link** - Where the "Original Reference" button links to on shortcut pages

- **sections** - An array of objects, each one composed of a `name` and an array of `shortcuts`. These are used to display all main information on shortcut pages.

The following are optional attributes:

- **mac_only** - If an application is for MacOS-only, set this attribute to true. When the page loads up, Mac will be auto-selected regardless of OS and the visitor will not be able to select "Windows".

## Building the site

Once you've completed any changes, additions, or modifications to the site content or assets, you'll need to run the build process. From the project root, run the following command:

```bash
npm run production
```

This will compile the assets for production use (minify, version, etc) and then run the `php taro build` command to compile the HTML once that's been successfully finished.

If you're in the middle of development and want a faster alternative, `npm run dev` skips minification and returns the compiled assets at a quicker pace.

Everything that's built is then added to the `dist` folder at the project root.

## Questions?

If you run into any issues regarding shortcuts on the site or the static build process, feel free to open and issue or submit a PR. 

I'm also on [Twitter](https://twitter.com/aschmelyun) if you'd like to follow me or get in more direct contact.