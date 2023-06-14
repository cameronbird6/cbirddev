#!/bin/sh
set -e

vendor/bin/phpunit

(git push) || true

git checkout master
git merge dev

git push origin master

git checkout dev
