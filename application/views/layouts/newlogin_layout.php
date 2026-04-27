<!DOCTYPE html>
<html lang="id" class="transition duration-300">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login SIKANDUNG</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

<script>
tailwind.config = {
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                primary: '#208a8a',
                primary2: '#0db077'
            }
        }
    }
}
</script>

<style>
body {
    font-family: 'Plus Jakarta Sans', sans-serif;
}
</style>

</head>

<body class="bg-gradient-to-br from-primary to-primary2 min-h-screen flex items-center justify-center dark:bg-slate-900 transition">

<?php echo $template['content']; ?>

<script>
// SHOW PASSWORD
function togglePassword() {
    const input = document.getElementById("password");
    input.type = input.type === "password" ? "text" : "password";
}

// DARK MODE
function toggleDark() {
    document.documentElement.classList.toggle('dark');
}
</script>

</body>
</html>
