
<script>
let token = localStorage.getItem("token");
let href = '/login.php';
if (token) {
	href = '/admin/index.php';
}
location.href = href;
</script>
