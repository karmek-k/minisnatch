# Minisnatch

A tiny one-file IP grabber that saves its results in a JSON file.

Should work with PHP 7 or greater.

(The code isn't clean on purpose, I wanted to compress everything in a single file.)

## How to use

Feel free to change the script's filename!

Use query parameters to route the redirects.
For example, for the default routes:

`/minisnatch.php?k=gnu` - captures data to the `gnu` key

`/minisnatch.php?k=linux` - captures data to the `linux` key

`/minisnatch.php` (or any other `k` parameter) - captures data to the `default` key

## Config

Edit the file directly, there is a `CONFIG SECTION` block,
you probably won't have to touch anything else.

## Disclaimer

I am not responsible for what you do with this script. Do not use it for illegal purposes.
