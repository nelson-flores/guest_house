<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>{{ !empty($title) ? $title . ' | ' : '' }}Painel de Controlo - FENA</title>

    <meta name="description" content="Painel Administrativo FENA">
    <meta name="author" content="FENA">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Painel Administrativo - FENA">
    <meta property="og:site_name" content="FENA">
    <meta property="og:description" content="Painel Administrativo da Feira Económica da Província de Nampula">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <link rel="icon" type="image/png" href="{{ url('landing/media/logo.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Stylesheets -->
    <link rel="stylesheet" id="css-main" href="{{ url('admin_assets/css/oneui.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.1/summernote-bs5.min.css" />
<link id="css-theme" rel="stylesheet" href="{{ url('admin_assets/css/themes/city.min.css') }}">
    <script src="{{ url('admin_assets/js/setTheme.js') }}"></script>
    <link rel="stylesheet" href="{{ url('admin_assets/css/imports.css') }}">

    <link rel="stylesheet" href="{{ url('admin_assets/js/plugins/magnific-popup/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ url('admin_assets/js/plugins/select2/css/select2.min.css') }}">
</head>