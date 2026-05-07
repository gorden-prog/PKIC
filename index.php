<?php include('inc/header.php'); ?>
<?php include('function/connect.php'); ?>

<?php
    $stmt = $pdo->query('SELECT * FROM index_page ORDER BY id');
    foreach ($stmt as $item) {
        echo $item['content'];
    }
?>

<?php include('inc/footer.php'); ?>

    <script>
        const params = new URLSearchParams(window.location.search);
        const course = params.get('course');
        if (course) {
            document.getElementById('courseSelect').value = course;
        }

        document.getElementById('feedbackForm').addEventListener('submit', function(e) {
            let valid = true;

            const name = document.getElementById('fieldName');
            const errorName = document.getElementById('errorName');
            const namePattern = /^[А-Яа-яЁёA-Za-z\s]{2,}$/;
            if (!namePattern.test(name.value.trim())) {
                errorName.textContent = 'Введите имя (минимум 2 буквы)';
                name.classList.add('input--error');
                valid = false;
            } else {
                errorName.textContent = '';
                name.classList.remove('input--error');
            }

            const phone = document.getElementById('fieldPhone');
            const errorPhone = document.getElementById('errorPhone');
            const phonePattern = /^\d{11}$/;
            if (!phonePattern.test(phone.value.trim())) {
                errorPhone.textContent = 'Введите 11 цифр (например: 89001234567)';
                phone.classList.add('input--error');
                valid = false;
            } else {
                errorPhone.textContent = '';
                phone.classList.remove('input--error');
            }

            const course = document.getElementById('courseSelect');
            if (!course.value) {
                course.classList.add('input--error');
                valid = false;
            } else {
                course.classList.remove('input--error');
            }

            if (!valid) {
                e.preventDefault();
            }
        });
    </script>
