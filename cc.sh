#!/bin/sh

WEBPATH=/var/www/test-oro

rm -rf $WEBPATH/app/cache/prod/*
rm -rf $WEBPATH/app/cache/dev/*
rm -rf $WEBPATH/app/cache/test/*


rm -rf $WEBPATH/app/admin/cache/prod/*
rm -rf $WEBPATH/app/admin/cache/dev/*
rm -rf $WEBPATH/app/admin/cache/test/*