<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://yiisoft.github.io/docs/images/yii_logo.svg" height="100px" alt="Yii">
    </a>
    <h1 align="center">Yii & Temporal Demo</h1>
    <h3 align="center">Demo application to show how to manage Temporal workflows with Yii3 framework</h3>
    <br>
</p>

[![Latest Stable Version](https://poser.pugx.org/yiisoft/app/v)](https://packagist.org/packages/yiisoft/app)
[![Total Downloads](https://poser.pugx.org/yiisoft/app/downloads)](https://packagist.org/packages/yiisoft/app)
[![Build status](https://github.com/yiisoft/app/actions/workflows/build.yml/badge.svg)](https://github.com/yiisoft/app/actions/workflows/build.yml)
[![Code Coverage](https://codecov.io/gh/yiisoft/app/branch/master/graph/badge.svg?token=TDZ2bErTcN)](https://codecov.io/gh/yiisoft/app)
[![static analysis](https://github.com/yiisoft/app/workflows/static%20analysis/badge.svg)](https://github.com/yiisoft/app/actions?query=workflow%3A%22static+analysis%22)
[![type-coverage](https://shepherd.dev/github/yiisoft/app/coverage.svg)](https://shepherd.dev/github/yiisoft/app)

## Requirements

- PHP 8.1 or higher.

## Installation

Create a project:

```shell
git clone https://github.com/xepozz/yii3-temporal-demo
cd yii3-temporal-demo
```

Install dependencies:

```shell
composer install
./vendor/bin/rr get
```

To run the app:

```shell
./rr serve
```

Now you should be able to access the application through the URL printed to console.
Usually it is `http://localhost:8080`.

## About

This is a demo application is based on [yiisoft/app](https://github.com/yiisoft/app) template and shows how to manage Temporal workflows with Yii3 framework.
It requires Temporal and RoadRunner to be installed and running.

Also, it uses the [xepozz/yii3-temporal-bridge](https://github.com/xepozz/yii3-temporal-bridge) package to integrate Temporal with Yii3 more smoothly.

## Screenshots

<p align="center">
    <a href="https://github.com/yiisoft/app" target="_blank">
        <img src="docs/images/home.png" alt="Home page" >
    </a>
    <a href="https://github.com/yiisoft/app" target="_blank">
        <img src="docs/images/temporal.png" alt="Temporal workflow result" >
    </a>
</p>
