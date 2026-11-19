# Theme Desk

A support desk you drop into a WordPress theme. The owner files a ticket from the theme’s own settings screen. The site keeps a copy, emails support, and shows the same changelog and support note in every theme that ships this package.

Created by [Matt Hummel](https://matthummel.com/). License: GPL-2.0-or-later, so it can ship inside a theme.

## What a ticket includes

- Name and the address that should receive the reply
- Type of problem and how urgent it is
- Subject, the page where it happens, and what happened
- Optional system report from the theme
- Optional copy to the sender’s WordPress account (not to an address typed in the form)
- A reference such as `AL-261119-A276`, saved even when mail fails
- Send again, or open the message in the sender’s own email app
- The latest Theme Desk changelog and the support note, on the same screen

Tickets older than 12 months are removed. WordPress personal-data export and erase include them.

## Add it to a theme

Copy this repository into the theme as `packages/theme-desk/` (the sync workflow below does that). From the theme:

```php
require_once get_theme_file_path('packages/theme-desk/bootstrap.php');

\MattHummel\ThemeDesk\Desk::boot([
    'product' => 'Acreline',
    'prefix' => 'AL',
    'email' => 'matt@matthummel.com',
    'report' => 'ks_support_report', // callable, or omit
    'redirect' => static fn (): string => admin_url('themes.php?page=acreline-settings&tab=ticket'),
    'changelog' => get_theme_file_path('CHANGELOG.md'),
    'screen' => [
        'hook' => 'appearance_page_acreline-settings',
        'param' => 'tab',
        'value' => 'ticket',
    ],
    'categories' => [
        'listings' => 'Listings, agents, or showings',
    ],
]);
```

Render it on the settings tab:

```php
\MattHummel\ThemeDesk\Desk::render();
```

`email` and `report` may be a string callable or a closure. `prefix` is two to four letters and becomes the start of the reference. Extra `categories` and `priorities` are merged over the defaults. Strings you pass in are already translated by the theme. Strings built into Theme Desk use the `theme-desk` text domain.

The system report should be versions and checks only. Do not put passwords or visitor details in it.

## Update every theme from this repo

`consumers.json` lists the themes. Two things move the files:

1. **This repo, on every push to `main`.** If the Actions secret `THEME_DESK_SYNC_TOKEN` is set (a fine-grained token that can write to those theme repos), the workflow sends a `theme-desk-update` dispatch to each one. Without the secret, the push still succeeds and the themes pick the change up on their own schedule.
2. **Each theme** has [templates/theme-desk.yml](templates/theme-desk.yml) copied to `.github/workflows/theme-desk.yml`. It runs on that dispatch, every Monday, or when someone starts it by hand. It copies `src/`, `assets/`, `docs/`, `bootstrap.php`, `CHANGELOG.md`, `README.md`, `LICENSE`, and `VERSION` into `packages/theme-desk/` and opens a pull request when something changed.

Add a theme by listing it in `consumers.json` and adding that workflow to the theme. The theme still has to call `Desk::boot()` and `Desk::render()`. The copy alone does not switch an older ticket form over.

## Docs

- [Support note](docs/support.md) — what the owner sees on the ticket screen
- [Changelog](CHANGELOG.md)

## Filters

| Filter | Default | Purpose |
| --- | --- | --- |
| `theme_desk/keep_months` | `12` | Delete tickets older than this many months. `0` keeps them. |
| `theme_desk/email` | value passed to `boot()` | Support address. |
