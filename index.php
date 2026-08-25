<?php 
require_once 'includes/db_connect.php';
require_once 'includes/header.php'; 
?>

<section class="hero" style="position: relative; overflow: hidden; background-color: #000;">
    <img src="https://upload.wikimedia.org/wikipedia/commons/f/f4/The_Scream.jpg" alt="The Scream" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0; opacity: 0.8;">
    <div class="hero-content" style="position: relative; z-index: 1;">
        <h1>Discover & Collect <br>Extraordinary Art</h1>
        <p>Explore a curated collection of original paintings, digital masterpieces, and breathtaking photography from leading artists around the world.</p>
        <a href="gallery.php" class="btn btn-secondary" style="font-size: 1.1rem; padding: 1rem 2.5rem; border-radius: 2rem;">Explore Gallery</a>
    </div>
</section>

<div class="container mt-4">
    <h2 class="section-title">Featured Artworks</h2>
    
    <div class="artwork-grid">
        <?php
        // Fetch up to 4 artworks
        $sql = "SELECT * FROM artworks LIMIT 4";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // If no image, use high quality placeholder
                $imgSrc = !empty($row["image"]) ? $row["image"] : 'https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80';
                
                echo '<div class="artwork-card">';
                echo '  <div class="artwork-img-wrapper">';
                echo '      <img src="' . htmlspecialchars($imgSrc) . '" alt="' . htmlspecialchars($row["name"]) . '">';
                echo '  </div>';
                echo '  <div class="artwork-info">';
                echo '      <div class="artwork-category">' . htmlspecialchars($row["category"]) . '</div>';
                echo '      <h3 class="artwork-title">' . htmlspecialchars($row["name"]) . '</h3>';
                echo '      <div class="artwork-price-row">';
                echo '          <div class="artwork-price">$' . htmlspecialchars($row["price"]) . '</div>';
                echo '          <div class="artwork-rating">★ 4.8 <span>(24)</span></div>';
                echo '      </div>';
                echo '  </div>';
                echo '  <div class="card-actions">';
                echo '      <button class="btn btn-secondary">Add to Cart</button>';
                echo '      <a href="artwork_details.php?id=' . $row["id"] . '" class="btn btn-primary">Details</a>';
                echo '  </div>';
                echo '</div>';
            }
        } else {
            // Display dummy professional items if DB is empty to show the design
            for($i=1; $i<=4; $i++) {
                $images = [
                    'https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                    'https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                    'https://images.unsplash.com/photo-1536924940846-227afb31e2a5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                    'https://images.unsplash.com/photo-1580136608260-4eb11f4b24fe?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
                ];
                $titles = ["Abstract Harmony", "Ocean Whispers", "Urban Minimalist", "Golden Hour"];
                
                echo '<div class="artwork-card">';
                echo '  <div class="artwork-img-wrapper">';
                echo '      <img src="' . $images[$i-1] . '" alt="Artwork">';
                echo '  </div>';
                echo '  <div class="artwork-info">';
                echo '      <div class="artwork-category">Painting</div>';
                echo '      <h3 class="artwork-title">'.$titles[$i-1].'</h3>';
                echo '      <div class="artwork-price-row">';
                echo '          <div class="artwork-price">$299.00</div>';
                echo '          <div class="artwork-rating">★ 5.0 <span>(12)</span></div>';
                echo '      </div>';
                echo '  </div>';
                echo '  <div class="card-actions">';
                echo '      <button class="btn btn-secondary">Add to Cart</button>';
                echo '      <a href="artwork_details.php?dummy=true&item=' . $i . '" class="btn btn-primary">Details</a>';
                echo '  </div>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>

<div class="container mt-4 mb-4">
    <div style="background-color: var(--primary-color); border-radius: var(--radius-lg); padding: 4rem 2rem; color: white; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <h2 style="color: white; margin-bottom: 1rem; font-size: 2.5rem;">Join Our Artist Community</h2>
        <p style="max-width: 600px; margin-bottom: 2rem; color: #d1d5db; font-size: 1.1rem;">Register today to manage your favorite collections, write reviews, and track your orders seamlessly.</p>
        <a href="register.php" class="btn btn-secondary" style="border-radius: 2rem; padding: 1rem 2.5rem; font-size: 1.1rem;">Create an Account</a>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
