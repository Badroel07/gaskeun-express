</main>
    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const sidebar = document.getElementById('sidebar');

        mobileMenuButton.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full'); // Toggles the hidden state
        });

        // Optional: Close sidebar when clicking outside on mobile
        document.addEventListener('click', (event) => {
            if (!sidebar.contains(event.target) && !mobileMenuButton.contains(event.target) &&
                sidebar.classList.contains('transform') && !sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.add('-translate-x-full');
            }
        });

        // Optional: Close sidebar on resize if it's open (for better UX when switching from mobile to desktop)
        window.addEventListener('resize', () => {
            // If the screen is large enough, ensure the sidebar is visible
            if (window.innerWidth >= 1024) { // Tailwind's 'lg' breakpoint
                sidebar.classList.remove('-translate-x-full');
            }
        });
    </script>
</body>

</html>