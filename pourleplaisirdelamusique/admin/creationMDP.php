<?php
echo password_hash(123456, PASSWORD_DEFAULT, ['cost'=>14]);
?>