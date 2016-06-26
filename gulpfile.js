var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('admin.scss', 'public/assets/admin/css/style.css');
});