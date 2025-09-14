<?php
$db_file = __DIR__ . '/db/linktree.sqlite';
if (!file_exists(__DIR__ . '/db')) {
    mkdir(__DIR__ . '/db', 0777, true);
}

try {
    $conn = new PDO("sqlite:$db_file");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Tabel admin users
    $conn->exec("
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE NOT NULL,
        password TEXT NOT NULL,
        email TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );
    ");
    
    // Insert default admin user
    $conn->exec("INSERT OR IGNORE INTO users (username, password, email) VALUES 
        ('admin', 'admin123', 'admin@arinalhaf.com');");

    // Tabel links dengan kolom tambahan
    $conn->exec("
    CREATE TABLE IF NOT EXISTS links (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        url TEXT NOT NULL,
        description TEXT,
        icon TEXT DEFAULT 'link',
        color TEXT DEFAULT 'btn-primary',
        is_active INTEGER DEFAULT 1,
        click_count INTEGER DEFAULT 0,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );
    ");

    // Insert sample links dengan data yang lebih lengkap
    $conn->exec("INSERT OR IGNORE INTO links (title, url, description, icon, color) VALUES
    ('Instagram Official', 'https://instagram.com/arinafauziahh', 'Follow my daily inspiration & behind the scenes', 'fab fa-instagram', 'btn-gradient-pink'),
    ('YouTube Channel', 'https://youtube.com/@arinalhaf', 'Subscribe for weekly content about productivity & mindset', 'fab fa-youtube', 'btn-gradient-red'),
    ('LinkedIn Profile', 'https://linkedin.com/in/arinalhaf', 'Professional network & career updates', 'fab fa-linkedin', 'btn-gradient-blue'),
    ('Personal Website', 'https://arinalhaf.com', 'My official website with full portfolio', 'fas fa-globe', 'btn-gradient-purple'),
    ('TikTok Videos', 'https://tiktok.com/@arinalhaf', 'Quick tips & viral content', 'fab fa-tiktok', 'btn-gradient-dark'),
    ('WhatsApp Business', 'https://wa.me/6287848676046', 'Direct consultation & business inquiry', 'fab fa-whatsapp', 'btn-gradient-green'),
    ('Email Newsletter', 'mailto:hello@arinalhaf.com', 'Subscribe to my weekly newsletter', 'fas fa-envelope', 'btn-gradient-orange'),
    ('Podcast Spotify', 'https://spotify.com/arinalhaf-podcast', 'Listen to my weekly podcast about life & success', 'fas fa-music', 'btn-gradient-green');
    ;");

    // Tabel products dengan kolom image dan metadata
    $conn->exec("
    CREATE TABLE IF NOT EXISTS products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        description TEXT,
        price INTEGER NOT NULL,
        original_price INTEGER,
        image TEXT,
        category TEXT DEFAULT 'digital',
        type TEXT,
        date TEXT,
        url TEXT NOT NULL,
        is_featured INTEGER DEFAULT 0,
        is_active INTEGER DEFAULT 1,
        stock INTEGER DEFAULT -1,
        rating REAL DEFAULT 0,
        total_reviews INTEGER DEFAULT 0,
        tags TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );
    ");

    // Insert sample products dengan gambar dan data lengkap
    $conn->exec("INSERT OR IGNORE INTO products (title, description, price, original_price, image, category, type, url, is_featured, stock, rating, total_reviews, tags) VALUES
        (
            'Masterclass: AI for Content Creators', 
            'Comprehensive course covering AI tools, ChatGPT mastery, content automation, and productivity hacks for modern creators. Includes 50+ video lessons, templates, and lifetime access.',
            299000, 
            499000,
            'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=500&h=300&fit=crop&crop=center',
            'course',
            'masterclass',
            'https://wa.me/628123456789?text=Halo,%20saya%20tertarik%20dengan%20Masterclass%20AI',
            1,
            25,
            4.8,
            127,
            'AI,ChatGPT,Content Creation,Productivity'
        ),
        (
            'E-book: Productivity Hacks 2024',
            'Ultimate guide to boost your productivity with proven methods, time management techniques, and digital tools. Over 150 pages of actionable strategies.',
            89000,
            129000,
            'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=500&h=300&fit=crop&crop=center',
            'ebook',
            'digital',
            'https://drive.google.com/productivity-ebook-2024',
            1,
            -1,
            4.7,
            89,
            'Productivity,Time Management,Success,Mindset'
        ),
        (
            'Personal Branding Workshop',
            'Live 3-day intensive workshop covering personal branding strategy, social media presence, content planning, and monetization techniques.',
            1250000,
            1750000,
            'https://images.unsplash.com/photo-1552664730-d307ca884978?w=500&h=300&fit=crop&crop=center',
            'workshop',
            'live',
            'https://wa.me/628123456789?text=Halo,%20saya%20mau%20daftar%20Personal%20Branding%20Workshop',
            1,
            15,
            4.9,
            67,
            'Personal Branding,Social Media,Marketing,Business'
        ),
        (
            'Content Creator Toolkit',
            'Complete digital toolkit including Canva templates, video editing presets, caption templates, hashtag research tools, and planning sheets.',
            149000,
            199000,
            'https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=500&h=300&fit=crop&crop=center',
            'toolkit',
            'template',
            'https://gumroad.com/arinalhaf/creator-toolkit',
            0,
            -1,
            4.6,
            234,
            'Templates,Canva,Design,Content Planning'
        ),
        (
            '1-on-1 Mentoring Session',
            'Private 90-minute mentoring session covering career development, personal growth, content strategy, or business consultation via Zoom.',
            500000,
            750000,
            'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=500&h=300&fit=crop&crop=center',
            'service',
            'consultation',
            'https://calendly.com/arinalhaf/mentoring-session',
            1,
            5,
            5.0,
            23,
            'Mentoring,Consultation,Career,Personal Growth'
        ),
        (
            'Speaking Engagement Package',
            'Professional speaking services for corporate events, seminars, and conferences. Topics include leadership, digital transformation, and personal development.',
            2500000,
            3500000,
            'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=500&h=300&fit=crop&crop=center',
            'service',
            'speaking',
            'https://wa.me/628123456789?text=Halo,%20saya%20tertarik%20dengan%20speaking%20engagement',
            1,
            3,
            4.9,
            15,
            'Speaking,Corporate Training,Leadership,Events'
        )
    ;");

    // Tabel untuk tracking clicks dan analytics
    $conn->exec("
    CREATE TABLE IF NOT EXISTS analytics (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        link_id INTEGER,
        product_id INTEGER,
        type TEXT NOT NULL, -- 'link' or 'product'
        user_agent TEXT,
        ip_address TEXT,
        referrer TEXT,
        clicked_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (link_id) REFERENCES links(id),
        FOREIGN KEY (product_id) REFERENCES products(id)
    );
    ");

    // Tabel untuk settings/konfigurasi
    $conn->exec("
    CREATE TABLE IF NOT EXISTS settings (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        setting_key TEXT UNIQUE NOT NULL,
        setting_value TEXT,
        description TEXT,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );
    ");

    // Insert default settings
    $conn->exec("INSERT OR IGNORE INTO settings (setting_key, setting_value, description) VALUES
        ('site_title', 'Arinal Haq Fauziah | Creative Portfolio Hub', 'Main site title'),
        ('bio_text', 'Menginspirasi melalui kata-kata dan menciptakan konten yang bermakna. Mari berkarya bersama untuk masa depan yang lebih cerah! ✨', 'Profile bio text'),
        ('avatar_url', 'https://i.pravatar.cc/200?img=12', 'Profile avatar image URL'),
        ('instagram_url', 'https://instagram.com/arinalhaf', 'Instagram profile URL'),
        ('youtube_url', 'https://youtube.com/@arinalhaf', 'YouTube channel URL'),
        ('linkedin_url', 'https://linkedin.com/in/arinalhaf', 'LinkedIn profile URL'),
        ('twitter_url', 'https://twitter.com/arinalhaf', 'Twitter profile URL'),
        ('whatsapp_number', '628123456789', 'WhatsApp business number'),
        ('email_address', 'hello@arinalhaf.com', 'Contact email address'),
        ('followers_count', '12500', 'Total followers count'),
        ('posts_count', '487', 'Total posts count'),
        ('engagement_rate', '89', 'Engagement rate percentage'),
        ('theme_primary_color', '#667eea', 'Primary theme color'),
        ('theme_secondary_color', '#764ba2', 'Secondary theme color'),
        ('google_analytics_id', '', 'Google Analytics tracking ID'),
        ('facebook_pixel_id', '', 'Facebook Pixel ID'),
        ('custom_css', '', 'Custom CSS code'),
        ('custom_js', '', 'Custom JavaScript code'),
        ('maintenance_mode', '0', 'Maintenance mode (0=off, 1=on)')
    ;");

    echo "🚀 Database SQLite berhasil diinisialisasi dengan schema terbaru!\n\n";
    echo "✅ Tables created:\n";
    echo "   - users (admin management)\n";
    echo "   - links (social media & quick access)\n"; 
    echo "   - products (digital products & services)\n";
    echo "   - analytics (click tracking)\n";
    echo "   - settings (site configuration)\n\n";
    echo "📊 Sample data inserted:\n";
    echo "   - 1 admin user (admin/admin123)\n";
    echo "   - 8 sample links with descriptions\n";
    echo "   - 6 featured products with images\n";
    echo "   - Default site settings\n\n";
    echo "🎯 Ready to use! Database file: " . $db_file . "\n";

} catch (PDOException $e) {
    die("❌ Error: " . $e->getMessage());
}
?>