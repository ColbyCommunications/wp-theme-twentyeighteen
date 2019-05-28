## whos-coming

A WordPress plugin generating a listing of people who have R.S.V.P.'ed to an event, with the list entered in JSON or CSV format.

[Demo.](https://colbycommunications.github.io/whos-coming/demo/)

## Install

Clone this repository in your plugin repository. Alternatively install as a Composer package in a WordPress theme with

```
composer require colbycomms/whos-coming
```

## Usage

After activating the plugin, see the plugin options (under the Plugins admin menu item) to tell the package where and how to request data. The options are JSON or CSV data requested from a URL or pasted into a text field.

Then place the following shortcode on any page:

```HTML
[whos-coming]
```
