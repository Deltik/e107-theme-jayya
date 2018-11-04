# e107 Theme - Jayya

![GitHub release](https://img.shields.io/github/release/Deltik/e107-theme-jayya.svg)
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2FDeltik%2Fe107-theme-jayya.svg?type=shield)](https://app.fossa.io/projects/git%2Bgithub.com%2FDeltik%2Fe107-theme-jayya?ref=badge_shield)

Classic e107 theme now maintained by Deltik

![preview.jpg](/preview.jpg?raw=true "Theme Preview")

## History

These are the chronicles of Jayya up to the creation of this repository.

### Prerelease

Jayya started as a project by e107 developer SweetAs [on 22 December 2004](https://web.archive.org/web/20180406032135/https://sourceforge.net/p/e107/svn/1232/tree/trunk/e107_0.7/e107_themes/admin_jayya/theme.php#l20).  It was intended as a theme for the e107 Admin Area; hence, its theme folder was initially `admin_jayya` and its description was "Admin Theme Jayya".

SweetAs added Jayya to version control [on 05 January 2005](https://sourceforge.net/p/e107/svn/1232/).

[On 15 January 2005](https://sourceforge.net/p/e107/svn/1322/), SweetAs set the default e107 admin theme to Jayya.

[On 23 January 2005](https://sourceforge.net/p/e107/svn/1424/), `admin_jayya` became `jayya` as it became evident that Jayya could be used as a site theme as well as an admin theme.

### Release

Jayya underwent many iterations of improvement until 16 January 2006, the release of [e107 v0.7](https://sourceforge.net/projects/e107/files/e107/e107v0.7/).  In [the upgrade notes](https://web.archive.org/web/20080803182301/http://e107.org:80/page.php?6), Jayya was announced as a new theme for the Admin Area.

After the initial release, Jayya mostly received just bugfixes and minor tweaks to keep up with e107 development.  Its last update in the e107 v0.7 development cycle was [on 30 September 2010](https://web.archive.org/web/20180406035109/https://sourceforge.net/p/e107/svn/13116/log/?path=/trunk/e107_0.7/e107_themes/jayya).

Jayya was one of the themes selected to continue on into the e107 v0.8 development cycle.

This repository picks up Jayya on the e107 v0.8 branch.  (Jayya as it was in e107 v0.7 is not available in this repository.)

### Deltik's First Fork: `jayya_modded`

A website called [Deltik](https://www.deltik.org) originally used the e107.v4 theme (`e107v4a`).

[![Screenshot of Deltik on 04 July 2008 at 6:59:38 PM EDT](https://i.imgur.com/iB1COnB.jpg)](https://i.imgur.com/iB1COnB.jpg)
<sup><sub>(Screenshot by [pvcsnathan](https://web.archive.org/web/20171016103900/http://pvcsnathan.com/news.php), another e107 user!)</sub></sup>

On 10 July 2008 (six days after the screenshot above was taken), there was an "accident" involving the user who incidentally also injected the text "You are a butthead" into the feature box.  The "accident" resulted in a deleted database.  Backups were also inoperative at the time, so Deltik suffered total data loss.

As part of the rebuilding efforts, Deltik switched themes and chose Jayya as the new site theme.

Although Jayya offered three stylesheets, the main "style.css", and the alternatives "canvas.css" and "pepper.css", none quite fit in with Deltik.

The first fork manifested itself as `jayya_modded`, which had slight customizations to accommodate the size of the new [Deltik logo](https://i.imgur.com/Y8FU5xv.png) and to add a clock on the top right so as to be roughly feature-equivalent to e107.v4 (which also had a clock).

Unfortunately, the code for `jayya_modded` was lost on 08 November 2008 when Deltik's webhost's sole hard drive failed.  A backup from 21 October 2008 was available, but although it did contain the database this time, all the `e107_themes` contents were missing.

Deltik was restored on 20 January 2009 with a new hosting provider and resigned to using the default Jayya theme this time.

### Deltik's Derivative Theme: Clearlooks-compact

On 22 May 2009, the administrators of that web host feigned that they were hacked, conveniently after the end of their monthly fundraising cycle.  They shut down all services and stole the user data to sell to potential buyers.

Of course, Deltik neglected to take backups again, so after three data loss events, the community fell apart and Deltik moved back to their previous hosting provider on 23 May 2009.

This time, Deltik did not run on e107.  Instead, on 01 July 2009 Deltik started working on a new theme called **Clearlooks-compact**, based on the default blue look from [Clearlooks](https://en.wikipedia.org/wiki/Clearlooks).  Jayya was used as a structural reference, but no Jayya code was used in Clearlooks-compact.  Development quickly stalled as there was no demand for a new theme.

On 15 February 2010, Deltik renamed the theme to **GlossyClearlooks-compact**, inspired by [Glossy](http://archive.debian.org/debian/pool/main/g/gnome-themes/gnome-themes_2.22.2-1_all.deb), a Clearlooks theme first introduced in [Debian 5.0 Lenny](https://www.debian.org/releases/lenny/).  The theme was developed for the legacy Deltik product [Kweshuner](https://github.com/Deltik/products-legacy#kweshuner).  The graphics were updated to use Glossy's color scheme.

GlossyClearlooks-compact landed on Deltik's home page on 03 June 2010 before development went dormant again.

### Deltik's Second Fork: Jayya MoreBlue

Deltik relaunched its website on 04 February 2011, once again running on e107.

As making an entirely new theme was too great an undertaking for virtually no demand, Deltik worked to bring some of the elements of GlossyClearlooks-compact into the already established Jayya theme.

On 11 March 2011, Deltik copied the `jayya` theme folder into a new folder called `deltik`, effectively forking Jayya.  The version of Jayya forked was [from SVN revision 11703 of the e107 v0.7 branch](https://sourceforge.net/p/e107/svn/11703/log/?path=/trunk/e107_0.7/e107_themes/jayya) (25 August 2010).  The name of the new theme was **Deltik Jayya**, meant to emphasize that this was a customization of Jayya meant for the Deltik website.

Meanwhile, [on 21 March 2013](https://github.com/e107inc/e107/commit/7f5599b7b629aa3185a84aa66b05592954f14a52#diff-0f0f249ae28e5bfcf3f17d997c5489c6), mainline e107 development removed Jayya, effectively ending its official support.

Deltik.org remained on its fork of Jayya until almost 7 years later, on 23 January 2018, when Deltik asked the lead e107 maintainer [CaMer0n](https://github.com/CaMer0n/) to help upgrade Deltik.org from [e107 v1.0.4](https://sourceforge.net/projects/e107/files/e107/e107%20v1.0.4/) to [e107 v2.1.7](https://github.com/e107inc/e107/releases/tag/v2.1.7).

Since e107 v2 had adopted newer frontend design implementations, Deltik.org needed to catch up.

On 02 April 2018, Deltik started this repository begin supporting Jayya again.  Deltik Jayya was assigned the retronym **Jayya MoreBlue**, because its styling elements came from the [Debian MoreBlue Orbit GDM Theme](https://web.archive.org/web/20180406190541/http://dgepi.salud.gob.mx/gdm/themes/debian-moreblue-orbit/).

Finally, on 03 April 2018, Deltik merged Jayya MoreBlue into the last official update to Jayya as an alternative stylesheet, allowing one theme to serve both styles (in addition to the two original alternative stylesheets that Jayya officially had).

Jayya's new home is this repository, and releases can be found on the [releases page](https://github.com/Deltik/e107-theme-jayya/releases).


## License
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2FDeltik%2Fe107-theme-jayya.svg?type=large)](https://app.fossa.io/projects/git%2Bgithub.com%2FDeltik%2Fe107-theme-jayya?ref=badge_large)