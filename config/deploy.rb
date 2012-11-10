set :application, "bridge_city_lacrosse"
set :repository,  "git@github.com:rclosner/bridge_city_lacrosse"
set :scm, :git
set :deploy_to, "/var/www/bridge_city_lacrosse"

set :deploy_via, :remote_cache
set :copy_exclude, [".git", ".DS_Store", ".gitignore", ".gitmodules"]

server "ryanclosner.com", :app
