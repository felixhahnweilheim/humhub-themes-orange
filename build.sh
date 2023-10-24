#!/bin/bash

# 1) Recompile CSS files and extract colors

cd themes/themeOrange

# 1a) ThemeOrange
lessc less/build.less css/theme.css --clean-css="--s1 --advanced"

# 1b) ThemeOrange dark.css
lessc less/dark/build.less css/dark.css
css-color-extractor css/dark.css css/dark.css --format=css

cp css/dark.css css/temporary.less

lessc less/dark/build2.less css/dark.css --clean-css="--s1 --advanced"
rm css/temporary.less

cd ../../

# 2) Update message files
cd ../../
php yii message/extract-module theme-orange
cd modules/humhub-themes-orange
