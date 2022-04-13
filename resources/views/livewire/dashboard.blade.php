<div>
    <script>
        document.addEventListener('livewire:load', function() {
            const role = @this.user_role
            var path = ""
            if (role === "admin") {
                path = "dashboard-admin"
            } else if (role === "student") {
                path = "dashboard-student"
            } else if (role === "teacher") {
                path = "informations"
            }
            @this.redirectTo(path)
        })
    </script>
</div>
