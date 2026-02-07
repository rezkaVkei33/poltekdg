 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .dropdown {
            position: relative;
        }
        
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            min-width: 12rem;
            padding: 0.5rem 0;
            margin: 0.125rem 0 0;
            background-color: white;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        .dropdown-menu a {
            display: block;
            padding: 0.5rem 1rem;
            color: #374151;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        
        .dropdown-menu a:hover {
            background-color: #fef3c7;
            color: #d97706;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, #fef3c7 0%, #fed7aa 50%, #fde68a 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        
        .mobile-menu.active {
            max-height: 500px;
        }
        
        .mobile-dropdown {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        
        .mobile-dropdown.active {
            max-height: 200px;
        }
        
        .sticky-navbar {
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95);
        }
        
        @media (max-width: 768px) {
            .mobile-layout {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }
            
            .mobile-content {
                flex: 1;
                overflow-y: auto;
                padding-bottom: 2rem;
            }
            
            .mobile-footer {
                margin-top: auto;
            }
        }
    </style>