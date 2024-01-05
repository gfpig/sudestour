<?php
namespace Deployer;

require 'recipe/common.php';

// Config

set('repository', 'https://github.com/gfpig/sudestour.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('Gabrielle')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/sudestour');

// Hooks

after('deploy:failed', 'deploy:unlock');
