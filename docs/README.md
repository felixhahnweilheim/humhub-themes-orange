# [HumHub](https://humhub.org) OrangeTheme

### A child theme for HumHub

**Version: 0.6.0** (for HumHub 1.14)

This is a child [theme module](https://docs.humhub.org/docs/theme/module#theme-module), the changes compared to the community theme are listed below.

**Author:** Felix Hahn, info@hahn-felix.de - self-learned

## Installation
see [INSTALLATION.md](INSTALLATION.md)

## Changes in comparison to the community theme
### 1. Comment and like icons instead of text (configurable)

You can decide to show icons instead of the text, both or only the text.  
As like icon you can choose between heart, star and thumbs up.

<img src="../resources/screenshot-social-controls-2.png" width="200">

### 2. Topic list in spaces and profiles
**Thanks to @raphaeljolivet** (see https://github.com/humhub/humhub/pull/4785) I was able to add a topic list to the left sidebar of spaces (only shown if there is at least one topic)

<img src="../resources/screenshot-space-topic-list.png" width="700">

### 3. Colors
- bright topbar (added variable @custom-topbar-background and @custom-topbar-contrast)

<img src="../resources/screenshot-header-desktop.png" width="700">

- bright dropdown menus, text-color: @text-color-highlight instead of white
- color changes in comparison to the HumHub Community theme are mentioned in the file `less/variables.less`
- added color variables (e.g. color for like icons)

#### Added hover effects
- see `less/mixins.less` (added color variable @hover)
- Hover for "view all" in the tasks widget header, see `less/tasks.less`

### 4. Restyled buttons
see `less/button.less`

<img src="../resources/screenshot-space-header-buttons.png" width="200">

<img src="../resources/screenshot-people-buttons.png" width="400">

### 5. Added Language Switcher in
- Login modal window, at the bottom
- Registration page, beneath the title
- dashboard for guests

### 6. Hide "New Spaces" widget from guest dashboar

### 7. [Some smaller things ...](DETAILS.md)
