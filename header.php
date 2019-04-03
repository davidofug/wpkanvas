<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="profile" href="http://gmpg.org/xfn/11" >
        <?php wp_head(); ?>
        <title>
            <?php bloginfo( 'name' ); ?>
            <?php wp_title( '/', true, 'left' ); ?>
        </title>
    </head>
    <body <?php body_class(); ?>>
    
