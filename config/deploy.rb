# config valid for current version and patch releases of Capistrano


lock "~> 3.15.0"

set :repo_url, 'https://github.com/thkernel/medplatform.git'
# Default branch is :master

# Default deploy_to directory is /var/www/laravel-capistrano

# Default value for keep_releases is 5
set :keep_releases, 5
append :linked_dirs, 
    'storage/app',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs'
namespace :composer do
    desc "Running Composer Install"
    task :install do
        on roles(:composer) do
            within release_path do
                execute :composer, "install --no-dev --quiet --prefer-dist --optimize-autoloader"
                execute :chmod, "u+x artisan" # make artisan executable
                #execute :php, "artisan migrate:install" run migrations
                #execute :php, "artisan migrate --no-interaction --force" # run migrations
            end
        end
    end
end
namespace :laravel do
    task :fix_permission do
        on roles(:laravel) do
            #execute :chmod, "-R ug+rwx #{shared_path}/storage/ #{release_path}/bootstrap/cache/"
            #execute :chgrp, "-R www-data #{shared_path}/storage/ #{release_path}/bootstrap/cache/"
        end
    end
    task :configure_dot_env do
    dotenv_file = fetch(:laravel_dotenv_file)
        on roles (:laravel) do
        execute :cp, "#{dotenv_file} #{release_path}/.env"
        end
    end
end

namespace :app do 
    desc "Symbolic link for shared folders"
    task :create_symlink do
        on roles(:app) do
            within release_path do
                execute "rm -rf #{release_path}/storage"
                execute "ln -s #{shared_path}/storage/ #{release_path}"
                execute :php, "artisan storage:link" 

            end
        end
    end
end

namespace :deploy do
    after :updated, "composer:install"
    after :updated, "laravel:fix_permission"
    after :updated, "laravel:configure_dot_env"
    after :published, "app:create_symlink" #to create symlink
end