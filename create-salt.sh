#!/bin/bash

echo "<?php" > wordpress/wp-salt.php
curl https://api.wordpress.org/secret-key/1.1/salt/ >> wordpress/wp-salt.php
echo "?>" >> wordpress/wp-salt.php


