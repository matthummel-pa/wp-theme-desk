# Changelog

## 1.0.0

- **Tickets** — A theme can open a support ticket from its own settings screen. The form asks for a name, a reply address, the type of problem, how urgent it is, a subject, the page where it happens, and what happened. The sender can attach the theme’s system report and ask for a copy at their WordPress account email.
- **Record** — Each ticket is saved on the site with a reference such as `AL-261119-A276`, even when the site cannot send mail. The list shows the ten most recent, and a failed email can be sent again.
- **Notes** — The same screen shows this changelog and the support note in `docs/support.md`, so every theme that ships Theme Desk shows the same running history.
- **Privacy** — Tickets are included in WordPress personal-data export and erase. Tickets older than 12 months are removed. The `theme_desk/keep_months` filter can change that. `0` keeps them.
