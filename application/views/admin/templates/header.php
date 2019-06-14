<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/styles.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/all.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/trix.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Admin</title>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-lightest">
<!--Screen-->
<div class="min-h-screen flex flex-col">
<!--Header Section Starts Here-->
<header class="bg-nav">
<div class="flex justify-between">
    <div class="p-1 mx-3 inline-flex">
        <h1 class="text-white">KSHITIJ</h1>
        <i class="fas fa-bars p-3 text-white" onclick="sidebarToggle()"></i>
    </div>
    <div class="p-1 flex flex-row">
        <a href="<?= base_url() ?>/admin/logout" class="text-white p-2 no-underline hidden md:block lg:block">Logout</a>
    </div>
</div>
</header>
<!--/Header-->

<div class="flex flex-1">
