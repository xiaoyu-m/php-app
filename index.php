<script>
// localStorage.setItem("key", "value");
let token = localStorage.getItem("token");
// href = '/admin/index.php';
let href = '/login.php';
if (token) {
href = '/admin/index.php';
}
location.href = href;
</script>
