# Support

Theme Desk is the ticket form inside a theme’s settings screen. Sending a ticket does two things: it saves the ticket on that site, and it emails the theme’s support address. A reply goes to the address typed on the form.

## What to send

Say what you did, what you expected, and what happened. Add the page address when the problem is on one page. Leave the system report attached unless you have a reason to take it off. The report is versions and theme checks. It does not include passwords or visitor details.

Do not put passwords, payment cards, client names, or showing details in the message.

## What you get

The screen shows a reference, for example `AL-261119-A276`. Quote that reference if you write again. The list under the form keeps the ten most recent tickets and whether each one was emailed.

A copy can also go to the email on your WordPress account. That copy is not sent to the address typed in the form.

## If the email does not send

The ticket is still saved and marked “Not sent.” Fix mail on the site (an SMTP plugin is the usual way), then use **Send again**. **Email it yourself** opens a message to support with the reference and the text you wrote. Removing a ticket only takes it off this list. It does not unsend an email.

## How long a ticket stays

Tickets older than 12 months are deleted on a daily cleanup. A site can change the number with the `theme_desk/keep_months` filter. Set it to `0` to keep tickets. WordPress **Tools → Export Personal Data** and **Erase Personal Data** include tickets stored for an email address.
