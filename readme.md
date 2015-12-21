## 19 December 2015

## Project 4: myCloset

* Live: URL: http://mycloset.eliluvish.com

## Project Description
The app is a wardrobe manager and outfit creator. It allows the user to add images of their clothing, tag each item, view an image gallery of their items, or sort by tag. It also has
a create an outfit feature which allows the user to swipe through their items top/bottom/shoe and save the outfit. The site is mobile optimized so a lot of if it is top down.

The app was created in Laravel 5.1 and uses PHP, HTML, and CSS (bootstrap).

## Screencast Demonstration:
* URL: http://screencast.com/t/fBFgpNSIEkX

## Details for the instruction team: Test credentials
* username: jamal@harvard.edu
* password: helloworld

This account is set up with content to show the features of the app.

jill@harvard.edu is an empty account.

##### Relevant Information:
* 4 tables: users, items, tags, item_tag.
* CRUD interactions:
  * Add an image or url.
  * Show item (image + where worn + tags)
  * Update where item worn (update image to be implemented);
  * Delete record + image from server
* Comprehensive (hopefully!) error validation server side.

## Plugins, Libraries, Packages or Outside Code:
* Twitter bootstrap
* fzaninotto/faker
* barryvdh/laravel-debugbar
* illuminate/html
* intervention/image -- for image manipulation (https://github.com/Intervention/image)
* slick.js - for the create an outfit feature (http://kenwheeler.github.io/slick/)
* Image gallery code: (http://startbootstrap.com/template-overviews/thumbnail-gallery/)
* Theme/Template from Bootswatch.
* Help from a kind reddit user with the Eloquent query when showing all by tag.
* Code for updated <input> tag in the create an outfit feature found at: (http://stackoverflow.com/questions/28546163/getting-data-attributes-from-slides-in-slick-carousel/28546483#28546483)
