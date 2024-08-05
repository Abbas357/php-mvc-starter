<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta property="og:site_name" content="C&W Department, KP">
<script type="application/ld+json">
    {
        "name": "Etender (Old)",
        "description": "Admin Dashboard | Communication and Works Department",
        "author": {
            "@type": "Person",
            "name": "Abbas Khan"
        },
        "@type": "C&W Department",
        "url": "https://cwd.gkp.pk",
        "headline": "Admin Dashboard",
        "@context": "https://cwd.gkp.pk"
    }
</script>
<link rel="apple-touch-icon" sizes="144x144" href="<?php asset('images/apple-touch-icon.png') ?>">
<link rel="shortcut icon" href="<?php asset('favicon.ico') ?>">
<meta name="theme-color" content="#3063A0">
<link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet">
<link rel="stylesheet" href="<?php asset('vendor/open-iconic/css/open-iconic-bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?php asset('vendor/fontawesome/css/all.css') ?>">
<link rel="stylesheet" href="<?php asset('css/theme.min.css"') ?>" data-skin="default">
<link rel="stylesheet" href="<?php asset('css/theme-dark.min.css') ?>" data-skin="dark">
<link rel="stylesheet" href="<?php asset('css/custom.css"') ?>">
<script>
    var skin = localStorage.getItem('skin') || 'default';
    var isCompact = JSON.parse(localStorage.getItem('hasCompactMenu'));
    var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
    // Disable unused skin immediately
    disabledSkinStylesheet.setAttribute('rel', '');
    disabledSkinStylesheet.setAttribute('disabled', true);
    // add flag class to html immediately
    if (isCompact == true) document.querySelector('html').classList.add('preparing-compact-menu');
</script>