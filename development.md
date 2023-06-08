# Local Development Guide

## Running in WSL

1. Use [this guide](https://dev.to/mafx/php-development-on-win10-through-wsl2-laravel-valet-and-tighten-takeout-5en8) to setup Valet and Tighten Takeout
2. Open a WSL Terminal
3. Navigate to the project directory `~/projects/cbirddev`
4. Enable Valet (Web Host)
```shell
$ valet start
$ valet link
```
5. Enable Takeout Services
```shell
$ takeout enable mysql --default
$ takeout enable redis --default
```

## Disabling services
1. Disable Valet (Web Host)
```shell
$ valet stop
```
2. Enable Takeout Services
```shell
$ takeout disable mysql redis
```
