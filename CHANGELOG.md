# Changelog

[![GitHub releases](https://img.shields.io/github/release/Deltik/e107-theme-jayya.svg)](https://github.com/Deltik/e107-theme-jayya/releases)

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## v3.0.0 (UNRELEASED)

### Added

* Bootstrap 5 library
* FontAwesome 5 library
* Footer navigation in the footer
* menuarea in top-center header position
* menuarea in top-right header position
* Two ways for menu behavior on mobile devices (off-canvas or standard dropdown)
* Accordion behaviour for sidebars. By default, closed on mobile devices.
* Dropdown on hover

## Changed

* **Only the MoreBlue style is supported for now.**
* Replaced outdated `{ALT_SITELINKS}` shortcode with main `{NAVIGATION}` shortcode
* Bullet for link lists is possible to set in theme preferences
* Increased the base font size and related stuff. Default bootstrap size (1 rem) is used.
* Background images replaced with gradients (main navigation, buttons, sidebars)
* Removed clock menu support

## Fixed

* Core signup template for Bootstrap 5
* Core login template for Bootstrap 5

## v2.2.4 (2020-02-24)

### Fixed

* The missing image "comments_16.png" has been restored following the path refactoring in c3b8ac2.
* The missing image "polls.png" has been restored following the path refactoring in c3b8ac2.
* The missing image "bullet2.gif" has been restored following the path refactoring in c3b8ac2.

## v2.2.3 (2018-10-24)

### Added

* [`README.md`](https://github.com/Deltik/e107-theme-jayya/blob/ec103c8b362b8d1a623df3334aef31e1746bd472/README.md) now embeds the theme preview image.

### Fixed

* The missing default icon "arrow.png" has been restored following the path refactoring in c3b8ac2b284abf616f9e39c4a267010d7ec3c65b.

## v2.2.2 (2018-04-06)

### Added

* [`README.md`](https://github.com/Deltik/e107-theme-jayya/blob/c7d704e25d8faa74f9fb274e468197e7f7fcee7b/README.md) now has the history of Jayya and how it came to be maintained by Deltik

### Fixed

* "Quick temporary fix" for e107 v0.8 applied to `canvas.css` classic alternative style
* "Quick temporary fix" for e107 v0.8 applied to `pepper.css` classic alternative style
* Removed clock from `canvas.css` classic alternative style to be more consistent with how the style used to look
* Removed clock from `pepper.css` classic alternative style to be more consistent with how the style used to look

## v2.2.1 (2018-04-03)

### Fixed

* Styling corrections applied to `canvas.css` classic alternative style
* Styling corrections applied to `pepper.css` classic alternative style

## v2.2.0 (2018-04-03)

This release merges two forks of the classic Jayya theme from [e107](https://e107.org/):

* **Jayya** – The original theme, version 2.0 before it was [removed from the e107 core on 21 March 2013](https://github.com/e107inc/e107/commit/7f5599b7b629aa3185a84aa66b05592954f14a52#diff-0e0df88c1f3f52c1454037d0c8462a65)
* **Jayya MoreBlue** – Internally called **Deltik Jayya**, only used as the site theme of [Deltik](https://www.deltik.org/) on 11 March 2011

### Fork Status

The Jayya MoreBlue fork has been merged into mainline Jayya as v2.2.0, and the Jayya MoreBlue styling is now available as an alternative stylesheet called `moreblue.css`.

#### Fork Graph

```
Legend:
  A: Jayya mainline (original)
  B: Jayya MoreBlue (fork)
  /: Code merged from upstream/original
  \: Code merged from downstream/fork
  *: Release

A B
↓ ↓
*   v2.2.0 (2018-04-03) Jayya MoreBlue as an alternative stylesheet in Jayya mainline
|\
| * v2.1   (2018-04-02) Jayya MoreBlue based on Jayya v2.0
|/|
* | v2.0   (2012-12-11) Jayya as it was on 11 December 2012
| |
| * v1.1   (2011-03-11) Fork of Jayya used as the theme of Deltik on 11 March 2011
|/
*   v1.0   (2009-07-06) Jayya as it was on 06 July 2009
┆
```

## v2.1 (2018-04-02)

The theme metadata identifies itself as **Deltik Jayya**, but the retronym of this release is **Jayya MoreBlue** because it is based on the Debian MoreBlue Orbit theme from Debian 5.0 Lenny.

This is a fork of Jayya v2.0 with the Jayya MoreBlue v1.1 changes replayed on top of Jayya v2.0, effectively creating Jayya MoreBlue v2.1.

### Fork Status

The Jayya MoreBlue fork will be merged into mainline Jayya as v2.2, and the Jayya MoreBlue styling will be available as an alternative stylesheet called `moreblue.css`.

#### Fork Graph

```
Legend:
  A: Jayya mainline (original)
  B: Jayya MoreBlue (fork)
  /: Code merged from upstream/original
  \: Code merged from downstream/fork
  *: Release

A B
↓ ↓
*   v2.2 (2018-04-03) Jayya MoreBlue as an alternative stylesheet in Jayya mainline
|\
| * v2.1 (2018-04-02) Jayya MoreBlue based on Jayya v2.0
|/|
* | v2.0 (2012-12-11) Jayya as it was on 11 December 2012
| |
| * v1.1 (2011-03-11) Fork of Jayya used as the theme of Deltik on 11 March 2011
|/
*   v1.0 (2009-07-06) Jayya as it was on 06 July 2009
┆
```

## v2.0 (2012-12-11)

Jayya as it was on 11 December 2012 in the e107 v0.8 trunk

## v1.1 (2011-03-11)

Fork of Jayya used as the theme of [Deltik](https://www.deltik.org) on 11 March 2011

The theme metadata identifies itself as **Deltik Jayya**, but the retronym of this release is **Jayya MoreBlue** because it is based on the Debian MoreBlue theme from Debian 5.0 Lenny.

### Fork Status

Jayya MoreBlue v1.1 merged with Jayya v2.0 to form Deltik Jayya v2.1.

## v1.0 (2009-07-06)

Jayya as it was on 06 July 2009 in the e107 v0.8 trunk