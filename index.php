<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arinal Haq Fauziah | Creative Portfolio Hub</title>
    <link rel="shortcut icon" href="images\20250320_190104[1].png" type="image/x-icon">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    
    <!-- Lucide Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/umd/lucide.min.js"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --gold-gradient: linear-gradient(135deg, #ffd89b 0%, #19547b 100%);
            --glass-bg: rgba(255, 255, 255, 0.08);
            --glass-border: rgba(255, 255, 255, 0.2);
            --shadow-soft: 0 8px 32px rgba(31, 38, 135, 0.37);
            --shadow-hover: 0 15px 45px rgba(31, 38, 135, 0.5);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: var(--primary-gradient);
            position: relative;
            overflow-x: hidden;
            padding: 20px 0;
        }

        /* Animated Background Texture */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(120, 219, 226, 0.3) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
            z-index: -1;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-30px) rotate(120deg); }
            66% { transform: translateY(20px) rotate(240deg); }
        }

        /* Particle System */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            animation: particle-float 15s infinite linear;
        }

        @keyframes particle-float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .main-card {
            background: var(--glass-bg);
            backdrop-filter: blur(25px);
            border: 1px solid var(--glass-border);
            border-radius: 32px;
            padding: 50px 40px;
            box-shadow: var(--shadow-soft);
            position: relative;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Profile Section */
        .profile-section {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .avatar-container {
            position: relative;
            display: inline-block;
            margin-bottom: 25px;
        }

        .avatar {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            border: 4px solid rgba(255, 255, 255, 0.4);
            object-fit: cover;
            box-shadow: 0 0 40px rgba(255, 255, 255, 0.3);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .avatar:hover {
            transform: scale(1.05);
            box-shadow: 0 0 60px rgba(255, 255, 255, 0.5);
        }

        .status-indicator {
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 20px;
            height: 20px;
            background: #00ff88;
            border-radius: 50%;
            border: 3px solid white;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .profile-name {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 700;
            background: linear-gradient(135deg, #ffffff 0%, #f0f0f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .profile-subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .profile-bio {
            color: rgba(255, 255, 255, 0.75);
            font-size: 1rem;
            line-height: 1.6;
            max-width: 500px;
            margin: 0 auto;
        }

        /* Social Stats */
        .social-stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 30px 0;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
            color: white;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            display: block;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Links Section */
        .links-section {
            margin-bottom: 50px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .link-item {
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 20px 25px;
            margin-bottom: 15px;
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .link-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .link-item:hover::before {
            left: 100%;
        }

        .link-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(255, 255, 255, 0.4);
        }

        .link-icon {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
        }

        .link-content {
            flex: 1;
            text-align: left;
        }

        .link-title {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 3px;
        }

        .link-subtitle {
            font-size: 0.9rem;
            opacity: 0.7;
        }

        .link-arrow {
            width: 20px;
            height: 20px;
            opacity: 0.7;
            transition: transform 0.3s;
        }

        .link-item:hover .link-arrow {
            transform: translateX(5px);
        }

        /* Products Section */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        /* Product Card */
        .product-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 6px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }

        /* Image */
        .product-image-container {
            height: 180px;
            overflow: hidden;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        /* Content */
        .product-content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: #1f2937;
        }

        .product-description {
            font-size: 0.95rem;
            color: #4b5563;
            margin-bottom: 12px;
            flex-grow: 1;
        }

        /* Footer */
        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-price {
            font-weight: 700;
            font-size: 1.2rem;
            color: #f97316; /* warm orange accent */
        }

        .product-btn {
            padding: 8px 18px;
            background: #3b82f6;
            color: #fff;
            border: none;
            border-radius: 999px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .product-btn:hover {
            background: #2563eb;
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 600px) {
            .product-content {
                padding: 15px;
            }
            .product-title {
                font-size: 1.1rem;
            }
            .product-price {
                font-size: 1.1rem;
            }
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.7);
        }

        .footer-text {
            font-size: 0.95rem;
            margin-bottom: 15px;
        }

        .footer-socials {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .footer-social {
            width: 40px;
            height: 40px;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }

        .footer-social:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            transform: translateY(-3px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-card {
                padding: 30px 25px;
                border-radius: 24px;
            }
            
            .profile-name {
                font-size: 2.2rem;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
            }
            
            .social-stats {
                gap: 15px;
            }
            
            .product-footer {
                flex-direction: column;
                align-items: stretch;
            }
        }

        /* Loading Animation */
        .fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <!-- Particles Background -->
    <div class="particles" id="particles"></div>

    <div class="container">
        <div class="main-card">
            <!-- Profile Section -->
            <div class="profile-section">
                <div class="avatar-container">
                    <img src="https://i.pravatar.cc/200?img=12" class="avatar" alt="Arinal Haq Fauziah">
                    <div class="status-indicator"></div>
                </div>
                
                <h1 class="profile-name">Arinal Haq Fauziah</h1>
                
                <div class="profile-subtitle">
                    <i class="fas fa-at"></i>
                    <span>arinafauziahh</span>
                    <i class="fas fa-circle" style="font-size: 4px; margin: 0 5px;"></i>
                    <i class="fas fa-microphone"></i>
                    <span>Pembicara & Konten Kreator</span>
                </div>
                
                <p class="profile-bio">
                    Menginspirasi melalui kata-kata dan menciptakan konten yang bermakna. 
                    Mari berkarya bersama untuk masa depan yang lebih cerah! ✨
                </p>

                <!-- Social Stats -->
                <div class="social-stats">
                    <div class="stat-item">
                        <span class="stat-number">12.5K</span>
                        <span class="stat-label">Followers</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">487</span>
                        <span class="stat-label">Posts</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">89%</span>
                        <span class="stat-label">Engagement</span>
                    </div>
                </div>
            </div>

            <!-- Links Section -->
            <div class="links-section">
                <h3 class="section-title">
                    <i class="fas fa-link link-icon"></i>
                    Quick Access Links
                </h3>
                
                <div class="fade-in">
                    <?php 
                    $stmt = $conn->query("SELECT * FROM links ORDER BY id DESC");
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)): 
                    ?>
                        <a href="<?= htmlspecialchars($row['url']) ?>" target="_blank" class="link-item">
                            <!-- Gunakan ikon dari kolom 'icon' di DB -->
                            <i class="<?= htmlspecialchars($row['icon']) ?> link-icon"></i>

                            <div class="link-content">
                                <div class="link-title"><?= htmlspecialchars($row['title']) ?></div>
                                <div class="link-subtitle"><?= htmlspecialchars($row['description']) ?></div>
                            </div>

                            <i class="fas fa-external-link link-arrow"></i>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>

            <!-- Products Section -->
            <div class="products-section">
                <h3 class="section-title">
                    <i data-lucide="shopping-bag"></i>
                    Etalase Produk Premium
                </h3>
                
                <div class="products-grid fade-in">
                    <?php 
                    $stmt = $conn->query("SELECT * FROM products ORDER BY id DESC");
                    while($product = $stmt->fetch(PDO::FETCH_ASSOC)): 
                    ?>
                        <div class="product-card">
                            <?php if(!empty($product['image'])): ?>
                                <img src="<?= htmlspecialchars($product['image']) ?>" 
                                     alt="<?= htmlspecialchars($product['title']) ?>" 
                                     class="product-image">
                            <?php endif; ?>
                            
                            <div class="product-content">
                                <h4 class="product-title"><?= htmlspecialchars($product['title']) ?></h4>
                                <p class="product-description"><?= htmlspecialchars($product['description']) ?></p>
                                
                                <div class="product-footer">
                                    <span class="product-price">
                                        Rp <?= number_format($product['price'], 0, ',', '.') ?>
                                    </span>
                                    <a href="<?= htmlspecialchars($product['url']) ?>" 
                                       class="product-btn" target="_blank">
                                        <i data-lucide="shopping-cart"></i>
                                        Beli Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <div class="footer-text">
                    <i class="fas fa-heart" style="color: #ff6b6b;"></i>
                    Made with Golden Ratio by <strong>MHTeams</strong>
                    <i class="fas fa-sparkles" style="color: #ffd93d;"></i>
                </div>
                
                <div class="footer-socials">
                    <a href="#" class="footer-social">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="footer-social">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" class="footer-social">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="footer-social">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button id="backToTop" title="Back to Top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <style>
      #backToTop {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 999;
        background: rgba(255, 255, 255, 0.15); /* glass effect */
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        padding: 12px 14px;
        cursor: pointer;
        color: #fff;
        font-size: 1.2rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        opacity: 0;
        pointer-events: none;
        transition: all 0.3s ease;
      }

      #backToTop.active {
          opacity: 1;
          pointer-events: auto;
      }

      #backToTop:hover {
          transform: translateY(-2px) scale(1.1);
          box-shadow: 0 6px 20px rgba(0,0,0,0.2);
          background: rgba(255, 255, 255, 0.25);
      }

      /* Icon */
      #backToTop i {
          font-size: 1.2rem;
          transition: transform 0.3s ease;
      }
    </style>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      // Get the button
      const backToTopBtn = document.getElementById("backToTop");

      // Show button after scrolling down 200px
      window.onscroll = function() {
          if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
              backToTopBtn.classList.add("active");
          } else {
              backToTopBtn.classList.remove("active");
          }
      };

      // Scroll to top smoothly when button clicked
      backToTopBtn.addEventListener("click", () => {
          window.scrollTo({
              top: 0,
              behavior: "smooth"
          });
      });
    </script>
    
    <script>
        // Initialize Lucide Icons
        lucide.createIcons();
        
        // Create particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 50;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 15 + 's';
                particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
                particlesContainer.appendChild(particle);
            }
        }
        
        // Smooth scroll animation for elements
        function animateOnScroll() {
            const elements = document.querySelectorAll('.fade-in');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animation = 'fadeIn 0.6s ease-out forwards';
                    }
                });
            });
            
            elements.forEach(el => observer.observe(el));
        }
        
        // Initialize animations
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            animateOnScroll();
            
            // Add stagger animation to cards
            const cards = document.querySelectorAll('.product-card, .link-item');
            cards.forEach((card, index) => {
                card.style.animationDelay = (index * 0.1) + 's';
            });
        });

        // Add interactive hover effects
        document.querySelectorAll('.link-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.02)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    </script>
</body>
</html>