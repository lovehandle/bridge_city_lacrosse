set :application, "bridge_city_lacrosse"

set :scm, :git
set :git_enable_submodules, 1
set :repository,  "git@github.com:rclosner/bridge_city_lacrosse"
set :branch, "master"

set :user, "deploy"
set :use_sudo, false
set :runner, "deploy"
set :deploy_to, "/var/www/bridge_city_lacrosse"

server "ryanclosner.com", :app

namespace :wordpress do
  task :symlink, :roles => :app do
    run "ln -nfs #{shared_path}/uploads #{release_path}/wp-content/uploads"
    run "ln -nfs #{shared_path}/local-config.php #{release_path}/wp-config.php"
  end

  task :chmod, :roles => :app do
    run 
  end
end

after "deploy:symlink", "wordpress:symlink"
