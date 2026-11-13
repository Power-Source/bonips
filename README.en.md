# BoniPress

[Deutsch](README.md) | **English**

[![Version](https://img.shields.io/badge/Version-1.0.0-2271b1?style=flat-square)](readme.txt)
![PHP](https://img.shields.io/badge/PHP-8.0%2B-777bb4?style=flat-square&logo=php&logoColor=white)
![WordPress](https://img.shields.io/badge/WordPress-up%20to%207.1.4-21759b?style=flat-square&logo=wordpress&logoColor=white)
![ClassicPress](https://img.shields.io/badge/ClassicPress-2.7.4-03768e?style=flat-square)
[![License](https://img.shields.io/badge/License-GPL--2.0--or--later-2ea44f?style=flat-square)](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html)

**Your website. Your points. Your rules.**

BoniPress brings a custom points system to your WordPress or ClassicPress
website. Members can earn points for their activities, build up a balance and,
depending on the features you enable, redeem or transfer points or use them
for content and purchases.

You decide what your points are called, how they are earned and what members
can do with them. Whether you choose “Community Points”, “Bonus Stars” or a
name of your own, BoniPress adapts to your website.

## A practical example

Imagine you run a community and want to reward members for participating:

1. A new member receives **50 points** when they register.
2. An approved comment earns **5 points**.
3. A daily visit earns **2 points**.
4. Members can see their balance on a dedicated page and compare their
   progress on a leaderboard.
5. Once they have earned enough points, members might reach a higher rank or
   transfer points to another member.

These are just examples: you set the amounts, conditions and features
yourself. Start small and add more possibilities as your community grows.

## What BoniPress offers

### Earn and manage points

- Award points automatically for registrations, logins, daily visits,
  comments and published content.
- Reward members for viewing content and videos, clicking specially configured
  links or referring others.
- Set how many points each action is worth and limit awards where the
  relevant settings are available.
- Manage balances in the administration area and check the log to see why
  points were awarded or deducted.
- Use multiple point types if needed, such as separate points for community
  activities and purchases.

### Show achievements and balances

- Show members their current balance and points history.
- Create leaderboards and highlight your most active members.
- Award badges for meeting requirements and create ranks with custom images.
- Inform members about points events by email or popup.

### Put points to use

- Let members send points to other members.
- Create coupons that members can redeem to add points to their accounts.
- Sell posts, pages or parts of them for points.
- Accept points as payment in supported stores and for event bookings.
- Offer points for purchase or set up recurring payouts and interest.

To use badges, ranks, transfers and other optional features, activate the
corresponding included add-on under **Add-ons**. Payments and integrations
also require you to configure the relevant provider or plugin.

## Set up your points system

### 1. Install and configure

Install and activate BoniPress through your website’s plugin area. Then open
**Initial setup** from the notice in the administration area.

Choose singular and plural names for your points, such as “Bonus Point” and
“Bonus Points”. You can also choose the number format and decimal places. For
whole points, use **0 decimal places**. Select **Create point type** to
complete setup.

### 2. Reward activities

Open **Hooks**. A hook is a rule that determines what happens when a
particular action takes place.

To reward comments:

1. Select the comments hook and activate it by clicking it or dragging it to
   the active hooks area.
2. Under **Approved Comments**, enter the desired number of points for
   **Member**, for example `5`.
3. Check the log template and the limits per post and per day. For these
   limits, `0` means **unlimited**.
4. Save the hook and test it using a logged-in user account and an approved
   comment.

Set up other actions in the same way, such as rewards for registration or a
daily visit. The available settings depend on the hook.

### 3. Choose add-ons

Under **Add-ons**, activate only the features you need. Some examples:

| Add-on | What it does |
| --- | --- |
| **Badges** | Recognize members who meet requirements. |
| **Ranks** | Create rank levels based on points earned. |
| **Transactions** | Enable transfers between members. |
| **Coupons** | Create codes that add points to a member’s balance. |
| **Sell Content** | Offer access to entire pieces of content or selected parts for points. |
| **Gateway** | Use points as payment in supported stores and for events. |
| **Credit Purchase** | Let members purchase points. |
| **Banking** | Set up recurring payouts and interest. |
| **Email Notifications / Notifications** | Inform members about events by email or popup. |
| **Statistics** | Review points earned and lost. |
| **MarketPress** | Set up points payments and purchase rewards for MarketPress. |

### 4. Display points on your website

Add these shortcodes to a page or post:

- `[bonips_my_balance]` shows logged-in members their current balance.
- `[bonips_leaderboard]` displays a leaderboard.
- `[bonips_transfer]` displays a transfer form. The **Transactions** add-on
  must be active.
- `[bonips_load_coupon]` displays a coupon redemption form. The **Coupons**
  add-on must be active and configured.

Balances, leaderboards and transfers can also be added using widgets. Before
publishing, check which information is visible to visitors and other members,
especially in leaderboards and points histories.

## Working with other plugins

BoniPress offers integrations with **PS Community**, **PS Mitgliedschaften**,
**CoursePress**, **Events and Bookings**, **WooCommerce**, **BuddyPress**,
**Contact Form 7** and **WP-Polls**, among others. Depending on the
integration, you can reward activities such as community participation, form
submissions, product reviews or poll votes.

The options available depend on which plugins are installed and active on
your website. Set up the corresponding hook or add-on in BoniPress after
activating the other plugin.

## Frequently asked questions

**Do I need to activate every add-on?**  
No. Start with the features you need and activate others later.

**Can I adjust points manually?**  
Yes. Authorized users can edit member balances in the administration area.
You can configure the permissions for this in the settings.

**Why hasn’t a member received points?**  
Check that the relevant hook is active and saved, that the action meets its
conditions and that no limit or exclusion applies. For comments, for example,
approval may be required.

**Can I use different types of points?**  
Yes. In addition to your first point type, you can create more in the
settings and use them for different purposes.

**Which languages are available?**  
The source language is German, and an English translation is included.

## PSOURCE Manager

The [PSOURCE Manager](https://psource.eimen.net/psource-manager/) lets you
install and update PSOURCE plugins and themes.

## Support PSOURCE

Would you like to support PSOURCE? Visit the
[support page](https://psource.eimen.net/spendenaktionen/psource-unterstuetzen/)
to learn how.

## Help and license

For detailed guides to hooks, add-ons and displays, see the
[BoniPress documentation](https://psource.eimen.net/wiki/ps-bonipress-dokumentation/)
(in German).

BoniPress is licensed under the [GPLv2 or later](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html).
