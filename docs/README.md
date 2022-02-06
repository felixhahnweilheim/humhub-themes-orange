# [HumHub](https://humhub.org) OrangeTheme

### A child theme for HumHub 1.10+

**Version:** 0.1.0

This is a child theme, the changes compared to the community theme are listed below.

**Author:** Felix Hahn, info@hahn-felix.de - self-learned, hobbyist

## State of development
I tried to exactly follow the official theming documentation and it works fine in my HumHub installation. But I have not tested all possible settings and available modules.

That's why I recommend you to test the module with your settings, modules etc. and/or look through my code before activating it on a production site.

Please give me some feedback how it works for you.

## Changes in comparison to the community theme
### 1. Topic list in spaces
- **Thanks to @raphaeljolivet** (see https://github.com/humhub/humhub/pull/4785) I was able to add a topic list to the left sidebar of spaces (only shown if there is at least one topic)
![](../resources/screenshot-space-topic-list.png)

### 2. Comment and like icons instead of text
![](../resources/screenshot-social-controls-2.png)

### 3. Colors
- bright topbar (added variable @custom-topbar-background and @custom-topbar-contrast)
![](../resources/screenshot-header-desktop.png)
- bright dropdown menus (background same as topbar), text-color: @text-color-highlight instead of white
- color changes in comparison to the HumHub Community theme are mentioned in the file `less/variables.less`

#### Added hover effects
- see `less/mixins.less` (added color variable @hover)
- Hover for "view all" in the tasks widget header, see `less/tasks.less`

### 4. Restyled buttons
- see `less/button.less`

![](../resources/screenshot-space-header-buttons.png)
![](../resources/screenshot-people-buttons.png)

### 6. Comment create form: fixed button over text
- see `less/mixins.less`, solved with padding-right

### 7. Added Language Switcher in
- Login modal window, at the bottom
- Registration page, beneath the title

### 8. Editor for tasks, wiki, polls etc.: fixed non-floating menubar lead to a lot of scrolling on mobile
- see `less/mixins.less` (solved with max-height)

### 9. Full-width Dashboard for guests
- does not show the widgets "New People" and "New Spaces" in order not to show names and internal things to the public

### 10. Smaller things ...
- General Layout: slightly decreased body padding (distance between topbars and content) for desktop and tablets - see `less/mixins.less`
- Login page: background: @background-color-page instead of @primary, text/h1/h2-color: @primary instead of white, link color: @link instead of white
- E-Mails: Text color in footer: @text-color-soft instead of @text-color-soft2
- E-Mails: Background color of body and table: @default (brighter) instead of @background-color-page
- Badges: background: @primary, text-color white
- "Powered by Humhub" link: @text-color-soft2
- Appearance of code entered in the richtext editor: @text-color-highlight, background @link with opacity
- Print version: Hide comment controls
- Mail Module: Background color in Conversation sidebar: @background-color-main (white) instead of @background-color-secondary
- Mail Module: Background color of Conversation header: @default (brighter) instead of @background-color-secondary
- Gallery Module: visibility of clickable text, see `less/gallery.less`
- Legal Module: readability of Cookie banner text and styling of legal footer, see `less/legal.less`
- Scroll up Module: Hide scroll up button on mobile (it was shown on the normally hidden sidebar -> confusing)
