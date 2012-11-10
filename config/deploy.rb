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
