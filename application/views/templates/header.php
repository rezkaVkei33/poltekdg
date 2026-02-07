 <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <!-- Bootstrap core CSS --> 
    <link href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Additional CSS Files -->  
    <link rel="stylesheet" href="<?= base_url('assets/css/fontawesome.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/templatemo-edu-meeting.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/lightbox.css') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/LogoPoltek.png') ?>">
    
     <!-- SEO -->
    <meta name="description" content="{% block meta_description %}Website resmi Politeknik Darma Ganesha{% endblock %}">
    <meta name="keywords" content="Politeknik, Pendidikan, Darma Ganesha, Kuliah, Belitung">
    <meta name="author" content="Politeknik Darma Ganesha">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Politeknik Darma Ganesha - Kampus Vokasi Unggulan">
    <meta property="og:description" content="Penerimaan Mahasiswa Baru Poltek DG telah dibuka. Yuk daftar!">
    <meta property="og:image" content="https://poltekdg.ac.id/assets/img/thumb.jpg">
    <meta property="og:url" content="https://poltekdg.ac.id">

    <style>
      :root {
            --primary: #2829298f;
            --primary-dark: #2829298f;
            --secondary: #f8f9fa;
            --accent: #e63946;
            --dark: #333;
            --light: #fff;
            --gray: #6c757d;
        }
      /* PERBAIKAN HEADING PAGE */
        .heading-page {
            padding: 80px 0;
            background: linear-gradient(rgba(0, 77, 132, 0.8), rgba(0, 77, 132, 0.8)), 
                        url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: var(--light);
            text-align: center;
            position: relative;
        }
        
        .heading-page::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            opacity: 0.95;
            z-index: 1;
        }
        
        .heading-page .container {
            position: relative;
            z-index: 2;
        }
        
        .heading-page h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0;
            color: var(--light) !important; /* Memastikan teks berwarna putih */
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            letter-spacing: 1px;
        }
        
        .heading-page .breadcrumb {
            justify-content: center;
            background: transparent;
            padding: 0;
            margin-top: 15px;
        }
        
        .heading-page .breadcrumb-item {
            color: rgba(255, 255, 255, 0.8);
        }
        
        .heading-page .breadcrumb-item.active {
            color: var(--light);
        }
        
        .heading-page .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.6);
        }
        
        .heading-page .breadcrumb a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .heading-page .breadcrumb a:hover {
            color: var(--light);
            text-decoration: underline;
        }
    </style>

    
  </head>