<main>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/main.css" type="text/css" media="all" />
    <section class="home">
        <div class="admin-readme">
            <h1>Wiere Weddings Admin</h1>
            <p class="subtitle">A WordPress CMS for wiereweddings.com</p>
            
            <div class="readme-section">
                <h2>What This Theme Does</h2>
                <p>
                    This WordPress theme serves as a <strong>Content Management System (CMS)</strong> for wiereweddings.com.
                    While the actual website is hosted externally, this WordPress installation allows you to:</p>
                <ul>
                    <li>Manage all your website content through a familiar WordPress interface</li>
                    <li>Update images, text, and information without touching code</li>
                    <li>Control your site's appearance and branding</li>
                    <li>Manage testimonials and service offerings</li>
                </ul>
            </div>

            <div class="readme-section">
                <h2>Available Admin Menu Items</h2>
                
                <div class="menu-item">
                    <h3>🏠 Dashboard</h3>
                    <p>Your main WordPress control center. View site statistics and quick access to recent content.</p>
                </div>

                <div class="menu-item">
                    <h3>📄 Pages</h3>
                    <p>Manage static pages like About, Contact, or any other permanent content on your site.</p>
                </div>

                <div class="menu-item">
                    <h3>🎨 Appearance → Customize</h3>
                    <p>Customize your site's branding and contact information:</p>
                    <ul>
                        <li><strong>Site Settings:</strong> Site title, business name, phone, and email</li>
                        <li><strong>Social Media:</strong> Instagram, Facebook, and LinkedIn links</li>
                    </ul>
                </div>

                <div class="menu-item">
                    <h3>👥 Users</h3>
                    <p>Manage who has access to edit your website content. You can add team members or keep it just for yourself.</p>
                </div>

                <div class="menu-item">
                    <h3>🛠️ Tools</h3>
                    <p>WordPress utilities for importing/exporting content or other administrative tasks.</p>
                </div>
            </div>

            <div class="readme-section">
                <h2>Content Management</h2>
                
                <div class="content-type">
                    <h3>Home Slides</h3>
                    <p>Create and manage the rotating banner images on your homepage. Each slide can have a title and featured image.</p>
                    <p><strong>Supports:</strong> Title, Featured Image</p>
                </div>

                <div class="content-type">
                    <h3>Home Posts</h3>
                    <p>Manage the main content sections on your homepage. Each post can be configured with different layouts:</p>
                    <ul>
                        <li><strong>Text Centered:</strong> Centered text content with optional image</li>
                        <li><strong>Callout:</strong> Highlighted text boxes for important information</li>
                        <li><strong>Block Left/Right:</strong> Text with image on the opposite side</li>
                    </ul>
                    <p><strong>Custom Fields:</strong> Content type, paragraph text, bullet points, image width, bullet style</p>
                </div>

                <div class="content-type">
                    <h3>About Posts</h3>
                    <p>Manage content for your About page sections. Same layout options as Home Posts.</p>
                    <p><strong>Supports:</strong> Title, Featured Image, Custom Content Fields</p>
                </div>

                <div class="content-type">
                    <h3>Service Posts</h3>
                    <p>Showcase your wedding services and packages. Includes excerpt support for brief descriptions.</p>
                    <p><strong>Supports:</strong> Title, Excerpt, Featured Image, Custom Content Fields</p>
                </div>
            </div>

            <div class="readme-section">
                <h2>🔧 Content Layout Options</h2>
                <p>When creating Home Posts, About Posts, or Service Posts, you can choose from these layout types:</p>
                
                <div class="layout-option">
                    <h4>Text Centered</h4>
                    <p>Perfect for headlines, introductions, or centered content. Can include an image above or below the text.</p>
                </div>

                <div class="layout-option">
                    <h4>Callout</h4>
                    <p>Highlighted text boxes that draw attention to important information, special offers, or key messages.</p>
                </div>

                <div class="layout-option">
                    <h4>Block Left/Right</h4>
                    <p>Text content with an image on the opposite side. Great for showcasing your work or explaining services with visual examples.</p>
                    <ul>
                        <li>Control image width (percentage of container)</li>
                        <li>Choose between bullet points or numbered lists</li>
                        <li>Add up to 8 bullet points per section</li>
                    </ul>
                </div>
            </div>

            <div class="readme-section">
                <h2>📱 What's Hidden</h2>
                <p>To keep your admin interface clean and focused, these WordPress features have been disabled:</p>
                <ul>
                    <li><strong>Posts:</strong> Standard blog posts (not needed for a business site)</li>
                    <li><strong>Comments:</strong> Comment management system</li>
                    <li><strong>Plugins:</strong> Plugin installation and management</li>
                    <li><strong>Settings:</strong> General WordPress settings</li>
                    <li><strong>Code Editor:</strong> Direct theme file editing</li>
                </ul>
            </div>

            <div class="readme-section">
                <h2>💡 Pro Tips</h2>
                <ul>
                    <li><strong>Image Optimization:</strong> Use high-quality images but keep file sizes reasonable for fast loading</li>
                    <li><strong>Content Updates:</strong> Update your content regularly to keep your site fresh and engaging</li>
                    <li><strong>Backup:</strong> Your content is automatically saved as you work, but consider regular backups</li>
                    <li><strong>Mobile First:</strong> All content layouts are designed to work well on mobile devices</li>
                </ul>
            </div>
        </div>
    </section>
  </body>
  
  <!-- Footer -->
  <?php
    wp_footer();
  ?>
</html>