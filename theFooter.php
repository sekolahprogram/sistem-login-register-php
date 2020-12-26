    </div>
</section>

<footer class="footer has-text-centered">
    <p>&copy;<?= date('Y'); ?> Febri Hidayan, Hak cipta dilindungi.</p>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
            var $notification = $delete.parentNode;

            $delete.addEventListener('click', () => {
                $notification.parentNode.removeChild($notification);
            });
        });
    });
</script>