var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.less('backend.less', 'public/assets/admin/css/style.css');
});