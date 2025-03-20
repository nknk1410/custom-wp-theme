<footer class="container py-20 section-border">
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
</footer>

<?php wp_footer(); ?>
<script>
function toggleMenu() {
    document.querySelector('.nav-menu').classList.toggle('show');
}
</script>
</body>
</html>
