---
author: allen
comments: false
date: 2007-09-19 10:41:27
layout: post
slug: php-tip-path-independent-sites
title: 'PHP tip: Path-independent sites'
wordpress_id: 190
oldtags:
- Apache
- PHP
---

![The php logo.](/images/wp-uploads/2007/09/php_logo.jpg)I know a few people who are just getting into PHP coding right now, and am fielding a fair number of questions on writing PHP apps. Those who are not programmers or interested in web applications can now cover their ears and shout "lalalala".

[Curtis](http://curtis.lassam.net/) has been trying include files from included files. Plain old relative paths don't work, since the inner include will be relative to the wrong place. Some have suggested some convoluted solutions that generally involve him storing the path to the includes directory and passing it on to every file.

This is not only unnecessary, but bad. It violates [Don't Repeat Yourself](http://c2.com/cgi/wiki?DontRepeatYourself) and will burn you later on. If later you need to have versions of a site run from different locations, or move your site somewhere else, it will suck. For each hard-coded path I find, I shall kill you.

So what you do is let PHP tell you where your files are, rather than tracking it in your code. This is easy if your web server is set up correctly. Apache has this invaluable thing called Virtual Hosts, that let you let you host multiple domains on the same server. This is likely already set up for you by the likes of [Dreamhost](http://www.dreamhost.com/r.cgi?apike) or your server admin. The Apache configuration will contain something like:

`<VirtualHost testing.alteringtime.com>
DocumentRoot /home/apike/alteringtime_test/
ServerName testing.alteringtime.com
</VirtualHost>`

Now, when code is running on `http://testing.alteringtime.com/` it can easily "know" where it's running from. PHP will use the information from Apache to set up variables for you:

`$_SERVER['DOCUMENT_ROOT'] = '/home/apike/alteringtime_test/'; //the file path to your site
$_SERVER['HTTP_HOST'] = 'testing.alteringtime.com'; //the domain your site is on`

Just make use of those variables to do things like include files and do redirects. For example:

`include("$_SERVER[DOCUMENT_ROOT]/includes/tools.php"); //this will work correctly in any file
header("Location: http://$_SERVER[HTTP_HOST]/destination.php"); //a nice HTTP redirect`

Although this doesn't solve all problems relating to portability it is an elegant way to solve the problems that works in 90% of cases. If somebody wants to have different versions of your app in two locations in folders under the same domain, that would require config files to solve (as Wordpress uses).
